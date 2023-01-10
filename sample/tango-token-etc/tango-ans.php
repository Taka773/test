<?php
session_start(); //セッションを使う場合は一番先にこれを書く（セッション宣言）
if($_GET['token'] == $_SESSION['token']){

// 送信された値を取得して答えと等しいか比較する
if( $_GET['kotae'] == $_SESSION['ans']){
    //3 合ってたら"あたり", 
    echo "あたり";
  }else{
    // ハズレてたら正しい答えを表示する
    echo '<p>ハズレ! 正しい答え: ' , $_SESSION['ans'] ;
    $get = htmlspecialchars($_GET['kotae'] ); // ←渡す
  }
}else{ echo 'トークンが一致しません';}

function h($get){  // ←もらう
  return htmlspecialchars( $get , ENT_QUOTES); 
}
/*
関数は　function　で定義する
名前は何でも良いがキャメルケースが一般的
引数($get)はオプション
returnもオプション
繰り返して使いやすくするため
*/