# 热巴云通讯 sdk

---

 - 调用方法
 
```php
<?php

require_once('RebaSdk.php');

$client = new RebaClient('https://sms.rebayun.com/api', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

try {
    $response = $client->smsBatchSubmit(array(
        new SmsSubmit('186xxxxxxxx', '【热巴云通讯】您的验证码是：111111'),
        new SmsSubmit('187xxxxxxxx', '【热巴云通讯】您的验证码是：222222')
    ));
    print_r($response);
} catch (RebaApiException $e) {
    print_r('RebaApiException, code: ' . $e->getCode() . ', message: '. $e->getMessage());
} catch (Exception $e) {
    print_r('Exception. message: ' . $e->getMessage());
}

```

# 注意事项
 - 请使用php5.6或更高版本
 - PhpSmsApiSample.php为非sdk调用示例,仅供测试,实际使用推荐sdk调用
 - 详细api文档请参考https://www.rebayun.com/api1.0/document
