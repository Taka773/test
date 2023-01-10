<?php
// Your code here!
//三項演算子の練習 ifを一行でかける
$a = 'a'; //何かしらの値を代入している変数のaを作っておく
if($a == 'a'){
    echo "等しいです";
}else{
    echo "等しくないです";
}
    // 1 条件式  2 trueの場合   3 falseの場合 で三項 //三項だから3つ書く
echo $a == 'a' ? "等しいです" : "等しくないです";

?>



<?php
// Your code here!
//参考演算子の練習 ifを一行でかける
$a = 'a'; //何かしらの値を代入している変数のaを作っておく

    // 1 条件式  2 trueの場合   3 falseの場合 で三項 //三項だから3つ書く
echo isset($a) && $a == 'a' ? "等しいです" : "等しくないです";

//null合体演算
//式の結果がnullの場合は右辺､そうでない場合は左辺を返す演算子
echo $a = "等しいです" ?? '' ;
echo $a ?? '' ;  //上と同じ結果がでます

if( $a ) echo $a; // ()内の$aはtrueと判定される PHP言語の仕様
//値があるかないかだけ知りたい場合は上で良い
//代入されている関数がなければ undefinedエラーになる
?>


<?php
// Your code here!

$title = '何かの本'; //$titleがnullならvalueはカラになる
//$title に値があればupdate､なければaddが出力されます
?>
<form action="<?=$title ? 'update' : 'add' ?>.php" method='post'>
<input type='text' name='title' value="<?=$title ?? '' ?>"