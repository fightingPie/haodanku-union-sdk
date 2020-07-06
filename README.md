**好单库淘客SDK**

好单库淘客SDK

PHP =>7.0

`composer require fighting-pie/haodanku-union-sdk`

如果是在swoole 扩展下使用，支持协程并发，需要在编译swoole扩展的时候开启，系统会自动判断是否采用swoole

```./configure --enable-openssl```

## 使用

```php
<?php

$config = [
    'apikey' => ''
];

$client = new \HaoDanKuSdk\HaoDanKuFactory($config);
$result = $client->top->lists();

if ($result == false) {
    var_dump($client->getError());
}

echo json_encode($result);

```

## License

MIT