<?php

	require_once('Person.php');
	require_once('Admin.php');
	require_once('File.php');
	require_once('mail.php');
    require_once('DAO.php');

    class Participant extends Person
    {

        private $username;
        private $password;
        public $registration_date;
        public $new_part;
        public $phone_number;


		function __construct($table)
		{
			$this->setid ($table['id']);
			$this->name = $table['name'];
			$this->lastname = $table['lastname'];
            $this->email = $table['email'];
			$this->username = $table['username'];
			$this->password = $table['password'];
            $this->registration_date = $table['registration_date'];
            $this->new_part = $table['new_part'];
            $this->phone_number = $table['phone_number'];
		}


		public function getusername()
		{
			return $this->username;
		}


		public function setusername($username)
		{
			$this->username = $username ;
		}


		public function getpassword()
		{
			return $this->password;
		}


		public function setpassword($password)
		{
			$this->password = $password ;
		}


		// ---------------------------------
		// insert rows into Participant
		public static function insertParticipant($list)
		{
			$dao = new DAO('pfe');
			$arr = array();
			$arr[0] = null;
			$arr[1] = $list['name'];
			$arr[2] = $list['lastname'];
			$arr[3] = $list['email'];
			$arr[4] = $list['username'];
			$arr[5] = md5($list['password']);
			$arr[6] = date("Y-m-d h:i:s");
            $arr[7] = 1;
            $arr[8] = $list['phone_number'];
			try
			{
				if($dao->getVall($list['username'], 'Participant', 'username') == true and $dao->getVall($list['email'], 'Participant', 'email') == true and $dao->getVall($list['username'], 'Admin', 'username') == true and $dao->getVall($list['email'], 'Admin', 'email') == true)
				{
					return 1;
				}
				elseif($dao->getVall($list['username'], 'Participant', 'username') == true and $dao->getVall($list['username'], 'Admin', 'username') == true)
				{
					return 2;
				}
				elseif($dao->getVall($list['email'], 'Participant', 'email') == true and $dao->getVall($list['email'], 'Admin', 'email') == true)
				{
					return 3;
				}
				elseif($dao->Insert('Participant',$arr) == true)
				{
					return 4;
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
				return false;
			}
			finally
			{
				$dao = null;
			}
		}

		// ---------------------------------
		// insert file
		public static function insertFile($list)
		{
			$dao = new DAO('pfe');
			$arr = array();
			$arr[0] = null;
			$arr[1] = $list['id_part'];
			$arr[2] = $list['title'];
			$arr[3] = 1;
			$arr[4] = $list['file_pdf'];
			try
			{
				$namefile = '../source/file/'.uniqid().'.pdf';
				$var = $dao->upload_File($list['file_pdf'], $namefile);
				if( $var == true)
				{
					$arr[4] = $namefile;
					if($dao->Insert('file',$arr))
					{
						echo"<h1>upload is done</h1>";
						$result=$dao->getpdo()->query('SELECT MAX(id) FROM file');
						$iid = $result->fetchColumn();
						$result=$dao->getpdo()->query('SELECT email FROM Participant WHERE id = '.$list['id_part']);
						$email_parti = $result->fetchColumn();
						echo "<h1>$iid</h1>";
						// the "elhoucineessanhaji@gmail.com" is an exemple
						gmail($iid, 'elhoucineessanhaji@gmail.com', $list['title']);
						return true;
					}
				}
				elseif($var == false)
				{
					echo"<h1>error</h1>";
					return false;
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
				return false;
			}
			finally
			{
				$dao = null;
			}
		}



		// ---------------------------------
		// update file
		public static function updateFile($list, $id)
		{
			$dao = new DAO('pfe');
			try
			{
				$sql = 'SELECT * FROM file WHERE id_part = '.$id;
				$r =array();
				$r = $dao->getNotId('File', $sql);
				if(count($r) > 0)
				{
					if($dao->Delete('file', $r[0]->getid()))
					{
						unlink($r[0]->file_pdf);
						echo "<h1>true 1</h1>";
						if(Participant::insertFile($list))
						{
							echo'<h1>true 2</h1>';
							return true;
						}
						echo'<h1>false 2</h1>';
						return false;
					}
				}
				echo'<h1>false 1</h1>';
				return false;
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
				return false;
			}
			finally
			{
				$dao = null;
			}
		}


		//-----------------------------
		// afficher le files our chaque participant
		public static function showFile($id_part)
		{
			try
			{
				$dao = new DAO('pfe');
				$list = array();
				$sql = 'SELECT * FROM file WHERE id_part = '.$id_part;
				$list = $dao->getNotId('file', $sql);
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
				return false;
			}
			finally
			{
				$dao = null;
				return $list;
			}
		}
	}

//     $arr=array();
//	 $arr['id'] = null;
//	 $arr['name'] = 'test';
//	 $arr['lastname'] = 'test';
//	 $arr['email'] = uniqid()."@gmail.com";
//	 $arr['username'] = uniqid();
//	 $arr['password'] = rand(10000000, 99999999);
//     $arr['registration_date'] = null;
//     //$arr['new_part'] = 0;
//     Participant::insertParticipant($arr);
?>
