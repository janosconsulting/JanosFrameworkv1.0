<?php
class clientservice extends library implements singletoninterface
{
	const SETTING_AN_ARRAY = TRUE;
    const NO_PERSISTENT_STORAGE = FALSE;
	protected static $instance = null;
	
	public $url = "";

	public static function getInstance()
	{
		if(is_null(self::$instance)){
			self::$instance = new self;
		}

		return self::$instance;
	}
	public function call($params)
	{
       require_once('nusoap.php');
       $client = new soapclient($this->url, true);
       $err = $client->getError();
       if ($err) {
       // Display the error
           echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
       // At this point, you know the call that follows will fail
       }
       // Call the SOAP method
       $result = $client->call($params[0], $params[1]);
       // Check for a fault Comprueba si hay un fallo...
       if ($client->fault) {
             echo '<h2>Fault</h2><pre>';
             print_r($result);
             echo '</pre>';
       } else {
             // Check for errors
             $err = $client->getError();
            if ($err) {
                 // Display the error
                 echo '<h2>Error</h2><pre>' . $err . '</pre>';
            } 
            else {
               return $result;
        }
      }
	}
}