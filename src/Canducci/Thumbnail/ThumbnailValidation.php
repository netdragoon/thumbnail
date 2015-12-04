<?php namespace Canducci\Thumbnail;

abstract class ThumbnailValidation
{

    public static function isURL($url)
    {

        if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED))
        {

            throw new Exception("Url invalid.", 0);

        }

    }

}