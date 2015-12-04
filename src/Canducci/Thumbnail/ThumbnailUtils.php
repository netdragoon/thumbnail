<?php namespace Canducci\Thumbnail;

abstract class ThumbnailUtils
{

    public static function saveImage($url, $path, $id, $code)
    {

        $filename = self::webPath($path, $id, $code);

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

    public static function webPath($path, $id, $code)
    {

        return sprintf("%s%s-%s%s", $path, $code, $id, ".jpg");

    }

}