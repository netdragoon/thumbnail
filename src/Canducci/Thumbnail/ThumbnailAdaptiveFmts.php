<?php namespace Canducci\Thumbnail;

use Canducci\Thumbnail\Contracts\IThumbnailAdaptiveFmts;

class ThumbnailAdaptiveFmts implements IThumbnailAdaptiveFmts
{

    protected $init;
    protected $itag;
    protected $clen;
    protected $url;
    protected $fps;
    protected $lmt;
    protected $size;
    protected $projection_type;
    protected $quality_label;
    protected $index;
    protected $bitrate;
    protected $type;

    public function __construct($init = null, $itag = null, $clen = null, $url = null, $fps = null, $lmt = null, $size = null, $projection_type = null, $quality_label = null, $index = null, $bitrate = null, $type = null)
    {

        $this->init = $init;
        $this->itag = $itag;
        $this->clen = $clen;
        $this->url = $url;
        $this->fps = $fps;
        $this->lmt = $lmt;
        $this->size = $size;
        $this->projection_type = $projection_type;
        $this->quality_label = $quality_label;
        $this->index = $index;
        $this->bitrate = $bitrate;
        $this->type = $type;

    }

    public function getInit()
    {

        return $this->init;

    }

    public function getItag()
    {

        return $this->itag;

    }

    public function getClen()
    {

        return $this->clen;

    }

    public function getUrl()
    {

        return $this->url;

    }

    public function getFps()
    {

        return $this->fps;

    }

    public function getLmt()
    {

        return $this->lmt;

    }

    public function getSize()
    {

        return $this->size;

    }

    public function getProjectionType()
    {

        return $this->projection_type;

    }

    public function getQualityLabel()
    {

        return $this->quality_label;

    }

    public function getIndex()
    {

        return $this->index;

    }

    public function getBitrate()
    {

        return $this->bitrate;

    }

    public function getType()
    {

        return $this->type;

    }

    public function setInit($init)
    {

        $this->init = $init;
        return $this;

    }

    public function setItag($itag)
    {

        $this->itag = $itag;
        return $this;

    }

    public function setClen($clen)
    {

        $this->clen = $clen;
        return $this;

    }

    public function setUrl($url)
    {

        $this->url = $url;
        return $this;

    }

    public function setFps($fps)
    {

        $this->fps = $fps;
        return $this;

    }

    public function setLmt($lmt)
    {

        $this->lmt = $lmt;
        return $this;

    }

    public function setSize($size)
    {

        $this->size = $size;
        return $this;

    }

    public function setProjectionType($projection_type)
    {

        $this->projection_type = $projection_type;
        return $this;

    }

    public function setQualityLabel($quality_label)
    {

        $this->quality_label = $quality_label;
        return $this;

    }

    public function setIndex($index)
    {

        $this->index = $index;
        return $this;

    }

    public function setBitrate($bitrate)
    {

        $this->bitrate = $bitrate;
        return $this;

    }

    public function setType($type)
    {

        $this->type = $type;
        return $this;

    }

    public function toArray()
    {

        $var = get_object_vars($this);

        foreach($var as &$value)
        {
            if(is_object($value) && method_exists($value,'toArray'))
            {

                $value = $value->toArray();

            }
        }

        return $var;

    }

    public function toJson()
    {

        return json_encode($this->toArray(), JSON_PRETTY_PRINT);

    }

}