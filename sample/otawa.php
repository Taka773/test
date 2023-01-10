<?php
$url = 'https://www.pazru.net/js/form/sample4.html';
$ct =file_get_contents($url);
$ct =strip_tags($ct);
// $ct = htmlspecialchars($ct);  //タグとして認識させない
echo "<pre>",$ct;
//echo file_get_contents('https://www.pazru.net/js/form/sample4.html');