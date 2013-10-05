<?php
class text extends helpers implements singletoninterface
{
	const SETTING_AN_ARRAY = TRUE;
    const NO_PERSISTENT_STORAGE = FALSE;
	protected static $instance = null;
	
	public static function getInstance()
	{
		if(is_null(self::$instance)){
			self::$instance = new self;
		}
		return self::$instance;
	}

	public static function load($params){
		$cadena = "";
	    $readonly = "";
		if(isset($params[1]["readonly"])){
			if($params[1]["readonly"]==true)
			$readonly = "disabled";

		}
		if(isset($params[1]["datasource"]))
		{
			if(@is_array($params[1]["datasource"])){
				$cadena ="";
				foreach ($params[1]["datasource"] as $key => $value) {
                 
					if(@is_array($value)){
						    $par =array();
						    foreach ($value as $key1 => $value1) {
						    	$par[] = $value[$key1];
						    }
							$cadena = $cadena .'<label class="input-control text"><input '.$readonly.' type="' .$params[0].
				                        '" name="' .$par[0]  .
				                        '" value="'.$par[1].'"/>'
				                                   ."<span></span></label><br/>";
						
					}
					else{
						$cadena = $cadena .'<label class="input-control text"><input '.$readonly.' type="' .$params[0].
				                        '" name="' .$key  .
				                        '" value="'.$value.'"/>'
				                                   ."<span></span></label><br/>";
					}
					
				}
			}
			else
			{
				if(@is_object($params[1]["datasource"])){
				   foreach ($params[1]["datasource"] as $key => $value) {
			    
		        $cadena = $cadena .'<label class="input-control text"><input '.$readonly.' type="' .$params[0].
				                        '" name="' .$value->__get($params[1]["id"])  .
				                        '" value="'.$value->__get($params[1]["value"]).'"/>'." <span></span></label><br/>";
				                                  
		           }
			    } 
			}
			
		}
		else
		{
			$cadena ="";
			$cadena = $cadena .'<label class="input-control text"><input '.$readonly.' id="'.$params[1]["id"].'" type="'.$params[0].'" name="'.$params[1]["id"]  
			.'" value="'.$params[1]["value"].'"/> <span></span></label>';
			
		}
		
		return $cadena;
		
	}

}