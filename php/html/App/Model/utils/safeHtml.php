<?php
function h($value, $encoding = 'UTF-8')
{
    return htmlspecialchars($value, ENT_QUOTES, $encoding);
} // HTMlエスケープ出力用
function sprint($value, $encoding = 'UTF-8')
{
    echo h($value, $encoding);
}
