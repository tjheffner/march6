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
$app->get("/", function() {
  return "home";
});

//this page should show the newly created contact

//this page should show the delete confirmation

return $app;

?>
