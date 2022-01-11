<?php
//
include "scripts/Routing.php";
include "Model/class.php";
//
path_route(array(
    // array(リクエストメソッド, パスのパターン, 対応関数(またはメソッドなど callable なもの)), という形で設定を与えます。
    array('*', '/', function () {
        echo ('シンプルなルーティングのテストです。');
    }),
    // パラメータ付きのURLのルーティングの例です。
    array('GET', '/article/:id', function ($params) {
        echo ("ユーザー {$params['id']} さんのページです。");
    }),
    // パラメータ付きのURLのルーティングの例です。
    array('GET', '/tag/:id', function ($params) {
        echo ("ユーザー {$params['id']} さんのページです。");
    }),
    array('GET', '/serch/:id', function ($params) {
        PrintFunc(new User("山田", $params, "abc@abcdef.co.jp", "12-3456-7890"));
    }),
    // 404 の例です。
    array('*', '404', function () {
        echo 'ページが見つかりません。';
    })
));
