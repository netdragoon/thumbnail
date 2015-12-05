<?php namespace Canducci\Thumbnail\Contracts;

use Canducci\Thumbnail\ThumbnailAdaptiveFmts;
use Canducci\Thumbnail\ThumbnailClient;
use Canducci\Thumbnail\ThumbnailInformation;
use Canducci\Thumbnail\ThumbnailPicture;
use Canducci\Thumbnail\ThumbnailUrl;
use Canducci\Thumbnail\ThumbnailUrlEncodedFmtStreamMap;
use Exception;

abstract class ThumbnailContract
{

    protected $url;
    protected $code;
    protected $pictures;

    protected $pictureDefault = null;
    protected $picture0 = null;
    protected $picture1 = null;
    protected $picture2 = null;
    protected $picture3 = null;
    protected $pictureStandard = null;
    protected $pictureMediumQuality = null;
    protected $pictureHighQuality = null;
    protected $pictureMaximumResolution = null;
    protected $informationVideo = null;

    abstract public function getUrl();
    abstract public function getCode();
    abstract public function setUrl($url);
    abstract public function getPictureDefault();
    abstract public function getPicture0();
    abstract public function getPicture1();
    abstract public function getPicture2();
    abstract public function getPicture3();
    abstract public function getPictureStandard();
    abstract public function getPictureMediumQuality();
    abstract public function getPictureHighQuality();
    abstract public function getPictureMaximumResolution();
    abstract public function getUrlVideoShare();
    abstract public function getTagVideoEmbed($width = 560, $height = 315, $frameborder = 0, $suggestvideo = true, $controls = true, $showinfo = true, $privacidade = false);
    abstract public function getInformationVideo();

    abstract public function toArray();
    abstract public function toJson();

    abstract public function savePictures($path);
    abstract public function getPictures();

    protected  function renderThumbnailPicture($id)
    {
        $thumbPictureInstance = null;
        $url = sprintf(ThumbnailUrl::URLDefault, $this->code, $id);
        switch($id)
        {
            case 'default':
            {
                if (is_null($this->pictureDefault))
                {
                    $this->pictureDefault = new ThumbnailPicture($url, $id, $this->code);
                }
                $thumbPictureInstance = $this->pictureDefault;
                break;
            }
            case '0':
            {
                if (is_null($this->picture0))
                {
                    $this->picture0 = new ThumbnailPicture($url, $id, $this->code);
                }
                $thumbPictureInstance = $this->picture0;
                break;
            }
            case '1':
            {
                if (is_null($this->picture1))
                {
                    $this->picture1 = new ThumbnailPicture($url, $id, $this->code);
                }
                $thumbPictureInstance = $this->picture1;
                break;
            }
            case '2':
            {
                if (is_null($this->picture2))
                {
                    $this->picture2 = new ThumbnailPicture($url, $id, $this->code);
                }
                $thumbPictureInstance = $this->picture2;
                break;
            }
            case '3':
            {
                if (is_null($this->picture3))
                {
                    $this->picture3 = new ThumbnailPicture($url, $id, $this->code);
                }
                $thumbPictureInstance = $this->picture3;
                break;
            }
            case 'sddefault':
            {
                if (is_null($this->pictureStandard))
                {
                    $this->pictureStandard = new ThumbnailPicture($url, $id, $this->code);
                }
                $thumbPictureInstance = $this->pictureStandard;
                break;
            }
            case 'mqdefault':
            {
                if (is_null($this->pictureMediumQuality))
                {
                    $this->pictureMediumQuality = new ThumbnailPicture($url, $id, $this->code);
                }
                $thumbPictureInstance = $this->pictureMediumQuality;
                break;
            }
            case 'hqdefault':
            {
                if (is_null($this->pictureHighQuality))
                {
                    $this->pictureHighQuality = new ThumbnailPicture($url, $id, $this->code);
                }
                $thumbPictureInstance = $this->pictureHighQuality;
                break;
            }
            case 'maxresdefault':
            {
                if (is_null($this->pictureMaximumResolution))
                {
                    $this->pictureMaximumResolution = new ThumbnailPicture($url, $id, $this->code);
                }
                $thumbPictureInstance = $this->pictureMaximumResolution;
                break;
            }
        }

        return $thumbPictureInstance;

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

    protected function renderInformationVideo()
    {
        if (is_null($this->informationVideo))
        {
            $obj = new ThumbnailInformation();

            $information = ThumbnailClient::get(sprintf(ThumbnailUrl::URLInfo, $this->code));

            $info = array();

            parse_str($information, $info);

            $obj->setAuthor($info['author']);
            $obj->setTitle($info['title']);
            $obj->setVideoId($info['video_id']);
            $obj->setHostLanguage($info['host_language']);
            $obj->setKeywords($info['keywords']);
            $obj->setTimestamp((int)$info['timestamp']);
            $obj->setLengthSeconds((int)$info['length_seconds']);
            $obj->setViewCount((int)$info['view_count']);
            $obj->setThumbnail($this->getPictures());
            $fmts = array();
            foreach($this->infoVideo($info, 'adaptive_fmts') as $value)
            {
                $fmtsObject = new ThumbnailAdaptiveFmts();
                $fmtsObject->setUrl($value['url']);
                $fmtsObject->setBitrate($value['bitrate']);
                $fmtsObject->setClen($value['clen']);
                $fmtsObject->setFps(isset($value['fps']) ? $value['fps']: 0);
                $fmtsObject->setIndex($value['index']);
                $fmtsObject->setInit($value['init']);
                $fmtsObject->setItag($value['itag']);
                $fmtsObject->setLmt($value['lmt']);
                $fmtsObject->setProjectionType($value['projection_type']);
                $fmtsObject->setQualityLabel(isset($value['quality_label']) ? $value['quality_label']:0);
                $fmtsObject->setSize(isset($value['size']) ? $value['size']:0);
                $fmtsObject->setType($value['type']);
                $fmts[] = $fmtsObject;
            }
            $obj->setAdaptiveFmts($fmts);
            $map = array();
            foreach($this->infoVideo($info, 'url_encoded_fmt_stream_map') as $value)
            {
                $mapObject = new ThumbnailUrlEncodedFmtStreamMap();
                $mapObject->setType($value['type']);
                $mapObject->setUrl($value['url']);
                $mapObject->setItag($value['itag']);
                $mapObject->setFallbackHost($value['fallback_host']);
                $mapObject->setQuality($value['quality']);
                $map[] = $mapObject;
            }
            $obj->setUrlEncodedFmtStreamMap($map);
            $this->informationVideo = $obj;
        }

        return $this->informationVideo;

    }

    protected function infoVideo(array $array, $key)
    {

        $i = 0;

        $datas = explode(",", $array[$key]);

        foreach($datas as $data)
        {
            $g = explode('&', $data);
            foreach($g as $a)
            {
                $c = explode("=", $a);
                $ret[$i][$c[0]] = $c[1];
            }
            $i++;
        }

        return $ret;

    }
}
