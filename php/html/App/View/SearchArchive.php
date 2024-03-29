<?php

namespace App\View;

use App\Model\GetPosts;
use App\Model\GetAllPosts;
use App\View\Components\Head;
use App\View\Components\Footer;
use App\View\utils\Pdo2array;
use App\View\utils\Pagenation;
use App\View\Components\HeaderAndNavbar;

use App\View\Components\SideBarComponents\Main;

use \Smarty;

class SearchArchive
{
    private string $word;
    private int $id;

    public function __construct(string $word, int $id)
    {
        $this->word = $word;
        $this->id = $id;
    }

    public function searchArchive(): void
    {
        $smarty = new Smarty();

        $smarty->template_dir = __DIR__ . '/Templates';
        $smarty->compile_dir  = __DIR__ . '/Templates/templates_c';
        // $smarty->config_dir   = 'd:/smartysample/hello/configs/';
        // $smarty->cache_dir    = 'd:/smartysample/hello/cache/';

        //side bar
        $obj = new Main($smarty);
        $obj->main();
        //
        $obj = new GetAllPosts();
        $postCount = $obj->getAllPostsCount();
        $smarty->assign('postCount', $postCount);

        //ページネーション
        $obj = new Pagenation($postCount, $this->id);
        $data = $obj->pagenation();
        $page = $data['page'];
        $maxPage = $data['maxPage'];
        $start = $data['start'];

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

        $smarty->display('SearchArchive.tpl');
        return;
    }
}
