<?php

namespace App\View\utils;

class Page2start
{
    private int $page;
    private int $postCount;
    private int $postParPage;

    public function __construct(int $page, int $postCount)
    {
        $this->page = $page;
        $this->postCount = $postCount;
        $this->postParPage = 6;
    }

    public function page2start(): int
    {
        $page = $this->page;
        $postCount = $this->postCount;
        $postParpage = $this->postParPage;
        $page = max($page, 1);
        $maxPage = ceil($postCount / $postParpage);
        $page = min($page, $maxPage);
        $start = ($page - 1) * $postParpage;
        return $start;
    }
}
