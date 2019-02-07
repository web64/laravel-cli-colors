<?php 

namespace Web64\Colors;

use Illuminate\Support\ServiceProvider;
use Web64\Colors\LaravelColors;


class ColorsServiceProvider extends ServiceProvider 
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
    protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
    }

    /**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $app = $this->app ?: app();

        $this->mergeConfigFrom(__DIR__.'/../config/colors.php', 'nlp');

        $this->publishes([
            __DIR__.'/../config/colors.php' => config_path('colors.php'),
        ]);

        $this->app->singleton(\Web64\Colors\LaravelColors::class, function () use ($app) {
            $config = $app['config']->get('colors');
            
			return new \Web64\Colors\LaravelColors($config);
		});
    }
}