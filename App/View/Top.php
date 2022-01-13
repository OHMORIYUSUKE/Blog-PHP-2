<?php

namespace App\Model;

require_once '../Model/GetPosts.php';
require_once '../Model/GetPostById.php';

use App\Model\GetPosts;
use App\Model\GetPostById;

$obj = new GetPosts(0);
$items = $obj->getPosts();

var_dump($items);

$obj = new GetPostById(20);
$items = $obj->getPostById();
$post = $items->fetch();

var_dump($post);
