<?php

class ThumbnailTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }
    public function getThumbnail()
    {

        return $this->app->make('Canducci\Thumbnail\Contracts\ThumbnailContract');

    }

    public function testInstance()
    {

        $this->assertInstanceOf('Canducci\Thumbnail\Contracts\ThumbnailContract',
            $this->getThumbnail());

    }

}