<?php

    require_once('Person.php'); 
    
    class Equipe extends Person
    {
        public $function;
        public $description;


        function __construct($table)
        {
            $this->setid ($table['id']);
            $this->name = $table['name'];
            $this->lastname = $table['lastname'];
            $this->email = $table['email'];
            $this->function = $table['function'];
            $this->description = $table['description'];
        }

		public function getid(){
			return $this->id;
		}

		public function setid($id){
			$this->id = $id ;
        }
    }
?>