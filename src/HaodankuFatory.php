<?php


namespace HaodankuSdk;

use HaodankuSdk\Api\Content;
use HaodankuSdk\Api\Good;
use HaodankuSdk\Api\Search;
use HaodankuSdk\Api\Shop;
use HaodankuSdk\Api\Subject;
use HaodankuSdk\Api\Top;

/**
 * Class HaodankuFatory
 * @package HaodankuSdk
 * @property Good good
 * @property Top top
 * @property Content content
 * @property Search search
 * @property Shop shop
 * @property Subject subject
 */
class HaodankuFatory
{
    private $config;
    private $error;

    public function __construct($config = null)
    {
        if (empty($config)) {
            throw new HaodankuException('no config');
        }
        $this->config = $config;
    }

    public function __get($api)
    {
        try {
            $classname = __NAMESPACE__ . "\\Api\\" . ucfirst($api);
            if (!class_exists($classname)) {
                throw new \Exception('api undefined');
                return false;
            }
            $new = new $classname($this->config, $this);
            return $new;
        } catch (\Exception $e) {
            throw new \Exception('api undefined');
        }
    }

    public function setError($message)
    {
        $this->error = $message;
    }

    public function getError()
    {
        return $this->error;
    }
}