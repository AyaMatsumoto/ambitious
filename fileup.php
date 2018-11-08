<?php 
  //ファイルの保存先
  $upload = './'.$_FILES['file_upload']['name']; 
  //アップロードが正しく完了したかチェック
  if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $upload)){
    echo 'アップロード完了';
  }else{
    echo 'アップロード失敗'; 
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
    <form action="fileup.php" enctype="multipart/form-data" method="post">
        <input name="file_upload" type="file" />
        <inpot type="submit" value="アップロード" />
    </form>
</body>
</div>

</html>