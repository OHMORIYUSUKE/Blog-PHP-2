<?php
//
include "../scripts/Routing.php";
//
path_route(array(
    // array(リクエストメソッド, パスのパターン, 対応関数(またはメソッドなど callable なもの)), という形で設定を与えます。
    array('*', '/', function () {
?>
    <?php
        include "Model/GetAllPosts.php";

        $obj = new GetAllPost();
        $items = $obj->getAllPost();
        foreach ($items as $item) : ?>
        <p><?php echo $item['id']; ?></p>
        <p><?php echo $item['title']; ?></p>
    <?php endforeach; ?>
<?php
    }),
    // パラメータ付きのURLのルーティングの例です。
    array('GET', '/article/:id', function ($params) {
?>
    <?php
        include "Model/GetPostById.php";

        $obj = new GetPostById($params['id']);
        $items = $obj->getPostById();
        foreach ($items as $item) : ?>
        <p><?php echo $item['id']; ?></p>
        <p><?php echo $item['title']; ?></p>
    <?php endforeach; ?>
<?php
    }),
    // パラメータ付きのURLのルーティングの例です。
    array('GET', '/tag/:id', function ($params) {
        echo ("ユーザー {$params['id']} さんのページです。");
    }),
    array('GET', '/serch/:id', function ($params) {
        echo ("ユーザー {$params['id']} さんのページです。");
    }),
    //
    array('*', '/hoge', function () {
?>
    <p>;;;;</p>
<?php
    }),
    // 404 の例です。
    array('*', '404', function () {
        echo 'ページが見つかりません。';
    })
));
