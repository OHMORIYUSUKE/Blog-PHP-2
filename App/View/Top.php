<?php

require_once __DIR__ . '/../../App/Model/GetPosts.php';
require_once __DIR__ . '/../../App/Model/GetAllPosts.php';
require_once __DIR__ . '/../../App/Model/db/Connect.php';

require_once __DIR__ . '/Components/Head.php';
require_once __DIR__ . '/Components/Footer.php';
require_once __DIR__ . '/Components/HeaderAndNavbar.php';

require_once __DIR__ . '/utils/Page2start.php';
require_once __DIR__ . '/utils/Pdo2array.php';
require_once __DIR__ . '/utils/PostsCount2maxPage.php';
require_once __DIR__ . '/utils/Invalid2ValidPage.php';

use App\Model\GetPosts;
use App\Model\GetAllPosts;
use App\View\Components\Head;
use App\View\Components\Footer;
use App\View\utils\Page2start;
use App\View\utils\Pdo2array;
use App\View\utils\PostsCount2maxPage;
use App\View\utils\Invalid2ValidPage;
use App\View\Components\HeaderAndNavbar;

require_once __DIR__ . "/../../modules/templateEngine/Smarty.class.php";


class Top
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function top(): void
    {
        $smarty = new Smarty();

        $smarty->template_dir = __DIR__ . '/Templates/';
        $smarty->compile_dir  = __DIR__ . '/Templates/templates_c/';
        // $smarty->config_dir   = 'd:/smartysample/hello/configs/';
        // $smarty->cache_dir    = 'd:/smartysample/hello/cache/';

        $obj = new GetAllPosts();
        $postCount = $obj->GetAllPostsCount();
        $smarty->assign('postCount', $postCount);

        $obj = new PostsCount2maxPage($postCount);
        $maxPage = $obj->postsCount2maxPage();

        //id をチェック
        $obj = new Invalid2ValidPage($this->id, $maxPage);
        $page = $obj->invalid2ValidPage();

        //page
        $obj = new Page2start($page, $postCount);
        $start = $obj->page2start();

        //ページネーション
        $smarty->assign('page', $page);
        $smarty->assign('maxPage', $maxPage);

        $obj = new GetPosts($start);
        $posts = $obj->getPosts();

        $obj = new Pdo2array($posts);
        $postArray = $obj->pdo2array();
        $smarty->assign('postArray', $postArray);

        $obj = new Head("うーたんのブログ");
        $smarty->assign('head', $obj->utf8() . $obj->title() . $obj->cdn4md() . $obj->jquery() . $obj->tweet() . $obj->css());

        $obj = new HeaderAndNavbar();
        $smarty->assign('headerAndNavbar', $obj->headerAndNavbar());

        $obj = new Footer();
        $smarty->assign('footer', $obj->footer());

        //js
        $js = file_get_contents(__DIR__ . '/js/md2html.js');
        if ($js === false) {
            throw new \RuntimeException('file not found.');
        }
        $js = '<script>' . $js . '</script>';
        $smarty->assign('js', $js);

        //css
        $css = file_get_contents(__DIR__ . '/css/main.css');
        if ($css === false) {
            throw new \RuntimeException('file not found.');
        }
        $css = '<style>' . $css . '</style>';
        $smarty->assign('css', $css);

        $smarty->display('Top.tpl');
        return;
    }
}
