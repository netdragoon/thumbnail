<?php namespace Canducci\Thumbnail\Facades;

use Illuminate\Support\Facades\Facade;

class Thumbnail extends Facade
{

    protected static function getFacadeAccessor()
    {

        return 'Canducci\Thumbnail\Contracts\ThumbnailContract';

    }

}