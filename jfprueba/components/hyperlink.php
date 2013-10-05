<?php
class hyperlink
{
	public $id = "id";
	public $imageurl ="";
	public $navigateurl ="";
	public $target ="_blank";
	public $text ="";
	public $tooltip ="";
	public $visible =true;
	public $width ="100px";
	public $name ="name";

	public function build()
	{
       $cadena ="";
       if($this->visible == true)
       {
       	  if($this->imageurl=="")
       	  {
       	  	$cadena = $cadena . '<a   href   ="'.$this->navigateurl.'" 
       	  	                          id     ="'.$this->id.'" 
       	  	                          title  ="'.$this->tooltip.'"
       	  	                          width  ="'.$this->width.'" 
       	  	                          target ="'.$this->target.'">
       	  	                          '.$this->text.'
       	  	                     </a>';
       	  }
       	  else
       	  {
       	  	$cadena = $cadena . '<a   href   ="'.$this->navigateurl.'" 
       	  	                          id     ="'.$this->id.'" 
       	  	                          title  ="'.$this->tooltip.'"
       	  	                          width  ="'.$this->width.'" 
       	  	                          target ="'.$this->target.'">
       	  	                        <img src ="'.$this->imageurl.'" 
       	  	                             alt ="'.$this->tooltip.'"/>
       	  	                     </a>';
       	  }
       }
       return $cadena;
	}
}