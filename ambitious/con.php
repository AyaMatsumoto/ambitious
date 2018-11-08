<?php
    //DB接続情報設定
    
    // 設定内容を変数に格納
    $host='localhost';
    $dbName='amb';
    $charset='utf8';
    $dbUser='ambiti0us';
    $dbPass='';

	// 定数を設定
	define('dsn', "mysql:host=$host;dbname=$dbName;charset=$charset");
	define('dbUser', $dbUser);
	define('dbPass', $dbPass);
	
	$db=new PDO(dsn,dbUser,dbPass);
    
    /*
    if (!$db) {
        die("接続失敗");
    }else {
        echo ("接続成功");
    }
    */
    
?>