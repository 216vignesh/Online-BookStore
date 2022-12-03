<?php
//error_reporting(E_ERROR | E_PARSE);
$user = 'admin';
$password = 'Fit4M0Re!';
$database = 'BookStore';
$servername='dbms-project.csddeoelb5pk.us-east-1.rds.amazonaws.com:3306';

$mysqli = new mysqli($servername, $user, $password, $database);

$link = mysqli_connect($servername, $user, $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    echo "error";
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}

$sql = "SELECT sale_date, isbn, discount, itemid, orderid FROM Sales_Report LIMIT 100;";
$result = $mysqli->query($sql);
$output='';
while($rows=$result->fetch_assoc())
{
    $output .='<tr>
                <td>'.$rows['sale_date'].'</td>
                <td>'.$rows['isbn'].'</td>
                <td>'.$rows['discount'].'</td>
                <td>'.$rows['itemid'].'</td>
                <td>'.$rows['orderid'].'</td>
            </tr>';
}

//print_r($output);

require_once('tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {

    // Load table data from file
    //public function LoadData() {
    //    return $data;
    //}

    // Colored table

    public function ColoredTable($header,$result) {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(35, 35, 35, 35, 35);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach((array)$result as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, $row[3], 'LR', 0, 'R', $fill);
            $this->Cell($w[4], 6, $row[4], 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Akanksha');
$pdf->SetTitle('Sales Report');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

$content = '';  
      $content .= '  
      <h4 align="center">Sales Report</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="20%">Sales Date</th>  
                <th width="20%">ISBN</th>  
                <th width="20%">Discount</th>  
                <th width="20%">Item ID</th>
                <th width="20%">Item ID</th>
           </tr>  
      ';  
      $content .= $output;  
      $content .= '</table>';  
      $pdf->writeHTML($content);  

// column titles sale_date
//$header = array('Sale Date', 'ISBN', 'Discount', 'Item ID', 'Order ID');

// data loading
//$result = $output;
//print_r($result);

// print colored table
//$pdf->ColoredTable($header, $result);

// close and output PDF document
$pdf->Output('example_011.pdf', 'I');


?>