<?php
namespace App\View\Components;
class HeaderAndNavbar
{
    function __construct()
    {
    }

    public function headerAndNavbar(): string
    {
        $tagHeader = $this->header();
        $tagNavbar = $this->navbar();
        $tag = $tagHeader ."\n".$tagNavbar;
        return $tag;
    }
    private function header(): string
    {
        $tag = <<<END
            <header>
            <h1>うーたんのブログ</h1>
            </header>
        END;
        return $tag;
    }
    private function navbar(): string
    {
        $tag = <<<END
            <nav>
            <h1>グローバルナビゲーション</h1>
            <ul>
            <li><a href="/1">🏡 HOME</a></li>
            <li><a href="#">🔍 Search</a></li>
            <li><a href="#">🧑 ABOUT</a></li>
            <li><a href="#">📰 Feed</a></li>
            <li><a href="#">📝 Portfolio</a></li>
            </ul>
            </nav>
        END;
        return $tag;
    }
}
