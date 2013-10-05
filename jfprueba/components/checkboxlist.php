<?php
class checkboxlist
{
	public $datasource = NULL;
	public $datavaluefield;
    public $datatextfield;
    public $selectedIndex = -1;
    public $width = "200px";
    public $name = 'cboCombo';
    public $id = 'cboCombo';
    public $direction ="horizontal";

    public function build()
    {
        $elementos = $this->datasource;
        
        $cadena = "";
        $i = 1;
        foreach ($elementos as $valor) {
           	 
             $cadena = $cadena . '<input type="checkbox" name="'.$valor->__get($this->datavaluefield)  .'" value="'.$valor->__get($this->datavaluefield).'"/>'.$valor->__get($this->datatextfield);  
             if($this->direction == "vertical"){
             	$cadena = $cadena . "<br>";
             }               
        }
        return $cadena; 
    }
}
