<?php


namespace HaoDanKuSdk\Api;


use HaoDanKuSdk\GateWay;
use HaoDanKuSdk\HaoDanKuException;

class Subject extends GateWay
{
    /**
     * 好货专场API
     * @param array $params
     * @return bool|mixed
     */
    public function hot(array $params = [])
    {
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        return $this->send('subject_hot', $params);
    }

    /**
     * 精选专题API
     * @link https://www.haodanku.com/api/detail/show/11.html
     * @param array $params
     * @return bool|mixed
     */
    public function lists(array $params = [])
    {
        return $this->send('get_subject', $params);
    }

    /**
     * 精选专题商品API
     * @link https://www.haodanku.com/api/detail/show/11.html
     * @param array $params
     * @return bool|mixed
     * @throws HaoDanKuException
     */
    public function items(array $params = [])
    {
        if (!isset($params['id'])) {
            throw  new  HaoDanKuException('id不能为空');
        }
        return $this->send('get_subject_item', $params);
    }
}