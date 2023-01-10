<?php

require_once __DIR__ .'/inc/functions.php'; //作成した関数の読み込み
include __DIR__ .'/inc/error_check.php';
include __DIR__ . '/inc/header.php';
require_once 'connect.php';

if (empty($_POST['id'])) {
    // 0と (空文字は0バイトの文字列型)はtrue
    //issetと似ているが真逆ではない
    echo "idを指定してください。";
    exit;
}
//下記のifたちは独立したifたち
if (!preg_match('/\A\d{0,11}\z/u', $_POST['id'])) {
    //!演算子はtrueとfalseを入れ替える(~~じゃなければ､
    //この場合は､マッチしていなければの意味)
    echo "idが正しくありません";
    exit;
}

if (empty($_POST['title'])) {
    // 0と (空文字は0バイトの文字列型)はtrue
    //issetと似ているが真逆ではない
    echo "タイトルは必須です。",
    exit;
}
//下記のifたちは独立したifたち
if (!preg_match('/\A[[:^cntrl:]]{1,20}\z/u', $_POST['title'])) {
    //!演算子はtrueとfalseを入れ替える(~~じゃなければ､
    //この場合は､マッチしていなければの意味)
    echo "タイトルは20文字までです。";
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
$a = '2022-12-23';
if (!strtotime($_POST['publish'])) { // strtostring() 組み込み関数
    echo "日付のフォーマットが違います｡";
    exit;
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

try {
    $dbh = db_open(); // ← ユーザー定義関数
    // $sql ="INSERT INTO books (id, title, isbn, price, publish, author)
    // 疑問符プレースホルダを用いてプリペアドステートメントを実行した方が書きやすい
    $sql = "UPDATE books SET
    title = ?,
    isbn = ?,
    price = ?,
    publish = ?,
    author = ?
    WHERE id = ?";
    $stmt = $dbh->prepare($sql);

    // 本来､POSTはここ↓で書くべきではない bindParam
    // price,id のキャストは不要 
    $stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(2, $_POST['isbn'], PDO::PARAM_STR);
    $stmt->bindParam(3, $_POST['price'], PDO::PARAM_INT);
    $stmt->bindParam(4, $_POST['publish'], PDO::PARAM_STR);
    $stmt->bindParam(5, $_POST['author'], PDO::PARAM_STR);
    $stmt->bindParam(6, $_POST['id'], PDO::PARAM_STR);
    $stmt->execute();

    echo "データが更新されました｡";
    echo "<a href='index.php'>リストへ戻る</a>";
} catch (PDOException $e) {
    echo "エラー!: " . h($e->getMessage()) . "<br>";
    exit;
}


//var_dump($_POST);
?>
<?php include __DIR__ . '/inc/footer.php';
