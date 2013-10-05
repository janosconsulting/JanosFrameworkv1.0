<?php
class autoloader
{
  
  public static function moduleautoloader($class)
  {
    global $config;
    $path = $_SERVER['DOCUMENT_ROOT'] .$config["path"]. "/modules/{$class}.php";
    if (is_readable($path)) require $path;
   
  }
  public static function databaseautoloader($class)
  {
    global $config;
    $path = $_SERVER['DOCUMENT_ROOT'] .$config["path"]. "/database/{$class}.php";
    if (is_readable($path)) require $path;
   
  }
  public static function collectionsautoloader($class)
  {
     global $config;
    $path = $_SERVER['DOCUMENT_ROOT'] .$config["path"]. "/collections/{$class}.php";
    if (is_readable($path)) require $path;
   
  }
  public static function libraryautoloader($class)
  {
    global $config;
    $path = $_SERVER['DOCUMENT_ROOT'] .$config["path"]. "/library/{$class}.php";
    if (is_readable($path)) require $path;
   
  }
  public static function helpersautoloader($class)
  {
    global $config;
    $path = $_SERVER['DOCUMENT_ROOT'] .$config["path"]. "/helpers/{$class}.php";
    if (is_readable($path)) require $path;
   
  }
  public static function daoautoloader($class)
  {
    global $config;
    $path = $_SERVER['DOCUMENT_ROOT'] .$config["path"]. "/dataobjects/{$class}.php";
    if (is_readable($path)) require $path;
  }
  public static function includesautoloader($class)
  {
    global $config;
    $path = $_SERVER['DOCUMENT_ROOT'] .$config["path"]. "/includes/{$class}.php";
    if (is_readable($path)) require $path;
  }
  public static function viewsautoloader($class)
  {
    global $config;
    $path = $_SERVER['DOCUMENT_ROOT'] .$config["path"]. "/views/{$class}.php";
    if (is_readable($path)) require $path;
  }
  public static function componentsautoloader($class)
  {
    global $config;
    $path = $_SERVER['DOCUMENT_ROOT'] .$config["path"]. "/components/{$class}.php";
    if (is_readable($path)) require $path;
  }
}
spl_autoload_register('autoloader::includesautoloader');
spl_autoload_register('autoloader::databaseautoloader');
spl_autoload_register('autoloader::daoautoloader');
spl_autoload_register('autoloader::moduleautoloader');
spl_autoload_register('autoloader::viewsautoloader');
spl_autoload_register('autoloader::componentsautoloader');
spl_autoload_register('autoloader::libraryautoloader');
spl_autoload_register('autoloader::helpersautoloader');
spl_autoload_register('autoloader::collectionsautoloader');


