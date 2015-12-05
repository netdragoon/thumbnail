<?php namespace Canducci\Thumbnail;

abstract class ThumbnailClient
{

    public static function save($url, $path, $id, $code)
    {

        $filename = sprintf("%s%s-%s%s", $path, $code, $id, ".jpg");

        if (!file_exists($filename))
        {

            $ch = curl_init($url);

            $fp = fopen($filename, 'wb');

            curl_setopt($ch, CURLOPT_FILE, $fp);

            curl_setopt($ch, CURLOPT_HEADER, 0);

            curl_exec($ch);

            curl_close($ch);

            fclose($fp);

            return true;

        }

        return false;

    }

    public static function get($url)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $data = curl_exec($ch);

        curl_close($ch);

        return $data;

    }

}