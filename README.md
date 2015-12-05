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


###To make optimization of the thumbnails in two ways:

```PHP

$thumb = thumbnail('address_video_youtube');

$thumb->savePictures('thumbnail/');

```
###Or individually each thumbnail in this way:

```PHP

$thumb = thumbnail('address_video_youtube');

$thumb->getPicture0()->save('thumbs/');

```

___Note: only inform the folder name , the names are generated automatically and are also redeemed automatically .___

```PHP
$thumb = thumbnail('address_video_youtube');

$pathWeb = $thumb->getPicture0()->getFileWeb('thumbs/');

//result '/thumbs/xtzxYWz0D_9-0.jpg';

```

###If you prefer you can use the http (without optimization, but functional) to display the thumbnail :

```PHP
$thumb = thumbnail('address_video_youtube');

$pathWeb = $thumb->getPicture0()->getUrl();

//result 'http://i1.ytimg.com/vi/xtzxYWz0D_9/0.jpg';
```

###All methods of thumbnails:

```PHP
abstract public function getPictureDefault();
abstract public function getPicture0();
abstract public function getPicture1();
abstract public function getPicture2();
abstract public function getPicture3();
abstract public function getPictureStandard();
abstract public function getPictureMediumQuality();
abstract public function getPictureHighQuality();
abstract public function getPictureMaximumResolution();

```

__These methods are represented by class__ `ThumbnailPicture`:

```PHP
abstract public function getUrl();
abstract public function save($path);
abstract public function getFileWeb($path);
abstract public function toArray();
abstract public function toJson();
```

###In addition to the part of the thumbnail you have to share part and embed video with these two methods:

```PHP
//share
abstract public function getUrlVideoShare(); // return link share

//embed
abstract public function getTagVideoEmbed($width = 560, $height = 315,  
  $frameborder = 0, $suggestvideo = true, $controls = true, $showinfo = true, 
  $privacidade = false); //return tag frame
```
