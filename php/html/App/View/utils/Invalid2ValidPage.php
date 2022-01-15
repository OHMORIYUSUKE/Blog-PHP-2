<?php

namespace App\View\utils;

class Invalid2ValidPage
{
    private int $page;
    private int $maxPage;

    public function __construct(int $page, int $maxPage)
    {
        $this->page = $page;
        $this->maxPage = $maxPage;
    }

    public function invalid2ValidPage(): int
    {
        $page = $this->page;
        $maxPage = $this->maxPage;
        $page = max($page, 1);
        $page = min($page, $maxPage);
        return $page;
    }
}
