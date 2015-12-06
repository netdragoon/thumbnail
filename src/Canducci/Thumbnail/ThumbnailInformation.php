<?php namespace Canducci\Thumbnail;

use Canducci\Thumbnail\Contracts\IThumbnailInformation;

class ThumbnailInformation implements IThumbnailInformation
{

    private $author;
    private $title;
    private $video_id;
    private $host_language;
    private $keywords;
    private $timestamp;
    private $length_seconds;
    private $view_count;
    private $thumbnail;
    private $adaptive_fmts;
    private $url_encoded_fmt_stream_map;

    public function __construct($author = null, $title = null, $video_id = null, $host_language = null, $keywords = null, $timestamp = null, $length_seconds = null, $view_count = null, $thumbnail = null, $adaptive_fmts = null, $url_encoded_fmt_stream_map = null)
    {

        $this->author = $author;
        $this->title = $title;
        $this->video_id = $video_id;
        $this->host_language = $host_language;
        $this->keywords = $keywords;
        $this->timestamp = $timestamp;
        $this->length_seconds = $length_seconds;
        $this->view_count = $view_count;
        $this->thumbnail = $thumbnail;
        $this->adaptive_fmts = $adaptive_fmts;
        $this->url_encoded_fmt_stream_map = $url_encoded_fmt_stream_map;

    }


    public function getAuthor()
    {

        return $this->author;

    }

    public function setAuthor($author)
    {

        $this->author = $author;
        return $this;

    }

    public function getTitle()
    {

        return $this->title;

    }

    public function setTitle($title)
    {

        $this->title = $title;
        return $this;

    }

    public function getVideoId()
    {

        return $this->video_id;

    }

    public function setVideoId($video_id)
    {

        $this->video_id = $video_id;
        return $this;

    }

    public function getHostLanguage()
    {

        return $this->host_language;

    }

    public function setHostLanguage($host_language)
    {

        $this->host_language = $host_language;
        return $this;

    }

    public function getKeywords()
    {

        return $this->keywords;

    }

    public function setKeywords($keywords)
    {

        $this->keywords = $keywords;
        return $this;

    }

    public function getTimestamp()
    {

        return $this->timestamp;

    }

    public function setTimestamp($timestamp)
    {

        $this->timestamp = $timestamp;
        return $this;

    }

    public function getLengthSeconds()
    {

        return $this->length_seconds;

    }

    public function setLengthSeconds($length_seconds)
    {

        $this->length_seconds = $length_seconds;
        return $this;

    }

    public function getViewCount()
    {

        return $this->view_count;

    }

    public function setViewCount($view_count)
    {

        $this->view_count = $view_count;
        return $this;

    }

    public function getThumbnail()
    {

        return $this->thumbnail;

    }

    public function setThumbnail($thumbnail)
    {

        $this->thumbnail = $thumbnail;
        return $this;

    }

    public function getAdaptiveFmts()
    {

        return $this->adaptive_fmts;

    }

    public function setAdaptiveFmts($adaptive_fmts)
    {

        $this->adaptive_fmts = $adaptive_fmts;
        return $this;

    }

    public function getUrlEncodedFmtStreamMap()
    {

        return $this->url_encoded_fmt_stream_map;

    }

    public function setUrlEncodedFmtStreamMap($url_encoded_fmt_stream_map)
    {

        $this->url_encoded_fmt_stream_map = $url_encoded_fmt_stream_map;
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