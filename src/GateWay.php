<?php


namespace HaodankuSdk;


use yumufeng\curl\Curl;

class GateWay
{
    protected $baseUrl = 'http://v2.api.haodanku.com/';

    protected $fatory = '';

    /**
     * 参数
     * @var array
     */
    protected $params = [
        'apikey' => ''
    ];

    public function __construct($config, HaodankuFatory $fatory)
    {
        $this->fatory = $fatory;
        $this->params = array_merge($this->params, $config);
    }

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
                $this->fatory->setError($info['msg']);
                return false;
            }
            return $info;
        } catch (\Exception $exception) {
            $this->fatory->setError($exception->getMessage());
            return false;
        }
    }
}