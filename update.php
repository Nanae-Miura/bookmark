<?php

require_once('funcs.php');

// ポストで受け取ります
$title=$_POST["title"];
$author=$_POST["author"];
$URL=$_POST["URL"];
$comment=$_POST["comment"];
$id    = $_POST["id"];

// var_dump($title);
// var_dump($author);
// var_dump($URl);
// var_dump($comment);

$pdo=db_conn();

$stmt = $pdo->prepare("UPDATE 
gs_bm_table 
SET
 title=:title,  
 author=:author, 
 URL=:URL, 
 comment=:comment,
 date=sysdate()
 WHERE
 id=:id;
 ");

$stmt->bindValue(':title', h($title), PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':author', h($author), PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':URL', h($URL), PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', h($comment), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
   sql_error($stmt);
}else{
    //*** function化する！*****************
    header("Location: main.php");
    exit();
}