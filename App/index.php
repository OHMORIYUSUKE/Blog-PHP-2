<?php
//
include "../scripts/Routing.php";
//
path_route(array(
    // array(リクエストメソッド, パスのパターン, 対応関数(またはメソッドなど callable なもの)), という形で設定を与えます。
    array('GET', '/page/:pageNumber', function ($params) {
?>
    <?php
        include "Model/GetPosts.php";

        $obj = new GetPosts($params['pageNumber']);
        $items = $obj->getPosts();
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
        print($params['id']);
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
        include "Model/GetPostBySearchWord.php";

        $obj = new GetPostBySearchWord($params['word']);
        $items = $obj->getPostBySearchWord();
        foreach ($items as $item) : ?>
        <p><?php echo $item['id']; ?></p>
        <p><?php echo $item['title']; ?></p>
    <?php endforeach; ?>
    <?php
    }),
    array('GET', '/all', function ($params) {

        include "Model/GetAllPosts.php";

        $obj = new GetAllPost();
        $items = $obj->getAllPost();
        foreach ($items as $item) : ?>
        <p><?php echo $item['id']; ?></p>
        <p><?php echo $item['title']; ?></p>
<?php endforeach;
    }),
    // 404 の例です。
    array('*', '404', function () {
        echo 'ページが見つかりません。';
    })
));
