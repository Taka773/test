<?php require_once 'array.php' ?>
<form action="country-ans.php">

<?php


//echo $countory['オーストラリア'][2];
/* 練習 都市をラジオボタンで出してみましょう
radioボタンはlabelで囲ったほうが良い<BR>だと選択範囲が狭い
(ラジオボタン直にクリックしないとチェックされない)
foreache as $key => $key はオプション
配列のキーが入る(使わなければ書かなくて良い*/


foreach ($country as  $key => $citis) {
    echo "<h4>$key</h4>"; //国が出る //親ループ
    shuffle($citis); // 上で国を取り出して?から??シャッフル???
    foreach ($citis as $city) { //子ループ → また親ループへ
         ?>

<label><input type="radio" name="<?=$key?>" required value="<?=$city?>">
<!-- 属性 required は =や""が不要です(値がtrueかfolseのどちらかなので) -->
<?=$city?></label>

<?php }

} ?>

  <p><input type="submit" value="送信"></p></form>

<style>
    label{display: block;} /*改行される*/
    h4{margin-bottom: .5rem;}
    [type="radio"]{zoom:125%}
    /*↑属性セレクタ この場合はtayo"radio"にだけあたる*/
        </style>