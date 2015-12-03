<?php namespace Canducci\Thumbnail\Contracts;

use Exception;
use Canducci\Thumbnail\ThumbnailUrl;

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
    protected  function renderThumbnailPicture($id)
    {
        return sprintf(ThumbnailUrl::URLDefault, $this->code, $id);
    }
    protected function renderThumbnailVideoShare()
    {
        return sprintf(ThumbnailUrl::URLShare, $this->code);
    }
    protected  function renderThumbnailTagVideoEmbed($width = 560, $height = 315, $frameborder = 0, $suggestvideo = true, $controls = true, $showinfo = true, $privacidade = false)
    {
        $url = ($privacidade) ? ThumbnailUrl::URLEmbedPrivacidade : ThumbnailUrl::URLEmbed;

        $conf = ($suggestvideo == false) ? "rel=0" : "";
        if ($conf !=="" && $controls == false) $conf .= "&amp;&";
        $conf .= ($controls == false) ? "controls=0" : "";
        if ($conf !=="" && $showinfo == false) $conf .= "&amp;&";
        $conf .= ($showinfo == false) ? "showinfo=0" : "";
        if ($conf !=="") $conf = "?" . $conf;

        $embed = sprintf('<iframe width="%s" height="%s" ', $width, $height);
        $embed .= sprintf('src="%s%s" ', sprintf($url, $this->code), $conf);
        $embed .= sprintf('frameborder="%s" allowfullscreen></iframe>', $frameborder);
        return $embed;

    }
    protected function renderCode()
    {
        $parseUrl = parse_url($this->url);
        $response = array();
        preg_match('/v=[\w+]*/', $parseUrl['query'], $response);
        if (count($response) == 1)
        {
            $this->code = str_replace("v=", "",$response[0]);
            return true;
        }
        throw new Exception("Url invalid", 0);
    }
}