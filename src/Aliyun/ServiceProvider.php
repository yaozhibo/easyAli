<?php
/**
 * Created by PhpStorm.
 * User: 菜逼yzb
 * Date: 2018/9/20
 * Time: 19:49
 */
namespace Easyali\Aliyun;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function register()
    {
        $configPath = __DIR__ . '/config.php';
        $this->mergeConfigFrom($configPath,"aliyunSDKConfig");
    }

    public function boot(){
        $app = $this->app;
        $configPath = __DIR__ . '/config.php';
        $this->publishes([$configPath => $this->getConfigPath()],'config');

    }

    public function getConfigPath(){
        return config_path("aliyunSDKConfig.php");
    }
    protected function publishConfig($configPath)
    {
        $this->publishes([$configPath => config_path('aliyunSDKConfig.php')], 'config');
    }

}