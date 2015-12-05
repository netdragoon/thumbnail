<?php namespace Canducci\Thumbnail;

abstract class ThumbnailUrl
{

    const URLDefault = "http://i1.ytimg.com/vi/%s/%s.jpg";

    const URLShare = "https://youtu.be/%s";

    const URLEmbed = "https://www.youtube.com/embed/%s";

    const URLEmbedPrivacidade = "https://www.youtube-nocookie.com/embed/%s";

    const URLInfo = "http://www.youtube.com/get_video_info?el=detailpage&ps=default&eurl=&gl=US&hl=en&sts=15888&video_id=%s&asv=2";

}