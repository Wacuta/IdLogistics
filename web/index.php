<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();


/* definir les twig */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
           'twig.class_path'    => __DIR__ . '/../vendor/twig/twig/lib',
           'twig.path'          => __DIR__ 
        ));


/* inclure la connextion a la bd */
include("admin/requet.php");


// page d'acceuil
$app->get('/', function() use ($app){

	$data = listerCours();

	return $app['twig']->render('layout.twig', array(
				'cours' => $data
			));
});


$app["debug"] = true;

$app->run();