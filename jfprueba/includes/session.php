<?php
class session
{
   const SETTING_AN_ARRAY = TRUE;
   public static $path;
   const NO_PERSISTENT_STORAGE = FALSE;

   public static function getitem($name, $persist = TRUE)
   {
      $return = NULL;
      if (isset($_SESSION[$name])) {
         $return = $_SESSION[$name];
         if (!$persist) unset($_SESSION[$name]);
      }
      return $return;
   }

   public static function setitem($name, $value, $array = false)
   {
      if ($array) {
         if (!isset($_SESSION[$name])) {
         $_SESSION[$name] = array();
         $_SESSION[$name][] = $value;
         }
      }
      else {
         $_SESSION[$name] = $value;
      }
   }

   public static function unsetitem($name)
   {
     
      if (!isset($_SESSION[$name])) {
        unset($_SESSION[$name]);
      }
     
   }
   
  
}