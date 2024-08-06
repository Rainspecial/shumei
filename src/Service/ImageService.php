<?php

namespace Shumei\Shumei\Service;

class ImageService extends BaseService
{

    const URL = 'http://api-img-bj.fengkongcloud.com/image/';

    const BATCH_URL = 'http://api-img-bj.fengkongcloud.com/images/';

    const VERSION = 'v4';

    public function __construct($config)
    {
        $config['version'] = self::VERSION;
        $config['url'] = self::URL;
        $config['batch_url'] = self::BATCH_URL;
        $this->config = $config;
    }

    public function check($params)
    {
        $params['accessKey'] = $this->config['accessKey'];
        $params['appId'] = $this->config['appId'];
        $client = new \GuzzleHttp\Client([
            'timeout' => 10,
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

    public function checkBatch()
    {
        $params['accessKey'] = $this->config['accessKey'];
        $params['appId'] = $this->config['appId'];
        $client = new \GuzzleHttp\Client([
            'timeout' => 20,
            'headers' => ['Content-Type' => 'application/json; charset=utf-8'],
        ]);
        $response = $client->request('POST', $this->config['batch_url'].$this->config['version'], [
            'body' => json_encode($params),
        ]);
        $result = json_decode($response->getBody(), true);
        if ($this->checkResult($result)) {
            return $result;
        }
        return false;
    }
}