<?php
include '../login_success.php';
require_once('tcpdf.php');

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        // Set font
        $this->SetY(15);
        $this->SetFont('times', 'B', 24);
        // Title
        $this->Cell(0, 10, 'Tumandok Craft Industries', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        date_default_timezone_set("Asia/Taipei");

  $acc_email = $_SESSION['login_username'];
  $pdo = mysqli_connect("localhost", "root", "", "tcishop");
  $sql = "SELECT * FROM account WHERE acc_email = '$acc_email'";
      $result = mysqli_query($pdo, $sql);

      while($row = mysqli_fetch_array($result)){
        $this->SetY(-15);
        // Set font
        $this->SetFont('times', 'R', 8);
        // Title
       // $this->Cell(0, 10, 'Printed by: ' . $user['fname'] . ' ' .  substr($user['mname'], 0, 1) . '. ' . $user['lname'] , 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 10,'Printed by: '. $row['acc_fname'] . ' ' . $row['acc_lname'] . '   '. date("m-d-Y H:i:s"), 0, false, 'L', 0, '', 0, false, 'M', 'M');
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    }
}
if(!empty($_POST)){

//start sang arguement
    $categ = isset($_POST['dreport']) ? $_POST['sdate'] : '0' ? $_POST['edate'] : '0';
    $categ = $_POST['dreport'];
    //$act_type3=$_POST['slocation'];

    
    //BY totl sales report
    
        
    if($categ=='S'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Delivery Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD



    Tumandok Craft Industries Management System

    Delivery Report




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
    $connect = mysqli_connect("localhost", "root", "", "tcishop");  

    if(!empty($_POST['sdate']) && !empty($_POST['edate'])){
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    

    echo $sdate;
    echo $edate;


      $sql = "SELECT *  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE date_finished between '$sdate' and '$edate' AND order_finish = 'Completed'"; 

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $order_id = "Order ID";
        $acc_fname = "Customer Name";
        $shippingaddress = "Shipping Address";
        $order_amount = "Total Amount";
        $date_finished = "Delivery Date";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 80px;">'.$order_id.'</td>
                  <td style="border: 0px solid #ffffff; width: 190px;">'.$acc_fname.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$shippingaddress.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$order_amount.'</td>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$date_finished.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $order_id = $row["order_id"];
        $acc_fname = $row["acc_fname"];
        $acc_lname = $row["acc_lname"];
        $shippingaddress = $row["shippingaddress"];
        $order_amount = $row["order_amount"];
        $date_finished = strtotime($row["date_finished"]);
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 80px;">'.$order_id.'</td>
                <td style="border: 1px solid #000000; width: 190px;">'.$acc_fname. ' ' .$acc_lname.'</td>
                <td style="border: 1px solid #000000; width: 250px;">'.$shippingaddress.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'. "Php " .number_format($order_amount, 2).'</td>
                <td style="border: 1px solid #000000; width: 140px;">'. date("F j, Y", $date_finished).'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        ob_end_clean();
        $pdf->Output('Inventory_report.pdf', 'I');

        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    if($categ=='D'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Delivery Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD



    Tumandok Craft Industries Management System

    Detailed Delivery Report




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
    $connect = mysqli_connect("localhost", "root", "", "tcishop");  

   
      $sql = "SELECT order_id, acc_fname, acc_lname, acc_contact, acc_company, shippingaddress, country, zip_code, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE order_finish = 'Completed'"; 

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $order_id = "Order ID";
        $acc_fname = "Customer Name";
        $acc_contact = "Contact";
        $acc_company = "Company";
        $shippingaddress = "Shipping Address";
        $order_amount = "Total Amount";
        $date_finished = "Delivery Date";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 50px;">'.$order_id.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$acc_fname.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$acc_contact.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$acc_company.'</td>
                  <td style="border: 0px solid #ffffff; width: 190px;">'.$shippingaddress.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$order_amount.'</td>
                  <td style="border: 0px solid #ffffff; width: 90px;">'.$date_finished.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $order_id = $row["order_id"];
        $acc_fname = $row["acc_fname"];
        $acc_lname = $row["acc_lname"];
        $acc_contact = $row["acc_contact"];
        $acc_company = $row["acc_company"];
        $shippingaddress = $row["shippingaddress"];
        $country = $row["country"];
        $zipcode = $row["zipcode"];
        $order_amount = $row["order_amount"];
        $date_finished = $row["date_ordered"];
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 50px;">'.$order_id.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$acc_fname. ' ' .$acc_lname.'</td>
                <td style="border: 1px solid #000000; width: 100px;">'.$acc_contact.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$acc_company.'</td>
                <td style="border: 1px solid #000000; width: 190px;">'.$zipcode.'.'.$shippingaddress.', ' .$country.'</td>
                <td style="border: 1px solid #000000; width: 100px;">'.$order_amount.'</td>
                <td style="border: 1px solid #000000; width: 90px;">'.$date_finished.'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        ob_end_clean();
        $pdf->Output('Inventory_report.pdf', 'I');

     }   
    }
    


?>