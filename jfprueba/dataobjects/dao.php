<?php

class dao
{
	public $values = array();
  
   

	public    function __construct($qualifier = NULL)
	{
		//var_dump($qualifier);
		if(!is_null($qualifier)){
			
			$conditional = array();

	     	if(is_numeric($qualifier)){
			    $conditional = array('id' => $qualifier);
		    }
		    else if(is_array($qualifier)){
               $conditional = $qualifier;
               
		    }
		    else{
			    throw new Exception("Invalidad type of quialifier given");
		    }
		     $this->populate($conditional);
		}
	}
	public    function __set($name,$value)
	{
        $this->values[$name] = $value;
	}
	public    function __get($name)
	{
       if(isset($this->values[$name])){
           return $this->values[$name];
       }
       else{
       	   return null;
       }
	}
	protected function populate($conditional)
	{
		$connection = db::factory('mysql');
		$connection->connect();
		$sql = "select * from {$this->table} where ";
		$qualifier = '';

        var_dump($conditional);
        foreach ($conditional as $column => $value) {
        	if(!empty($qualifier)){
        		$qualifier .= ' and ';
        	}
        	$qualifier .=" `{$column} `='" .$value."' ";
        }

        $sql .=$qualifier;
        $sql = htmlentities($sql);
		$valuearray = $connection->getArray($sql);
		if(!isset($valuearray[0])){
			$valuearray[0] = array();
		}

		foreach ($valuearray[0] as $name => $value) {
			$this->$name = $value;
		}
	}

	public    function save(){
     
        $key =$this->key;

     
		if(!$this->$key){
			return $this->create();
		}
		else{
			
			return $this->update();
		}
	}
	protected function create(){

		$connection = db::factory('mysql');
        $connection->connect();
		$sql   = "insert into {$this->table} (`";
	    $sql  .= implode('`, `', array_keys($this->values));
	    $sql  .= "`) values ('";

	    $clean =array();
	    foreach ($this->values as $value) {
	     	$clean[] = $value;
	    } 

	    $sql  .=implode("','",$clean);
	    $sql  .="')";
        $sql = htmlentities($sql);
        $this->id = $connection->insertGetID($sql);

        return $this->id;
	}

	public    function delete(){
		$connection = db::factory('mysql');
	    $connection->connect();
	     $_key = $this->key;
		$sql = "delete from  {$this->table} ";
		$sql .="where {$this->key} = {$this->$_key};";
        $sql = htmlentities($sql);
		return $connection->execute($sql);
	}

	protected function update(){

		$connection = db::factory('mysql');
	    $connection->connect();
		$sql = "update {$this->table} set ";

		$updates = array();
		foreach ($this->values as $key => $value) {
			$updates[] = "`{$key}` ='".$value."'";
		}

        $_key = $this->key;
		$sql .=implode(',', $updates);
		$sql .="where {$this->key} = {$this->$_key};";
        $sql = htmlentities($sql);
		return $connection->execute($sql);
        
	}
	
}