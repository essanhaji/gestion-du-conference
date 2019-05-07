<?php

    class Conference
    {
        
        public $title;
        public $start_date;
        public $end_date;
        public $location;
        public $description;
        public $logo;


        function __construct($table)
        {
			$this->title = $table['title'];
			$this->start_date = $table['start_date'];
			$this->end_date = $table['end_date'];
            $this->location = $table['location'];
			$this->description = $table['description'];
            $this->logo = $table['logo'];            
		}
    }
    
?>