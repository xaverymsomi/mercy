<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Include the main TCPDF library (search for installation path).
require_once('includes/tcpdf/tcpdf.php');

include('../includes/config.php');
   
$file_name_pdf = '';

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'../icon.png';
        $this->Image($image_file, 10, 10, 15, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 14);
        // Title
        $this->Cell(0, 15, 'KOMBA VEHICLE MANAGEMENT SYSTEM', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

if(isset($_GET['search_by_date'])) {
    $from_date = date('Y-m-d', strtotime($_GET['from_date']));
    $to_date =  date('Y-m-d', strtotime($_GET['to_date']));

    if($from_date > $to_date) {
        $_SESSION['error'] = "Invalid to date. to date can't be greater than from date<br>$from_date - $to_date";
        
    }

    else {
        $file_name_pdf = 'Report From '.$from_date.' to '.$to_date; 

        $exipenditure_report = $dbconnect->prepare("SELECT * FROM `exipenditure_report`
        WHERE (expenditure_date BETWEEN :from_date AND :to_date)
        ORDER BY expenditure_date ");

        $exipenditure_report->execute(['from_date'=>$from_date,'to_date'=>$to_date]);
        $exipanditure_report_list = $exipenditure_report->fetchAll(PDO::FETCH_ASSOC);

        $exipanditure_type = $dbconnect->prepare("SELECT * FROM tbl_expenditure_type");
        $exipanditure_type->execute();
        $exipanditure_type_list = $exipanditure_type->fetchAll(PDO::FETCH_ASSOC);
    }
}
else if(isset($_GET['search_by_type'])) {

    $expenditure_type_name = stripslashes($_GET['exipandure_type']);
    $date = date('Y-m-d');
    $file_name_pdf = 'Report of '.$expenditure_type_name.' on '.$date;
    $exipenditure_report = $dbconnect->prepare("SELECT * FROM `exipenditure_report` 
        WHERE expenditure_type_name = :expenditure_type_name
        ORDER BY expenditure_date ");

    $exipenditure_report->execute(['expenditure_type_name'=>$expenditure_type_name]);
    $exipanditure_report_list = $exipenditure_report->fetchAll(PDO::FETCH_ASSOC);
    
    $exipanditure_type = $dbconnect->prepare("SELECT * FROM tbl_expenditure_type");
    $exipanditure_type->execute();
    $exipanditure_type_list = $exipanditure_type->fetchAll(PDO::FETCH_ASSOC);
}

else {
	echo "Bad access";
}


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
  margin-top:-10rm;
  margin-left: 13rem;
}
</style>
<br>

<table class="table table-bordered table-striped">
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Exipenditure Type</th>
		<th>Amount</th>
		<th>Description</th>
		<th>Date</th>
	</tr>
';
 $sn=1;
 foreach($exipanditure_report_list as $row) { 
  $tbl.= '
    <tr>
      <td style="color:#24242">' .$row['first_name']. '</td>
      <td style="color:#24242">' .$row['last_name']. '</td>
      <td style="color:#24242">' .$row['email']. '</td>
      <td style="color:#24242">' .$row['expenditure_type_name']. '</td>
      <td style="color:#24242">' .$row['expenditure_amount']. '</td>
      <td style="color:#24242">' .$row['expenditure_descrption']. '</td>
      <td style="color:#24242">' .date('d-m-Y', strtotime($row['last_name'])). '</td>
    </tr>
  ';
} 
$tbl.='</table>';



//create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
$pdf->SetFont('helvetica', 12);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// add a page
$pdf->AddPage('L', 'A4');

$pdf->setPrintHeader(false);

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
$pdf->Output($file_name_pdf, 'I');