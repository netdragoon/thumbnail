<?php namespace Canducci\Thumbnail;

class ThumbnailUrlEncodedFmtStreamMap
{
    protected $url;
    protected $quality;
    protected $itag;
    protected $fallback_host;
    protected $type;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
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
     * @return mixed
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param mixed $quality
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getItag()
    {
        return $this->itag;
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
     * @return mixed
     */
    public function getFallbackHost()
    {
        return $this->fallback_host;
    }

    /**
     * @param mixed $fallback_host
     */
    public function setFallbackHost($fallback_host)
    {
        $this->fallback_host = $fallback_host;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
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