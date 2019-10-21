<?php


namespace HaodankuSdk\Api;


use HaodankuSdk\GateWay;
use HaodankuSdk\HaodankuException;

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
     * @throws HaodankuException
     */
    public function items(array $params = [])
    {
        if (!isset($params['id'])) {
            throw  new  HaodankuException('id不能为空');
        }
        return $this->send('get_subject_item', $params);
    }
}