<?php

	require_once('Person.php');
	require_once('Conference.php');
	require_once('Equipe.php');
	require_once('Participant.php');
	require_once('Speaker.php');
	require_once('Sponsor.php');
	require_once('DAO.php');
 

	class Admin extends Person
	{
 

		private $username;
		private $password;
 

		function __construct($table)
		{
			$this->setid( $table['id']);
			$this->name = $table['name'];
			$this->lastname = $table['lastname'];
			$this->email = $table['email'];
			$this->username = $table['username'];
			$this->password = $table['password'];
		}


		public function getusername()
		{
			return $this->username;
		}


		public function setusername($username)
		{
			$this->username = $username ;
		}


		public function getPassword()
		{
			return $this->password;
		}


		public function setPassword($password)
		{
			$this->password = $password;
		}


//-------------------------------File start---------------------------------------//
		//------------------------------
		// afficher tout les File
		public static function showAllFile()
		{
			try
			{
				$dao = new DAO('pfe');
				$list = array();
				$list = $dao->getlist('File');
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

		//------------------------------
		// afficher chaque File avec le nom et pre et email
		public static function showFilePart()
		{
			$dao = new DAO('pfe');
			$L=array();
			$sql='SELECT file.id, file.id_part, file.title, file.file_pdf, participant.name, participant.lastname, participant.email  FROM file, participant WHERE participant.id=file.id_part';
		 	$result=$dao->getpdo()->query($sql);
			while($dta=$result->fetch())
	        {
	        	$a=array();
	        		$a[]=$dta['id'];
	        		$a[]=$dta['id_part'];
	        		$a[]=$dta['title'];
	        		$a[]=$dta['file_pdf'];
	        		$a[]=$dta['name'];
	        		$a[]=$dta['lastname'];
	        		$a[]=$dta['email'];
				$L[] = $a;
			}
			return $L;
		}

		public static function showAllInfoPdf($sql)
		{
			$dao = new DAO('pfe');
			$L=array();
		 	$result=$dao->getpdo()->query($sql);
			while($dta=$result->fetch())
	        {
	        	$a=array();
	        		$a[]=$dta['id'];
	        		$a[]=$dta['id_part'];
	        		$a[]=$dta['title'];
	        		$a[]=$dta['name'];
	        		$a[]=$dta['lastname'];
	        		$a[]=$dta['email'];
	        		$a[]=$dta['file_pdf'];
			}
			return $a;
		}

		//------------------------------
		// afficher les nouveau files
		public static function newFile1()
		{
			$dao = new DAO('pfe');
			$sql='SELECT count(new_file) FROM file WHERE new_file = 1';
			$result=$dao->getpdo()->query($sql);
			$var = $result->fetchColumn(); 
			return $var;
		}

		//------------------------------
		// update les nouveau files
		public static function newFile0()
		{
			$dao = new DAO('pfe');
			$sql='UPDATE file SET new_file = 0';
	   		$result=$dao->getpdo()->prepare($sql);
			if ($result->execute())
			{
				return true;
			}
			else 
			{
				return false;
			}
		}

		//------------------------------
		// show nbr totale of files
		public static function nbrTotalFile()
		{
			$dao = new DAO('pfe');
			$sql='SELECT count(id) FROM file';
			$result=$dao->getpdo()->query($sql);
			$var = $result->fetchColumn(); 
			return $var;
		}
//-------------------------------File end---------------------------------------//


//-------------------------------Participant start---------------------------------------//
		//------------------------------
		// afficher tout les Participant
		public static function showAllParticipant()
		{
			try
			{
				$dao = new DAO('pfe');
				$list = array();
				$list = $dao->getlist('Participant');
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

		//------------------------------
		// afficher les nouveau participant
		public static function newPart1()
		{
			$dao = new DAO('pfe');
			$sql='SELECT count(new_part) FROM participant WHERE new_part = 1';
			$result=$dao->getpdo()->query($sql);
			$var = $result->fetchColumn(); 
			return $var;
		}

		//------------------------------
		// update les nouveau participant
		public static function newPart0()
		{
			$dao = new DAO('pfe');
			$sql='UPDATE participant SET new_part = 0';
	   		$result=$dao->getpdo()->prepare($sql);
			if ($result->execute())
			{
				return true;
			}
			else 
			{
				return false;
			}
		}

		// ---------------------------------
		// update participant
		public static function updateParticipant($list, $id)
		{
			$dao = new DAO('pfe');
			$arr = array();
			$arr[0] = null;
			$arr[1] = $list['name'];
			$arr[2] = $list['lastname'];
			$arr[3] = $list['email'];
			$arr[4] = $list['username'];
			$arr[5] = md5($list['password']);
			$arr[6] = null;
            $arr[7] = null;
            $arr[8] = $list['phone_number'];
            //print_r($arr);
			try
			{
				$sql = "SELECT * FROM Participant WHERE id <> ".$id;
				$lst = array();
				$lst = $dao->getNotId('Participant', $sql);
				for($i=0; $i<count($lst); $i++)
				{
					if($lst[$i]->email == $list['email'] and $lst[$i]->getusername() == $list['username'])
					{
						//echo"email and username is existed";
						return 1;
					}
					elseif($lst[$i]->email == $list['email'])
					{
						//echo"email is existed";
						return 2;
					}
					elseif($lst[$i]->getusername() == $list['username'])
					{
						//echo"username is existed";
						return 3;
					}
				}
				if($dao->Update('Participant', $arr, $id) == true)
				{
					//echo"is updated";
					return 4;
				}
				else
				{
					//echo "kjk";
				}
				$sql = "SELECT * FROM admin WHERE id <> ".$id;
				$lst = array();
				$lst = $dao->getNotId('Admin', $sql);
				//print_r($lst);
				for($i=0; $i<count($lst); $i++)
				{
					if($lst[$i]->email == $list['email'] and $lst[$i]->getusername() == $list['username'])
					{
						//echo"email and username is existed";
						return 1;
					}
					elseif($lst[$i]->email == $list['email'])
					{
						//echo"email is existed";
						return 2;
					}
					elseif($lst[$i]->getusername() == $list['username'])
					{
						//echo"username is existed";
						return 3;
					}
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

		//------------------------------
		// show nombre totale of participants
		public static function nbrTotalPart()
		{
			$dao = new DAO('pfe');
			$sql='SELECT count(id) FROM Participant';
			$result=$dao->getpdo()->query($sql);
			$var = $result->fetchColumn(); 
			return $var;
		}

		//------------------------------
		// show nbr of last participantd
		public static function nbrLastPart()
		{
			$dao = new DAO('pfe');
			$sql='SELECT * FROM Participant ORDER BY id DESC LIMIT 10';
			$result=$dao->getpdo()->query($sql);
			while($dta=$result->fetch())
	        {
				$L[] = new Participant($dta);
			}
			///print_r($L);
			return $L;
		}
//-------------------------------Participant end---------------------------------------//


//-------------------------------Equipe start---------------------------------------//
		//-----------------------------
		// afficher tout les Participant
		public static function showTeamMembers()
		{
			try
			{
				$dao = new DAO('pfe');
				$list = array();
				$list = $dao->getlist('Equipe');
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
		// ---------------------------------
		// insert rows into Equipe
		public static function insertTeamMember($list)
		{
			$dao = new DAO('pfe');
			$arr = array();
			$arr[0] = $list['id'];
			$arr[1] = $list['name'];
			$arr[2] = $list['lastname'];
			$arr[3] = $list['email'];
			$arr[4] = $list['function'];
			$arr[5] = $list['description'];
			try
			{
				if($dao->getVall($list['email'], 'Equipe', 'email') == true)
				{
					echo'<h1>false</h1>';
					return false;
				}
				elseif($dao->Insert('Equipe', $arr) == true )
				{
					echo'<h1>true</h1>';
					return true;
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
		// update Equipe
		public static function updateTeamMember($list, $id)
		{
			$dao = new DAO('pfe');
			$arr = array();
			$arr[0] = null;
			$arr[1] = $list['name'];
			$arr[2] = $list['lastname'];
			$arr[3] = $list['email'];
			$arr[4] = $list['function'];
			$arr[5] = $list['description'];
			try
			{
				$sql = "SELECT * FROM equipe WHERE id <> ".$id;
				$lst = array();
				$lst = $dao->getNotId('equipe', $sql);
				for($i=0; $i<count($lst); $i++)
				{
					if($lst[$i]->email == $list['email'])
					{
						echo"email is existed";
						return 1;
					}
				}
				if($dao->Update('equipe', $arr, $id) == true)
				{
					echo"is updated";
					return 2;
				}
				else
				{
					echo'not found';
					return 3;
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
			}
			finally
			{
				$dao = null;
			}
		}
//-------------------------------Equipe end---------------------------------------//


//-------------------------------Speakers start---------------------------------------//
		//-----------------------------
		// afficher tout les Speakers
		public static function showAllSpeakers()
		{
			try
			{
				$dao = new DAO('pfe');
				$list = array();
				$list = $dao->getlist('Speaker');
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
		// ---------------------------------
		// insert rows into Speaker
		public static function insertSpeaker($list)
		{
			$dao = new DAO('pfe');
			$arr = array();
			$arr[0] = null;
			$arr[1] = $list['name'];
			$arr[2] = $list['lastname'];
			$arr[3] = $list['email'];
			$arr[4] = $list['description'];
			$arr[5] = $list['phone_number'];
			$arr[6] = $list['picture'];
			print_r($arr);
			try
			{
				if($dao->getVall($list['email'], 'speaker', 'email') == true)
				{
					//echo'<h1>false</h1>';
					return false;
				}
                else
                {
                    $picture_name = uniqid();
                    $arr[6] = $dao->upload_Picture($list['picture'], $picture_name, 'speaker');
                    //echo"<h1>$arr[6]</h1>";
                    print_r($arr);
                    if($dao->Insert('Speaker',$arr)==true )
                    {
                        //echo'<h1>true</h1>';
                        return true;
                    }
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
		// update Speaker
		public static function updateSpeaker($list, $id)
		{
			$dao = new DAO('pfe');
			$arr = array();
			$arr[0] = null;
			$arr[1] = $list['name'];
			$arr[2] = $list['lastname'];
			$arr[3] = $list['email'];
			$arr[4] = $list['description'];
			$arr[5] = $list['phone_number'];
			$arr[6] = $list['picture'];

			try
			{
				$sql = "SELECT * FROM Speaker WHERE id <> ".$id;
				$lst = array();
				$lst = $dao->getNotId('Speaker', $sql);
				for($i=0; $i<count($lst); $i++)
				{
					if($lst[$i]->email == $list['email'])
					{
						//echo"email is existed";
						return false;
					}
				}
				$picture_name = $dao->getPic('speaker', 'picture', $id);
				//echo"<h1>ok :::::: $picture_name</h1>";
				unlink($picture_name);
				$picture_name = uniqid();
				$arr[6] = $dao->upload_Picture($list['picture'], $picture_name, 'speaker');
				//echo"<h1>$arr[6]</h1>";
				if($dao->Update('Speaker',$arr, $id) == true)
				{
					//echo'<h1>true</h1>';
					return true;
				}
				else
				{
					//echo"<h1>false</h1>";
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

		//------------------------------
		// show nbr totale of speakers
		public static function nbrTotalSpeakes()
		{
			$dao = new DAO('pfe');
			$sql='SELECT count(id) FROM Speaker';
			$result=$dao->getpdo()->query($sql);
			$var = $result->fetchColumn(); 
			return $var;
		}
//-------------------------------Speakers end---------------------------------------//


//-------------------------------Admin start---------------------------------------//
		//-----------------------------
		// afficher tout les Admin
		public static function showAllAdmin()
		{
			try
			{
				$dao = new DAO('pfe');
				$list = array();
				$list = $dao->getlist('Admin');
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
		// ---------------------------------
		// insert rows into Admin
		public static function insertAdmin($list)
		{
			$dao = new DAO('pfe');
			$arr = array();
			$arr[0] = null;
			$arr[1] = $list['name'];
			$arr[2] = $list['lastname'];
			$arr[3] = $list['email'];
			$arr[4] = $list['username'];
			$arr[5] = md5($list['password']);
			try
			{
				if($dao->getVall($list['username'], 'Admin', 'username') == true and $dao->getVall($list['email'], 'Admin', 'email') == true and $dao->getVall($list['username'], 'Participant', 'username') == true and $dao->getVall($list['email'], 'Participant', 'email') == true)
				{
					//echo"<h1>email and username is exist</h1>"; 
					return 1;
				}
				elseif($dao->getVall($list['username'], 'Admin', 'username') == true and $dao->getVall($list['username'], 'Participant', 'username') == true)
				{
					//echo"<h1>username is exist</h1>";
					return 2;
				}
				elseif($dao->getVall($list['email'], 'Admin', 'email') == true and $dao->getVall($list['email'], 'Participant', 'email') == true)
				{
					//echo"<h1>email is exist</h1>"; 
					return 3;
				}
				elseif($dao->Insert('Admin',$arr)==true)
				{
					//echo"<h1>you are regested now</h1>";
					return 4;
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
			}
			finally
			{
				$dao = null;
			}
		}

		// ---------------------------------
		// update Admin
		public static function updateAdmin($list, $id)
		{
			$dao = new DAO('pfe');
			$arr[0] = null;
			$arr[1] = $list['name'];
			$arr[2] = $list['lastname'];
			$arr[3] = $list['email'];
			$arr[4] = $list['username'];
			$arr[5] = md5($list['password']);
			try
			{
				$sql = "SELECT * FROM admin WHERE id <> ".$id;
				$lst = array();
				$sql1 = "SELECT * FROM participant WHERE id <> ".$id;
				$lst1 = array();
				$lst1 = $dao->getNotId('Participant', $sql1);
				for($i=0; $i<count($lst); $i++)
				{
					if($lst[$i]->email == $list['email'] and $lst[$i]->getusername() == $list['username'])
					{
						//echo"email and username is existed";
						return 1;
					}
					elseif($lst[$i]->email == $list['email'])
					{
						//echo"email is existed";
						return 2;
					}
					elseif($lst[$i]->getusername() == $list['username'])
					{
						//echo"username is existed";
						return 3;
					}
				}
				$sql = "SELECT * FROM participant WHERE id <> ".$id;
				$lst = array();
				$lst = $dao->getNotId('Participant', $sql);
				for($i=0; $i<count($lst); $i++)
				{
					if($lst[$i]->email == $list['email'] and $lst[$i]->getusername() == $list['username'])
					{
						//echo"email and username is existed";
						return 1;
					}
					elseif($lst[$i]->email == $list['email'])
					{
						//echo"email is existed";
						return 2;
					}
					elseif($lst[$i]->getusername() == $list['username'])
					{
						//echo"username is existed";
						return 3;
					}
				}
				if($dao->Update('Admin', $arr, $id) == true)
				{
					//echo"is updated";
					return 4;
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
			}
			finally
			{
				$dao = null;
			}
		} 

		public static function EditAccount($rqt)
		{
			$dao = new DAO('pfe'); 
			$result=$dao->getpdo()->prepare($rqt);
			if ($result->execute())
			{
				return true;
			}
			else 
			{
				return false;
			}
		}

		
//-------------------------------Admin end---------------------------------------//


//-------------------------------Conference start---------------------------------------//
		//-----------------------------
		// afficher tout les Conference
		public static function showConference()
		{
			try
			{
				$dao = new DAO('pfe');
				$list = array();
				$list = $dao->getlist('Conference');
				//print_r($list);
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
		// ---------------------------------
		// update Conference
		public static function updateConference($list)
		{
			$dao = new DAO('pfe');
			$arr = array();
			$arr[0] = $list['title'];
			$arr[1] = $list['start_date'];
			$arr[2] = $list['end_date'];
			$arr[3] = $list['location'];
			$arr[4] = $list['description'];
			$arr[5] = null;//$list['logo'];
			try
			{
				//$table = Admin::showConference();
				//$picture_name = $table[0]->logo;
				//echo"<h1>ok :::::: $picture_name</h1>";
				//unlink($picture_name);
                //$picture_name = uniqid();
                $arr[5] = $dao->upload_Picture($list['logo'], 'logo', 'conference');
                //echo"<h1>$arr[5]</h1>";
				if($dao->UpdateAllRows('conference', $arr) == true)
				{
					//echo'<h1>true</h1>';
					return true;
				}
				else
				{
					//echo"<h1>false</h1>";
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
//-------------------------------Conference end---------------------------------------//


//-------------------------------Sponsor start---------------------------------------//
		//-----------------------------
		// afficher tout les Sponsor
		public static function showAllSponsor()
		{
			try
			{
				$dao = new DAO('pfe');
				$list = array();
				$list = $dao->getlist('sponsor');
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
		// ---------------------------------
		// insert rows into sponsor
		public static function insertSponsor($list)
		{
			$dao = new DAO('pfe');
			$arr = array();
			$arr[0] = $list['id'];
			$arr[1] = $list['name'];
			$arr[2] = $list['logo'];
			$arr[3] = $list['website'];
			try
			{
                $picture_name = uniqid();
                $arr[2] = $dao->upload_Picture($list['logo'], $picture_name, 'sponsor');
                echo"<h1>$arr[2]</h1>";
                if($dao->Insert('sponsor',$arr)==true )
                {
                    //echo'<h1>true</h1>';
                    return true;
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
		// update sponsor
		public static function updateSponsor($list, $id)
		{
			$dao = new DAO('pfe');
			$arr = array();
			$arr[0] = null;
			$arr[1] = $list['name'];
			$arr[2] = $list['logo'];
			$arr[3] = $list['website'];
			try
			{
				$picture_name = $dao->getPic('sponsor', 'logo', $id);
				//echo"<h1>ok :::::: $picture_name</h1>";
				unlink($picture_name);
                $picture_name = uniqid();
                $arr[2] = $dao->upload_Picture($list['logo'], $picture_name, 'sponsor');
                //echo"<h1>$arr[2]</h1>";
                if($dao->Update('sponsor', $arr, $id) == true )
                {
                    //echo'<h1>true</h1>';
                    return true;
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
//-------------------------------Sponsor end---------------------------------------//


//-------------------------------Delete start---------------------------------------//
		// ---------------------------------
		// delete for all tables
		public static function delete_one($id, $table)
		{
			$dao = new DAO('pfe');
			try
			{
				if($dao->getVall($id, $table, 'id') == true)
				{
					if($table == 'sponsor' or $table == 'Sponsor')
					{
						$picture_name = $dao->getPic('Sponsor', 'logo', $id);
						unlink($picture_name);
						$dao->Delete('Sponsor', $id);
						return true;
					}
					elseif($table == 'speaker' or $table == 'Speaker')
					{
						$picture_name = $dao->getPic('Speaker', 'picture', $id);
						unlink($picture_name);
						$dao->Delete('Speaker', $id);
						return true;
					}
					elseif($table == 'Participant' or $table == 'participant')
					{
						$sql = 'SELECT * FROM File WHERE id_part = '.$id;
						$arr = array();
						$arr = $dao->getNotId('File', $sql);

						foreach ($arr as  $value) 
						{
							unlink($value->file_pdf);
							$dao->Delete('File', $value->getid());
						}
						$dao->Delete('Participant', $id);
						return true;
						/// il faut obtenire id de file alaide de id part
					}
					elseif($table == 'file' or $table == 'File')
					{
						$sql = 'SELECT * FROM file WHERE id = '.$id;
						$arr = array();
						$arr = $dao->getNotId('File', $sql);
						foreach ($arr as  $value) 
						{
							unlink($value->file_pdf);
							$dao->Delete('File', $value->getid());
						}
						return true;
					}
					else
					{
						$dao->Delete($table, $id);
						return true;
					}
				}
				else
				{
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
		// delete all rows
		public static function deletAll($table)
		{
			$dao = new DAO('pfe');
			$id = 'all';
			$arra = array();
			try
			{
				if($table == 'sponsor' or $table == 'Sponsor')
				{
					$arra = $dao->getPic('sponsor', 'logo', $id);
					foreach($arra as $value)
					{
						unlink($value);
					}
					if($dao->DeleteAll($table) == true)
					{
						return true;
					}
					return false;
				}
				elseif($table == 'speaker' or $table == 'Speaker')
				{
					$arra = $dao->getPic('speaker', 'picture', $id);
					foreach($arra as $value)
					{
						unlink($value);
					}
					if($dao->DeleteAll($table) == true)
					{
						return true;
					}
					return false;
				}
				elseif($table == 'equipe' or $table == 'Equipe')
				{
					$arra = $dao->getPic('equipe', 'picture', $id);
					foreach($arra as $value)
					{
						unlink($value);
					}
					if($dao->DeleteAll($table) == true)
					{
						return true;
					}
					return false;					
				}
				elseif($table == 'file' or $table == 'File')
				{
					$arra = $dao->getPic('file', 'file_pdf', 'all');
					foreach($arra as $value)
					{
						unlink($value);
					}
					if($dao->DeleteAll($table) == true)
					{
						return true;
					}
					return false;
				}
				elseif($table == 'Participant' or $table == 'participant')
				{
					Admin::deletAll('File');
					if($dao->DeleteAll('Participant'))
					{
						return true;
					}
					return false;
					/// il faut obtenire id de file alaide de id part
				}
				else
				{
					$dao->DeleteAll($table);
					return true;
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
//-------------------------------Delete end---------------------------------------//

		public static function execQuery($req,$col)
		{
			try{
				$dao = new DAO('pfe');
				$sql=$req;
				$result=$dao->getpdo()->query($sql);
				if($dta=$result->fetch())
				{
					
					return $dta[$col];

				}
			}
			catch(Exception $e)
			{

			}
			return false;
		}
		//------------------------------
		// show nbrtotale of days
		public static function nbrTotalDay()
		{
			$dao = new DAO('pfe');
			$sql='SELECT DATEDIFF(start_date, NOW()) FROM Conference';
			$result=$dao->getpdo()->query($sql);
			$var = $result->fetchColumn(); 
			return $var;
		}

	}
	// $a=array();
	// $a=Admin::showFilePart();
	// print_r($a);	
	//Admin::deletAll('file');
	//Admin::insertSpeaker($list);
?>



