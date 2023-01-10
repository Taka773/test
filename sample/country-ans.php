<?php  require_once 'array.php' ?>

<?php


// $answers=[0,2,2,1,2,0];
//var_dump(array_diff( $_GET , $answers));

//戻り値の数を数えて16.66を掛けて100から引けば点数がでます
$hazuresu = array_diff( $_GET , $answers);
$total = 100-count($hazuresu) * 16.66;
echo "<p>あなたの点数はざっと",$total,"です</p>" ;

$total = 0;
foreach ( $answers as  $k => $city) {
    //一回目は      カナダ↑    ↑オタワ
   
    /*if( isset($_GET[$k]))
   二重分岐の場合､大体は && か || で続けて書く事ができる
   条件は先に書いた方から評価され&&の場合はfalse以降は評価しない*/

    if( isset($_GET[$k]) && $_GET["$k"] == $city ){
    //                       ↑ユーザーの送信値 ↑正解の都市名
        $total += 16.66 ;
        //正解した時のみ加算代入する
    }
}
$total = ceil($total);
echo "あなたの得点は $total 点です｡" ;
//変数は""の中で使えるけど､関数は使えない
//echo "あなたの得点は",ceil($total),"点です｡";
// ↑のようにカンマで区切ることもできる