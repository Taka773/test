<?php
//var_dump($_GET['zip']) ;exit;
// textboxは空文字チェックできません
if(!empty($_GET['zip']) &&
preg_match('/^\d{3}-\d{4}$|^[0-9]{7}$/',$_GET['zip'])){;
//値が入っている場合
$url = "https://zipcloud.ibsnet.co.jp/api/search?zipcode=" . $_GET['zip'] ;
$response = file_get_contents($url);
$response = json_decode($response,true);

if( isset($response['results'])){
//var_dump($response['results']);
// echo '<pre>'; print_r($response);
inputBox( '郵便番号', $_GET['zip']);
inputBox( '都道府県' , $response['results'][0]['address1']);
inputBox(  '市町村' ,$response['results'][0]['address2']);
inputBox(  '以下の住所' ,$response['results'][0]['address3']);
}else{
  //存在しない場合 issetで書く
  echo 'そんな番号はありません';
}

}else{
//入ってない場合
echo '郵便番号をいれてください';
}



function inputBox($label , $val){
  // " と'の使い分けが重要です
  echo "<p><label>$label</label> :<input type='text' name='$label' value='$val'>" ;
}