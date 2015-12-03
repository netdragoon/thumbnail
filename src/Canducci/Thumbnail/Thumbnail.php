<?php namespace Canducci\Thumbnail;

class Thumbnail {

    protected $url;
    public function __construct($url)
    {
        $this->url = $url;
    }
}