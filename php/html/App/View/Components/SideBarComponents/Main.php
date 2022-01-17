<?php

require_once __DIR__ . '/../../../Model/db/Connect.php';

require_once __DIR__ . '/PopularPosts.php';
require_once __DIR__ . '/PostsArchive.php';
require_once __DIR__ . '/PostTags.php';
require_once __DIR__ . '/RecentPosts.php';

use App\View\Components\SideBarComponents\PopularPosts;
use App\View\Components\SideBarComponents\PostsArchive;
use App\View\Components\SideBarComponents\PostTags;
use App\View\Components\SideBarComponents\RecentPosts;

//
require_once __DIR__ . "/../../../../modules/templateEngine/Smarty.class.php";

class Main{
    private object $smarty;
    public function __construct(object $smarty)
    {
        $this->smarty = $smarty;
    }
    public function main(): void{
        $obj = new PopularPosts();
        $items = $obj->popularPosts();

        $obj = new PostsArchive();
        $items = $obj->postsArchive();
        var_dump($items);

        $obj = new PostTags();
        $items = $obj->postTags();
        var_dump($items);

        $obj = new RecentPosts();
        $items = $obj->recentPosts();
        
        $this->smarty->assign('hello', 'hello');
        return;
    }
}

$smarty = new Smarty();
$obj = new Main($smarty);
$obj->main();