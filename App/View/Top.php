<?php
include "Components/Head.php";
include "Components/Footer.php";
include "Components/HeaderAndNavbar.php";
include "../Model/GetPosts.php";

$obj = new GetPosts(0);
$items = $obj->getPosts();
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
        <?php foreach ($items as $item) : ?>
            <section>
                <h1><?php echo $item['title']; ?></h1>
            </section>
        <?php endforeach; ?>
    </article>
    <aside>
        <section>
            <h1>カテゴリー</h1>
            <ul>
                <li><a href="#">カテゴリー1</a></li>
                <li><a href="#">カテゴリー2</a></li>
                <li><a href="#">カテゴリー3</a></li>
                <li><a href="#">カテゴリー4</a></li>
                <li><a href="#">カテゴリー5</a></li>
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
    <script src="js/md2html.js"></script>
</body>

</html>