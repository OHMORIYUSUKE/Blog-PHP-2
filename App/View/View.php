<?php
include "utils/InsertTagHead.php";
include "utils/InsertHeaderAndNavbar.php";
include "../Model/GetPostById.php";

$obj = new GetPostById(20);
$items = $obj->getPostById();
$post = $items->fetch();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <?php
    // CDNなどをinsertする
    $obj = new InsertTagHead($post['title']);
    $tagUTF8 = $obj->insertUTF8();
    $tagTitle = $obj->insertTitle();
    $tagCDN4MD = $obj->insertTagCDN4MD();
    $tagJQ = $obj->insertTagJQuery();
    $tagTweet = $obj->insertTagTweet();
    $tagCSS = $obj->insertTagCSS();
    echo $tagUTF8, $tagTitle, $tagCDN4MD, $tagTweet, $tagJQ, $tagCSS;
    ?>
</head>

<body>
<?php
    // Header,Navbarをinsertする
    $obj = new InsertHeaderAndNavbar();
    print($obj->insertHeaderAndNavbar());
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
    <footer>
        Copyright ©HTML5 【 レイアウト 】 All Rights Reserved.
    </footer>
    <script src="js/index.js"></script>
</body>

</html>