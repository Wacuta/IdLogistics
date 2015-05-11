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


/* retourner la FAQ */
function faq(){
	$json = file_get_contents("faq.json");
	$data = json_decode($json);
	$faq = array();
	$size = sizeof($data);
	for ($i=0; $i < $size; $i++) { 
		$c = $data[$i];
		array_push($faq, $c);
	}
	
	return $faq;
}


// page d'acceuil
$app->get('/', function() use ($app){

	$cWord = coursWord();
	$cExcel = coursExcel();
	$cPp = coursPowerpoint();
	$cOracle = coursOracle();

	$eWord = exerciceWord();
	$eExcel = exerciceExcel();
	$ePp = exercicePowerpoint();
	$eOracle = exerciceOracle();

	$faq = faq();

	return $app['twig']->render('layout.twig', array(
				'cWord' => $cWord,
				'cExcel' => $cExcel,
				'cPp' => $cPp,
				'cOracle' => $cOracle,
				'eWord' => $eWord,
				'eExcel' => $eExcel,
				'ePp' => $ePp,
				'eOracle' => $eOracle,
				'faq' => $faq
			));
});


$app["debug"] = true;

$app->run();