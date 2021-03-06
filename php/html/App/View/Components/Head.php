<?php
namespace App\View\Components;
class Head
{
    private string $title;
    function __construct(string $title)
    {
        $this->title = $title;
    }

    public function utf8(): string
    {
        $tag = '<meta charset="utf-8">';
        return $tag;
    }
    public function title(): string
    {
        $tag = "<title>{$this->title}</title>";
        return $tag;
    }
    public function cdn4md(): string
    {
        $tags = <<<END
            <!-- ★マークダウン変換用 -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>
            <!-- ◆シンタックスハイライト用 -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
            <!-- ◆VBをシンタックスハイライトする必要があるならこれ↓も入れる -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/vbnet.min.js"></script>
            <!-- ◆シンタックスハイライト用 css （好きなテーマを選んで指定する） -->
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/ir-black.min.css">
        END;
        return $tags;
    }

    public function jquery(): string
    {
        $tag = <<<END
            <!-- jQuery-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        END;
        return $tag;
    }

    public function tweet(): string
    {
        $tag = <<<END
            <!-- twitterのツイートを貼る用のjs -->
            <script async="" src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        END;
        return $tag;
    }

    public function css(): string
    {
        $tag = <<<END
            <!--レスポンシブ-->
            <meta name="viewport" content="width=device-width">
        END;
        return $tag;
    }
}
