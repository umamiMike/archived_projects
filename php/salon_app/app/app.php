<?php


/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/



    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    $server = 'mysql:host=localhost;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
//var_dump($DB);


    $app = new Silex\Application();
    $app['debug']  = true;
    $app->register(new Silex\Provider\TwigServiceProvider(),array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app){
        $style1 = new Stylist("Dolly");
        $style1->save();
            return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post("/", function() use ($app){
        $stylist = new Stylist($_POST['stylist_name']);
        $stylist->save();
            return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });




    $app->get("/stylist/{id}", function($id) use ($app){
      $stylist = Stylist::find($id);
      return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => Client::find($id)));
  });
  $app->post("/stylist/{id}", function($id) use ($app){
<<<<<<< HEAD
    $client = new Client($_POST['client_name'],);
=======
    $client = new Client($_POST['client_name']);
>>>>>>> 9e6576019a5698ccbf56735446dfff3ea7560c8c
    $client->save();
    $clients = Client::find($id);
    var_dump(Stylist::find($id));
    return $app['twig']->render('stylist.html.twig', array('stylist' => Stylist::find($id), 'clients' => Client::find($id)));
});

    return $app;
    ?>
