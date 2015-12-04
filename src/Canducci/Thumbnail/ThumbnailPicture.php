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

        return array('id' => $this->id, 'url' => $this->url, 'code' => $this->code);

    }
    public function toJson()
    {

        return json_encode($this->toArray(), JSON_PRETTY_PRINT);

    }

    public function saveAs($path)
    {

        return ThumbnailUtils::saveImage($this->url, $path, $this->id, $this->code);

    }

    public function getWebFile($path)
    {

        $this->saveAs($path);

        return ThumbnailUtils::webPath("/".$path, $this->id, $this->code);

    }
}