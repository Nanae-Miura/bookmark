<?php
// ini_set( 'display_errors', 1 );
// ini_set( 'error_reporting', E_ALL );

// 取得したidの詳細を表示するページ
// 更新処理
require_once('funcs.php');

$pdo = db_conn();
// idを取得
$id=$_GET['id'];
// var_dump($_GET);

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id = " . $id . ';');
$status = $stmt->execute();


//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    // while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // fetchしてきた内容が$row
    
    // }
    $row=$stmt->fetch();
}


?>
<!DOCTYPE html>
<html lang="ja">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Your library.com</title>
</head>
<body>

     <h3>Edit book information</h3>

     <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>詳細ページ</legend>
                <label>タイトル：<input type="text" name="title" value="<?= $row['title'] ?>"></label><br>
                <label>著者：<input type="text" name="author" value="<?= $row['author'] ?>"></label><br>
                <label>URL： <textarea name="comment" rows="4" cols="40"> value="<?= $row['URL'] ?>"</textarea></label><br>
                <label>感想<textArea name="comment" rows="4" cols="40"><?= $row['comment'] ?></textArea></label><br>
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</html>