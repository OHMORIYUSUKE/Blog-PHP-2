<?php
require_once __DIR__ . "/modules/Routing.php";

use modules\Routing;

$obj = new Routing();
$obj->path_route(array(
    // array(リクエストメソッド, パスのパターン, 対応関数(またはメソッドなど callable なもの)), という形で設定を与えます。
    array('GET', '/page/:pageNumber', function ($params) {
?>

<?php
    }),
    // パラメータ付きのURLのルーティングの例です。
    array('GET', '/article/:id', function ($params) {
?>

    <?php
        include __DIR__ . "/App/View/View.php";
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
