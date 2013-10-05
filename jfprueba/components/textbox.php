<?php
class textbox
{
	
	public $datavaluefield = "";
    public $datatextfield;
   
  
	public function build()
	{
       
        $cadena = "<input type='text' value='{$this->datavaluefield}'>";
        return $cadena; 
	}
	
}