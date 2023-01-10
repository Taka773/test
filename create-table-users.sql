-- Leson6/01/create-table-users.sql
-- usersテーブルを新規作成します 
-- 
--create table users テーブル作りますよ
--.nullは必須の意味
-- `password` varchar(255),
--``は、予約文字になってるpasswordを文字列にしたい

create table users (
  `id` int NOT NULL auto_increment ,
  `username` varchar(255) ,
  `password` varchar(255),
  primary key(id)
);