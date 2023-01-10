<?php //fget_casv1
//データを読み込む 前にファイルの存在を確認
//file_existsはファイルがない場合 false を返す
//｢bookdata.csv｣の部分を存在しないファイルに書き換えるとエラーになる

/* P105
ループの処理
for      回数が予め決まっている場合
foreach  配列､オブジェクトを回す場合
while    取り出してみないと終わる条件がわからない場合とかに便利
*/

//$filename = 'bookdata.csv' ;
//if(
     //file_exists('$filename')){
$fp = fopen('bookdata.csv','r');
if($fp === false) {
//}else{
 echo "ファイルのオープンに失敗しました。";
 exit;
} //exit; デバック用 ここで中断するので<footer></body></html>とかも読み込まれなくなる｡ 

$row = fgetcsv($fp);
var_dump($row);