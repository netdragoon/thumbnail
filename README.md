##Thumbnail and Video Embed e Share You Tube

[![Canducci Thumbnail](http://i1194.photobucket.com/albums/aa377/netdragoon1/1449170629_Neon_Line_Social_Circles_50Icon_10px_grid-45_zpsjazbo2dc.png)](https://packagist.org/packages/canducci/thumbnail)

[![Build Status](https://travis-ci.org/netdragoon/thumbnail.svg)](https://travis-ci.org/netdragoon/thumbnail)
[![Latest Stable Version](https://poser.pugx.org/canducci/thumbnail/v/stable)](https://packagist.org/packages/canducci/thumbnail) 
[![Total Downloads](https://poser.pugx.org/canducci/thumbnail/downloads)](https://packagist.org/packages/canducci/thumbnail) 
[![Latest Unstable Version](https://poser.pugx.org/canducci/thumbnail/v/unstable)](https://packagist.org/packages/canducci/thumbnail) 
[![License](https://poser.pugx.org/canducci/thumbnail/license)](https://packagist.org/packages/canducci/thumbnail)

## Quick start

### Required setup

In the `require` key of `composer.json` file add the following

```PHP
"canducci/thumbnail": "dev-master"

```

Run the Composer update comand

    $ composer update

In your `config/app.php` add `Canducci\Thumbnail\Providers\ThumbnailServiceProvider::class` to the end of the `providers` array:

```PHP
'providers' => array(
    ...,
    Canducci\Thumbnail\Providers\ThumbnailServiceProvider::class

),
```

At the end of `config/app.php` add `'Thumbnail' => 'Canducci\Thumbnail\Facades\Thumbnail::class'` to the `aliases` array:

```PHP

'aliases' => array(
    ...,
    'Thumbnail'   => Canducci\Thumbnail\Facades\Thumbnail::class

),

```

--
##How to Use

To use is very simple, pass the ZIP and calls the various types of returns, like this:

__Package ZipCode__

##Simply Instance
__Add namespace:__

```PHP
use Canducci\Thumbnail\Thumbnail;
```
__Code Example__
```PHP
$thumb = new Thumbnail('address_video_youtube');

```

##Facade

__Add namespace:__
```PHP
use Canducci\Thumbnail\Facades\Thumbnail;

```
__Code Example__
```PHP
$thumb = Thumbnail::setUrl('address_video_youtube');

```

##Helper

```PHP
$thumb = thumbnail('address_video_youtube');

```

##Injection

__Add Namespace__

```PHP
use Canducci\Thumbnail\Contracts\ThumbnailContract;

```

__Code Example__

```PHP
public function index(ThumbnailContract $thumbnail)
{

      $thumb = $thumbnail->setUrl('address_video_youtube');
      
```

## Summary of How to Use

__Code__

```PHP 

$thumb = ZipCode::setUrl('address_video_youtube'); //Facade

$thumb = $zipcode->setUrl('address_video_youtube'); //Contracts

$thumb = thumbnail('address_video_youtube'); // Helper

$thumb = new Thumbnail('address_video_youtube'); //Simply instance
```