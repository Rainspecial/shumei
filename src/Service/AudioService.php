<?php


namespace Shumei\Shumei\Service;

class AudioService extends BaseService
{

    const URL = 'http://api-audio-sh.fengkongcloud.com/audio/';
    const VERSION = 'v4';

    public function __construct($config)
    {
        $config['version'] = self::VERSION;
        $config['url'] = self::URL;
        $this->config = $config;
    }

    public function check($params)
    {
        $params['accessKey'] = $this->config['accessKey'];
        $params['appId'] = $this->config['appId'];
        $params['callback'] = $this->config['callback']; // 回调地址
        $client = new \GuzzleHttp\Client([
            'timeout' => 3,
            'headers' => ['Content-Type' => 'application/json; charset=utf-8'],
        ]);
        $response = $client->request('POST', $this->config['url'].$this->config['version'], [
            'body' => json_encode($params),
        ]);
        $result = json_decode($response->getBody(), true);
        if ($this->checkResult($result)) {
            return $result;
        }
        return false;
    }

}