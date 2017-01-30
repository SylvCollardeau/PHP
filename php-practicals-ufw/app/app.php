<?php
use Exception\HttpException;
require __DIR__ . '/../autoload.php';

// Config
$debug = true;

$app = new \App(new View\TemplateEngine(
    __DIR__ . '/templates/'
), $debug);



/**
 * Index
 */
$app->get('/', function () use ($app) {
    return $app->render('index.php');
});

$app->get('/status/(\d+)', function($statusId) use ($app) {
	
	$memory = new InMemoryFinder();
	
	$status = $memory->findOneById($statusId);
	
	if($status != null){
		return $app->render('statusById.php', array('status' => $status));
	}
	throw new HttpException(404, 'Page Not Found');
	
});

$app->get('/status', function() use ($app) {
	
	$memory = new InMemoryFinder();
	
	return $app->render('status.php', array('allStatus' => $memory->findAll()));
	
});

$app->get('/statusJson', function() use ($app) {
	
	$memory = new JsonFinder();
	
	return $app->render('statusJson.php', array('allStatus' => $memory->findAll()));
	
});
// ...

return $app;
