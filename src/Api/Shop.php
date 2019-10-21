<?php


namespace HaodankuSdk\Api;


use HaodankuSdk\GateWay;

class Shop extends GateWay
{
    /**
     * 完整黑名单库API
     * @link https://www.haodanku.com/api/detail/show/7.html
     * @param array $params
     * @return bool|mixed
     */
    public function black(array $params)
    {
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        return $this->send('blacklist', $params);
    }
}