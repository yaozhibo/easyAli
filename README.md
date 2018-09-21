# 阿里sdk简单使用

## Install
- <code>composer require easy-ali/aliyun-php-sdk-core</code>
- 如果你使用的是laravel，在app.php中注册provider，Easyali\Aliyun\ServiceProvider::class
- <code>php artisan vendor:publish --provider="Easyali\Aliyun\ServiceProvider" --tag="config"</code>
- 生成aliyunSDKConfig.php配置文件后需要需要在配置文件中修改access key和access secret为自己的，具体如何获取对应的值请自行百度。
- 在.env中插入 ALIYUN_SLIDER_AK(aliyun access key) 和 ALIYUN_SLIDER_AS(aliyun access secret)
- 还需要自行配置appKey和remoteIp，你可以选择在aliyunSDKConfig.php插入，或者新建一个配置文件

## Requirements

- PHP 5.3+

## Example 1 滑动验证

	use Easyali\Aliyun\AliSliderValidator;
    
    trait SlideValidator
    {
        public function validateSlider()
        {
            $params['csessionid'] = $_POST['csessionid'];
            $params['token'] = $_POST['token'];
            $params['sig'] = $_POST['sig'];
            $params['scene'] = $_POST['scene'];
            $appKey = "FFFF0N00000000006C10";//对应申请的appkey
            $remoteIp = "127.0.0.0";
            $slideValidator = new AliSliderValidator();
            $res = $slideValidator->validate($params['csessionid'], $params['token'], $params['sig'], $params['scene'], $appKey, $remoteIp);
            if($res->Code != 100) {
                throw new Exception('操作失败，请重试或联系管理员');
            }
        }
    }

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
