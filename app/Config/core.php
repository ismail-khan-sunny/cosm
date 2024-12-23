<?php
Configure::write('debug',2);

Configure::write('Error', array(
		'handler' => 'ErrorHandler::handleError',
		'level' => E_ALL & ~E_DEPRECATED,
		'trace' => true
));

Configure::write('Exception', array(
		'handler' => 'ErrorHandler::handleException',
		'renderer' => 'ExceptionRenderer',
		'log' => true
));

Configure::write('App.encoding', 'UTF-8');

//Configure::write('App.baseUrl', env('SCRIPT_NAME'));

//Configure::write('App.fullBaseUrl', 'http://example.com');

//Configure::write('App.imageBaseUrl', 'img/');

//Configure::write('App.cssBaseUrl', 'css/');

//Configure::write('App.jsBaseUrl', 'js/');

Configure::write('Routing.prefixes', array('admin'));

//Configure::write('Cache.disable', true);

//Configure::write('Cache.check', true);

//Configure::write('Cache.viewPrefix', 'prefix');

Configure::write('Session', array(
		'defaults' => 'php',
		'cookie'	=> 'cms_by_nogorsolutions'
));

Configure::write('Security.salt', 'DYhG93b0qyJfoxfs2guVoUubWwvniR2G0FgaC9mi');

Configure::write('Security.cipherSeed', '76855309657453542496749683645');

//Configure::write('Asset.timestamp', true);

//Configure::write('Asset.filter.css', 'css.php');

//Configure::write('Asset.filter.js', 'custom_javascript_output_filter.php');

Configure::write('Acl.classname', 'DbAcl');
Configure::write('Acl.database', 'default');

date_default_timezone_set('Asia/Dhaka');

Configure::write('Config.timezone', 'Asia/Dhaka');

/**
 *
 * Cache Engine Configuration
 * Default settings provided below
 *
 * File storage engine.
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'File', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'path' => CACHE, //[optional] use system tmp directory - remember to use absolute path
 * 		'prefix' => 'cake_', //[optional]  prefix every cache file with this string
 * 		'lock' => false, //[optional]  use file locking
 * 		'serialize' => true, //[optional]
 * 		'mask' => 0664, //[optional]
 *	));
 *
 * APC (http://pecl.php.net/package/APC)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Apc', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file with this string
 *	));
 *
 * Xcache (http://xcache.lighttpd.net/)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Xcache', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 *		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional] prefix every cache file with this string
 *		'user' => 'user', //user from xcache.admin.user settings
 *		'password' => 'password', //plaintext password (xcache.admin.pass)
 *	));
 *
 * Memcache (http://www.danga.com/memcached/)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Memcache', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file with this string
 * 		'servers' => array(
 * 			'127.0.0.1:11211' // localhost, default port 11211
 * 		), //[optional]
 * 		'persistent' => true, // [optional] set this to false for non-persistent connections
 * 		'compress' => false, // [optional] compress data in Memcache (slower, but uses less memory)
 *	));
 *
 *  Wincache (http://php.net/wincache)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Wincache', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 *		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file with this string
 *	));
 */

/**
 * Configure the cache handlers that CakePHP will use for internal
 * metadata like class maps, and model schema.
 *
 * By default File is used, but for improved performance you should use APC.
 *
 * Note: 'default' and other application caches should be configured in app/Config/bootstrap.php.
 *       Please check the comments in bootstrap.php for more info on the cache engines available
 *       and their settings.
 */
$engine = 'File';

// In development mode, caches should expire quickly.
$duration = '+999 days';
if (Configure::read('debug') > 0) {
	$duration = '+10 seconds';
}

// Prefix each application on the same server with a different string, to avoid Memcache and APC conflicts.
$prefix = 'myapp_';

/**
 * Configure the cache used for general framework caching. Path information,
 * object listings, and translation cache files are stored with this configuration.
 */
Cache::config('_cake_core_', array(
		'engine' => $engine,
		'prefix' => $prefix . 'cake_core_',
		'path' => CACHE . 'persistent' . DS,
		'serialize' => ($engine === 'File'),
		'duration' => $duration
));

/**
 * Configure the cache for model and datasource caches. This cache configuration
 * is used to store schema descriptions, and table listings in connections.
 */
Cache::config('_cake_model_', array(
		'engine' => $engine,
		'prefix' => $prefix . 'cake_model_',
		'path' => CACHE . 'models' . DS,
		'serialize' => ($engine === 'File'),
		'duration' => $duration
));
