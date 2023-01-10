<?php
// Your code here!
//　70P
$people[
    //　ここをカラにすると勝手に0が入る
] = ["name"=>'sato' , 'blood' => 'A'];
["name"=>'kato' , 'blood' => 'B'];
// ↑ 配列の中に配列が入ってる､ひとつ取り出したらそれは配列
// undefined array key"name" 文字列として展開出来ない
// arrayは配列のこと
// 本ではpeopleを繰り返しているが、最初の一つだけであとは；でつなげて行けばよい
print_r($people); // ←var_dumpよりこれの方が見やすい

// これだとnameのsatoしか入らない
$human = [
    'sato' ,
     'kato' ,
];

echo $people[0]['name'], "\n"
;// array to string conversion
// echoは配列を表示できない
// →　単独の値として取り出す必要がある
// →　キーを二つ書くか、ループする　→　さらに(回しながら)ループする P75?
?>