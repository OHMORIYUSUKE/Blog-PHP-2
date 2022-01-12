<?php
class connect
{
    //定数の宣言
    const DB_NAME = 'blog';
    const HOST = '127.0.0.1';
    const UTF = 'utf8';
    const USER = 'root';
    const PASS = '';
    //データベースに接続する関数
    public function pdo(): PDO
    {
        /*phpのバージョンが5.3.6よりも古い場合はcharset=".self::UTFが必要無くなり、array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.SELF::UTF')が必要になり、5.3.6以上の場合は必要ないがcharset=".self::UTFは必要になる。*/
        $dsn = "mysql:dbname=" . self::DB_NAME . ";host=" . self::HOST . ";charset=" . self::UTF;
        $user = self::USER;
        $pass = self::PASS;
        try {
            $pdo = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . SELF::UTF));
        } catch (Exception $e) {
            echo 'error' . $e->getMesseage;
            die();
        }
        //エラーを表示してくれる。
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $pdo;
    }
    public function SQL(string $sql, array $param = null): PDOStatement
    {
        $obj = $this->pdo();
        $stmt = $obj->prepare($sql);

        if ($param == null) {
            $stmt = $this->doNoneParamSQL($stmt);
            return $stmt;
        }
        $stmt = $this->doInParamSQL($stmt, $param);
        return $stmt;
    }

    private function doInParamSQL(PDOStatement $stmt, array $param): PDOStatement
    {
        for ($i = 0; $i < count($param); $i++) {
            $stmt->bindValue($param[$i][0], $param[$i][1], $param[$i][2]);
        }
        $stmt->execute();
        return $stmt;
    }
    private function doNoneParamSQL(PDOStatement $stmt): PDOStatement
    {
        $stmt->execute();
        return $stmt;
    }
}
