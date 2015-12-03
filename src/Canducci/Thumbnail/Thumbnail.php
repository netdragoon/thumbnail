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

    public function getUrlPictureDefault()
    {

        return $this->renderThumbnailPicture('default');

    }

    public function getUrlPicture0()
    {

        return $this->renderThumbnailPicture('0');

    }

    public function getUrlPicture1()
    {

        return $this->renderThumbnailPicture('1');

    }

    public function getUrlPicture2()
    {

        return $this->renderThumbnailPicture('2');

    }

    public function getUrlPicture3()
    {

        return $this->renderThumbnailPicture('3');

    }

    public function getUrlVideoShare()
    {

        return $this->renderThumbnailVideoShare();

    }

    public function getTagVideoEmbed($width = 560, $height = 315, $frameborder = 0, $suggestvideo = true, $controls = true, $showinfo = true, $privacidade = false)
    {

        return $this->renderThumbnailTagVideoEmbed($width, $height, $frameborder, $suggestvideo, $controls, $showinfo, $privacidade);

    }

}