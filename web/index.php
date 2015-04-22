<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();


/* definir les twig */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
           'twig.class_path'    => __DIR__ . '/../vendor/twig/twig/lib',
           'twig.path'          => __DIR__ 
        ));




// page d'acceuil
$app->get('/', function() use ($app){

	$data = 5;

	return $app['twig']->render('layout.twig', array(
				'albums' => $data
			));
});


$app["debug"] = true;

$app->run();