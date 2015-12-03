<?php namespace Canducci\Thumbnail;

abstract class ThumbnailUrl
{
    const URLDefault = "http://i1.ytimg.com/vi/%s/%s.jpg";
    const URLShare = "https://youtu.be/%s";
    const URLEmbed = "https://www.youtube.com/embed/%s";
    const URLEmbedPrivacidade = "https://www.youtube-nocookie.com/embed/%s";

}