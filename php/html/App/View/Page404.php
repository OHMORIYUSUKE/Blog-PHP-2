<?php

namespace App\View;

require_once __DIR__ . '/../Model/GetPostById.php';
require_once __DIR__ . '/../Model/db/Connect.php';

require_once __DIR__ . '/Components/Head.php';
require_once __DIR__ . '/Components/Footer.php';
require_once __DIR__ . '/Components/HeaderAndNavbar.php';

require_once __DIR__ . '/Components/SideBarComponents/Main.php';

use App\Model\GetPostById;
use App\View\Components\Head;
use App\View\Components\Footer;
use App\View\Components\HeaderAndNavbar;

use App\View\Components\SideBarComponents\Main;

require_once __DIR__ . "/../../modules/templateEngine/Smarty.class.php";

use \Smarty;

class Page404
{
    private string $postTitle;
    private string $postText;

    public function __construct()
    {
        $this->postTitle = '404 NotFound';
        $this->postText = "## URLが間違えています。\n<a href='/1'>Topに戻る</a>";
    }

    public function page404(): void
    {
        $smarty = new Smarty();

        $smarty->template_dir = __DIR__ . '/Templates';
        $smarty->compile_dir  = __DIR__ . '/Templates/templates_c';
        // $smarty->config_dir   = 'd:/smartysample/hello/configs/';
        // $smarty->cache_dir    = 'd:/smartysample/hello/cache/';

        //side bar
        $obj = new Main($smarty);
        $obj->main();

        $obj = new Head($this->postTitle . "｜うーたんのブログ");
        $smarty->assign('head', $obj->utf8() . $obj->title() . $obj->cdn4md() . $obj->jquery() . $obj->tweet() . $obj->css());

        $obj = new HeaderAndNavbar();
        $smarty->assign('headerAndNavbar', $obj->headerAndNavbar());

        $obj = new Footer();
        $smarty->assign('footer', $obj->footer());

        $smarty->assign('blogTitle', $this->postTitle);
        $smarty->assign('blogText', $this->postText);

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

        $smarty->display('Page404.tpl');
        return;
    }
}
