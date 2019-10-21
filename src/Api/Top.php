<?php


namespace HaodankuSdk\Api;


use HaodankuSdk\GateWay;

class Top extends GateWay
{
    /**
     * 各大榜单API
     * @link https://www.haodanku.com/api/detail/show/29.html
     * @param array $params
     * @return bool|mixed
     */
    public function lists(array $params = [])
    {
        if (!isset($params['sale_type'])) {
            $params['sale_type'] = 1;
        }

        return $this->send('sales_list', $params);
    }

    /**
     * 今日值得买API
     * @link https://www.haodanku.com/api/detail/show/28.html
     * @param array $params
     * @return bool|mixed
     */
    public function today(array $params = [])
    {
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        return $this->send('get_deserve_item', $params);
    }
}