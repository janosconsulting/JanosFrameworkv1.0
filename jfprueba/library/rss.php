<?php
    class rss  extends library implements singletoninterface{
        protected $_path;
        protected $_fileName = 'myLogger.txt';
        
        public static function getInstance()
        {
          if(is_null(self::$instance)){
            self::$instance = new self;
          }
          return self::$instance;
        }
        
        public function geturl($url){
           
            $rss = simplexml_load_file($url);
            return $rss;
        }
    }