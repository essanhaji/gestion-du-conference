<?php
	
	require_once('Message.php');

	class Person
	{
	
		private $id;
		public $name;
        public $lastname;
		public $email;
        

        function __construct($table){
			$this->id = $table['id'];
			$this->name = $table['name'];
			$this->lastname = $table['lastname'];
			$this->email = $table['email'];
		}

		public function getid(){
			return $this->id;
		}

		public function setid($id){
			$this->id = $id ;
		}

		public static function sendEmail($message_v)
		{
			require_once('mail.php');
			contact($message_v);
		}
	}
?>
