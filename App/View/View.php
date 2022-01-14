<?php

namespace App\Model;

namespace App\View\Components;

namespace App\View;


require_once 'Components/Head.php';
require_once 'Components/Footer.php';
require_once 'Components/HeaderAndNavbar.php';

require_once __DIR__ . '/../Model/GetPosts.php';
require_once __DIR__ . '/../Model/GetPostById.php';
require_once __DIR__ . '/../Model/db/Connect.php';

use App\Model\GetPosts;
use App\Model\GetPostById;

use App\View\Components\Head;
use App\View\Components\Footer;
use App\View\Components\HeaderAndNavbar;

$obj = new GetPosts(0);
$posts = $obj->getPosts();



class View
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function view()
    {
        $obj = new GetPostById($this->id);
$items = $obj->getPostById();
$post = $items->fetch();
return $post;
    }
}
// $obj = new View(20);
// $post = $obj->view();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?php
    // CDNなどをinsertする
    $obj = new Head("トップページ");
    echo $obj->utf8(), $obj->title(), $obj->cdn4md(), $obj->jquery(), $obj->tweet(), $obj->css()
    ?>
</head>

<body>
    <?php
    // Header,Navbarをinsertする
    $obj = new HeaderAndNavbar();
    print($obj->headerAndNavbar());
    ?>
    <article>
        <section>
            <h1><?php print($post['title']); ?></h1>
        </section>
        <section>
            <div class="articleView"><?php print($post['text']); ?></div>
        </section>
    </article>
    <aside>
        <section>
            <h1>カテゴリー</h1>
            <ul>
                <li><a href="#">カテゴリー1</a></li>
                <?php foreach ($posts as $item) : ?>
                    <li><?php echo $item['title']; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section>
            <h1>アーカイブ</h1>
            <ul>
                <li><a href="#">アーカイブ1</a></li>
                <li><a href="#">アーカイブ2</a></li>
                <li><a href="#">アーカイブ3</a></li>
                <li><a href="#">アーカイブ4</a></li>
                <li><a href="#">アーカイブ5</a></li>
            </ul>
        </section>
    </aside>
    <?php
    $obj = new Footer();
    print($obj->footer());
    ?>
    <?php
    $js = file_get_contents(__DIR__ . '/js/md2html.js');
    if ($js === false) {
        throw new \RuntimeException('file not found.');
    }
    print("<script>");
    print($js);
    print("</script>");
    ?>
    <?php
    $js = file_get_contents(__DIR__ . '/css/main.css');
    if ($js === false) {
        throw new \RuntimeException('file not found.');
    }
    print("<style>");
    print($js);
    print("</style>");
    ?>
</body>

</html>