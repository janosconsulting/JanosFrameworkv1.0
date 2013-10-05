<?php
class productcollection extends daocollection implements daocollectioninterface
{
	public function __construct($current=NULL)
	{

		$this->current = $current;
	}

	public function obtenerlista()
	{
		$connection = db::factory('mysql');
        $connection->connect();
		$sql = "select * from product;";
		$results = $connection->getArray($sql);
		$this->populate($results, 'product');         
	}

	public function obtenerlistaxid($id)
	{
		$connection = db::factory('mysql');
        $connection->connect();
		$sql = "select * from product where id = '{$id}';";
		$results = $connection->getArray($sql);
		$this->populate($results, 'product');         
	}
	
}