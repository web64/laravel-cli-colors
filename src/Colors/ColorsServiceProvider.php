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
	    if ($this->app->runningInConsole()) {
			$this->commands([
				\Web64\Colors\Commands\ColorsTest::class
			]);
		}

		$this->publishes([
            __DIR__.'/../config/colors.php' => config_path('colors.php'),
		], 'config');

		$this->registerHelpers();
    }

    /**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $app = $this->app ?: app();

        $this->mergeConfigFrom(__DIR__.'/../config/colors.php', 'colors');


        $this->app->singleton(\Web64\Colors\LaravelColors::class, function () use ($app) {
            $config = $app['config']->get('colors');
            
			return new \Web64\Colors\LaravelColors($config);
		});

		//$this->app->bind('\Web64\Colors', \Web64\Colors\Facades\Colors::class);
	}
	
	public function registerHelpers()
	{
		require_once('helpers.php');		
	}
}