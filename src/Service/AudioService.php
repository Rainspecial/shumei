<?php


namespace Shumei\Shumei\Service;

class AudioService extends BaseService
{

    const URL = 'http://api-audio-sh.fengkongcloud.com/audio/';

    const SYNC_URL = 'http://api-audio-sh.fengkongcloud.com/audiomessage/';
    const VERSION = 'v4';

    public function __construct($config)
    {
        $config['version'] = self::VERSION;
        $config['url'] = self::URL;
        $config['syn_url'] = self::SYNC_URL;
        $this->config = $config;
    }

    public function check($params)
    {
        $params['accessKey'] = $this->config['accessKey'];
        $params['appId'] = $this->config['appId'];
        $params['callback'] = $this->config['callback']; // 回调地址
        $client = new \GuzzleHttp\Client([
            'timeout' => 5,
            'headers' => ['Content-Type' => 'application/json; charset=utf-8'],
        ]);
        $response = $client->request('POST', $this->config['url'].$this->config['version'], [
            'body' => json_encode($params),
        ]);
        $result = json_decode($response->getBody(), true);
        $this->checkResult($result);
        return $result;
    }

    public function syncCheck($params)
    {
        $params['accessKey'] = $this->config['accessKey'];
        $params['appId'] = $this->config['appId'];
        $client = new \GuzzleHttp\Client([
            'timeout' => 10,
            'headers' => ['Content-Type' => 'application/json; charset=utf-8'],
        ]);
        $response = $client->request('POST', $this->config['syn_url'].$this->config['version'], [
            'body' => json_encode($params),
        ]);
        $result = json_decode($response->getBody(), true);
        $this->checkResult($result);
        return $result;
    }

    public function callback($params)
    {
        $this->checkResult($params);
        return $params;
    }
}