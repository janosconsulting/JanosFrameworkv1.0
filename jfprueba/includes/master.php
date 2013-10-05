<?php
  class master{

  	public static function load($content,$titulo,$subtitulo)
  	{
      global $config;

  		 ob_end_clean();
         $titulo = $titulo;
         $subtitulo = $subtitulo;
  	     $pagemaincontent = $content;
        
         $path = $_SERVER['DOCUMENT_ROOT'] .'/'.$config["path"].'/views/standard/'.$config["theme"].'/master.php';
          if (is_readable($path)) include $path;
  	}
    
  }
?>