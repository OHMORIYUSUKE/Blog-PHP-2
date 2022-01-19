<?php

namespace App\View\utils;

class Pagenation
{
    private int $postCount;
    private int $id;
    private int $postParPage;

    public function __construct(int $postCount, int $id)
    {
        $this->postCount = $postCount;
        $this->id = $id;
        $this->postParPage = 6;
    }

    public function pagenation(): array
    {
        $maxPage = $this->postsCount2maxPage();
        $page = $this->invalid2ValidPage($maxPage);
        $start = $this->page2start($page);
        $data = array(
            "maxPage" => $maxPage,
            "start" => $start,
            "page" => $page,
        );
        return $data;
    }

    private function postsCount2maxPage(): int
    {
        $maxPage = ceil($this->postCount / $this->postParPage);
        return $maxPage;
    }
    private function invalid2ValidPage(int $maxPage): int
    {
        $page = $this->id;
        $page = max($page, 1);
        $page = min($page, $maxPage);
        return $page;
    }
    private function page2start(int $page): int
    {
        $postCount = $this->postCount;
        $postParpage = $this->postParPage;
        $page = max($page, 1);
        $maxPage = ceil($postCount / $postParpage);
        $page = min($page, $maxPage);
        $start = ($page - 1) * $postParpage;
        return $start;
    }
}
