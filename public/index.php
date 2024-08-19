<?php

use Kirby\Cms\App;

define('__ROOT__', dirname(__DIR__));

require __ROOT__ . '/vendor/autoload.php';

if (getenv('KIRBY_AUTOLOAD_MODELS') === 'true') {
	// Autoload page model classes from site/models
	// if they match the '{Model}Page' naming pattern.
	spl_autoload_register(static function ($class) {
		$pattern = '/^([A-Z][A-Za-z]*)Page$/';
		$matches = [];
		if (preg_match($pattern, $class, $matches) === 1) {
			$base = strtolower($matches[1]);
			$path = __ROOT__ . '/site/models/' . $base . '.php';
			include_once($path);
		}
	});
}

$kirby = new App([
	'roots' => ['index' => __ROOT__]
]);

echo $kirby->render();
