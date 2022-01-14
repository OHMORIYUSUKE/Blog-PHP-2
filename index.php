<?php
require_once __DIR__ . "/modules/Routing.php";

use modules\Routing;

require_once __DIR__ . '/App/Model/GetPostById.php';
require_once __DIR__ . '/App/Model/db/Connect.php';

require_once __DIR__ . '/App/View/Components/Head.php';
require_once __DIR__ . '/App/View/Components/Footer.php';
require_once __DIR__ . '/App/View/Components/HeaderAndNavbar.php';

use App\Model\GetPostById;
use App\View\Components\Head;
use App\View\Components\Footer;
use App\View\Components\HeaderAndNavbar;

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
        require_once __DIR__ . "/modules/templateEngine/Smarty.class.php";

        $smarty = new Smarty();

        $smarty->template_dir = __DIR__ . '/App/View/Templates/';
        $smarty->compile_dir  = __DIR__ . '/App/View/Templates/templates_c/';
        // $smarty->config_dir   = 'd:/smartysample/hello/configs/';
        // $smarty->cache_dir    = 'd:/smartysample/hello/cache/';

        $obj = new GetPostById($params['id']);
        $items = $obj->getPostById();
        $post = $items->fetch();

        $obj = new Head("トップページ");
        $smarty->assign('head', $obj->utf8() . $obj->title() . $obj->cdn4md() . $obj->jquery() . $obj->tweet() . $obj->css());

        $obj = new HeaderAndNavbar();
        $smarty->assign('headerAndNavbar', $obj->headerAndNavbar());

        $obj = new Footer();
        $smarty->assign('footer', $obj->footer());

        $smarty->assign('blogTitle', $post['title']);
        $smarty->assign('blogText', $post['text']);

        //
        $js = file_get_contents(__DIR__ . '/App/View/js/md2html.js');
        if ($js === false) {
            throw new \RuntimeException('file not found.');
        }
        $js = '<script>' . $js . '</script>';
        $smarty->assign('js', $js);
        //
        $css = file_get_contents(__DIR__ . '/App/View/css/main.css');
        if ($css === false) {
            throw new \RuntimeException('file not found.');
        }
        $css = '<style>' . $css . '</style>';
        $smarty->assign('css', $css);

        $smarty->display('View.tpl');
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
