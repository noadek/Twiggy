<?php
/**
 * Twiggy - Twig template engine implementation for Laravel
 *
 * Based on Edmundas Kondrašovas Twiggy for CodeIgniter
 *
 * @author Adeniyi Adekoya <noadek@hotmail.com>
 */

namespace Twiggy\Provider;

use Illuminate\Support\ServiceProvider;
use Twiggy\Twiggy;

class TwiggyServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	public function boot()
	{
		$this->loadConfig();
		$this->registerHelper();
	}

	public function register()
	{
        $this->registerTwiggy();

		config([
			'config/twiggy.php',
		]);
	}

	private function loadConfig()
	{
		$this->publishes([
				__DIR__.'/../config/twiggy.php' => config_path('twiggy.php'),
		], 'config');
	}

	private function registerHelper()
	{
		require __DIR__.'/../lib/helpers.php';
	}

	private function registerTwiggy()
	{
		$this->app->singleton('twiggy', function(){
			return new Twiggy();
		});
	}
}
