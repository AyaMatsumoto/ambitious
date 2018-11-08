<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ambious</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/style.css" class="topImg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</herd>

<script type="text/javascript">
    function matchDetail(matchId) {
        var matchId=matchId.id;
        window.open("match_detail.php?matchId="+matchId);
    }
    
</script>

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

<article>
<section class="main">
    <h2>戦歴一覧</h2>
    <table class="resultTable">
        <thead>
            <tr>
                <th name="resultSort" id="resultSort">No</th>
                <th name="resultSort" id="resultSort">年/月</th>
                <th>大会名</th>
                <th>帯色</th>
                <th>階級</th>
                <th name="resultSort" id="resultSort">結果</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
        //con.phpのDB設定情報を読み込み
        require_once "con.php"; 
        
        $db=new PDO(dsn,dbUser,dbPass);
        $sql="select matchid,date_format(matchdate,'%Y年%m月%d日') as matchdate,matchtitle,beltcolor,class,result from amb.match";
        
        //クエリ実行
        $res=$db->query($sql);
        
        //連想配列で取得
        foreach($res as $row) { 
          echo '<tr>';
          echo '<td>'.htmlspecialchars($row['matchid']).'</td>';
          echo '<td>'.htmlspecialchars($row['matchdate']).'</td>';
          echo '<td>'.htmlspecialchars($row['matchtitle']).'</td>';
          echo '<td>'.htmlspecialchars($row['beltcolor']).'</td>';
          echo '<td>'.htmlspecialchars($row['class']).'</td>';
          echo '<td>'.htmlspecialchars($row['result']).'</td>';
          //echo '<td><input class="matchDetailBtn" type="button" id='.$row['matchid'] .' onclick="matchDetail(this);" value="詳細"></td>';
          echo '<td><a href="match_detail.php?matchId='.$row['matchid'] .'">詳細</a>';
          echo '</tr>';
        
            //echo $row['matchdate']; 
        }
        ?>
        </tbody>
    </table>
</section>
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