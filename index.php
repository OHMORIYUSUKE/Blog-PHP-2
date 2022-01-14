<?php
//
namespace App\View;
use App\View\View;
include __DIR__ . "/modules/Routing.php";
//
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
        $obj = new View($params['id']);
$post = $obj->view();
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
