<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RPS.php";

    $app = new Silex\Application();
    $app['debug']  = true;
    $app->register(new Silex\Provider\TwigServiceProvider(),array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app){
            return $app['twig']->render('game.html.twig');

    });

    $app->post("/results", function() use ($app) {
        $rps = new RPS();
        $result = $rps->returnWinner($_POST['player1'], $_POST['player2']);
        return $app['twig']->render('results.html.twig', array('result' => $result));
    });

    return $app;

 ?>
