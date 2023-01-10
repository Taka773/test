<?php include 'header.php';
//カラで送られた場合に条件分岐が必要
//var_dump($_GET['pet']); // ← 実運用では使わないので消す
if( isset($_GET['pet'])){ //isset()はカラの場合false(警告を出さない)
    //foreach ($_GET[$pet] as $pet){

$str = implode("," , $_GET['pet']) ;
$str = rtrim($str , ",") ;
//rtrimは２番目のパラメータを指定しないで空白を消す使い方はしますが、
//２番目のパラメータに文字列を指定すると、指定した文字列を削除することができます。
 echo $str;
  //}
  echo 'が選ばれました｡';
}else{echo "選ばれませんでした｡";
}
//チェックしない場合に"選ばれませんでした"と出してください
//ifのあとの条件だからelse
