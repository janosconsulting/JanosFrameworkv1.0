<?php
class listbox
{
	public $datasource = NULL;
	public $datavaluefield;
    public $datatextfield;
    public $selectedIndex = -1;
    public $width = "200px";
    public $name = 'cboCombo';
    public $id = 'cboCombo';
    public $addAll = false;
    public $addSelect = false;
    public $size ="3";

    private function AddOpcionTodos($cadena)
    {
    	if($this->addAll==true){
        	$cadena = $cadena .'<option value="0">Todos</option>';
        }
        return $cadena;
    }

    private function AddSelect($cadena)
    {
    	if($this->addSelect==true){
        	$cadena = $cadena .'<option value="-1">Seleccione Opcion</option>';
        }
        return $cadena;
    }
	public function build()
	{
        $elementos = $this->datasource;

      

        $cadena = "<select size ='{$this->size}'  name ='{$this->name}' id = '{$this->id}' style ='width:{$this->width}'>";
        $cadena = $this->AddSelect($cadena);
        $cadena = $this->AddOpcionTodos($cadena);
        $i = 1;
        foreach ($elementos as $valor) {
           if($i == $this->selectedIndex)
           {
             $cadena = $cadena . '<option selected="selected" value="'. $valor->__get($this->datavaluefield).'">'.$valor->__get($this->datatextfield).'</option>';
           }
           else
           {
           	 $cadena = $cadena . '<option value="'. $valor->__get($this->datavaluefield).'">'.$valor->__get($this->datatextfield).'</option>';
           }
           $i++;
        }
        $cadena = $cadena."</select>";
        return $cadena; 
	}
}