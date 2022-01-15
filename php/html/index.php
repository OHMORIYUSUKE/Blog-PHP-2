<?php
require_once __DIR__ . "/modules/Routing.php";
require_once __DIR__ . '/App/View/View.php';
require_once __DIR__ . '/App/View/Top.php';

use modules\Routing;


$obj = new Routing();
$obj->path_route(array(
    array('GET', '/', function ($params) {
?>
    <?php 
    // http://example.com/0 にリダイレクト
    $url = 'http://' . $_SERVER["HTTP_HOST"] . '/1';
    echo <<<END
        <script language="javascript" type="text/javascript">
        window.location = '{$url}';
        </script>
    END;
    ?>
<?php
    }),
    // array(リクエストメソッド, パスのパターン, 対応関数(またはメソッドなど callable なもの)), という形で設定を与えます。
    array('GET', '/:id', function ($params) {
?>
    <?php
        $con = new Top($params['id']);
        $con->top();
    ?>
<?php
    }),
    // パラメータ付きのURLのルーティングの例です。
    array('GET', '/article/:id', function ($params) {
?>

    <?php
        $con = new View($params['id']);
        $con->view();
    ?>

<?php
    }),
    // パラメータ付きのURLのルーティングの例です。
    array('GET', '/tag/:id', function ($params) {
        echo ("ユーザー {$params['id']} さんのページです。");
    }),
    array('GET', '/serch/:word', function ($params) {
?>

    <?php
    }),
    array('GET', '/all', function ($params) {
    }),
    // 404 の例です。
    array('*', '404', function () {
        echo 'ページが見つかりません。';
    })
));
