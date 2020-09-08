<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Yansongda\Pay\Pay;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (!$this->app->isProduction()) {
            //非生产环境加载 Telescope 调试工具
            $this->app->register(TelescopeServiceProvider::class);
        }
        if($this->app->isLocal()){
            //本地环境加载 IDE 提示工具类
            $this->app->register(IdeHelperServiceProvider::class);
        }
        if (config('pay.alipay.enable')){
            // 向服务容器中注入一个名为 alipay 的单例对象
            $this->app->singleton('alipay', function () {
                $config = config('pay.alipay');
                // 判断当前项目运行环境是否为线上环境
                if (app()->isLocal()) {
                    $config['mode'] = 'dev'; // 本地开启支付宝沙箱环境
                    $config['log']['level'] = Logger::DEBUG;
                    $config['notify_url'] = route('api.payment.alipay.notify');
                    $config['return_url'] = route('api.payment.alipay.return');
                } else {
                    $config['log']['level'] = Logger::WARNING;
                    $config['notify_url'] = route('api.payment.alipay.notify');
                    $config['return_url'] = route('api.payment.alipay.return');
                }
                // 创建一个支付宝支付对象
                return Pay::alipay($config);
            });
        }

        if (config('pay.wechat.enable')){
            // 注入一个 wechat_pay 单例对象
            $this->app->singleton('wechat_pay', function () {
                $config = config('pay.wechat');
                if (app()->isLocal()) {
                    $config['log']['level'] = Logger::DEBUG;
                    $config['notify_url'] = route('api.payment.wechatpay.notify');
                } else {
                    $config['log']['level'] = Logger::WARNING;
                    $config['notify_url'] = route('api.payment.wechatpay.notify');
                }
                // 创建一个微信支付对象
                return Pay::wechat($config);
            });
        }

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
