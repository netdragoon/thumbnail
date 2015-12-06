<?php namespace Canducci\Thumbnail\Contracts;

interface IThumbnailUrlEncodedFmtStreamMap extends ITo
{

    public function getUrl();
    public function setUrl($url);
    public function getQuality();
    public function setQuality($quality);
    public function getItag();
    public function setItag($itag);
    public function getFallbackHost();
    public function setFallbackHost($fallback_host);
    public function getType();
    public function setType($type);

}