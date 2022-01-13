<?php
namespace App\View\Components;
class Footer
{
    function __construct()
    {
    }

    public function footer(): string
    {
        $year = date('Y');
        $tag = <<<END
            <footer>
            Copyright © 2021 - {$year} U-TAN Blog All Rights Reserved.
            </footer>
        END;
        return $tag;
    }
}