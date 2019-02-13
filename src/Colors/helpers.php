<?php

if (! function_exists('colors'))
{
    function colors($style, $text)
    {
        \Web64\Colors\Facades\Colors::__call($style, [$text]);
    }
}