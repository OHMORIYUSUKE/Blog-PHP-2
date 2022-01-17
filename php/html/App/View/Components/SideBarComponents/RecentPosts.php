<?php
namespace App\View\Components\SideBarComponents;
require_once __DIR__ . '/../../../Model/GetRecentPosts.php';
require_once __DIR__ . '/../../utils/Pdo2array.php';

use App\Model\GetRecentPosts;
use App\View\utils\Pdo2array;
class RecentPosts
{

    public function __construct()
    {
    }

    public function recentPosts(): array
    {
        $obj = new GetRecentPosts();
        $items = $obj->getRecentPosts();
        $obj = new Pdo2array($items);
        $postArray = $obj->pdo2array();
        return $postArray;
    }
}
