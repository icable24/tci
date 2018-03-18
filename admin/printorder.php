<?php
include '../login_success.php';
require_once('tcpdf.php');
if(isset($_GET['id'])){
    $order_id = $_REQUEST['id'];
}else{
    header("location: orderlist.php");
}

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo.png';
       $this->Image($image_file, 10, 10, 200, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
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


    Delivery Receipt
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

$pdo = Database::connect();

$order = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
$order->execute(array($order_id));
$order = $order->fetch();

$cart = $pdo->prepare("SELECT * FROM cart WHERE order_id = ?");
$cart->execute(array($order_id));
$cart = $cart->fetchAll();

$discount = $pdo->prepare("SELECT * FROM discount WHERE order_id = ?");
$discount->execute(array($order_id));
$discount = $discount->fetch();

$courier = $pdo->prepare("SELECT * FROM courier WHERE order_id = ?");
$courier->execute(array($order_id));
$courier = $courier->fetch();

$account = $pdo->prepare("SELECT * FROM account WHERE acc_id = ?");
$account->execute(array($order['acc_id']));
$account = $account->fetch();


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
'<p style="text-align: right; font-size: 11px; margin-left: 2in">Date:'.'&nbsp;'.$order["date_finished"].
'<br>'.
'Order ID:'.'&nbsp;'.$order["order_id"].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>'.
'<br>'.
'<p>Customer\'s Name: <br>&nbsp;&nbsp;'. '<span style="font-size: 14px">'. $account["acc_fname"]. ' '. $account["acc_lname"]. '</span>' . '</p>'.
'<p>Shipping Address: <br>&nbsp;&nbsp;'.'<span style="font-size: 14px">'. $order["zip_code"]. ','.' '. $order["shippingaddress"]. ','.' '. $order["city"]. ','.' '.$order["state"]. ','.' '.$order["country"]. '</span>' . '</p>';

 $tbl = $tbl .'
            <p><h4>Courier Details:</h4> <br>Courier\'s Name:&nbsp;&nbsp;'. '<span style="font-size: 14px">'. $courier["courier_name"].'</span>&nbsp;&nbsp;&nbsp;&nbsp;Waybill No:&nbsp;&nbsp;'. '<span style="font-size: 14px">'. $courier["waybill_number"].'</span></p>
        ';



       $tbl = $tbl . '<table style="width: 638px;" cellspacing="0">';
        $prod_name = "Details";
        $qty = "Qty.";
        $uprice = "Unit Price";
        $order_amount = "Total Amount";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #000000; width: 240px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #000000; width: 27px;">'.$qty.'</td>
                  <td style="border: 0px solid #000000; width: 130px;">'.$uprice.'</td>
                  <td style="border: 0px solid #000000; width: 130px;">'.$order_amount.'</td>


              </tr>';

       foreach ($cart as $row) {
        $qty = $row["quantity"];

        $pdo = Database::connect();
        $product = $pdo->prepare("SELECT * FROM product WHERE prod_id = ?");
        $product->execute(array($row["prod_id"]));
        $product  = $product->fetch();

        $prod_name = $product["prod_name"];
        $prod_desc = $product["prod_desc"];
        $uprice = $product["prod_price"];
        $total_price = $uprice * $row['quantity'];
        $order_amount = $order["order_amount"];
        $amount = $discount["discount"];
        $amount_total = $discount["amount"];
        $grand_total = $order_amount - $amount_total;

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 240px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 27px;">'.$qty.'</td>
                <td style="border: 0.5px solid #000000; width: 130px;">'. "Php " .number_format($uprice, 2).'</td>
                <td style="border: 0.5px solid #000000; width: 130px;">'. "Php " .number_format($total_price, 2).'</td>

            </tr>';
        }

        

        $tbl = $tbl .'
            <tr>
                <td style="border: 0.5px solid #000000; width: 397px;">Total Price</td>
                <td style="border: 0.5px solid #000000; width: 130px;">'. "Php " .number_format($order_amount, 2).'</td>

            </tr>
            
        ';

        $tbl = $tbl .'
            <tr>
                <td style="border: 0.5px solid #000000; width: 397px;">Discount &nbsp; '.$amount. "%".'</td>
                <td style="border: 0.5px solid #000000; width: 130px;">'."Php " .number_format($amount_total, 2).'</td>

            </tr>
            
        ';
         $tbl = $tbl .'
            <tr>
                <td style="border: 0.5px solid #000000; width: 397px;">Grand Total</td>
                <td style="border: 0.5px solid #000000; width: 130px;">'. "Php " .number_format($grand_total, 2).'</td>

            </tr>
        ';
         $tbl = $tbl .'
         <div>
         <p> Additional Notes: <br>
          _________________________________________<br>
          _________________________________________<br>
          _________________________________________<br>
          _________________________________________<br>
          _________________________________________<br>
         </p>
         </div>
         <br><br>
         <div style="text-align: right">
         <p> ______________________________________<br>
         Donnah Polvorido, Production Officer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         </p>
         </div>

         ';

        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');



        //==============================================================
        ob_end_clean();
        $pdf->Output('Inventory_report.pdf', 'I');

?>