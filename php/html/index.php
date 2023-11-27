<?php
require_once __DIR__ . "/modules/Routing.php";
require_once __DIR__ . '/App/View/View.php';
require_once __DIR__ . '/App/View/Top.php';
require_once __DIR__ . '/App/View/Page404.php';
require_once __DIR__ . '/App/View/SearchTag.php';
require_once __DIR__ . '/App/View/SearchArchive.php';

require_once __DIR__ . '/App/Model/GetPosts.php';
require_once __DIR__ . '/App/Model/GetAllPosts.php';
require_once __DIR__ . '/App/Model/GetPostBySearchTag.php';
require_once __DIR__ . '/App/Model/GetPostById.php';

require_once __DIR__ . '/App/View/utils/Pdo2array.php';
require_once __DIR__ . '/App/View/utils/Pagenation.php';
require_once __DIR__ . '/App/View/Components/Head.php';
require_once __DIR__ . '/App/View/Components/Footer.php';
require_once __DIR__ . '/App/View/Components/HeaderAndNavbar.php';
require_once __DIR__ . '/App/View/Components/SideBarComponents/Main.php';

require_once __DIR__ . "/modules/templateEngine/Smarty.class.php";

use modules\Routing;

use App\View\Top;
use App\View\View;
use App\View\SearchTag;
use App\View\SearchArchive;
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
    array('GET', '/tag/:tag/:id', function ($params) {
        $con = new SearchTag($params['tag'], $params['id']);
        $con->searchTag();
    }),
    array('GET', '/archive/:date/:id', function ($params) {
        $con = new SearchArchive($params['date'], $params['id']);
        $con->searchArchive();
    }),
    // 404 の例です。
    array('*', '404', function () {
        $con = new Page404();
        $con->page404();
    })
));
