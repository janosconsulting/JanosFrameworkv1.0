<?php
class uri
{
   
   public static function getPath()
   {
      global $config;
      return $config["urlbase"]."/".$config["path"]."/";
   }

   public static function sendTo($url = '')
   {
      global $config;
      if(empty($url)){
         $url = '';
      }
      $path = $config["path"];
      $url = "/".$path."/".$url;
      die(header('Location: ' . $url));
   }
   
}