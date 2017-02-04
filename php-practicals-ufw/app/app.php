<?php

use Exception\HttpException;
use Http\Request;
require __DIR__ . '/../autoload.php';

// Config
$debug = true;

$app = new \App(new View\TemplateEngine(
        __DIR__ . '/templates/'
        ), $debug);

/**
 * Index
 */
$app->get('/', function (Request $request) use ($app) {
    return $app->render('index.php');
});

$app->get('/status/(\d+)', function(Request $request, $statusId) use ($app) {

    $memory = new InMemoryFinder();

    $status = $memory->findOneById($statusId);

    if ($status != null) {
        return $app->render('statusById.php', array('status' => $status));
    }
    throw new HttpException(404, 'Page Not Found');
});

$app->get('/status', function(Request $request) use ($app) {

    $memory = new InMemoryFinder();
    if ($memory->findAll() != null) {
        return $app->render('status.php', array('allStatus' => $memory->findAll()));
    }
    throw new HttpException(404, 'Page Not Found');
});

$app->get('/statusJson', function(Request $request) use ($app) {

    $memory = new JsonFinder();
    if ($memory->findAll() != null) {
        return $app->render('statusJson.php', array('allStatus' => $memory->findAll()));
    }
    throw new HttpException(404, 'Page Not Found');
});

$app->get('/statusJson/(\d+)', function(Request $request, $statusId) use ($app) {

    $memory = new JsonFinder();
    $status = $memory->findOneById($statusId);
    if ($memory->findOneById($statusId) != null) {
        return $app->render('statusJsonById.php', array('status' => $status));
    }
    throw new HttpException(404, 'Page Not Found');
});

$app->post('/statusJson', function(Request $request) use ($app){
     
    $message =  $request->getParameter("message");
    
    $memory = new JsonFinder();
    
    $memory->insertStatus($message);
    
    $app->redirect('/statusJson');
});
// ...

return $app;
