<?php namespace Canducci\Thumbnail\Contracts;

use Canducci\Thumbnail\ThumbnailAdaptiveFmts;
use Canducci\Thumbnail\ThumbnailAdaptiveFmtsCollection;
use Canducci\Thumbnail\ThumbnailClient;
use Canducci\Thumbnail\ThumbnailInformation;
use Canducci\Thumbnail\ThumbnailPicture;
use Canducci\Thumbnail\ThumbnailUrl;
use Canducci\Thumbnail\ThumbnailUrlEncodedFmtStreamMap;
use Canducci\Thumbnail\ThumbnailUrlEncodedFmtStreamMapCollection;
use Exception;

abstract class ThumbnailContract implements ITo
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

        if ($conf !== "" && $controls == false) $conf .= "&";
        $conf .= ($controls == false) ? "controls=0" : "";

        if ($conf !== "" && $showinfo == false) $conf .= "&";
        $conf .= ($showinfo == false) ? "showinfo=0" : "";

        if ($conf !== "") $conf = "?" . $conf;

        $embed = sprintf('<iframe width="%s" height="%s" ', $width, $height);
        $embed .= sprintf('src="%s%s" ', sprintf($url, $this->code), $conf);
        $embed .= sprintf('frameborder="%s" allowfullscreen></iframe>', $frameborder);

        return $embed;

    }

    protected function renderCode()
    {

        $parseUrl = parse_url($this->url);

        $response = array();

        preg_match('/v=[\w-_+]*/', $parseUrl['query'], $response);

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

            $obj->setAuthor($info['author'])
                ->setTitle($info['title'])
                ->setVideoId($info['video_id'])
                ->setHostLanguage($info['host_language'])
                ->setKeywords($info['keywords'])
                ->setTimestamp((int)$info['timestamp'])
                ->setLengthSeconds((int)$info['length_seconds'])
                ->setViewCount((int)$info['view_count'])
                ->setThumbnail($this->getPictures());

            $fmts = array();

            foreach($this->infoVideo($info, 'adaptive_fmts') as $value)
            {

                $fmtsObject = new ThumbnailAdaptiveFmts();

                $fmtsObject->setUrl($value['url'])
                    ->setBitrate($value['bitrate'])
                    ->setClen($value['clen'])
                    ->setFps(isset($value['fps']) ? $value['fps']: 0)
                    ->setIndex($value['index'])
                    ->setInit($value['init'])
                    ->setItag($value['itag'])
                    ->setLmt($value['lmt'])
                    ->setProjectionType($value['projection_type'])
                    ->setQualityLabel(isset($value['quality_label']) ? $value['quality_label']:0)
                    ->setSize(isset($value['size']) ? $value['size']:0)
                    ->setType($value['type']);

                $fmts[] = $fmtsObject;
            }

            $obj->setAdaptiveFmts(new ThumbnailAdaptiveFmtsCollection($fmts));

            $map = array();

            foreach($this->infoVideo($info, 'url_encoded_fmt_stream_map') as $value)
            {

                $mapObject = new ThumbnailUrlEncodedFmtStreamMap();

                $mapObject->setType($value['type'])
                    ->setUrl($value['url'])
                    ->setItag($value['itag'])
                    ->setFallbackHost($value['fallback_host'])
                    ->setQuality($value['quality']);

                $map[] = $mapObject;

            }

            $obj->setUrlEncodedFmtStreamMap(new ThumbnailUrlEncodedFmtStreamMapCollection($map));

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
