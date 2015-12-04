<?php namespace Canducci\Thumbnail;

abstract class ThumbnailClient
{

    public static function saveImage($url, $path, $id, $code)
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

}