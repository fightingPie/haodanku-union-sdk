<?php


namespace HaoDanKuSdk\Api;


use HaoDanKuSdk\GateWay;

class Good extends GateWay
{
    /**
     * 商品列表页API
     * @link https://www.haodanku.com/api/detail/show/1.html
     * @param array $params
     * @return bool|mixed
     */
    public function lists(array $params = [])
    {
        if (!isset($params['nav'])) {
            $params['nav'] = 1;
        }
        if (!isset($params['cid'])) {
            $params['cid'] = 0;
        }
        if (!isset($params['back'])) {
            $params['back'] = 10;
        }
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        return $this->send('itemlist', $params);
    }

    /**
     * 定时拉取API
     * @link https://www.haodanku.com/api/detail/show/14.html
     * @param array $params
     * @return bool|mixed
     */
    public function timing(array $params = [])
    {
        if (!isset($params['start'])) {
            $params['start'] = 0;
        }
        if (!isset($params['end'])) {
            $params['end'] = 8;
        }
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        return $this->send('timing_items', $params);
    }

    /**
     * 商品更新API
     * @link https://www.haodanku.com/api/detail/show/2.html
     * @param array $params
     * @return bool|mixed
     */
    public function update(array $params = [])
    {
        if (!isset($params['back'])) {
            $params['back'] = 100;
        }
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        return $this->send('update_item', $params);
    }

    /**
     * 失效商品列表API
     * @link https://www.haodanku.com/api/detail/show/4.html
     * @param array $params
     * @return bool|mixed
     */
    public function invalid(array $params = [])
    {
        if (!isset($params['start'])) {
            $params['start'] = 0;
        }
        if (!isset($params['end'])) {
            $params['end'] = 8;
        }
        return $this->send('get_down_items', $params);
    }

    /**
     * 限制抢购（快抢商品API）
     * @link https://www.haodanku.com/api/detail/show/21.html
     * @param array $params
     * @return bool|mixed
     */
    public function limit(array $params)
    {
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        return $this->send('fastbuy', $params);
    }

    /**
     * 商品筛选API
     * @link https://www.haodanku.com/api/detail/show/3.html
     * @param array $params
     * @return bool|mixed
     */
    public function column(array $params = [])
    {
        if (!isset($params['type'])) {
            $params['type'] = 1;
        }
        if (!isset($params['back'])) {
            $params['back'] = 100;
        }
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        return $this->send('column', $params);
    }

    /**
     * 单品详情API
     * @link https://www.haodanku.com/api/detail/show/16.html
     * @param array $params
     * @return bool|mixed
     */
    public function detail(array $params = [])
    {
        return $this->send('item_detail', $params);
    }

    /**
     * 猜你喜欢
     * @link https://www.haodanku.com/api/detail/show/17.html
     * @param array $params
     * @return bool|mixed
     */
    public function guest(array $params = [])
    {
        return $this->send('get_similar_info', $params);
    }

    /**
     * 自动高佣
     * @link https://www.haodanku.com/api/detail/show/15.html
     * @param array $params
     * @return bool|mixed
     */
    public function highCommission(array $params = [])
    {
        return $this->send('ratesurl', $params, true);
    }
}