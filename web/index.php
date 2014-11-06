<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

use Sitepoint\Factory\FeedFactory;

$app = new Silex\Application();

// Register the session service provider, which we'll use for storing the "current" language
$app->register(new Silex\Provider\SessionServiceProvider());

$app['debug'] = true;
$blogPosts = array();

// Create the view
$view = new \figdice\View();

// Register the feed factory
$view->registerFeedFactory(new FeedFactory()); 

// The About page
$app->get('/about', function () use ($view) {

	$view->loadFile( '../templates/about.html' );

	return $view->render();
});

// ... and finally, the homepage
$app->get('/', function () use ($view) {

	$view->loadFile( '../templates/home.html' );

	return $view->render();
});

$app->run();
