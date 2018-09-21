<?php
/**
 * Created by PhpStorm.
 * User: 菜鸡yzb
 * Date: 2018/9/20
 * Time: 19:56
 */

return [
    'region_id' => env('ALIYUN_SLIDER_REGION_ID', 'cn-hangzhou'),
    'access_key' => env('ALIYUN_SLIDER_AK'), //Access Key
    'access_secret' => env('ALIYUN_SLIDER_AS'), //Access Secret
    'app_key' => '********************', //App Key 滑动验证的appKey，须于前端保持一致
    'remote_ip' => '127.0.0.1'
];