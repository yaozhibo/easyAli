<?php
/**
 * Created by PhpStorm.
 * User: User: 菜逼yzb
 * Date: 2018/9/20
 * Time: 17:18
 */
namespace Easyali\Aliyun;
include_once __DIR__ . '/aliyun-php-sdk-core/Config.php';
use afs\Request\V20180112 as Afs;
use DefaultProfile;
use DefaultAcsClient;

class AliSliderValidator
{
    public function validate($sessionId, $token, $sig, $scene, $appkey, $remoteIp)
    {
        $region_id = config('aliyunSDKConfig.region_id', 'cn-hangzhou');
        $access_key = config('aliyunSDKConfig.access_key');
        $access_secret = config('aliyunSDKConfig.access_secret');
        $product = config('aliyunSDKConfig.sliderProduct', "afs");
        $domain = config('aliyunSDKConfig.sliderDomain', "afs.aliyuncs.com");
        $iClientProfile = DefaultProfile::getProfile($region_id, $access_key, $access_secret);
        $client = new DefaultAcsClient($iClientProfile);
        DefaultProfile::addEndpoint($region_id, $region_id, $product, $domain);

        $request = new Afs\AuthenticateSigRequest();
        $request->setSessionId($sessionId);// 必填参数，从前端获取，不可更改，android和ios只传这个参数即可
        $request->setToken($token);// 必填参数，从前端获取，不可更改
        $request->setSig($sig);// 必填参数，从前端获取，不可更改
        $request->setScene($scene);// 必填参数，从前端获取，不可更改
        $request->setAppKey($appkey);//必填参数，后端填写
        $request->setRemoteIp($remoteIp);//必填参数，后端填写

        $response = $client->getAcsResponse($request);//返回code 100表示验签通过，900表示验签失败
        return $response;
    }
}