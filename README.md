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
"canducci/thumbnail": "0.1.*"

```

Run the Composer update command

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

$thumb = Thumbnail::setUrl('address_video_youtube'); //Facade

$thumb = $Thumbnail->setUrl('address_video_youtube'); //Contracts

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

###All methods of thumbnails to picture:

```PHP
public function getPictureDefault();
public function getPicture0();
public function getPicture1();
public function getPicture2();
public function getPicture3();
public function getPictureStandard();
public function getPictureMediumQuality();
public function getPictureHighQuality();
public function getPictureMaximumResolution();

```

__These methods are represented by class__ `ThumbnailPicture`:

```PHP
public function getUrl();
public function save($path);
public function getFileWeb($path);
public function toArray();
public function toJson();
```

__All methods of__ `class Thumbnail`__:__

```PHP
public function getUrl();
public function getCode();
public function setUrl($url);
public function getPictureDefault();
public function getPicture0();
public function getPicture1();
public function getPicture2();
public function getPicture3();
public function getPictureStandard();
public function getPictureMediumQuality();
public function getPictureHighQuality();
public function getPictureMaximumResolution();
public function getUrlVideoShare();
public function getTagVideoEmbed($width = 560, $height = 315, 
	$frameborder = 0, $suggestvideo = true, $controls = true, 
	$showinfo = true, $privacidade = false);
public function getInformationVideo();
public function savePictures($path);
public function getPictures();
public function toArray();
public function toJson();


```

###In addition to the part of the thumbnail you have to share part and embed video with these two methods:

```PHP
//share
public function getUrlVideoShare(); // return link share

//embed
public function getTagVideoEmbed($width = 560, $height = 315,  
  $frameborder = 0, $suggestvideo = true, $controls = true, $showinfo = true, 
  $privacidade = false); //return tag frame
