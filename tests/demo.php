<?php
require __DIR__ . '/../vendor/autoload.php';

$config = [
    'accessKey' => '',
    'appId' => 'default',
];
// 文本监测
$params = [
    'eventId' => 'nickname',
    'type' => 'TEXTRISK',
    'data' => [
        'text' => '违禁词',
        'tokenId' => '0'
    ]
];
var_dump(Shumei\Shumei\Factory\Factory::text($config)->check($params));exit;

// 图片监测
//$params = [
//    'eventId' => 'headImage',
//    'type' => 'POLITY_EROTIC_VIOLENT_ADVERT_QRCODE_IMGTEXTRISK',
//    'data' => [
//        'img' => 'https://image.nnwmkj.com/updates/2024/08/06/ZxHJBdT0DGi3T9JoKIei3GD2WdhuETqagbqbFU3K.jpg',
//        'tokenId' => '0'
//    ]
//];
//var_dump(Shumei\Shumei\Factory\Factory::image($config)->check($params));exit;


// 多图片监测
//$params = [
//    'eventId' => 'headImage',
//    'type' => 'POLITY_EROTIC_VIOLENT_ADVERT_QRCODE_IMGTEXTRISK',
//    'data' => [
//        'imgs' => [
//            [
//                'btId' => 1,
//                'img' => 'https://image.nnwmkj.com/updates/2024/08/06/ZxHJBdT0DGi3T9JoKIei3GD2WdhuETqagbqbFU3K.jpg',
//            ],
//            [
//                'btId' => 2,
//                'img' => 'https://image.nnwmkj.com/updates/2024/08/06/SvI9hxhsvrWL8I6W6DRUuE2NsxGT42yelZFiPcR9.jpg',
//            ]
//        ],
//        'tokenId' => '0'
//    ]
//];
//var_dump(Shumei\Shumei\Factory\Factory::image($config)->checkBatch($params));exit;

// 音频监测
//$params = [
//    'eventId' => 'message',
//    'btId' => 'test1',
//    'type' => 'POLITICAL_PORN_AD_ABUSE_MOAN',
//    'contentType' => 'URL',
//    'content' => 'https://peique-1318387147.cos.ap-guangzhou.myqcloud.com/dev/user_audio/2024/07/29/LrRnnEgomA54bvsmowQu8Rqnsg5ZUMy6mls3hht0.m4a',
//    'data' => ['tokenId' => '0']
//];
//var_dump(Shumei\Shumei\Factory\Factory::audio($config)->check($params));exit;


// 视频监测
//$params = [
//    'eventId' => 'message',
//    'type' => 'POLITICAL_PORN_AD_ABUSE_MOAN',
//    'contentType' => 'URL',
//    'imgType' => 'POLITY_EROTIC_VIOLENT_ADVERT_QRCODE_IMGTEXTRISK',
//    'audioType' => 'POLITY_EROTIC_ADVERT_MOAN_DIRTY',
//    'data' => ['btId'=>'test2','tokenId' => '0','url' => 'https://peique-1318387147.cos.ap-guangzhou.myqcloud.com/dev/video_show/2024/07/30/x9EeridxkdYQsp7MWo7IU5U5mnZG1C5hNFzfDrKs.mp4']
//];
//var_dump(Shumei\Shumei\Factory\Factory::video($config)->check($params));exit;