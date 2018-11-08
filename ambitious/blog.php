<?php
//con.phpのDB設定情報を読み込み
require_once "con.php"; 

$db=new PDO(dsn,dbUser,dbPass);
//記事取得
$sql="select * from post order by no desc";
//クエリ実行
$st=$db->query($sql);

$posts=$st->fetchAll();
//コメント取得
$sql="select * from postcomment where postNo=";

for ($i=0; $i<count($posts); $i++) {
    $st=$db->query($sql . "{$posts[$i]['no']}");
    $posts[$i]['comments'] = $st->fetchAll();
}   

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ambious</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/style.css" class="topImg">
</herd>

<div class="bgclean">  
<body>
<div class="bodyIn">
<script src="script.js"></script>
<header>
    <div class="headTitle">
    <a href="index.php" class="title">aya matsumoto</a>
    </div>
    
    <div class="snsLink">
     <a href="https://twitter.com/aya_bjj?ref_src=twsrc%5Etfw"><img src="../img/twitter.png" alt="twitter"></a><br>
     <a href="https://www.facebook.com/profile.php?id=100003629887249"><img src="../img/facebook.png" alt="facebook"></a>
    </div>
    
    <nav>
        <ul>
            <li><a class="navLink" href="index.php"><img class="navLinkImg" src="../img/home.png">&nbsp;HOME</a></li>
            <li><a class="navLink" href="profile.php"><img class="navLinkImg" src="../img/profile.png">&nbsp;PROFILE</a></li>
            <li><a class="navLink" href="blog.php"><img class="navLinkImg" src="../img/blog.png">&nbsp;BLOG</a></li>
            <li><a class="navLink" href="match.php"><img class="navLinkImg" src="../img/match.png">&nbsp;MATCH</a></li> 
        <ul>
    </nav>
</header>

<aside>
</aside>

<article>
<section class="main">
    <div class="blog">
        <h1>❤あやちゃんのブログ❤</h1>
        <input class="newPost" type="button" onclick="window.open('post.php')" value="新規投稿">
        <div class="blogMain">
        <?php  foreach ($posts as $post) { ?>
            <!--タイトル-->
            <div class="blogHeder">
                <h2 class="blogTitle"><?php echo $post['title'] ?></h2>
            <!--投稿日-->
                <p class="commentLink">
                <?php $date=$post['createtime'];
                echo date('Y/m/d m:s', strtotime($date));?>
            </div>
            </p>
            <p><?php echo nl2br($post['content']) ?></p>
            <?php foreach ($post['comments'] as $comment) { ?>
        </div>
        <div class="comment">
            <h3 class="commentName"><?php echo $comment['name'] ?></h3>
            <p><?php echo nl2br($comment['content']) ?></p>
               <?php } ?>
            <a href="#">コメント</a>
            <a href="#">編集</a>
        <?php } ?>
        </div>
    </div>

</section>
</article>

<footer class="footer">
    <p class="copyRight">(c) Aya Matsumoto</p>
</footer>
</div>
</body>
</div>
</html>