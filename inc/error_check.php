<?php

require_once 'functions.php'; //作成した関数の読み込み
require_once 'connect.php';

if (empty($_POST['title'])) {
    // 0と (空文字は0バイトの文字列型)はtrue
    //issetと似ているが真逆ではない
    echo "タイトルは必須です。",
    exit;
}
//下記のifたちは独立したifたち
if (!preg_match('/\A[[:^cntrl:]]{1,20}\z/u', $_POST['title'])) {
    //!演算子はtrueとfalseを入れ替える(~~じゃなければ､
    //この場合は､マッチしていなければの意味)
    echo "タイトルは20文字までです。";
    exit;
}
if (!preg_match('/\A\d{0,13}\z/', $_POST['isbn'])) {
    echo "ISBNは数字13桁までです｡";
    exit;
}
if (!preg_match('/\A\d{0,6}\z/u', $_POST['price'])) {
    echo "価格は数字6桁までです｡";
    exit;
}
if (empty($_POST['publish'])) {
    echo "日付は必須です｡";
    exit;
}
$a = '2022-12-23';
if (!strtotime($_POST['publish'])) { // strtostring() 組み込み関数
    echo "日付のフォーマットが違います｡";
    exit;
}
$date = explode('-', $_POST['publish']);
if (!checkdate($date[1], $date[2], $date[0])) {
    echo "正しい日付を入力してください｡";
    exit;
}
//int(1671667200) 1970/1/1 00:00:00 を0とした秒　エポックタイム

if (!preg_match('/\A[[:^cntrl:]]{0,80}\z/u', $_POST['author'])) {
    echo "著者名は80文字以内で入力してください｡";
    exit;
}