<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RepeatCounter.php";

    session_start();
    if (empty($_SESSION['elements'])) {
    $_SESSION['elements'] = array();
    }

    $app = new Silex\Application();
    $app['debug']  = true;
    $app->register(new Silex\Provider\TwigServiceProvider(),array('twig.path' => __DIR__.'/../views'));



$app->get("/", function() use ($app){
            return $app['twig']->render('template.html.twig');
    });//end /route

    $app->get("/results", function() use ($app){

        $counter = new RepeatCounter;
        $results = $counter->countRepeats($_GET['input1'],$_GET['input2']);
    //    var_dump($results["string_array"]);
            return $app['twig']->render('results.html.twig', array('result' => $results));
    });//end /results route

    return $app;
    ?>
