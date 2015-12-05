<?php namespace Canducci\Thumbnail\Contracts;

abstract class ThumbnailPictureContract
{

    protected $url;
    protected $id;
    protected $code;

    abstract public function getUrl();
    abstract public function save($path);
    abstract public function getFileWeb($path);

    abstract public function toArray();
    abstract public function toJson();

    protected function getPath($path)
    {

        return sprintf("%s%s-%s%s", $path, $this->code, $this->id, ".jpg");

    }

}