<?php

namespace App\Providers;

use App\ClientAdapter;
use Illuminate\Support\ServiceProvider;
use \DrewM\MailChimp\MailChimp;

class ClientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ClientAdapter::class, function ($app) {
            return new ClientAdapter(new MailChimp(config('services.mailchimp.key')));
        });
    }
}


