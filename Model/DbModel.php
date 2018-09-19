<?php

include_once("Model/Thread.php");

class DbModel{
	
	public $db;
	
	
	public function __construct($db = null){
		
		if($db)
			$this->db =  $db;
		
		else{
			$this->db = new PDO('mysql:host=localhost;dbname=forum','root','');
			   
			   echo "Database connect <br><br>";
			
		}
		
	}
	
	
	public function getThreadList()
    {
		echo "----- Model is getting threads from database <br>";
        $threadlist = array();
        foreach($this->db->query('SELECT * FROM thread') as $row) {
			$t = new Thread ($row['threadid'], $row['threadname']);
			array_push($threadlist, $t);
        }
		echo "---- returning the list to controller <br>";
        return $threadlist;
    }
	
	
}




?>