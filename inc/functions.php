<?php
function h(string $string) :string {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
function db_open() :PDO { //タイプヒントでPDO 型を指定
    $user = "root";
    $password = "202211-77A";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // MySQL からのエラーを取得する　必須
        PDO::ATTR_EMULATE_PREPARES => false,
        //　セキュリティ的な意味　必須
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
        //　マルチクエリを不可　セキュリティ的な目的

    ];
    $dbh = new PDO('mysql:host=localhost;dbname=sample_db', $user, $password, $opt);
    return $dbh; //返り値を返す
    }
