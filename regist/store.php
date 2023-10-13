<?php
// セッションスタート
session_start();
session_regenerate_id(true);

//セッションからデータ取得
$regist = $_SESSION['regist'];

//TODO: データチェック
//TODO: データベースに保存

// セッション削除
unset($_SESSION['regist']);

//結果画面にリダイレクト
header('Location: result.php');
