<?php
	
    require_once '../model/Admin.php';  
    include 'session_test_admin.php';


    $id=$_GET['id'];
	$ok = array();
	$sql='SELECT file.id, file.id_part, file.title, file.file_pdf, participant.name, participant.lastname, participant.email  FROM file, participant WHERE participant.id=file.id_part and file.id='.$id ;
	$ok=Admin::showAllInfoPdf($sql);
?>

<html>
<head>
	<meta charset="utf-8" />
	<title>Page Title</title>
	<link rel="stylesheet" href="bower_components/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

		
		<div class="row">
		<embed src="<?= $ok[6] ?>" width="60%" height="100%" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">

		<div class="col-xs-6 col-md-3" style="float:right;margin-right:10%;margin-top:3%;">
			<div class="panel panel-primary"> 
				<div class="panel-heading"> 
				<h3 class="panel-title">File ID</h3> 
			</div> 
				<div class="panel-body"> 
					<p style="float:left;font-size:70px"><?=$ok[0] ?></p>
					<span class="ion-wand" style="float:right;font-size:100px"></span>
				</div> 
			</div>

			<div class="panel panel-primary"> 
				<div class="panel-heading"> 
				<h3 class="panel-title">Participant Name</h3> 
			</div> 
				<div class="panel-body"> 
					<p style="float:left;"><?=$ok[3].' '.$ok[4] ?></p>
					<span class="ion-person" style="float:right;font-size:100px"></span>
				</div> 
			</div>


			<div class="panel panel-primary"> 
				<div class="panel-heading"> 
				<h3 class="panel-title">File title</h3> 
			</div> 
				<div class="panel-body">
					<p style="float:left"><?=$ok[2] ?></p>
					<span class="ion-document-text" style="float:right;font-size:100px"></span>
				 </div> 
			</div>
		</div>
	</div>
</body>
</html>
