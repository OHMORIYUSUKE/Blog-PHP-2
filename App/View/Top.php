<?php

require_once __DIR__ . '/../../App/Model/GetPosts.php';
require_once __DIR__ . '/../../App/Model/db/Connect.php';

require_once __DIR__ . '/Components/Head.php';
require_once __DIR__ . '/Components/Footer.php';
require_once __DIR__ . '/Components/HeaderAndNavbar.php';

use App\Model\GetPosts;
use App\View\Components\Head;
use App\View\Components\Footer;
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

        $obj = new GetPosts($this->id);
        $posts = $obj->getPosts();

        $postArray = [];
        foreach ($posts as $post) {
            array_push($postArray, $post);
        }
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