```


###How to use:

___Helper___
```PHP
Route::get('thumb', function()
{
	$thumb    = thumbnail('address_video_youtube');
	$picture0 = $thumb->getPicture0();
	$picture0->save('t/');
	echo $picture0->getFileWeb('t/');
});
```

___Contract - Injection___
```PHP
use Canducci\Thumbnail\Contracts\ThumbnailContract;
Route::get('thumb1', function(ThumbnailContract $thumb)
{	
	$thumb->setUrl('address_video_youtube');
	$picture0 = $thumb->getPicture0();
	$picture0->save('t/');
	echo $picture0->getFileWeb('t/');
});
```

___Facade___
```PHP
use Canducci\Thumbnail\Facades\Thumbnail;
Route::get('thumb2', function()
{	
	$thumb = Thumbnail::setUrl('address_video_youtube');
	$picture0 = $thumb->getPicture0();
	$picture0->save('t/');
	echo $picture0->getFileWeb('t/');
});
```

___Simply Instance___

#####1 - Save one thumbnail

```PHP
use Canducci\Thumbnail\Thumbnail as Thumb;
Route::get('thumb3', function()
{	
	$thumb = new Thumb('address_video_youtube');
	$picture0 = $thumb->getPicture0();
	$picture0->save('t/');
	echo $picture0->getFileWeb('t/');
});
```

#####2 - Save all thumbnail

```PHP
use Canducci\Thumbnail\Thumbnail as Thumb;
Route::get('thumb4', function()
{	
	$thumb = new Thumb('address_video_youtube');
	$thumb->savePictures('t/');	
	echo $thumb->getPicture0()->getFileWeb('t/');
});
```
__Note:__ `t/` is folder.

___Video Share and Embed___

```PHP
use Canducci\Thumbnail\Thumbnail as Thumb;
Route::get('thumb5', function()
{	
	$thumb = new Thumb('address_video_youtube');
	echo $thumb->getUrlVideoShare();
	echo '<br>';	
	echo $thumb->getTagVideoEmbed();
});
```

__The method__ `getInformationVideo()` __has a detailed option information of the informed youtube link:__

```PHP
$thumb = thumbnail('address_video_youtube');
return $thumb->getInformationVideo()->toArray(); 
//or
return $thumb->getInformationVideo()->toJson();
```

The ` getInformationVideo ()` to return to `class ThumbnailInformation` that has the following methods:
```PHP
public function getAuthor();
public function setAuthor($author);
public function getTitle();
public function setTitle($title);
public function getVideoId();
public function setVideoId($video_id);
public function getHostLanguage();
public function setHostLanguage($host_language);
public function getKeywords();
public function setKeywords($keywords);
public function getTimestamp();
public function setTimestamp($timestamp);
public function getLengthSeconds();
public function setLengthSeconds($length_seconds);
public function getViewCount();
public function setViewCount($view_count);
public function getThumbnail();
public function setThumbnail($thumbnail);
public function getAdaptiveFmts();
public function setAdaptiveFmts(IThumbnailAdaptiveFmtsCollection $adaptive_fmts);
public function getUrlEncodedFmtStreamMap();
public function setUrlEncodedFmtStreamMap(IThumbnailUrlEncodedFmtStreamMapCollection $url_encoded_fmt_stream_map);
public function toArray();
public function toJson();
```

___The return of this method is (JSON):___

```JSON
{
    "author": "NAME",
    "title": "TITLE",
    "video_id": "ID",
    "host_language": "en",
    "keywords": "keys",
    "timestamp": 1449443608,
    "length_seconds": 649,
    "view_count": 10000,
    "thumbnail": [
        {
            "id": "default",
            "url": "http:\/\/i1.ytimg.com\/vi\/xtzxYWz0D_a\/default.jpg",
            "code": "xtzxYWz0D_k"
        },
        {
            "id": "0",
            "url": "http:\/\/i1.ytimg.com\/vi\/xtzxYWz0D_a\/0.jpg",
            "code": "xtzxYWz0D_k"
        },
        {
            "id": "1",
            "url": "http:\/\/i1.ytimg.com\/vi\/xtzxYWz0D_a\/1.jpg",
            "code": "xtzxYWz0D_k"
        },
        {
            "id": "2",
            "url": "http:\/\/i1.ytimg.com\/vi\/xtzxYWz0D_a\/2.jpg",
            "code": "xtzxYWz0D_k"
        },
        {
            "id": "3",
            "url": "http:\/\/i1.ytimg.com\/vi\/xtzxYWz0D_a\/3.jpg",
            "code": "xtzxYWz0D_k"
        },
        {
            "id": "sddefault",
            "url": "http:\/\/i1.ytimg.com\/vi\/xtzxYWz0D_a\/sddefault.jpg",
            "code": "xtzxYWz0D_k"
        },
        {
            "id": "hqdefault",
            "url": "http:\/\/i1.ytimg.com\/vi\/xtzxYWz0D_a\/hqdefault.jpg",
            "code": "xtzxYWz0D_k"
        },
        {
            "id": "hqdefault",
            "url": "http:\/\/i1.ytimg.com\/vi\/xtzxYWz0D_a\/hqdefault.jpg",
            "code": "xtzxYWz0D_k"
        },
        {
            "id": "maxresdefault",
            "url": "http:\/\/i1.ytimg.com\/vi\/xtzxYWz0D_a\/maxresdefault.jpg",
            "code": "xtzxYWz0D_k"
        }
    ],
    "adaptive_fmts": [
        {
            "init": "0-714",
            "itag": "137",
            "clen": "211788328",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D137%26ms%3Dau%26mime%3Dvideo%252Fmp4%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.666%26ipbits%3D0%26gir%3Dyes%26clen%3D211788328%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449153630142647%26source%3Dyoutube%26signature%3DE1FB81EC520AB8CD4C4FB0B26F95C8A30E957726.1E0D711CC7742D4A121CA5D6A2B1FE4889A9C07D%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "30",
            "lmt": "1449153630142647",
            "size": "1920x1080",
            "projection_type": "1",
            "quality_label": "1080p",
            "index": "715-2210",
            "bitrate": "3876851",
            "type": "video%2Fmp4%3B+codecs%3D%22avc1.640028%22"
        },
        {
            "init": "0-242",
            "itag": "248",
            "clen": "137943527",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D248%26ms%3Dau%26mime%3Dvideo%252Fwebm%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.633%26ipbits%3D0%26gir%3Dyes%26clen%3D137943527%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449157235026679%26source%3Dyoutube%26signature%3D6EC6D4343097CA1C74248FDB650293B8F9175E56.92BE104A2B9039BFD3F20055ED4435D8D279A7B7%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "30",
            "lmt": "1449157235026679",
            "size": "1920x1080",
            "projection_type": "1",
            "quality_label": "1080p",
            "index": "243-2411",
            "bitrate": "2621612",
            "type": "video%2Fwebm%3B+codecs%3D%22vp9%22"
        },
        {
            "init": "0-713",
            "itag": "136",
            "clen": "108400599",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D136%26ms%3Dau%26mime%3Dvideo%252Fmp4%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.666%26ipbits%3D0%26gir%3Dyes%26clen%3D108400599%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449153219182005%26source%3Dyoutube%26signature%3DD67C82EFEABFB784616EC7C3E5BC63BD6B5C2B5E.BE7EE15587D2622DD124EBD7F4707579549784D1%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "30",
            "lmt": "1449153219182005",
            "size": "1280x720",
            "projection_type": "1",
            "quality_label": "720p",
            "index": "714-2209",
            "bitrate": "2072216",
            "type": "video%2Fmp4%3B+codecs%3D%22avc1.4d401f%22"
        },
        {
            "init": "0-242",
            "itag": "247",
            "clen": "79047294",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D247%26ms%3Dau%26mime%3Dvideo%252Fwebm%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.633%26ipbits%3D0%26gir%3Dyes%26clen%3D79047294%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449157695509870%26source%3Dyoutube%26signature%3D74F8A93DBBE89707B71B1FD5276800A92AC5B6E7.049ECBD66A137E6B704E348CC41A87A0CD69F948%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "30",
            "lmt": "1449157695509870",
            "size": "1280x720",
            "projection_type": "1",
            "quality_label": "720p",
            "index": "243-2398",
            "bitrate": "1569917",
            "type": "video%2Fwebm%3B+codecs%3D%22vp9%22"
        },
        {
            "init": "0-714",
            "itag": "135",
            "clen": "55817747",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D135%26ms%3Dau%26mime%3Dvideo%252Fmp4%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.666%26ipbits%3D0%26gir%3Dyes%26clen%3D55817747%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449153209641811%26source%3Dyoutube%26signature%3D192BEFE66F4BB84E0ACCB1FE68BF98EF20D6DC2A.2C17A5C8A9492154F4C98F004CC40AB96E26EF91%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "30",
            "lmt": "1449153209641811",
            "size": "854x480",
            "projection_type": "1",
            "quality_label": "480p",
            "index": "715-2210",
            "bitrate": "1106709",
            "type": "video%2Fmp4%3B+codecs%3D%22avc1.4d401f%22"
        },
        {
            "init": "0-242",
            "itag": "244",
            "clen": "42322567",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D244%26ms%3Dau%26mime%3Dvideo%252Fwebm%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.633%26ipbits%3D0%26gir%3Dyes%26clen%3D42322567%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449157691555098%26source%3Dyoutube%26signature%3D04C4C477DD4054B895BE3013C850172D5CC24404.9A01350799A603ECCCC6F605ED85FB2EECE0B27C%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "30",
            "lmt": "1449157691555098",
            "size": "854x480",
            "projection_type": "1",
            "quality_label": "480p",
            "index": "243-2372",
            "bitrate": "823328",
            "type": "video%2Fwebm%3B+codecs%3D%22vp9%22"
        },
        {
            "init": "0-714",
            "itag": "134",
            "clen": "27818124",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D134%26ms%3Dau%26mime%3Dvideo%252Fmp4%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.666%26ipbits%3D0%26gir%3Dyes%26clen%3D27818124%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449153223061070%26source%3Dyoutube%26signature%3D4DF64241EF5211C87E45F1DD4A6D339D80327FA2.8FE0CD619FFE04316F3E0CD5582F0771356B7DF2%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "30",
            "lmt": "1449153223061070",
            "size": "640x360",
            "projection_type": "1",
            "quality_label": "360p",
            "index": "715-2210",
            "bitrate": "605041",
            "type": "video%2Fmp4%3B+codecs%3D%22avc1.4d401e%22"
        },
        {
            "init": "0-242",
            "itag": "243",
            "clen": "26141161",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D243%26ms%3Dau%26mime%3Dvideo%252Fwebm%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.633%26ipbits%3D0%26gir%3Dyes%26clen%3D26141161%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449157690089069%26source%3Dyoutube%26signature%3D88F8394D072193D96A5972E0E6388A0A7208D6E7.5526C242C64F3421EFDA4678B89B33AA0233268E%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "30",
            "lmt": "1449157690089069",
            "size": "640x360",
            "projection_type": "1",
            "quality_label": "360p",
            "index": "243-2346",
            "bitrate": "471243",
            "type": "video%2Fwebm%3B+codecs%3D%22vp9%22"
        },
        {
            "init": "0-676",
            "itag": "133",
            "clen": "19883518",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D133%26ms%3Dau%26mime%3Dvideo%252Fmp4%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.666%26ipbits%3D0%26gir%3Dyes%26clen%3D19883518%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449153242401406%26source%3Dyoutube%26signature%3D133B97E2BB28A6EC338487DCDC823C708084E708.C8EBBE4C56E869E533347FFE19A5C21B4F384EE5%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "30",
            "lmt": "1449153242401406",
            "size": "426x240",
            "projection_type": "1",
            "quality_label": "240p",
            "index": "677-2172",
            "bitrate": "300612",
            "type": "video%2Fmp4%3B+codecs%3D%22avc1.4d4015%22"
        },
        {
            "init": "0-241",
            "itag": "242",
            "clen": "14781235",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D242%26ms%3Dau%26mime%3Dvideo%252Fwebm%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.633%26ipbits%3D0%26gir%3Dyes%26clen%3D14781235%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449157689576801%26source%3Dyoutube%26signature%3D976004113BC9E0C64F919A1D22734E98B5CC81B8.63BF5B81DA1D4120BC49728B7BC09890B706D44C%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "30",
            "lmt": "1449157689576801",
            "size": "426x240",
            "projection_type": "1",
            "quality_label": "240p",
            "index": "242-2305",
            "bitrate": "256722",
            "type": "video%2Fwebm%3B+codecs%3D%22vp9%22"
        },
        {
            "init": "0-676",
            "itag": "160",
            "clen": "8848003",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D160%26ms%3Dau%26mime%3Dvideo%252Fmp4%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.666%26ipbits%3D0%26gir%3Dyes%26clen%3D8848003%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449153204577828%26source%3Dyoutube%26signature%3D133155AC1ECDAD80651C1816BD33616F1664A095.2DC0A8C7562A83E1DABFBDEBE1C82F691273D451%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "15",
            "lmt": "1449153204577828",
            "size": "256x144",
            "projection_type": "1",
            "quality_label": "144p",
            "index": "677-2172",
            "bitrate": "118889",
            "type": "video%2Fmp4%3B+codecs%3D%22avc1.42c00c%22"
        },
        {
            "init": "0-241",
            "itag": "278",
            "clen": "8288489",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D278%26ms%3Dau%26mime%3Dvideo%252Fwebm%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.600%26ipbits%3D0%26gir%3Dyes%26clen%3D8288489%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449157689469356%26source%3Dyoutube%26signature%3DB1878A56BC7C9A9C4379AB56CBA8EDF0F61650B6.A9BBBE67E95AE3CD5309C7A393D32ED1ADA3C5F2%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": "15",
            "lmt": "1449157689469356",
            "size": "256x144",
            "projection_type": "1",
            "quality_label": "144p",
            "index": "242-2305",
            "bitrate": "126263",
            "type": "video%2Fwebm%3B+codecs%3D%22vp9%22"
        },
        {
            "init": "0-591",
            "itag": "140",
            "clen": "10303964",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D140%26ms%3Dau%26mime%3Daudio%252Fmp4%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.742%26ipbits%3D0%26gir%3Dyes%26clen%3D10303964%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449153198897771%26source%3Dyoutube%26signature%3D3516B541AC31D2EC2DB8EC1C14BA80F4A8186B9E.E18F93798F2ED03874642FA400A524DF62633772%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": 0,
            "lmt": "1449153198897771",
            "size": 0,
            "projection_type": "1",
            "quality_label": 0,
            "index": "592-1403",
            "bitrate": "128536",
            "type": "audio%2Fmp4%3B+codecs%3D%22mp4a.40.2%22"
        },
        {
            "init": "0-4451",
            "itag": "171",
            "clen": "7335542",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D171%26ms%3Dau%26mime%3Daudio%252Fwebm%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.686%26ipbits%3D0%26gir%3Dyes%26clen%3D7335542%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449156584362444%26source%3Dyoutube%26signature%3DAB4DCD6E2D836971A1ECA853D0746B1A59F63CC4.1E128A0593EE47AACCAC7BF7102CAE8B43B9A075%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": 0,
            "lmt": "1449156584362444",
            "size": 0,
            "projection_type": "1",
            "quality_label": 0,
            "index": "4452-5553",
            "bitrate": "115261",
            "type": "audio%2Fwebm%3B+codecs%3D%22vorbis%22"
        },
        {
            "init": "0-271",
            "itag": "249",
            "clen": "4143213",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D249%26ms%3Dau%26mime%3Daudio%252Fwebm%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.701%26ipbits%3D0%26gir%3Dyes%26clen%3D4143213%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449156586497223%26source%3Dyoutube%26signature%3DDFA20B466241CA6DF5B2983339EBC96ED87D9ED7.92E86AC99388B63DDD55E115882DA3E38FA5B14D%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": 0,
            "lmt": "1449156586497223",
            "size": 0,
            "projection_type": "1",
            "quality_label": 0,
            "index": "272-1373",
            "bitrate": "53456",
            "type": "audio%2Fwebm%3B+codecs%3D%22opus%22"
        },
        {
            "init": "0-271",
            "itag": "250",
            "clen": "4926274",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D250%26ms%3Dau%26mime%3Daudio%252Fwebm%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.701%26ipbits%3D0%26gir%3Dyes%26clen%3D4926274%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449156582287701%26source%3Dyoutube%26signature%3DB9A80710799111E94FBEE91C189B454AAC4C2BA1.0934376C66D7BA4F6B74721015D9D23125EE82AD%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": 0,
            "lmt": "1449156582287701",
            "size": 0,
            "projection_type": "1",
            "quality_label": 0,
            "index": "272-1373",
            "bitrate": "71881",
            "type": "audio%2Fwebm%3B+codecs%3D%22opus%22"
        },
        {
            "init": "0-271",
            "itag": "251",
            "clen": "8933688",
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26keepalive%3Dyes%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Dclen%252Cdur%252Cgir%252Cid%252Cip%252Cipbits%252Citag%252Ckeepalive%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D251%26ms%3Dau%26mime%3Daudio%252Fwebm%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.701%26ipbits%3D0%26gir%3Dyes%26clen%3D8933688%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449156581777407%26source%3Dyoutube%26signature%3D011B02ED878A90DBBCD374F228B1BE900E2546BA.6E8C9FFF3C11957BBBCEE3BBB378389613EBB5F5%26upn%3DP_slCn2AvEk%26mv%3Du",
            "fps": 0,
            "lmt": "1449156581777407",
            "size": 0,
            "projection_type": "1",
            "quality_label": 0,
            "index": "272-1373",
            "bitrate": "137945",
            "type": "audio%2Fwebm%3B+codecs%3D%22opus%22"
        }
    ],
    "url_encoded_fmt_stream_map": [
        {
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Ddur%252Cid%252Cip%252Cipbits%252Citag%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Cratebypass%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D22%26ms%3Dau%26mime%3Dvideo%252Fmp4%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.742%26ipbits%3D0%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449153738774720%26source%3Dyoutube%26signature%3D88E00D139B3A4B621D3D07A5514617A51B6BF4C3.59B83BBB572654369DCC4FE0E987AF820C3616F9%26ratebypass%3Dyes%26upn%3DP_slCn2AvEk%26mv%3Du",
            "quality": "hd720",
            "itag": "22",
            "fallback_host": "tc.v22.cache2.googlevideo.com",
            "type": "video%2Fmp4%3B+codecs%3D%22avc1.64001F%2C+mp4a.40.2%22"
        },
        {
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Ddur%252Cid%252Cip%252Cipbits%252Citag%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Cratebypass%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D43%26ms%3Dau%26mime%3Dvideo%252Fwebm%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D0.000%26ipbits%3D0%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449156291939994%26source%3Dyoutube%26signature%3D2EA8E6644AD0609003F93611010D352B4A645F53.781BE82055F9D772E938394574ECAADF367BFF42%26ratebypass%3Dyes%26upn%3DP_slCn2AvEk%26mv%3Du",
            "quality": "medium",
            "itag": "43",
            "fallback_host": "tc.v21.cache5.googlevideo.com",
            "type": "video%2Fwebm%3B+codecs%3D%22vp8.0%2C+vorbis%22"
        },
        {
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fexpire%3D1449465208%26sver%3D3%26key%3Dyt6%26mm%3D31%26ip%3D187.74.0.5%26mn%3Dsn-upfn-bg0s%26sparams%3Ddur%252Cid%252Cip%252Cipbits%252Citag%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Cratebypass%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26pl%3D16%26itag%3D18%26ms%3Dau%26mime%3Dvideo%252Fmp4%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.742%26ipbits%3D0%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26lmt%3D1449152199003392%26source%3Dyoutube%26signature%3D578E018E6F5BC3D5125B736EE785A088C4F60B13.6941F8AE760F27D3793020768AF7B12FBE0556F6%26ratebypass%3Dyes%26upn%3DP_slCn2AvEk%26mv%3Du",
            "quality": "medium",
            "itag": "18",
            "fallback_host": "tc.v1.cache8.googlevideo.com",
            "type": "video%2Fmp4%3B+codecs%3D%22avc1.42001E%2C+mp4a.40.2%22"
        },
        {
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fipbits%3D0%26expire%3D1449465208%26mime%3Dvideo%252Fx-flv%26mm%3D31%26source%3Dyoutube%26mn%3Dsn-upfn-bg0s%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26sver%3D3%26sparams%3Ddur%252Cid%252Cip%252Cipbits%252Citag%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26upn%3DP_slCn2AvEk%26pl%3D16%26itag%3D5%26signature%3DABEE9E10AE1FB4366F5201153BF6B8376A28DBD5.5D693D0F202D66E14B273AC4B8CF2CF2546E5140%26ms%3Dau%26ip%3D187.74.0.5%26lmt%3D1449152207906509%26mv%3Du%26key%3Dyt6%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.725",
            "quality": "small",
            "itag": "5",
            "fallback_host": "tc.v1.cache5.googlevideo.com",
            "type": "video%2Fx-flv"
        },
        {
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fipbits%3D0%26expire%3D1449465208%26mime%3Dvideo%252F3gpp%26mm%3D31%26source%3Dyoutube%26mn%3Dsn-upfn-bg0s%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26sver%3D3%26sparams%3Ddur%252Cid%252Cip%252Cipbits%252Citag%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26upn%3DP_slCn2AvEk%26pl%3D16%26itag%3D36%26signature%3D16088C87E45297CFDC0658FFE1AC65BD037D2013.02CABB71D0AE37BE6D9DD6DB62F4183155A48ED0%26ms%3Dau%26ip%3D187.74.0.5%26lmt%3D1449152163968650%26mv%3Du%26key%3Dyt6%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.811",
            "quality": "small",
            "itag": "36",
            "fallback_host": "tc.v18.cache7.googlevideo.com",
            "type": "video%2F3gpp%3B+codecs%3D%22mp4v.20.3%2C+mp4a.40.2%22"
        },
        {
            "url": "http%3A%2F%2Fr2---sn-upfn-bg0s.googlevideo.com%2Fvideoplayback%3Fipbits%3D0%26expire%3D1449465208%26mime%3Dvideo%252F3gpp%26mm%3D31%26source%3Dyoutube%26mn%3Dsn-upfn-bg0s%26fexp%3D9408710%252C9416126%252C9417683%252C9420452%252C9422596%252C9422618%252C9423460%252C9423662%26sver%3D3%26sparams%3Ddur%252Cid%252Cip%252Cipbits%252Citag%252Clmt%252Cmime%252Cmm%252Cmn%252Cms%252Cmv%252Cpl%252Csource%252Cupn%252Cexpire%26mt%3D1449443023%26upn%3DP_slCn2AvEk%26pl%3D16%26itag%3D17%26signature%3D9B0B5A4FEACB21037E88CBAFFFD6D8D194568991.D98DE37FC50303C970468E0A44132CA0E895CF2E%26ms%3Dau%26ip%3D187.74.0.5%26lmt%3D1449152160480537%26mv%3Du%26key%3Dyt6%26id%3Do-AERgl2KlsTtGdzKp4iTBJ64TYWJcm72b65Knfa4ceWd0%26dur%3D648.811",
            "quality": "small",
            "itag": "17",
            "fallback_host": "tc.v20.cache5.googlevideo.com",
            "type": "video%2F3gpp%3B+codecs%3D%22mp4v.20.3%2C+mp4a.40.2%22"
        }
    ]
}
```