<?php namespace Canducci\Thumbnail\Contracts;

interface IThumbnailAdaptiveFmts extends ITo
{

    public function getInit();
    public function getItag();
    public function getClen();
    public function getUrl();
    public function getFps();
    public function getLmt();
    public function getSize();
    public function getProjectionType();
    public function getQualityLabel();
    public function getIndex();
    public function getBitrate();
    public function getType();
    public function setInit($init);
    public function setItag($itag);
    public function setClen($clen);
    public function setUrl($url);
    public function setFps($fps);
    public function setLmt($lmt);
    public function setSize($size);
    public function setProjectionType($projection_type);
    public function setQualityLabel($quality_label);
    public function setIndex($index);
    public function setBitrate($bitrate);
    public function setType($type);

}