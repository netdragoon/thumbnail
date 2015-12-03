<?php namespace Canducci\Thumbnail\Providers;

use Illuminate\Support\ServiceProvider;

class ThumbnailServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(
            'Canducci\Thumbnail\Contracts\ThumbnailContract',
            'Canducci\Thumbnail\Thumbnail'
        );

    }
}