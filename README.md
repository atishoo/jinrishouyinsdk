# 今日收银PHP SDK

### 使用说明
1. 实例化收银对象

```php
$ak = "你的appid";
$private_key = file_get_contents("私钥路径");
$shouyin = new Cashier($ak, $private_key);
```
