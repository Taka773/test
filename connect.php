<?php
// このファイルは､書き換え(PWの変更など)が起きた際に修正が面倒なので読み込むファイルとして使うべき
// header.phpのような使い方

// 想定しないエラーが起こりそうなコードを囲むと意図的な終了ができるようになる
// try文も分岐する制御文です
try {
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
    //var_dump($dbh);
    // 何事もなければここで終わる
} catch (PDOException $e) {
    // キャッチしたエラーがあればここに来る
    echo "エラー!:" . $e->getMessage() . "<br>";
    //echo "エラー!:  . <br>"; 本番では←のように書いてエラー内容を表示させない
    exit;
}
