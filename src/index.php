<?php
require "../../vendor/autoload.php";
require "includes/functions.inc.php";
require "includes/queries.inc.php";

$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/membros', function () use ($queries){
	$res = db()->query($queries['membros'], PDO::FETCH_ASSOC);
	echo queryToJson($res);
});

$app->get('/aniversariantes', function() use ($queries){
	$res = db()->query($queries['aniversariantes'], PDO::FETCH_ASSOC);
    echo queryToJson($res);
});

$app->run();
