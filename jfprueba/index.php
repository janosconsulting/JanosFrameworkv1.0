<?php
require 'includes/config.php';
require 'includes/autoloader.php';

autoloader::includesautoloader('session');
autoloader::includesautoloader('uri');
autoloader::includesautoloader('controller');
autoloader::includesautoloader('exceptions');

session_start(); 

if (isset($_GET['url']))
{
    $params = explode( "/", $_GET['url'] );
  
    session::setitem('controller', new controller($_GET['url']));
}

$view = new view();
session::getitem('controller')->render();
$content = $view->finish();

echo view::show('shell', array('body'=> $content));

session::setitem('mi_variable','mi variable');

$var = "";
$var = session::getitem('mi_variable');

session::unsetitem('mi_variable');