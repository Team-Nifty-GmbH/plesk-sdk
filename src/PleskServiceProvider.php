<?php

namespace TeamNifty\Plesk;

use Illuminate\Support\ServiceProvider;

class PleskServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/plesk.php' => config_path('plesk.php'),
            ], 'plesk-config');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            Plesk::class,
            'plesk',
        ];
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/plesk.php',
            'plesk'
        );

        $this->app->singleton(Plesk::class, function ($app) {
            $config = $app['config']['plesk'];

            $plesk = new Plesk(
                url: $config['url'],
                username: $config['username'],
                password: $config['password'],
                apiKey: $config['api_key']
            );

            // Configure SSL verification
            if (! $config['verify_ssl']) {
                $plesk->config()->add('verify', false);
            }

            // Configure timeout
            if ($config['timeout']) {
                $plesk->config()->add('timeout', $config['timeout']);
            }

            // Configure retry
            if ($config['retry']['times'] > 0) {
                $plesk->config()->add('retry', [
                    'times' => $config['retry']['times'],
                    'interval' => $config['retry']['sleep'],
                    'throw' => false,
                ]);
            }

            return $plesk;
        });

        $this->app->alias(Plesk::class, 'plesk');
    }
}
