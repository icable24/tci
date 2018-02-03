<?php
include '../login_success.php';
require_once('tcpdf.php');

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'tci.png';
       $this->Image($image_file, 50, 10, 300, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetY(15);
        $this->SetFont('times', 'B', 20);
        // Title
        $this->Cell(0, 10, 'Tumandok Craft Industries', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer

    public function Footer() {

        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Title
        $this->Cell(0, 10, 'Tumandok Craft Industries', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Purchased Order');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);
    

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD



    Purchased Order
EOD;

    // print a block of text using Write()
    $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

    // ---------------------------------------------------------

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

        //==============================================================
include "../database.php";
//$pdo = new PDO("mysql:host=localhost;dbname=tcishop", 'root', '');
  
// $tbl = '<table style="width: 638px;" cellspacing="0">';

$order_id = $_REQUEST['id'];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT *  FROM cart JOIN account ON cart.user_id = account.acc_id JOIN orders ON cart.order_id=orders.order_id";
$q = $pdo->prepare($sql);
$q->execute(array($order_id));
$po = $q->fetch(PDO::FETCH_ASSOC);
Database::disconnect();


  $tbl = '
<br>'.
'<p style="font-size: 10px; text-align: justify-all">'.
'Contact #: <small>(+6334) 476.1050 | 702.2658</small> <br>'.
'Website: <small>http://tumandok.com </small><br>'.
'Email: <small>tci.bcdphilippines@gmail.com </small><br>'.
'Address: <small>Purok, Ma. Morena, Calumangan,'.
'Bago City, Negros Occidental,'.
'Philippines 6101</small>'.
'</p>'.
'<br><br>'.
'<p style="text-align: right; font-size: 11px; margin-left: 2in">Date:'.$po["date_finished"].
'<br>'.
'Order ID:'.'&nbsp;'.$po["order_id"].'</p>'.
'<br>'.
'<p>Customer\'s Name: <br>&nbsp;&nbsp;'. '<span style="font-size: 14px">'. $po["acc_fname"]. ' '. $po["acc_lname"]. '</span>' . '</p>'.
'<p>Shipping Address: <br>&nbsp;&nbsp;'.'<span style="font-size: 14px">'. $po["zip_code"]. ','.' '. $po["shippingaddress"]. ','.' '. $po["city"]. ','.' '.$po["state"]. ','.' '.$po["country"]. '</span>' . '</p>'.
'<br><br>';


       $tbl = $tbl . '<table style="width: 638px;" cellspacing="0">';
        $prod_name = "Details";
        $qty = "Qty.";
        $uprice = "Unit Price";
        $order_amount = "Total Amount";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 300px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 50px;">'.$qty.'</td>
                  <td style="border: 0px solid #ffffff; width: 90px;">'.$uprice.'</td>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$order_amount.'</td>


              </tr>';

       foreach ($pdo->query($sql) as $row) {
        $prod_name = $row["prod_name"];
        $prod_desc = $row["prod_desc"];
        $qty = $row["quantity"];
        $uprice = $row["prod_price"];
        $order_amount = $row["order_amount"];

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 80px;">'.$prod_name.'  '.$prod_desc.'</td>
                <td style="border: 1px solid #000000; width: 190px;">'.$qty.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'. "Php " .number_format($uprice, 2).'</td>
                <td style="border: 1px solid #000000; width: 130px;">'. "Php " .number_format($order_amount, 2).'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');



        //==============================================================
        ob_end_clean();
        $pdf->Output('Inventory_report.pdf', 'I');

?>