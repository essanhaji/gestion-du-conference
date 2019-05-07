<?php

    class Sponsor
    {

        private $id;
        public $name;
        public $logo;
        public $website; 


        function __construct($table)
        {
			$this->setid ($table['id']);
			$this->name = $table['name'];
			$this->logo = $table['logo'];
            $this->website = $table['website'];          
        }


        public function getid()
        {
			return $this->id;
		}


        public function setid($id)
        {
			$this->id = $id ;
		}
    }

?>
