<?php

include_once("Model/DbModel.php");

class Controller {
	
	public $dbModel;
	
	public function __construct(){
		$this->dbModel = new DbModel();
		
	}
	
	
	public function invoke(){
		 if (!isset($_GET['thread']))  
          {  
               // no special book is requested, we'll show a list of all available books 
				echo "<br>Controller requested the threadlist from Model <br>";
               $threads = $this->dbModel->getThreadList();
				echo "Controller got the threads<br>";
               include'View/threadlist.php'; 
          } 
          else 
          { 
               // show the requested book 
              /* $thread = $this->dbModel->getThreadList($_GET['book']); 
               include 'view/viewthread.php';*/  
          }  
	}
	
	
}



?>