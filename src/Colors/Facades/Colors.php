<?php

namespace Web64\Colors\Facades;

use Illuminate\Support\Facades\Facade;

class Colors  extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'Web64\Colors\LaravelColors'; }
}