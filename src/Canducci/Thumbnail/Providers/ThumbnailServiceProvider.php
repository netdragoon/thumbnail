<?php namespace Canducci\Thumbnail\Providers;

use Illuminate\Support\ServiceProvider;

class ThumbnailServiceProvider extends ServiceProvider
{

    public function register()
    {

        $this->app->bind
        (
            'Canducci\Thumbnail\Contracts\ThumbnailContract',
            'Canducci\Thumbnail\Thumbnail'
        );

    }

}