<?php

if (!function_exists('thumbnail'))
{

    function thumbnail($url)
    {

        return new Canducci\Thumbnail\Thumbnail($url);

    }

}