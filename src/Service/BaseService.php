<?php
namespace Shumei\Shumei\Service;

class BaseService{

    protected $config;

    public function checkResult($result)
    {
        if ($result['code'] == 1100) {
            return $result;
        } else {
            throw new \Exception($result['message']);
        }
    }
}