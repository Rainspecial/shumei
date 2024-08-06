<?php
namespace Shumei\Shumei\Factory;

use Shumei\Shumei\Service\TextService;
use Shumei\Shumei\Service\ImageService;
use Shumei\Shumei\Service\AudioService;
use Shumei\Shumei\Service\VideoService;

class Factory
{
    const ServiceMap = [
        'text'  => TextService::class, // 文档：https://help.ishumei.com/docs/tj/text/newest/developDoc
        'image' => ImageService::class, // 文档：https://help.ishumei.com/docs/tj/image/newest/developDoc
        'audio' => AudioService::class, // 文档：https://help.ishumei.com/docs/tj/audio/newest/developDoc#%E5%BC%82%E6%AD%A5%E6%8E%A5%E5%8F%A3
        'video' => VideoService::class, // 文档：https://help.ishumei.com/docs/tj/video/newest/developDoc/
    ];

    public static function makeService(string $service, array $arguments)
    {
        try {
            $path = self::ServiceMap[$service];
            return new $path($arguments);
        } catch (Throwable $exception) {
            echo 'shumei.service.exception'.$exception->getMessage();
        }
    }

    /**
     * Dynamically pass methods to the application.
     * @throws Throwable
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return self::makeService($name, $arguments[0] ?? []);
    }
}