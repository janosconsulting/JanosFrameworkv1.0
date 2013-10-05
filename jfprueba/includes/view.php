<?php
class view
{
   public static $pathAplicacion;
   public static $viewtype = "default";
   public function __construct()
   {
     ob_start();
    
   }
   public function finish()
   {
     $content = ob_get_clean();
     return $content;
   }
   public static function show($location, $params = array())
   {
     global $config;
     $theme = $config["theme"];
     $views = array();
     
        $views[] = $_SERVER['DOCUMENT_ROOT'] .'/'.$config["path"]. '/views/'. $location . '.php';
         
     $location . '.php';
     $content = '';
     foreach ($views as $viewlocation) {
         if (is_readable($viewlocation)) {
         $view = $params;
         ob_start();
         include $viewlocation;
         $content = ob_get_clean();
         break;
         }
     }
    return $content;
   }
}