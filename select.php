<?php

// データベースの内容を表示するページ
require_once('funcs.php');
//1.  DB接続します
//  決まった型なので、必ずコピペ!!
$pdo=db_conn();

// try {
//   //ID:'root', Password: 'root' MAMPを使っている前提での初期設定
//   $pdo = new PDO('mysql:dbname=book_mark;charset=utf8;host=localhost','root','root');//DB書き換え
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="select.css">
<title>詳細表示ページ</title>
</head>
<body id="main">
<!-- Head[Start] -->

<header>
<div class=nav>
    <a class="navbar-brand" href="main.php">データ登録</a>
</div>
</header>

<h2> 登録されたデータ</h2>
<!-- Head[End] -->


<!-- Main[Start] -->
<!-- <table border="1" class="table">
    <thead>
        <tr>
            <th>id</th> <th>title</th> <th>author</th> <th>URL</th> <th>comment</th><th>date</th>
            <th>delete</th><th>update</th>
        </tr>
    </thead>
    <tbody> -->
    <?php
        $view="";
    if ($status==false) {
        sql_error($status);
    }else{
        while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
             //GETデータ送信リンク作成
            //  whileは繰り返し
            // pタグで囲み
            // 中をaで囲む
            // 詳細ページリンク
            $view .= '<p>';
            $view .= '<a href="detail.php?id=' . $result['id'] . '">';
            $view .= $result["title"] . "：" . $result["author"]. ":" . ":" . $result["URL"]. "：" .$result["comment"]. "：" .$result["date"];
            $view .= '</a>';
            // 削除ページリンク
            $view .= '<a href="delete.php?id=' . $result['id'] . '">';
            $view .= '【削除】';
            $view .= '</a>';
            $view .= '</p>';
        }
    }

            // $query = "SELECT * FROM gs_bm_table";
            // $result = $pdo->query($query);
            // foreach ($result as $row) {
            //     echo "<tr>";
            //     echo "<td>".$row['id']."</td>";
            //     echo "<td>".$row['title']."</td>";
            //     echo "<td>".$row['author']."</td>";
            //     echo "<td>".$row['URL']."</td>";
            //     echo "<td>".$row['comment']."</td>";
            //     echo "<td>".$row['date']."</td>";
            //     echo '<td><a href="delete.php?id='.$result['id'].'">';
            //     ">削除</a></td>';
            //     echo '<td><a href="update.php">更新</a></td>';
            //     echo "</tr>";
            // }
            // // $pdo = null;
            
        ?>
    </tbody>
</table>
<div>
    <!-- ここで表示させる -->
     <div class="container jumbotron">
     <a href="detail.php"></a>
     <?= $view ?></div>
</div>
<!-- Main[End] -->
</body>
