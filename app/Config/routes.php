<?php
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
Router::connect('/ns-admin', array('controller' => 'users','action'=>'login'));
Router::connect('/login', array('controller' => 'users','action'=>'login'));
Router::connect('/logout', array('controller' => 'users','action'=>'logout'));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */

/*
 * cms
*/

//website

//cms admin
//Router::connect("/:prefix/:controller/:action/*", array('prefix' => 'admin', 'admin' => true));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
