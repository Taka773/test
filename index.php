
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1>書籍データベース</h1></header>  

<?php require_once __DIR__ . '/login_check.php'; ?>
<?php
require_once __DIR__ . '/inc/functions.php';
include __DIR__ . '/inc/header.php';
require_once 'connect.php';
try {
$dbh = db_open();
    $sql = 'SELECT * FROM books'; //booksから全データ取得
    $statement = $dbh->query($sql); //←ここでSQL文を実行
    // 表構造データが戻ってくる 配列ではない
    ?>
<table>
<tr><th>更新</th><th>書籍名</th><th>ISBN</th><th>価格</th><th>出版日</th><th>著者名</th></tr>
<?php while ($row = $statement->fetch()):
        // fetch(フェッチ)関数が配列に変換する 
        ?>
        <tr>
        <td><a href="edit.php?id=<?php echo (int) $row['id']; ?>">更新</a></td>

        <a href="edit.php?id=<?php echo (int) $row['id']; ?>">
        <td><?php echo h($row['title']) ?></td>
        <td><?php echo h($row['isbn']) ?></td>
        <td><?php echo h($row['price']) ?></td>
        <td><?php echo h($row['publish']) ?></td>
        <td><?php echo h($row['author']) ?></td>
        </tr>
        <?php endwhile; ?>
</table>
<?php
}catch (PDOException $e) {
    echo " エラー!: " . h($e->getMessage());
    exit;
}
    //var_dump($dbh);
?>
<?php include __DIR__ . '/inc/footer.php';
