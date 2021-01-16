
<!-- 全体のフロー -->
<!-- main.phpからinsert.phpで情報をデータベースに格納 -->
<!-- main.phpにリダイレクトされる -->
<!-- データ一覧のリンクを押すとselect.phpへ移動 -->
<!-- データ部分を押すとdetail.phpへ -->
<!-- detail.phpに入力したデータがupdate.phpによって処理されて、main.phpに戻る -->
<!-- 削除を押すと、delete/phpによって処理されselect.phpにリダイレクト。画面上は動かない-->

<!DOCTYPE html>
<html lang="ja">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script src="js/main.js"></script> -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Your library.com</title>
</head>
<body>
    <h1>Make your own library!</h1>
     <h3>Add book information</h3>

     <form action="insert.php" method="POST">
     <p>本のブックマーク</p>
         タイトル<input type="text" name="title"><br>
         著者<input type="text" name="author"><br>
         URL<textarea name="URL" rows="4" cols="40"></textarea><br>
         <!-- ジャンルを追加みたいなのもできたらいいな -->
         <!-- 全体的にぶさいく -->
         感想<textarea name="comment" rows="4" cols="40"></textarea><br>
         <input type="submit" value="submit">
     <form>

     <div class="a">
     <a href="select.php">データ一覧</a>
     </div>
   
</html>