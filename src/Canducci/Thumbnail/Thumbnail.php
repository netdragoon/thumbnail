<?php namespace Canducci\Thumbnail;

use Canducci\Thumbnail\Contracts\ThumbnailContract;

class Thumbnail extends ThumbnailContract
{

    public function __construct($url = null)
    {
        if (!is_null($url))
        {
            $this->setUrl($url);
        }
    }

}