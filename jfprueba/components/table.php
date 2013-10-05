<?php
class table
{
	public $datasource = NULL;
    public $datatextfield;
    public $selectedIndex = -1;
    public $width = "200px";
    public $name = 'cboCombo';
    public $id = 'datatable_3';
    public $cabecera;
    public $border = "1";
    public $classTable ="";
    public $classTh = "";
    public $classTd = "";
    public $classTr = "";
    public $edit = false;
    public $delete = false;
    public $select = false;
    public $addCheckBox = false;
    public $addAction = false;
    public $editurl = "#";
    public $deleteurl = "#";

    public function build()
    {
    	$cadena = "<table  class='".$this->classTable."' id = '".$this->id."' name = '".$this->name."'>";
        $elementos = $this->datasource;
        $cadena =$cadena. "<thead><tr style ='font-size:9px !important' class = '".$this->classTr."'>";
       
        $cabecera = $this->cabecera;
        $datatextfield = $this->datatextfield;
        if($this->addCheckBox){
            $cadena = $cadena. "<th><input type = 'checkbox' id='c0'/><label for='c0'><span></span></label></th>";
        }
        
        foreach ($cabecera as $value) {
           	$cadena = $cadena. "<th class = '".$this->classTh."'>" . $value . "</th>";
        }   
         
        if($this->addAction){
             $cadena = $cadena . "<th>Accion</th>";
        }

       
        $cadena .= '</tr></thead>';
        $i = 1;
        $array= array();
        $count = 1;

        foreach ($elementos as $valor) {
          
             $cadena = $cadena . "<tr class = '".$this->classTr."'>";
            
             if($this->addCheckBox){
                  $cadena = $cadena. "<td class = 't_center'><input name = 'chkTable' type = 'checkbox' value = '{$valor->__get('id')}' id='c{$count}'/><label for = 'c{$count}'><span></span></label></td>";
             }
             foreach ($datatextfield as $value) {
               
             	$cadena = $cadena . "<td class = '".$this->classTd."'>";
             	$cadena = $cadena . $valor->__get($value);
             	$cadena = $cadena . '</td>';
             }
            
            $edit = explode("/", $this->editurl);
            $delete = explode("/", $this->deleteurl);
            if($this->addAction){
                 $cadena = $cadena . "<td class = '".$this->classTd."'>";
             if($this->edit){
                 $cadena = $cadena . "<a href='".uri::getPath().$edit[0].'/'.$edit[1].'/'.$valor->__get($edit[2])."'  class='update'>Edit</a> /";
             }
             
             if($this->delete){
                 $cadena = $cadena . "<a href='".uri::getPath().$delete[0].'/'.$delete[1].'/'.$valor->__get($delete[2])."'  class='delete'>Delete</a> /";
             }

             if($this->select){
                 $cadena = $cadena . "<a href='".uri::getPath().$edit[0].'/'.$edit[1].'/'.$valor->__get($edit[2])."'  class='select'>Select</a> ";
             }
            $cadena = $cadena . "</td>";
            
            }
            
             
             $cadena = $cadena . '</tr>';

             $count = $count + 1;
        }
        $cadena = $cadena . '</table>';
        return $cadena; 
    }
}
