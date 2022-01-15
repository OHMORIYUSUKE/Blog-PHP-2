<?php

namespace App\View\utils;

class PostsCount2maxPage
{
    private int $postCount;
    private int $postParPage;

    public function __construct(int $postCount)
    {
        $this->postCount = $postCount;
        $this->postParPage = 6;
    }

    public function postsCount2maxPage(): int
    {
        $maxPage = ceil($this->postCount / $this->postParPage);
        return $maxPage;
    }
}
