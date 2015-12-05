<?php namespace Canducci\Thumbnail;

class ThumbnailAdaptiveFmts
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

    /**
     * @return mixed
     */
    public function getInit()
    {
        return $this->init;
    }

    /**
     * @return mixed
     */
    public function getItag()
    {
        return $this->itag;
    }

    /**
     * @return mixed
     */
    public function getClen()
    {
        return $this->clen;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getFps()
    {
        return $this->fps;
    }

    /**
     * @return mixed
     */
    public function getLmt()
    {
        return $this->lmt;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getProjectionType()
    {
        return $this->projection_type;
    }

    /**
     * @return mixed
     */
    public function getQualityLabel()
    {
        return $this->quality_label;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @return mixed
     */
    public function getBitrate()
    {
        return $this->bitrate;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $init
     */
    public function setInit($init)
    {
        $this->init = $init;
        return $this;
    }

    /**
     * @param mixed $itag
     */
    public function setItag($itag)
    {
        $this->itag = $itag;
        return $this;
    }

    /**
     * @param mixed $clen
     */
    public function setClen($clen)
    {
        $this->clen = $clen;
        return $this;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param mixed $fps
     */
    public function setFps($fps)
    {
        $this->fps = $fps;
        return $this;
    }

    /**
     * @param mixed $lmt
     */
    public function setLmt($lmt)
    {
        $this->lmt = $lmt;
        return $this;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param mixed $projection_type
     */
    public function setProjectionType($projection_type)
    {
        $this->projection_type = $projection_type;
        return $this;
    }

    /**
     * @param mixed $quality_label
     */
    public function setQualityLabel($quality_label)
    {
        $this->quality_label = $quality_label;
        return $this;
    }

    /**
     * @param mixed $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param mixed $bitrate
     */
    public function setBitrate($bitrate)
    {
        $this->bitrate = $bitrate;
        return $this;
    }

    /**
     * @param mixed $type
     */
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