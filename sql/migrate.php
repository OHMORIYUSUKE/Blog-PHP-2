<?php
$DB_NAME = "blog";
$HOST = "mysql";
$UTF = "utf8";
$USER = "root";
$PASS = "root";

try {
    $db = new PDO('mysql:dbname=' . $DB_NAME . ';host=' . $HOST . ';charset=' . $UTF, $USER, $PASS);
} catch (PDOException $e) {
    print('データベース接続エラー:' . $e->getMessage());
}
//sql
$sql = file_get_contents(__DIR__ . '/article.sql');
if ($sql === false) {
    throw new \RuntimeException('file not found.');
}

try {
    $db->query($sql);
} catch (PDOException $e) {
    print('SQL実行エラー:' . $e->getMessage());
}
