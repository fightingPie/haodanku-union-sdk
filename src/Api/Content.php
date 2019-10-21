<?php


namespace HaodankuSdk\Api;


use HaodankuSdk\GateWay;

class Content extends GateWay
{
    /**
     * 朋友圈API
     * @link https://www.haodanku.com/api/detail/show/23.html
     * @param array $params
     * @return bool|mixed
     */
    public function friends(array $params)
    {
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        return $this->send('selected_item', $params);
    }

    /**
     * 达人说API
     * @link https://www.haodanku.com/api/detail/show/24.html
     * @param array $params
     * @return bool|mixed
     */
    public function talent(array $params)
    {
        if (!isset($params['talentcat'])) {
            $params['talentcat'] = 0;
        }

        return $this->send('talent_info', $params);
    }

    /**
     * 精编文案API
     * @link https://www.haodanku.com/api/detail/show/18.html
     * @param array $params
     * @return bool|mixed
     */
    public function excellent(array $params = [])
    {
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        if (!isset($params['back'])) {
            $params['back'] = 100;
        }
        return $this->send('excellent_editor', $params);
    }
}