<?php
require_once __DIR__ . "/modules/Routing.php";
require_once __DIR__ . '/App/View/View.php';
require_once __DIR__ . '/App/View/Top.php';
require_once __DIR__ . '/App/View/Page404.php';

use modules\Routing;

use App\View\Top;
use App\View\View;
use App\View\SearchWord;
use App\View\SearchTag;
use App\View\Page404;

$obj = new Routing();
$obj->path_route(array(
    array('GET', '/', function ($params) { 
    // http://example.com/0 にリダイレクト
    $url = 'http://' . $_SERVER["HTTP_HOST"] . '/1';
    echo <<<END
        <script language="javascript" type="text/javascript">
        window.location = '{$url}';
        </script>
    END;
    }),
    // array(リクエストメソッド, パスのパターン, 対応関数(またはメソッドなど callable なもの)), という形で設定を与えます。
    array('GET', '/:id', function ($params) {
        $con = new Top($params['id']);
        $con->top();
    }),
    // パラメータ付きのURLのルーティングの例です。
    array('GET', '/article/:id', function ($params) {
        $con = new View($params['id']);
        $con->view();
    }),
    array('GET', '/serch/:word', function ($params) {
        print('tag/'.$params['word']);
    }),
    array('GET', '/archive/:date', function ($params) {
        print('archive/'.$params['date']);
    }),
    array('GET', '/tag/:tag', function ($params) {
        print('tag/'.$params['tag']);
    }),
    // 404 の例です。
    array('*', '404', function () {
        $con = new Page404();
        $con->page404();
    })
));
