
ウォータースライダーに乗れる条件
身長 120cm以上 か 年齢 11才以上のどちらかを満たす
父兄同伴なら上記の条件は評価しなくても良い

//+*()を必要な場所に足してください


a父兄 + b120cm以上 + c11才以上

1(同伴)+1(cm以上)+0(才未満) →乗れる
すべて論理和です
(a or b or c  = 父兄同伴 or 120cm以上 or 11才以上
全ていずれか｡ だから)

0(なし)+0(cm未満)+0(才未満) →乗れない
※どれかが1なら乗れる(このケースは)

<?php
// インクリメント 足すi 
$i = 0 ; // 初期化 値を入れて使える状態にする
         // 加算代入演算子には初期化が必要
$i++ ; // $i(左辺) = $i + 1(右辺)←こっちが先｡ここの定義がないとエラー
$i = 10 // ここにあっても､数字が色々でも初期化
?>

<?php
// インクリメント 足すi (追記)
$i = 10 ; // 初期化 値を入れて使える状態にする
         // 加算代入演算子には初期化が必要
//$i++ ; // $i(左辺) = $i + 1(右辺)←こっちが先｡ここの定義がないとエラー
//++$i ;
//echo ++$i ; //この行で演算の結果が代入される
echo $i++; //この行で演算されるが次で結果が代入される
?>