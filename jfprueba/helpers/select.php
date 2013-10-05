<?php
class select extends helpers implements singletoninterface
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
        $cadena = $cadena . "<div class='input-control select'><select size='".$params["size"]."' name='".$params["name"]."' id='".$params["id"]."'>";
        
        if($params["addSelect"]==true){
            $cadena = $cadena . '<option value ="">Seleccionar Campo</option>';  
        }
        if($params["addAll"]==true){
            $cadena = $cadena . '<option  value="0">Todos</option>';  
        }
        if(@is_array($params["datasource"]))
        {
        	 $i = 1;
        	 foreach ($params["datasource"] as $key => $value) {
                if($params["selectIndex"]==$i)
                {
                   $cadena = $cadena . '<option selected="selected" value=' .$key. '>' .$value. '</option>';
                }
                else
                {
                   $cadena = $cadena . '<option value=' .$key. '>' .$value. '</option>';
                }
			    $i = $i + 1 ;
		     }
        }
        else
        {
        	if(@is_object($params["datasource"]))
        	{
        		$i = 1 ;
        	    foreach ($params["datasource"] as $key => $value) {
        	    	 if($params["selectIndex"]==$i)
                     {
                         $cadena = $cadena . '<option selected="selected" value=' .$value->__get($params["value"]). '>' .$value->__get($params["text"]). '</option>';
                     }
                     else
                     {
                         $cadena = $cadena . '<option value=' .$value->__get($params["value"]). '>' .$value->__get($params["text"]). '</option>';
                     }
                     $i = $i + 1 ;
			         
		        }	
        	}
        }
		
		

		$cadena = $cadena . "</select><span></span></div>";
		return $cadena;
	}

}