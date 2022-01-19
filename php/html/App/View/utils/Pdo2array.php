<?php

namespace App\View\utils;

use \PDOStatement;

class Pdo2array
{
    private PDOStatement $items;

    public function __construct(PDOStatement $items)
    {
        $this->items = $items;
    }

    public function pdo2array(): array
    {
        $array = [];
        foreach ($this->items as $item) {
            array_push($array, $item);
        }
        return $array;
    }
}
