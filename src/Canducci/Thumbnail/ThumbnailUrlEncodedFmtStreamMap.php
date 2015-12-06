<?php namespace Canducci\Thumbnail;

use Canducci\Thumbnail\Contracts\IThumbnailUrlEncodedFmtStreamMap;

class ThumbnailUrlEncodedFmtStreamMap implements IThumbnailUrlEncodedFmtStreamMap
{

    protected $url;
    protected $quality;
    protected $itag;
    protected $fallback_host;
    protected $type;

    public function __construct($url = null, $quality = null, $itag = null, $fallback_host = null, $type = null)
    {

        $this->url = $url;
        $this->quality = $quality;
        $this->itag = $itag;
        $this->fallback_host = $fallback_host;
        $this->type = $type;

    }


    public function getUrl()
    {

        return $this->url;

    }

    public function setUrl($url)
    {

        $this->url = $url;
        return $this;

    }

    public function getQuality()
    {

        return $this->quality;

    }

    public function setQuality($quality)
    {

        $this->quality = $quality;
        return $this;

    }

    public function getItag()
    {

        return $this->itag;

    }

    public function setItag($itag)
    {

        $this->itag = $itag;
        return $this;

    }

    public function getFallbackHost()
    {

        return $this->fallback_host;

    }

    public function setFallbackHost($fallback_host)
    {

        $this->fallback_host = $fallback_host;
        return $this;

    }

    public function getType()
    {

        return $this->type;

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