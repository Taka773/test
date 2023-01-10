<?php
//1⃣送信された身長と体重を浮動小数点に変換
$height = (float) $_POST['height'];
$weight = (float) $_POST['weight'];
//2⃣入力された値が正しい範囲か確認
if (!((0 < $height ) && ($height < 3))){
  echo "身長を正しく入力してください";
  exit;
}
if(( $weight < 30) || ( 200 < $weight))
{echo '身長を正しく入力してください';
  exit;}
//3⃣必要な計算を実行
//適正体重の算出
$goal_weight =  $height * $height * 22;
//適正体重との差
$difference = abs($goal_weight - $weight);
//4⃣結果の表示を実行
  echo '体重' . $weight .  'kg<br>' ;
 echo '理想' . $gole_weight . 'kg<br>' ;
  echo '後' . $difference . 'kgで適正体重です｡<br>';

