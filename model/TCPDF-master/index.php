<?php  
 function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "pfe");  
      $sql = 'SELECT file.id ,file.title, participant.name, participant.lastname, participant.email, participant.phone_number FROM file, participant WHERE participant.id=file.id_part ORDER BY file.id ASC';  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["id"].'</td>  
                          <td>'.$row["title"].'</td>  
                          <td>'.$row["name"].'</td>  
                          <td>'.$row["lastname"].'</td>
                          <td>'.$row["email"].'</td> 
                          <td>'.$row["phone_number"].'</td>
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  
    // require_once dirname('../TCPDF-master/config/tcpdf_config.php');
    // require_once dirname('../TCPDF-master/examples/lang/eng.php');
    require_once('tcpdf.php');

     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("ESTE Conference || the list of all participants ");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">ESTE Conference || the list of all participants </h4><br />
      <p></p> <p></p> <p></p> 
      <table whithds="100%" border="1" cellspacing="0" cellpadding="3">  
        <tr>  
        <th width="5%">Id</th> 
        <th width="20%">Title</th> 
        <th width="15%">Name</th>  
        <th width="15%">Last Name</th>  
        <th width="25%">Email</th>
        <th width="20%">phone_number</th>
        </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>ESTE Conference || the list of all participants</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container"> 
            <center><img class="img-responsive logo" src="logo.png" alt="Chania"></center>
                <p></p><p></p><p></p><br><br>
                <h4 align="center"> ESTE Conference || the list of all participants</h4><br />  
                <div class="table-responsive">  
                	<div class="col-md-12" align="right">
                     <form method="post">  
                          <center><input type="submit" name="generate_pdf" class="btn btn-primary" value="Export PDF" /></center>
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                          <th width="5%">Id</th> 
                          <th width="20%">Title</th> 
                          <th width="15%">Name</th>  
                          <th width="15%">Last Name</th>  
                          <th width="25%">Email</th>
                          <th width="20%">phone_number</th>
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  