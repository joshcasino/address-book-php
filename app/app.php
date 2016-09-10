<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/contact.php";

    $app = new Silex\Application();

    session_start();

    if (empty($_SESSION['contacts'])) {
    $_SESSION['contacts'] = array();
    }

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get('/', function() use ($app){

      return $app['twig']->render('contact.html.twig', array('contacts' => $_SESSION['contacts']));
    });

    $app->post('/postcontact', function() use ($app) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $new_contact = new Contact($name, $address, $phone);
        array_push($_SESSION['contacts'], $new_contact);
        return $app->redirect('/');
    });

    $app->get('/delete_contacts', function() use ($app){
        Contact::clear();
        return $app->redirect('/');
    });

    return $app;
?>
