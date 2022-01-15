<?php
try {
    $db = new PDO('mysql:dbname=blog;host=mysql;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    print('データベース接続エラー:' . $e->getMessage());
}
//sql
$sql = file_get_contents(__DIR__ . '/article.sql');
if ($css === false) {
    throw new \RuntimeException('file not found.');
}

$db->query($sql);
