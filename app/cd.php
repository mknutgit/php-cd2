<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/CDs.php";

    session_start();
    // $ = new Car("2014 Porsche 911", 112344, 1245, "../images/porsche.jpg");
    // $ = new Car("2014 Ford f450", 56892, 12465, "http://2016ford-f150.com/wp-content/uploads/2015/02/2016-Ford-f-150-front-300x225.jpg");
    // $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "../images/lexus.jpg");
    // $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "../images/mercedes.jpg");

    // $app['debug'] = true; for debugging

    if (empty($_SESSION['list_of_cds'])) {
        $_SESSION['list_of_cds'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('cd.list.html.twig', array('cds' => CD::getAll()));
    });


    $app->get("/cd_add", function() use ($app) {
        return $app['twig']->render('cd.add.html.twig');
    });

    $app->post("/cd_created", function() use ($app) {
        $new_cd= new CD($_POST['artist'], $_POST['title']);
        $new_cd->save();
        return $app['twig']->render('cd.created.html.twig', array('newcd' => $new_cd));
    });

    $app->post("/car_form", function() use ($app) {
        $cars_matching_search = array();
        foreach ($_SESSION['list_of_cars'] as $car) {
            if ($car->worthBuying($_POST['maxPrice']) && $car->maxMileage($_POST['maxMileage'])) {
                array_push($cars_matching_search, $car);
            }
        }
        return $app['twig']->render('car_form.html.twig', array('cars' => $cars_matching_search));
    });

    return $app;

?>
