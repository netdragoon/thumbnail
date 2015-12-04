<?php namespace Canducci\Thumbnail;

class ThumbnailPicture
{
    private $url;
    private $id;

    function __construct($url, $id)
    {

        $this->url = $url;
        $this->id = $id;

    }

    public function getUrl()
    {

        return $this->url;

    }

    public function toArray()
    {

        return array('id' => $this->id, 'url' => $this->url);

    }
    public function toJson()
    {

        return json_encode($this->toArray(), JSON_PRETTY_PRINT);

    }

    public function saveAs($path)
    {


    }

}