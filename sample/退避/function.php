<?php
/* 台形の面積を求める関数を作ってみましょう
  (上底 + 下底) x高さ /2
*/
$total = 0; //合計用の変数に加算代入する
//加算代入を使ってひとつずつ計算して小計を出していくという事
$j = 55; $k=12 ;  $h = 23;  //1
$total += daike( $j,$k,$h );
$j = 45; $k=62 ;  $h = 13;  //2
daike( $j,$k,$h );
$total += daike( $j,$k,$h );

//変数名が違う場合
$x = 65; $y=16 ;  $z = 26;  //3
daike( $x,$y,$z );
$total += daike( $x,$y,$z );

echo $total;

function daike( $j,$k,$h ){
            //引数は値渡し(もとの値のコピー)です｡だから変数名が変わってもトータルが出る
  return  ( $j + $k ) * $h / 2 ;
    // 画面に一つずつの答え出す場合はechoしたほうが効率いいです //returnとの違いは?
}
//では 1,2,3 それぞれの面積を合計する場合はどうでしょうか?


$total =0;
//練習  税込合計   を出してください
//単価 数量 税込
//300  1   330
$a = 300; $b = 1;
$total += zeikomi($a,$b);
//500  2  1100
$a = 500; $b = 2;
$total += zeikomi($a,$b);
//400  5  2200 
$a = 400; $b = 5;
$total += zeikomi($a,$b);

$money = $total;
echo '<p>税込み合計は &yen;',number_format($money); //←桁区切りで
$total;

function zeikomi( $a,$b ){
    return  $a * $b * 1.1 ;
}
?>



<p>
//関数は計算目的のみではありません<br>
$lt;input type="text" name="name"> ←nameだけが毎回違う

<p> この関数を直して123Pのサンプルを書いてみましょう
<?php 
 function inputBox($name){
  echo "<p><label>$name</label> :<input type='text' name='$name'>" ;
 }
?>
 <form action="" method="POST">
    <input type="text" name="address">
    <input type="text" name="telephon">
<input type="submit" value="送信する"></p>
 </form>
<?php
