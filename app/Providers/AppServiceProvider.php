<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Infrastructure\RedisMessageRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Chat\MessageRepositoryInterface',RedisMessageRepository::class);
    }
}
