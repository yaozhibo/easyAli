# 阿里sdk简单使用

## Install
- <code>composer require easy-ali/aliyun-php-sdk-core</code>
- 在app.php中注册provider，Easyali\Aliyun\ServiceProvider::class
- 在.env中插入 ALIYUN_SLIDER_AK(aliyun access key) 和 ALIYUN_SLIDER_AS(aliyun access secret)

- <code>php artisan vendor:publish --provider="Easyali\Aliyun\ServiceProvider" --tag="config"</code>
- 生成aliyunSDKConfig.php
## Requirements

- PHP 5.3+

## Example 1 滑动验证
1.需要先创建滑动验证配置文件aliSliderConfig.php
<pre>
<?php
return [
    'app_key' => 'FFFF0N00000000006C53', 
    'remote_ip' => '127.0.0.1' 
];
</pre>

2.使用
<pre>
	use Easyali\Aliyun\AliSliderValidator;
    
    trait SlideValidator
    {
        public function validateSlider()
        {
            $params['csessionid'] = $_POST['csessionid'];
            $params['token'] = $_POST['token'];
            $params['sig'] = $_POST['sig'];
            $params['scene'] = $_POST['scene'];
            $appKey = config('aliyunSV.app_key');
            $remoteIp = config('aliyunSV.remote_ip');
            $slideValidator = new AliSliderValidator();
            $res = $slideValidator->validate($params['csessionid'], $params['token'], $params['sig'], $params['scene'], $appKey, $remoteIp);
            if($res->Code != 100) {
                throw new Exception('操作失败，请重试或联系管理员');
            }
        }
    }
</pre>
## Authors && Contributors
- sdk开发者
- [Zuhe]()
- [Ma Lijie](https://github.com/malijiefoxmail)
- sdk发布者
- [菜逼](https://github.com/yaozhibo)
- vendor开发者
- [菜逼](https://github.com/yaozhibo)<mail:yyaozhibo@gmail.com>
## License

licensed under the [Apache License 2.0](https://www.apache.org/licenses/LICENSE-2.0.html)
