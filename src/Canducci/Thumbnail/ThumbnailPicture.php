<?php namespace Canducci\Thumbnail;

class ThumbnailPicture
{
    private $url;
    private $id;
    private $code;

    public function __construct($url,$id,$code)
    {

        $this->url = $url;

        $this->id = $id;

        $this->code = $code;

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

        return ThumbnailClient::saveImage($this->url, $path, $this->id, $this->code);

    }

    public function getWebPath($path)
    {

        $this->saveAs($path);

        return sprintf("%s%s-%s%s", $path, $this->code, $this->id, ".jpg");

    }
}