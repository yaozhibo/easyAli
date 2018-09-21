# 阿里滑动验证

## Install
- <code>composer require easy-ali/aliyun-php-sdk-core</code>
- 如果你使用的是laravel，在app.php中注册provider，Easyali\Aliyun\ServiceProvider::class
- <code>php artisan vendor:publish --provider="Easyali\Aliyun\ServiceProvider" --tag="config"</code>
- 在.env中插入 ALIYUN_SLIDER_AK(aliyun access key) 和 ALIYUN_SLIDER_AS(aliyun access secret)
- 还需要自行配置appKey和remoteIp，你可以选择再aliyunSV.php插入，或者新建一个配置文件
## Requirements

- PHP 5.3+

## Build

- to run unit tests, you will have to configure aliyun-sdk.properties files in your user directory, and make sure your project has corresponding service enabled, eg. openmr.

## Example

	use Easyali\Aliyun\AliSliderValidator;
    
    trait SlideValidator
    {
        public function validateSlider()
        {
            $params = $this->self_validate([
                'csessionid' => 'string',
                'token' => 'string',
                'sig' => 'string',
                'scene' => 'string',
            ]);
            foreach ($params as $item) {
                if(empty($item)) {
                    throw new OPException('人机验证失败');
                }
            }
            $appKey = "FFFF0N00000000006C51";
            $remoteIp = "127.0.0.0";
            $slideValidator = new AliSliderValidator();
            $res = $slideValidator->validate($params['csessionid'], $params['token'], $params['sig'], $params['scene'], $appKey, $remoteIp);
            if($res->Code != 100) {
                throw new OPException('操作失败，请重试或联系管理员', 20000);
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
