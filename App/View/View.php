<?php
include "utils/InsertTagHead.php";
        include "../Model/GetPostById.php";

        $obj = new GetPostById(19);
        $items = $obj->getPostById();
        foreach ($items as $item) :
             $text = $item['text']; 
             $title = $item['title']; 
        endforeach; 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php
    // CDNなどをinsertする
    $obj = new InsertTagHead("Topページ");
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
    <header>
        <h1>HTML5 【 レイアウト 】</h1>
    </header>
    <nav>
        <h1>グローバルナビゲーション</h1>
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">MENU1</a></li>
            <li><a href="#">MENU2</a></li>
            <li><a href="#">MENU3</a></li>
            <li><a href="#">SITE MAP</a></li>
            <li><a href="#">ABOUT</a></li>
        </ul>
    </nav>
    <article>
        <section>
            <h1><?php echo $title; ?></h1>
</section>
        <section>
            <div class="articleView"><?php echo $text; ?></div>
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