<?php
// ファイルを読み込む
include("funcs.php");


// 変数の定義
$title=$_POST["title"];
$author=$_POST["author"];
$URL=$_POST["URL"];
$comment=$_POST["comment"];


// var_dump($title);
// var_dump($URL);
// var_dump($comment);
// var_dump($date);
// exit();


//３．データベースに接続
$pdo=db_conn();

// // データ登録SQL
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id,title,author,URL,comment,date)VALUES(NULL,:title,:author,:URL,:comment,sysdate())");
$stmt->bindValue(':title', $title, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':author', $author, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':URL', $URL, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR_CHAR);        //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':date', $date, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

if($status==false){
    sql_error($stmt);
}else{
    redirect("main.php");
}