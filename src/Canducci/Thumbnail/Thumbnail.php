<?php namespace Canducci\Thumbnail;

use Canducci\Thumbnail\Contracts\ThumbnailContract;

class Thumbnail extends ThumbnailContract
{

    public function __construct($url = null)
    {
        if (!is_null($url))
        {
            $this->setUrl($url);
        }
    }

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

    public function getPictureDefault()
    {

        return $this->renderThumbnailPicture('default');

    }

    public function getPicture0()
    {

        return $this->renderThumbnailPicture('0');

    }

    public function getPicture1()
    {

        return $this->renderThumbnailPicture('1');

    }

    public function getPicture2()
    {

        return $this->renderThumbnailPicture('2');

    }

    public function getPicture3()
    {

        return $this->renderThumbnailPicture('3');

    }

    public function getPictureStandard()
    {

        return $this->renderThumbnailPicture('sddefault');

    }

    public function getPictureMediumQuality()
    {

        return $this->renderThumbnailPicture('mqdefault');

    }

    public function getPictureHighQuality()
    {

        return $this->renderThumbnailPicture('hqdefault');

    }

    public function getPictureMaximumResolution()
    {

        return $this->renderThumbnailPicture('maxresdefault');

    }

    public function getUrlVideoShare()
    {

        return $this->renderThumbnailVideoShare();

    }

    public function getTagVideoEmbed($width = 560, $height = 315, $frameborder = 0, $suggestvideo = true, $controls = true, $showinfo = true, $privacidade = false)
    {

        return $this->renderThumbnailTagVideoEmbed($width, $height, $frameborder, $suggestvideo, $controls, $showinfo, $privacidade);

    }

    public function toArray()
    {

        return array(
            'code' => $this->code,
            'url' => $this->url,
            'pictures' => array(
                'thumbnails' => array(
                    $this->getPictureDefault()->toArray(),
                    $this->getPicture0()->toArray(),
                    $this->getPicture1()->toArray(),
                    $this->getPicture2()->toArray(),
                    $this->getPicture3()->toArray()
                ),
                'standard' => $this->getPictureStandard()->toArray(),
                'medium' => $this->getPictureHighQuality()->toArray(),
                'high' => $this->getPictureHighQuality()->toArray(),
                'maximum' => $this->getPictureMaximumResolution()->toArray()
            ),
            'embed' => array('tag' => $this->getTagVideoEmbed()),
            'share' => array('url' => $this->getUrlVideoShare())
        );

    }

    public function toJson()
    {

        return json_encode($this->toArray(), JSON_PRETTY_PRINT);

    }

}