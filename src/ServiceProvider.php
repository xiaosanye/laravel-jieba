<?php

namespace x3y\LaravelJieba;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Fukuball\Jieba\Jieba;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;


    /**
     * @var Bootstrap
     */
    protected $bootstrap;


    public function boot()
    {
        $bootstrap = new Bootstrap();
    }

    /**
     * Register the provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Jieba::class, function($app)
        {
            return $this->bootstrap->jieba();
        });

        $this->app->alias(Jieba::class, 'jieba');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Jieba::class, 'jieba'];
    }
}