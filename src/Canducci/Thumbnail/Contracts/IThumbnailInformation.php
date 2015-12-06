<?php namespace Canducci\Thumbnail\Contracts;

interface IThumbnailInformation extends ITo
{

    public function getAuthor();
    public function setAuthor($author);
    public function getTitle();
    public function setTitle($title);
    public function getVideoId();
    public function setVideoId($video_id);
    public function getHostLanguage();
    public function setHostLanguage($host_language);
    public function getKeywords();
    public function setKeywords($keywords);
    public function getTimestamp();
    public function setTimestamp($timestamp);
    public function getLengthSeconds();
    public function setLengthSeconds($length_seconds);
    public function getViewCount();
    public function setViewCount($view_count);
    public function getThumbnail();
    public function setThumbnail($thumbnail);
    public function getAdaptiveFmts();
    public function setAdaptiveFmts($adaptive_fmts);
    public function getUrlEncodedFmtStreamMap();
    public function setUrlEncodedFmtStreamMap($url_encoded_fmt_stream_map);


}