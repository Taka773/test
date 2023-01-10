<?php
session_start(); //セッションを使う場合は一番先にこれを書く（セッション宣言）

$tg = fopen('tango.csv','r');
if($tg === false) {
    echo "ファイルのオープンに失敗しました。";
    exit;
}
// 1 行ずつ出力する

while($row = fgetcsv($tg)) 
{    $tango[] = $row;
}
shuffle($tango);


function random($length = 8){ //引数の初期値が8
    return substr(str_shuffle
    ('1234567890abcdefghijklmnopqrstuvwxyz'), 
    0, // 切り出し開始位置
     $length //切り出し終了位置
    );
}
$_SESSION['token'] = random(13); //17行目に8とあるが､ここで指定した13になる
//$int = rand(0,192) 
?>
<p> <?=$tango[1][0]?> を英語でいうと？</p>
<form action="tango-ans.php" method="get">
答え:<input type="text" name="kotae" autocomplete="off">
<input type="hidden" name="token"
 value="<?=$_SESSION['token'] ?>">
 
<input type="submit" value="送信">
</form>

<?php
$_SESSION['ans'] = $tango[1][1]; 
?>

