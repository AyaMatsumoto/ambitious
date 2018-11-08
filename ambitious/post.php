<?php

$err=$title=$content="";
if (@$_POST['submit']) {
    $title=@$_POST['title'];
    $content=@$_POST['content'];
    
    if (!$title) $err .='タイトルがありません。<br>';
    if (mb_strlen($title)>80) $err .='タイトルは80文字以下にしてください。<br>';
    if (!$content) $err .='本文がありません。<br>';
    
    if (!$err) {
        //con.phpのDB設定情報を読み込み
        require_once "con.php"; 
        $db=new PDO(dsn,dbUser,dbPass);
        //記事格納クエリ
        $sql="insert into post(title,content,createuser) values('$title','$content','aya.matsumoto')";
        $st=$db->query($sql);
        require 'blog.php';
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>記事投稿</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
</herd>

<div class="bgclean">  
<body>
<div class="bodyIn">
    <div class="post">
        <form method="post" action="post.php">
        <h2>記事投稿</h2>
        <p>題名</p>
        <p><input type="text" name="title" size="40" value="<?php echo $title ?>"></p>
        <p>本文</p>
        <p><textarea name="content" rows="8" cols="40"><?php echo $content ?></textarea></p>
        <p><input type="submit" name="submit" value="投稿"></p>  
        <p><?php echo $err ?></p>
    </div>
</body>
</html>