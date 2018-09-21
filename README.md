# Open API SDK for php developers

## Install
- <code>composer require easy-ali/aliyun-php-sdk-core</code>
- If you use laravel,
    register Easyali\Aliyun\ServiceProvider::class in config('app.providers') .
    Then,
    run 
    <code>php artisan vendor:publish --provider="Easyali\Aliyun\ServiceProvider" --tag="config"</code>
    in console .
    Then,
    insert ALIYUN_SLIDER_AK(aliyun access key) and ALIYUN_SLIDER_AS(aliyun access secret) in .env .
## Requirements

- PHP 5.3+

## Build

- to run unit tests, you will have to configure aliyun-sdk.properties files in your user directory, and make sure your project has corresponding service enabled, eg. openmr.

## Example

	use 'Ali/Config.php';
	use Ecs\Request\V20140526 as Ecs;
	
	$iClientProfile = DefaultProfile::getProfile("cn-hangzhou", "<your accessKey>", "<your accessSecret>");
	$client = new DefaultAcsClient($iClientProfile);
	
	$request = new Ecs\DescribeRegionsRequest(); 
	$request->setMethod("GET");
	$response = $client->getAcsResponse($request);
	print_r($response);

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
