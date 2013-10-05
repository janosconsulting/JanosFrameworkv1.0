<?php
class radiobutton
{
	public $name = "";
	public $id = "";
    public $text="";
    public $value="";

    public function build()
    {
       $cadena = "";
       $cadena = $cadena . '<input type="radio" name="'.$this->id  .'" value="'.$this->value.'"/>'.$this->text;                 
       return $cadena;
    }
}
