<?php require_once __DIR__ . '/login_check.php'; ?>
<?php
require_once __DIR__ . '/inc/functions.php';
if(empty($_GET['id'])){
    echo "idを指定してください｡";
    exit;
}
if(!preg_match('/\A\d{1,11}+\z/u',$_GET['id'])){
    echo "idが正しくありません｡";
    exit;
}
$id = (int) $_GET['id'];

$dbh = db_open();
$sql = "SELECT id, title, isbn, price, publish, author FROM books WHERE id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$result) {
    echo "指定したデータはありません。";
    exit;
}
//var_dump($result); //確認用あとで削除

$title = h($result['title']);
$isbn = h($result['isbn']);
$price = h($result['price']);
$publish = h($result['publish']);
$author = h($result['author']);
$id = h($result['id']);

$html_form = <<<EOD
<form action='update.php' method='post' class='editform'>
    <p>
    <label for='title'>タイトル:</label>
    <input type='text' name='title' value='$title'>
    </p>
    <p>
    <label for='isbn'>ISBN:</label>
    <input type='text' name='isbn' value='$isbn'>
    </p>
    <p>
    <label for='price'>価格:</label>
    <input type='text' name='price' value='$price'>
    </p>
    <p>
    <label for='published'>出版日:</label>
    <input type='text' name='publish' value='$publish'>
    </p>
    <p>
    <label for='author'>著者:</label>
    <input type='text' name='author' value='$author'>
    </p>
    <p class='button'>
    <input type='hidden' name='id' value='$id'>
    <input type='submit' value='送信する'>
    </p>
</form>
EOD;
echo $html_form;

?>
</body>
</html>