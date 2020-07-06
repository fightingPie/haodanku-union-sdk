<?php


namespace HaoDanKuSdk;


use yumufeng\curl\Curl;

/**
 * Class GateWay
 * @package HaoDanKuSdk
 */
class GateWay
{
    protected $baseUrl = 'http://v2.api.haodanku.com/';

    protected $factory = '';

    /**
     * 参数
     * @var array
     */
    protected $params = [
        'apikey' => ''
    ];

    /**
     * GateWay constructor.
     * @param $config
     * @param HaoDanKuFactory $factory
     */
    public function __construct($config, HaoDanKuFactory $factory)
    {
        $this->factory = $factory;
        $this->params = array_merge($this->params, $config);
    }

    /**
     * @param $method
     * @param array $params
     * @param bool $isPost
     * @return bool|mixed
     */
    public function send($method, array $params, $isPost = false)
    {
        $sysParams = array_merge($this->params, $params);
        $requestUrl = $this->baseUrl . '/' . $method;
        try {
            if (!$isPost) {
                $url = $requestUrl . '?' . http_build_query($sysParams);
                $resp = Curl::curl_get($url);
            } else {;
                $resp = Curl::curl_post($requestUrl, $sysParams);
            }
            $info = json_decode($resp, true);
            if ($info['code'] == 0) {
                $this->factory->setError($info['msg']);
                return false;
            }
            return $info;
        } catch (\Exception $exception) {
            $this->factory->setError($exception->getMessage());
            return false;
        }
    }
}