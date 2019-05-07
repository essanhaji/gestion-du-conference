<?php

    class File
    {

        private $id;
        public $id_part;
        public $title;
        public $new_file;
        public $file_pdf;


        function __construct($table)
        {
            $this->setid ($table['id']);
            $this->id_part = $table['id_part'];
			$this->title = $table['title'];
            $this->new_part = $table['new_file'];   
            $this->file_pdf = $table['file_pdf'];           
        
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