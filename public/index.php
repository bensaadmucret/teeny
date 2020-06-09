<?php 


require_once '../vendor/autoload.php';
use teeny\App;
use GuzzleHttp\Psr7\ServerRequest;
use function Http\Response\send;

$app = new App();

$response = $app->run(ServerRequest::fromGlobals());


// Send headers and body.
send($response);
