<?php
//$str = "1234567";
//$rtn = preg_match('/\d{7}/u,')

$str = "〒010-0051"; //住所まで含まれるとpreg_matchがうまく反映できない?ぽい

//preg_match('/\d{7}/u',$str,$match);
preg_match('/^\d{3}-\d{4}$|^[0-9]{7}$/',$str ); // ｢\d｣は0~9の数字のこと､{}は繰り返すという意味
                                          // uは日本語が含まれている場合utf-8をつけて化けなくする


if($match){
echo "ただしいです     int(1)";
}else{
echo "ただしくありません  int(0)";
}
?>
<p>
コード内で使う場合はifで判定します</p>

<?php
// $a=null nullは未定義 カラとは違います
$a = null; //false
$a = 0;    //true
$a = "";   //true , true
$a = false;//bool値が代入されてもtrue

var_dump( isset($a)); //入っていればtrue
var_dump( empty($a)); //!で結果を反転してカラならfalse
?>
