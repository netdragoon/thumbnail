<?php namespace Canducci\Thumbnail;

use Canducci\Thumbnail\Contracts\ThumbnailPictureContract;
use Exception;

class ThumbnailPicture extends ThumbnailPictureContract
{
    protected $url;
    protected $id;
    protected $code;

    public function __construct($url,$id,$code)
    {

        ThumbnailValidation::isURL($url);

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

        return ThumbnailClient::save($this->url, $path, $this->id, $this->code);

    }

    public function exitsFileWeb($path)
    {

        return file_exists($this->getPath($path));

    }

    public function getFileWeb($path)
    {

        if (!$this->exitsFileWeb($path))
        {

            throw new Exception('No found file, saveAs');

        }

        return sprintf('/%s', $this->getPath($path));

    }
}