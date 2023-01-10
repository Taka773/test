<?php include 'header.php';
 $pets = ["イヌ" ,"ネコ" ,"ウサギ" ,"熱帯魚","ハムスター","リス"];
// $count = count($pet);
 //var_dump($count); 
?>

<form action="lesson-25-inuout.php" method="get" >
  <p>ペットにしたい動物は？（複数可）</p>
<!-- 64P の foreach に書き直してください 
  as で 右辺の変数に代入しながら
  配列を回しきって自動的に終了します
-->
<?php foreach( $pets as $pet ) { ?>

    <input name="pet[]" type="checkbox" value="<?=$pet?>">  <?=$pet?>

<?php  } ?>
  
  <input type="submit" value="送信">
</form>