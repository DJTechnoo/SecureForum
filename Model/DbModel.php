<?php

include_once("Model/Thread.php");

class DbModel{
	
	public $db;
	
	
	public function __construct($db = null){
		
		if($db)
			$this->db =  $db;
		
		else{
			$this->db = new PDO('mysql:host=localhost;dbname=forum;charset=utf8mb4;',
               'root' , 'root');
			
		}
		
	}
	
	
	public function getThreadList()
    {
        $threadlist = array();
        foreach($this->db->query('SELECT * FROM thread') as $row) {
            $threadlist[] = new Thread ($row['threadid'], $row['threadname']);
        }

        return $threadlist;
    }
	
	
}




?>