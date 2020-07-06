<?php

namespace HaoDanKuSdk;

use HaoDanKuSdk\Api\Content;
use HaoDanKuSdk\Api\Good;
use HaoDanKuSdk\Api\Search;
use HaoDanKuSdk\Api\Shop;
use HaoDanKuSdk\Api\Subject;
use HaoDanKuSdk\Api\Top;

/**
 * Class HaoDanKuFactory
 * @package HaoDanKuSdk
 * @property Good good
 * @property Top top
 * @property Content content
 * @property Search search
 * @property Shop shop
 * @property Subject subject
 */
class HaoDanKuFactory
{
    private $config;
    private $error;

    /**
     * HaoDanKuFactory constructor.
     * @param null $config
     * @throws HaoDanKuException
     */
    public function __construct($config = null)
    {
        if (empty($config)) {
            throw new HaoDanKuException('no config');
        }
        $this->config = $config;
    }

    /**
     * @param $api
     * @return bool
     * @throws \Exception
     */
    public function __get($api)
    {
        try {
            $classname = __NAMESPACE__ . "\\Api\\" . ucfirst($api);
            if (!class_exists($classname)) {
                throw new \Exception('api undefined');
            }
            $new = new $classname($this->config, $this);
            return $new;
        } catch (\Exception $e) {
            throw new \Exception('api undefined');
        }
    }

    /**
     * @param $message
     */
    public function setError($message)
    {
        $this->error = $message;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }
}