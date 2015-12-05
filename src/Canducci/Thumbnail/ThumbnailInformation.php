<?php namespace Canducci\Thumbnail;

class ThumbnailInformation
{
    private $author;
    private $title;
    private $video_id;
    private $host_language;
    private $keywords;
    private $timestamp;
    private $length_seconds;
    private $view_count;
    //collection
    private $thumbnail;
    private $adaptive_fmts;
    private $url_encoded_fmt_stream_map;

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getVideoId()
    {
        return $this->video_id;
    }

    /**
     * @param mixed $video_id
     */
    public function setVideoId($video_id)
    {
        $this->video_id = $video_id;
    }

    /**
     * @return mixed
     */
    public function getHostLanguage()
    {
        return $this->host_language;
    }

    /**
     * @param mixed $host_language
     */
    public function setHostLanguage($host_language)
    {
        $this->host_language = $host_language;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getLengthSeconds()
    {
        return $this->length_seconds;
    }

    /**
     * @param mixed $length_seconds
     */
    public function setLengthSeconds($length_seconds)
    {
        $this->length_seconds = $length_seconds;
    }

    /**
     * @return mixed
     */
    public function getViewCount()
    {
        return $this->view_count;
    }

    /**
     * @param mixed $view_count
     */
    public function setViewCount($view_count)
    {
        $this->view_count = $view_count;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return mixed
     */
    public function getAdaptiveFmts()
    {
        return $this->adaptive_fmts;
    }

    /**
     * @param mixed $adaptive_fmts
     */
    public function setAdaptiveFmts($adaptive_fmts)
    {
        $this->adaptive_fmts = $adaptive_fmts;
    }

    /**
     * @return mixed
     */
    public function getUrlEncodedFmtStreamMap()
    {
        return $this->url_encoded_fmt_stream_map;
    }

    /**
     * @param mixed $url_encoded_fmt_stream_map
     */
    public function setUrlEncodedFmtStreamMap($url_encoded_fmt_stream_map)
    {
        $this->url_encoded_fmt_stream_map = $url_encoded_fmt_stream_map;
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
        unset($var['adaptive_fmts']);
        foreach ($this->adaptive_fmts as $t)
        {
            $var['adaptive_fmts'][] = $t->toArray();
        }
        unset($var['url_encoded_fmt_stream_map']);
        foreach($this->url_encoded_fmt_stream_map as $u)
        {
            $var['url_encoded_fmt_stream_map'][] = $u->toArray();
        }
        return $var;
    }

    public function toJson()
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT);
    }

}