<?php
session_start();
$token = bin2hex(random_bytes(20));
$_SESSION['token'] = $token;
?>

<?php require_once __DIR__ . '/login_check.php;' ?>
<?php
require_once __DIR__ . '/inc/functions.php'; //作成した関数の読み込み
include __DIR__ . '/inc/error_check.php';
include __DIR__ . '/inc/header.php';
require_once 'connect.php';

if (empty($_POST['title'])) {
    // 0と (空文字は0バイトの文字列型)はtrue
    //issetと似ているが真逆ではない
    echo "タイトルは必須です。",
    exit;
}
//下記のifたちは独立したifたち
if (!preg_match('/\A[[:^cntrl:]]{1,200}\z/u', $_POST['title'])) {
    //!演算子はtrueとfalseを入れ替える(~~じゃなければ､
    //この場合は､マッチしていなければの意味)
    echo "タイトルは200文字までです。";
    exit;
}
if (!preg_match('/\A\d{0,13}\z/', $_POST['isbn'])) {
    echo "ISBNは数字13桁までです｡";
    exit;
}
if (!preg_match('/\A\d{0,6}\z/u', $_POST['price'])) {
    echo "価格は数字6桁までです｡";
    exit;
}
if (empty($_POST['publish'])) {
    echo "日付は必須です｡";
    exit;
}

if(!preg_match('/\A\d{4}-\d{1,2}-\d{1,2}\z/u', $_POST['publish'])) {
    echo "日付のフォーマットが違います。";
    exit;
//$a = '2022-12-23';
//if (!strtotime($_POST['publish'])) { // strtostring() 組み込み関数
//    echo "日付のフォーマットが違います｡";
//    exit;
}
$date = explode('-', $_POST['publish']);
if (!checkdate($date[1], $date[2], $date[0])) {
    echo "正しい日付を入力してください｡";
    exit;
}
//int(1671667200) 1970/1/1 00:00:00 を0とした秒　エポックタイム

if (!preg_match('/\A[[:^cntrl:]]{0,80}\z/u', $_POST['author'])) {
    echo "著者名は80文字以内で入力してください｡";
    exit;
}

//foreach ($_POST as $key => $val) {
  //  $post[] = h($val); //<>などを無害化｡bindParamはここまでやらない
    //ポストを回して値をひとつずつ取り出し戻り値を$postで受け取る
//}
//var_dump($post);
try {
    $dbh = db_open(); // ← ユーザー定義関数
    $sql ="INSERT INTO books (id, title, isbn, price, publish, author) VALUES (NULL, :title, :isbn, :price, :publish, :author)";

    // $sql ="INSERT INTO books (id, title, isbn, price, publish, author)
    /*     ↑ 下で$sqlで書いてるからBooksの後の項目は省略できる */
    //VALUES (NULL, :title, :isbn, :price, :publish, :author)";
// $sql = "INSERT INTO books VALUES(Null , ?,?,?,?,? )";
    // 疑問符プレースホルダを用いてプリペアドステートメントを実行した方が書きやすい
$stmt = $dbh->prepare($sql);
$price = (int) $_POST['price'];
    // ↑はまるっと消しても良い｡ phpは数字として扱えるので不要
// $i = 0;
    // $i=0で定義したら､$stmtのtitle,isbnなどそれぞれを ++$i に置換えできる
    // 本来､POSTはここ↓で書くべきではない bindParam
    $stmt->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(":isbn", $_POST['isbn'], PDO::PARAM_STR);
    $stmt->bindParam(":price", $price, PDO::PARAM_INT);
    $stmt->bindParam(":publish", $_POST['publish'], PDO::PARAM_STR);
    $stmt->bindParam(":author", $_POST['author'], PDO::PARAM_STR);
//$stmt->bindParam(++$i, $_POST['title'], PDO::PARAM_STR);
//$stmt->bindParam(++$i, $_POST['isbn'], PDO::PARAM_STR);
//$stmt->bindParam(++$i, $_POST['price'], PDO::PARAM_INT);
//$stmt->bindParam(++$i, $_POST['publish'], PDO::PARAM_STR);
//$stmt->bindParam(++$i, $_POST['author'], PDO::PARAM_STR);
    $stmt->execute();
    echo "データが追加されました｡<br>";
    echo "<a href='index.php'>リストへ戻る</a>";
} catch (PDOException $e) {
    echo "エラー!: " . h($e->getMessage()) . "<br>";
    exit;
}


//var_dump($_POST);
?>
<?php include __DIR__ . '/inc/footer.php';