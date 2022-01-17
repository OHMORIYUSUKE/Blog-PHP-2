<?php

namespace App\View\Components\SideBarComponents;

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

class Main
{
    private \Smarty $smarty;
    public function __construct(\Smarty $smarty)
    {
        $this->smarty = $smarty;
    }
    public function main(): void
    {
        $obj = new PopularPosts();
        $items = $obj->popularPosts();
        $this->smarty->assign('popularPosts', $items);

        $obj = new PostsArchive();
        $items = $obj->postsArchive();
        $this->smarty->assign('postsArchive', $items);

        $obj = new PostTags();
        $items = $obj->postTags();
        $this->smarty->assign('postTags', $items);

        $obj = new RecentPosts();
        $items = $obj->recentPosts();
        $this->smarty->assign('recentPosts', $items);
        return;
    }
}
