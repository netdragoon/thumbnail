<?php namespace Canducci\Thumbnail\Contracts;

use Exception;

abstract class ThumbnailContract
{

    protected $url;
    protected $code;
    public function getUrl()
    {
        return $this->url;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function setUrl($url)
    {
        $this->validation($url);
        $this->url = $url;
        $this->renderCode();
        return $this;
    }
    protected function validation($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED))
        {
            throw new Exception("Url invalid.", 0);
        }
    }
    public function renderCode()
    {
        $parseUrl = parse_url($this->url);
        $response = array();
        preg_match('/v=[\w+]*/', $parseUrl['query'], $response);
        if (count($response) == 1){
            $this->code = str_replace("v=", "",$response[0]);
            return true;
        }
        throw new Exception("Url invalid", 0);
    }
}