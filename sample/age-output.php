<?php require 'header.php';

$min_age =12 ; //乗れないの境界
$max_age =100 ; //乗れる乗れないの境界

//乗れない条件を省いていき、残ったのが”乗れる”にする場合
if ($_POST['age'] < $min_age) {
   echo '乗れない';
}elseif($_POST['age'] >= $max_age)
{
   echo '乗れない';}
else{
   echo '乗れる';
}
//P52 if elseif else で1セット｡
//上から判定されて､trueになったら処理をぬけるので､どれか一つの結果しかでません


 //乗れる条件の場合はこう書きます
if ($_POST['age'] >= $min_age
 && $_POST['age'] < $max_age)
 {echo '乗れる';}else{echo '乗れない';}
//それぞれに1回書くだけで良い

