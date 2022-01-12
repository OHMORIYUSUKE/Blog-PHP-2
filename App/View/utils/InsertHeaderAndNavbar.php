<?php

class InsertHeaderAndNavbar
{
    function __construct()
    {
    }

    public function insertHeaderAndNavbar(): string
    {
        $tags = <<<END
            <header>
            <h1>うーたんのブログ</h1>
            </header>
            <nav>
            <h1>グローバルナビゲーション</h1>
            <ul>
            <li><a href="#">🏡 HOME</a></li>
            <li><a href="#">🔍 Search</a></li>
            <li><a href="#">🧑 ABOUT</a></li>
            <li><a href="#">📰 Feed</a></li>
            <li><a href="#">📝 Portfolio</a></li>
            </ul>
            </nav>
        END;
        return $tags;
    }
}
