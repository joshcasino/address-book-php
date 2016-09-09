<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/contact.php";

    session_start();

    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
        $contact1 = new Contact('name', 'address', 'phone');

        $_SESSION['list_of_contacts'] = array($contact1);
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array ('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {

        return $app['twig']->render('contact_signup.html.twig', array('contacts' => $_SESSION['list_of_contacts']));

    });

    $app->post("/results", function() use ($app) {

        Car::loopContacts();
        return $app['twig']->render('contact_display.html.twig', array('contacts' => $contacts_matching_search));

    });

    return $app;
?>
