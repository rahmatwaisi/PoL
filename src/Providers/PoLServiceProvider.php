<?php


namespace RahmatWaisi\PoL\Providers;


use Illuminate\Support\ServiceProvider;
use RahmatWaisi\PoL\PoLService;

class PoLServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    public function boot()
    {
        $config = __DIR__ . '/../config/pol.php';
        $callbackController = __DIR__ . '../Http/Controllers/PaymentCallbackController.php';

        $this->publishes([
            $callbackController => app_path('Http/Controllers/PaymentCallbackController.php'),
        ],'pol-controller');

        $this->publishes([
            $config => config_path('pol.php'),
        ], 'pol-config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('pol', function () {
            return new PoLService();
        });

    }
}
