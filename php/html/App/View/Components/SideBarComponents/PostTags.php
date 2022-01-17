<?php
namespace App\View\Components\SideBarComponents;
require_once __DIR__ . '/../../../Model/GetPostTags.php';

use App\Model\GetPostTags;
class PostTags
{

    public function __construct()
    {
    }

    public function postTags(): array
    {
        $obj = new GetPostTags();
        $tags = $obj->getPostTags();
        return $tags;
    }
}
