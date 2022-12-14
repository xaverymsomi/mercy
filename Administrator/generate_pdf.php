<?php

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');

include('../includes/connection.php');
   
$donor_number = $_POST['donor_number'];

 $query="SELECT person.ID_PERSON, person.COD_DONOR,person.DES_SURNAME,person.DES_NAME,person.DES_MOBILEPHONE,test.COD_TEST,donation.COD_DONATION, result.COD_RESULT, donation_test.* 
 FROM donation_test  JOIN donation  ON donation_test.ID_DONATION  = donation.ID_DONATION 
 JOIN test ON donation_test.ID_TEST = test.ID_TEST 
 JOIN result ON donation_test.ID_RESULT = result.ID_RESULT 
 JOIN person ON donation.ID_PERSON =person.ID_PERSON 
 WHERE COD_DONOR = '$donor_number'";

 $result = mysqli_query($dbconnect , $query);

//create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('helvetica', 'B', 9);

$tbl = '
<style>
table {
  border-collapse: collapse;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05);
}

th {
  text-align: inherit;
  text-align: -webkit-match-parent;
}

.table {
  width: 100%;
  margin-bottom: 1rem;
  color: #212529;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}

.table-sm th,
.table-sm td {
  padding: 0.3rem;
}

.table-bordered {
  border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #dee2e6;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}
img {
  margin-top:-100rem;
}
</style>
<img src="../img/logo/logo.png" class="logo">
<br><br><br>

<h3>Result Summary For '.$donor_number.' </h3>

<table class="table table-bordered table-striped">';
 $sn=1;
 while($row=mysqli_fetch_array($result)) { 
  $tbl.=
  '
    <tr>
      <th style="padding:10rem">' .$row['COD_TEST']. '</th>
      <td style="padding:10rem">' .$row['COD_RESULT']. '</td>
    </tr>
  ';
} 
$tbl.='</table>';

// add a page
$pdf->AddPage();
$pdf->setPrintHeader(false);

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');