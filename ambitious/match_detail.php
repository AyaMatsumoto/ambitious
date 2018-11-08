<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ambious</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/style.css" class="topImg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</herd>

<div class="bgclean">  
<body>
<div class="bodyIn">
<header>
    <a href="index.php" class="title">aya matsumoto</a>
    <br>
    <div class="snsLink">
     <a href="https://twitter.com/aya_bjj?ref_src=twsrc%5Etfw"><img src="../img/twitter.png" alt="twitter"></a><br>
     <a href="https://www.facebook.com/profile.php?id=100003629887249"><img src="../img/facebook.png" alt="facebook"></a>
    </div>
    <nav>
        <ul>
            <li><a class="navLink" href="index.php"><img class="navLinkImg" src="../img/home.png">&nbsp;HOME</a></li>
            <li><a class="navLink" href="profile.php"><img class="navLinkImg" src="../img/profile.png">&nbsp;PROFILE</a></li>
            <li><a class="navLink" href="profile.php"><img class="navLinkImg" src="../img/blog.png">&nbsp;BLOG</a></li>
            <li><a class="navLink" href="match.php"><img class="navLinkImg" src="../img/match.png">&nbsp;MATCH</a></li> 
        <ul>
    </nav>
</header>

<article>
<section class="main">
    <h2>試合詳細</h2>
    <h2>大会名</h2>
    <table class="resultTable">

        <?php
        //con.phpのDB設定情報を読み込み
        require_once "con.php"; 
        $selectMatchId=$_GET["matchId"];

        $db=new PDO(dsn,dbUser,dbPass);
        $sql="select match_number,opponent,score,result from amb.match_detail where matchid='".$selectMatchId."'";
        $sql1="select matchtitle from amb.match where matchid='".$selectMatchId."'";

        //クエリ実行
        $res=$db->query($sql);
        $res1=$db->query($sql);
        $count=$res->rowCount();
        
        $result = $res1->fetch();
        echo $result['matchtitle'].PHP_EOL;

        
        //echo '<h2></h2>'
        
        if (empty($count)) {
            exit;
        }
        
        echo '<thead>';
        echo '<tr>';
        echo '<th>No</th>';
        echo '<th>対戦相手</th>';
        echo '<th>得点</th>';
        echo '<th>結果</th>';
        echo '<th>動画</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        //連想配列で取得
        foreach($res as $row) { 
          echo '<tr>';
          echo '<td>'.htmlspecialchars($row['matchid']).'</td>';
          echo '<td>'.htmlspecialchars($row['opponent']).'</td>';
          echo '<td>'.htmlspecialchars($row['score']).'</td>';
          echo '<td>'.htmlspecialchars($row['result']).'</td>';
          echo '<td><input class="matchDetailBtn" type="button" onclick="alert(selectMatch)" value="動画"></td>';
          echo '</tr>';
        
        }
        ?>
        </tbody>
    </table>

<a href="match.php">←戻る</a>
</article>

<!--
<aside>
   <a class="twitter-timeline" width="100%" height="500px" href="https://twitter.com/aya_bjj?ref_src=twsrc%5Etfw">Tweets by aya_bjj</a>
   <script async src="https://platform.twitter.com/widgets.js" charset="utf8"></script>
</aside>
-->

<footer>
    <p>(c) Aya Matsumoto</p>
</footer>
    <script type="text/javascript" src="../js/script.js"></script>
</div>
</body>
</div>
</html>