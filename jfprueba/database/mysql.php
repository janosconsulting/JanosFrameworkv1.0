<?php
class mysql extends db implements singletoninterface
{
	protected static $instance = null;
	protected $link;
    
    public $user = "";
    public $pass = "";
    public $host = "";
    public $db = "";

	public static function getInstance()
	{
		if(is_null(self::$instance)){
			self::$instance = new self;
		}
		return self::$instance;
	}

	protected function __construct()
	{
		global $config;
		$_bd   = $config["database"];
		$_user = $config["user"];
		$_pass = $config["pass"];
		$_host = $config["host"];
		if($this->user == "")
		{
			$this->user =$_user;
		}
        if($this->pass == "")
		{
			$this->pass =$_pass;
		}
		if($this->host == "")
		{
			$this->host =$_host;
		}
		if($this->db == "")
		{
			$this->db =$_bd;
		}
		
	}
    public function connect(){
    	$this->link = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
		$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
	
    public function MostrarMensaje($mensaje){
    	?>
    	 <script type="text/javascript" src="http://localhost/JanosFramework/assets/js/assets/jquery-1.9.0.min.js"></script>
        <script>
        $(document).ready(function(){
           $.ajax({
              type: "POST",
              url: "http://localhost/JanosFramework/mensaje/establecermensaje",
              data: { mensaje:"<?php echo $mensaje;?>",tipomensaje:2,nromensaje:2}
            }).done(function( msg ) {
              document.write(msg);
          });
         });
          
        </script>
    	<?php
    	
    }
	public function getArray($query)
	{
		try{
          $result = $this->link->query($query);
		  $return = array();

	      if($result){
			while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $return[] = $row;
			}
			
		   }
		  return $return;
		}
		catch(PDOException $ex){
             $this->MostrarMensaje($ex->getMessage());
		}
		
	}
	
    public function executeFile()
    {
    	$file_content = file('http://localhost/JanosFramework/includes/Script_Generate.sql');
        $query = "";
        foreach($file_content as $sql_line){
         if(trim($sql_line) != "" && strpos($sql_line, "--") === false){
           $query .= $sql_line;
           if (substr(rtrim($query), -1) == ';'){
              //echo $query;
              $result = mysqli_query($this->link,$query) or die($this->sendMessage(mysqli_error($this->link)));
              $query = "";
           }
         }
        }
    }
    public function sendMessage($message){
    	echo view::show('standard/messagedialog',array('mensaje'=>$message,'title'=>'Error Message','tipo'=>'error'));
    }

    public function getNumRows($query){
    	
        $result = $this->link->query($query);
        $row_count = $result->rowCount();
        return $row_count;
    }

	public function execute($query)
	{
		$result = $this->link->prepare($query);
		$affected_rows = $result->execute();
		return $affected_rows;
	}

	public function insertGetID($query)
	{
		$this->execute($query);
		$insertedId = $this->link->lastInsertId();
        return $insertedId;
	}
}
?>