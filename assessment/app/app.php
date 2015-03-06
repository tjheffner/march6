<?
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/contact.php";

//session info here
session_start();
if(empty($_SESSION['list_of_contacts'])) {
  $_SESSION['list_of_contacts'] = array();
}

$app = new Silex\Application();

//twig registration goes here
$app->register(new Silex\Provider\TwigServiceProvider(), array ('twig.path' => __DIR__.'/../views'));

//this page should display all existing contacts + a form for new ones + a button to clear all contacts
$app->get("/", function() use($app) {
  return $app['twig']->render('main.twig', array('contacts' => Contact::getAll()));
});

//this page should show the newly created contact
$app->post("/add_contact", function() use ($app) {
  $contact = new Contact($_POST['name'], $_POST['phone'], $_POST['address']);
  $contact->save();
  return $app['twig']->render('add_contact.twig', array('newcontact' => $contact));
});

//this page should show the delete confirmation
$app->post("/delete", function() use ($app) {
return $app['twig']->render('delete.twig', array('contacts' => Contact::deleteAll()));
});


return $app;

?>
