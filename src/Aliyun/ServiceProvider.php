<?php
/**
 * Created by PhpStorm.
 * User: 菜逼yzb
 * Date: 2018/9/20
 * Time: 19:49
 */
namespace Easyali\Aliyun;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Foundation\Application as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('aliyunSV.php'),
        ],'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'aliyunSV');
        $this->app->bind(AliSliderValidator::class, function () {
            return new AliSliderValidator();
        });
    }

    public function configPath()
    {
        return __DIR__ .  'config.php';
    }
}