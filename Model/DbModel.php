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
        $threadlist = array();
        foreach($this->db->query('SELECT * FROM thread') as $row) {
			$t = new Thread ($row['threadid'], $row['threadname']);
			echo "Pushing thread $t->id into threadlist <br>";
			array_push($threadlist, $t);
			print_r($threadlist);
        }

        return $threadlist;
    }
	
	
}




?>