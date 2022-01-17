<?php
namespace App\View\Components\SideBarComponents;
require_once __DIR__ . '/../../../Model/GetPopularPosts.php';
require_once __DIR__ . '/../../utils/Pdo2array.php';

use App\Model\GetPopularPosts;
use App\View\utils\Pdo2array;

class PopularPosts
{

    public function __construct()
    {
    }

    public function popularPosts(): array
    {
        $obj = new GetPopularPosts();
        $items = $obj->getPopularPosts();
        $obj = new Pdo2array($items);
        $postArray = $obj->pdo2array();
        return $postArray;
    }
}
