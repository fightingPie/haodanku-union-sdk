<?php


namespace HaoDanKuSdk\Api;


use HaoDanKuSdk\GateWay;
use HaoDanKuSdk\HaoDanKuException;

class Search extends GateWay
{

    /**
     * 超级搜索API
     * @link https://www.haodanku.com/api/detail/show/19.html
     * @param array $params
     * @return bool|mixed
     * @throws HaoDanKuException
     */
    public function superSearch(array $params = [])
    {
        if (!isset($params['keyword'])) {
            throw new  HaoDanKuException("keyword不能为空哦");
        }
        $params['keyword'] = urlencode(urlencode($params['keyword']));
        if (!isset($params['back'])) {
            $params['back'] = 100;
        }
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        if (!isset($params['tb_p'])) {
            $params['tb_p'] = 1;
        }
        return $this->send('get_keyword_items', $params);
    }

    /**
     * 关键词商品页API
     * @link https://www.haodanku.com/api/detail/show/5.html
     * @param array $params
     * @return bool|mixed
     * @throws HaoDanKuException
     */
    public function getByKeyword(array $params = [])
    {
        if (!isset($params['keyword'])) {
            throw new  HaoDanKuException("keyword不能为空哦");
        }
        $params['keyword'] = urlencode(urlencode($params['keyword']));
        if (!isset($params['back'])) {
            $params['back'] = 100;
        }
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        return $this->send('get_keyword_items', $params);
    }

    /**
     * 热搜关键词记录API
     * @link https://www.haodanku.com/api/detail/show/6.html
     * @param array $params
     * @return bool|mixed
     */
    public function hotKeyword(array $params = [])
    {
        if (!isset($params['min_id'])) {
            $params['min_id'] = 1;
        }
        return $this->send('hot_key', $params);
    }

    /**
     * 超级分类API
     * @link https://www.haodanku.com/api/detail/show/9.html
     * @param array $params
     * @return bool|mixed
     */
    public function superClassify(array $params = [])
    {
        return $this->send('super_classify', $params);
    }
}