<?php 	session_start();

  if( //　csrf対策
    isset( $_SESSION['token'] , $_POST['token']) 
    &&  $_SESSION['token'] == $_POST['token']
    // ==は等しいか判定している。＝一個の場合とは違う。
  )
 
  foreach ($_POST as $key => $value) {
    //セキュリティ対策
      $post[$key] = htmlspecialchars($value ,ENT_QUOTES);
  }


  mb_language("ja");
  mb_internal_encoding("UTF-8");
 //複数のメルアドがある場合はカンマ（,）で区切る
  $site_name = 'サイト名';
  $admin_email = 'tantaka2015@gmail.com' ;//管理者（自分のメアド
  $mailto   = "$admin_email , $post[mail]";//入力した人のメアド
  $subject = "メールタイトル";
  $header = "From: " .mb_encode_mimeheader($site_name) ."<{$admin_email}>";

  //メールを送る関数
  mb_send_mail($mailto , $subject , $post['comment'] , $header);
　//リダイレクト（勝手にこのページへ移管される
header('Location: ./thanks.html');