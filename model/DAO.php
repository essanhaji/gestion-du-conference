<?php

class DAO
{

	private $pdo;


	function __construct($db)
	{
		$this->pdo = new PDO('mysql:host=localhost;dbname='.$db,'root','');
	}
    
    public function getpdo()
    {
        return $this->pdo;
    }

	function GetRow($table_name, $id)
	{
		require_once $table_name.".php";
		$L = array();
		$sql="select * from ".$table_name." where id = ".$id;
		$result=$this->pdo->query($sql);
		while($dta=$result->fetch())
        {
			$L[] = new $table_name($dta);
		}
		return $L;
	}


	function getlist($table_name)
	{
		require_once $table_name.".php";
		$L=array();
		$sql="select * from ".$table_name;
		$result=$this->pdo->query($sql);
		while($dta=$result->fetch())
        {
			$L[] =  new $table_name($dta);
		}
		return $L;
	}

	function getNotId($table_name, $sql)
	{
		require_once $table_name.".php";
		$L=array();
		//$sql="select * from ".$table_name;
		$result=$this->pdo->query($sql);
		while($dta=$result->fetch())
        {
			$L[] =   new $table_name($dta);
		}
		return $L;
	}

	
	function getPic($NomTab, $col, $id)
	{
		if($id == 'all')
		{
			$arra = array();
			$record =  $this->pdo->prepare('SELECT '.$col.' FROM '.$NomTab);
			$record->execute();
			foreach ($record->fetchAll() as $value) 
			{
				$arra = $value[$col];
			}
			return $arra;
		}
		else
		{
			$record =  $this->pdo->prepare('SELECT '.$col.' FROM '.$NomTab.' WHERE id = '.$id);
			$record->execute();
			foreach ($record->fetchAll() as $value) 
			{
				return $value[$col];
			}
		}
		return null;
	}
    
    
    
	function getVall($vall ,$NomTab, $champ)
	{
		$record =  $this->pdo->prepare('SELECT '.$champ.' FROM '.$NomTab);
		$record->execute();
		foreach ($record->fetchAll() as $value) 
		{
			if($value[$champ] == $vall)
			{
				return true;
			}
		}
		return false;
	}


	function getColumn($table)
	{
		$rqt = "SHOW COLUMNS FROM $table;";
		$result=$this->pdo->query($rqt);
		$Lst = array();
		foreach ($result->fetchAll() as $value) 
        {
			$Lst[] = $value["Field"];
		}
		return $Lst;
	}




	function Insert($tbl,$lst)
	{
		$cln = $this->getColumn($tbl);
		$Val = "";
		$att = "";
		for ($i=1; $i < count($lst); $i++)
		{
			$Val .= "'".$lst[$i]."',";
			$att .= $cln[$i].",";
		}
		$Val = rtrim($Val,",");
		$att = rtrim($att,",");
		$rqt = "insert into $tbl($att) values ($Val)";
		//echo $rqt;
		$result=$this->pdo->prepare($rqt);
		if ($result->execute()) 
		{
            //echo "<h1>".$this->pdo->lastInsertId()."</h1>";
			return true;
		}
		else
		{
			return false;
		}
	}


	

	function Update($tbl,$lst,$id)
	{
		$cln = $this->getColumn($tbl);
		$Val = "";
		for ($i=1; $i < count($lst); $i++) 
		{
			$Val .= $cln[$i]."='".$lst[$i]."' ,";
		}
		$Val = rtrim($Val,",");
		$rqt = "update $tbl set $Val where $cln[0]='$id';";
		$result=$this->pdo->prepare($rqt);
		if ($result->execute())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

	// Update all rows (conference)
	function UpdateAllRows($tbl,$lst)
	{
		$cln = $this->getColumn($tbl);
		$Val = "";
		for ($i=0; $i < count($lst); $i++) 
		{
			$Val .= $cln[$i]."='".$lst[$i]."' ,";
		}
		$Val = rtrim($Val,",");
		$rqt = 'update '.$tbl.' set '.$Val.' ;';
		$result=$this->pdo->prepare($rqt);
		if ($result->execute()) 
		{
			return true;
		}
		else 
		{
			return false;
		}
	}


	function Delete($tbl,$id)
	{
		$cln = $this->getColumn($tbl);
		$rqt = "delete from $tbl where $cln[0]=$id";
		$result=$this->pdo->prepare($rqt);
		if ($result->execute()) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function DeleteAll($tbl)
	{
		$rqt = "delete from $tbl;";
		$result=$this->pdo->prepare($rqt);
		if($result->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

    

    function upload_Picture($var, $name, $folder)
    {
		$target_dir = "../source/".$folder."/";
		$name = $target_dir."".$name.".png";

		$target_file = $target_dir . basename($var);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$check = getimagesize($_FILES["picture"]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				////echo "File is not an image.";
				$uploadOk = 0;
			}
			
		if ($_FILES["picture"]["size"] > 50000000000) {
			//echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
				rename($target_file, $name);
			} else {
				//echo "Sorry, there was an error uploading your file.";
			}
		}
        return $name;
    }
		

    function upload_File($var, $name)
    {
        $dossier = '../source/file/';
        //echo $name;
        $fichier = basename($var);
        //On fait un tableau contenant les extensions autorisées.
        //Comme il s'agit d'un avatar pour l'exemple, on ne prend que des extensions d'images.
		if ($_FILES["file"]["size"] > 50000000000) {
			//echo "Sorry, your file is too large.";
			return false;
		}
        $extensions = array('.pdf');
        // récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
        $extension = strrchr($var, '.');
        //Ensuite on teste
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
			//echo'Vous devez uploader un fichier de type pdf...';
			return false;
		}
        if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fichier))
        {
            rename($dossier.$fichier, $name);
			//echo 'Upload effectué avec succès !';
			return true;
        }
        else
        {
			//echo 'Echec de l upload !!!!';
			return false;
        }
    }


}

?>