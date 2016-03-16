<?php

namespace App\Providers\Widgets;

use Illuminate\Support\ServiceProvider;

class OpenChannelServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * 由OpenChannel导出的小工具模型
     *
     * @var array $widgets
     */
    public $widgets = ['menu', 'breadcrumb'];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 绑定一个总返回该实例的合约
        $this->app->singleton('App\Contracts\Classifications\Channel\Register', function ($app) {
            // 先实例化频道管理器的连接
            $manager = $app->make('App\Widgets\Channel')->connection();

            return $manager;
        });

    }

    /**
     * 注册菜单控制单元
     *
     * @return void
     */
    public function registerMenu()
    {

    }

    /**
     * 注册breadcrumb控制单元
     *
     * @return void
     */
    public function registerBreadcrumb()
    {

    }
}
