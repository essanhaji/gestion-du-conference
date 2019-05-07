<?php
    require_once('Person.php');

    class Speaker extends Person
    {

        public $description;
        public $phone_number;
        public $picture;

 
        function __construct($table)
        {
			$this->setid ($table['id']);
			$this->name = $table['name'];
			$this->lastname = $table['lastname'];
            $this->email = $table['email'];
			$this->description = $table['description'];
			$this->phone_number = $table['phone_number'];
            $this->picture = $table['picture'];            
		}
    }

?> 