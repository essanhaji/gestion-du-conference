<?php
	
    require_once '../model/Admin.php';  
    include 'session_test_admin.php';

	$ok = array();
	$sql='SELECT file.id, file.id_part, file.title, file.file_pdf, participant.name, participant.lastname, participant.email  FROM file, participant WHERE participant.id=file.id_part and file.id_part='.$_POST['id'] ;
	$ok=Admin::showAllInfoPdf($sql);
	print_r($ok);

?>

	<embed src="<?php $ok[0]['6']?>" width="60%" height="700" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">