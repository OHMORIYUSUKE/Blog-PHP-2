<?php
namespace App\View\Components\SideBarComponents;
require_once __DIR__ . '/../../../Model/GetPostsArchive.php';

use App\Model\GetPostsArchive;
class PostsArchive
{

    public function __construct()
    {
    }

    public function postsArchive(): array
    {
        $obj = new GetPostsArchive();
        $items = $obj->getPostsArchive();
        return $items;
    }
}
