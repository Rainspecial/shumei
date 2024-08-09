<?php
namespace Shumei\Shumei\Service;

class TextService extends BaseService {

    const URL = 'http://api-text-bj.fengkongcloud.com/text/';
    const VERSION = 'v4';

    public function __construct($config) {
        $config['version'] = self::VERSION;
        $config['url'] = self::URL;
        $this->config = $config;
    }

    public function check($params)
    {
        $params['accessKey'] = $this->config['accessKey'];
        $params['appId'] = $this->config['appId'];
        $client = new \GuzzleHttp\Client([
            'timeout' => 1,
            'headers' => ['Content-Type' => 'application/json; charset=utf-8'],
        ]);
        $response = $client->request('POST', $this->config['url'].$this->config['version'], [
            'body' => json_encode($params),
        ]);
        $result = json_decode($response->getBody(), true);
        $this->checkResult($result);
        return $result;
    }

}