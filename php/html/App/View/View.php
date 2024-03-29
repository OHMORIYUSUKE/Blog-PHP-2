<?php

namespace App\View;

use App\Model\GetPostById;
use App\View\Components\Head;
use App\View\Components\Footer;
use App\View\Components\HeaderAndNavbar;

use App\View\Components\SideBarComponents\Main;

require_once __DIR__ . "/../../modules/templateEngine/Smarty.class.php";

use \Smarty;

class View
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function view(): void
    {
        $smarty = new Smarty();

        $smarty->template_dir = __DIR__ . '/Templates';
        $smarty->compile_dir  = __DIR__ . '/Templates/templates_c';
        // $smarty->config_dir   = 'd:/smartysample/hello/configs/';
        // $smarty->cache_dir    = 'd:/smartysample/hello/cache/';

        //side bar
        $obj = new Main($smarty);
        $obj->main();

        $obj = new GetPostById($this->id);
        $items = $obj->getPostById();
        $post = $items->fetch();

        if ($post === false) {
            $postTitle = "記事がありません";
            $postText = <<<END
                その投稿は削除されたか、URLが間違えています。
                ∧＿∧
                (´･ω･) みなさん、お茶が入りましたよ・・・。
                ( つ旦O
                と＿)＿) 旦旦旦旦旦旦旦旦旦旦旦旦旦旦旦旦旦旦旦旦
            END;
        } else {
            $postTitle = $post['title'];
            $postText = $post['text'];
        }

        $obj = new Head($postTitle . "｜うーたんのブログ");
        $smarty->assign('head', $obj->utf8() . $obj->title() . $obj->cdn4md() . $obj->jquery() . $obj->tweet() . $obj->css());

        $obj = new HeaderAndNavbar();
        $smarty->assign('headerAndNavbar', $obj->headerAndNavbar());

        $obj = new Footer();
        $smarty->assign('footer', $obj->footer());

        $smarty->assign('blogTitle', $postTitle);
        $smarty->assign('blogText', $postText);

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

        $smarty->display('View.tpl');
        return;
    }
}
