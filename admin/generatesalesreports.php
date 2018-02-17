<?php
include '../login_success.php';
require_once('tcpdf.php');

class MYPDF extends TCPDF {

    //Page header
    public function Header() {

        // Logo
       $image_file = K_PATH_IMAGES.'logo.png';
       $this->Image($image_file, 50, 10, 300, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
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
    $categ1 = $_POST['custype'];
    $categ = isset($_POST['reporttype']) ? $_POST['sdate'] : '0' ? $_POST['edate'] : '0';
    $categ = $_POST['reporttype'];
    //$act_type3=$_POST['slocation'];

    
    //BY totl sales report
    
    if ($categ1=='all') {
    if($categ=='STS'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Sales Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD


Purok, Ma. Morena, Calumangan,
Bago City, Negros Occidental,
Philippines 6101
702-2658|+63917-301-7571

    Tumandok Craft Industries Management System

    Sales Report



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


      $sql = "SELECT order_id, acc_fname, acc_lname, acc_company, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE date_finished between '$sdate' and '$edate' AND order_finish = 'Delivered'"; 

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $order_id = "Order ID";
        $acc_fname = "Customer Name";
        $acc_company = "Company";
        $order_amount = "Total Amount";
        $date_ordered = "Ordered Date";
        $date_finished = "Delivery Date";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;">'.$order_id.'</td>
                  <td style="border: 0px solid #ffffff; width: 150px;">'.$acc_fname.'</td>
                  <td style="border: 0px solid #ffffff; width: 180px;">'.$acc_company.'</td>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$date_ordered.'</td>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$date_finished.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$order_amount.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $order_id = $row["order_id"];
        $acc_fname = $row["acc_fname"];
        $acc_lname = $row["acc_lname"];
        $acc_company = $row["acc_company"];
        $order_amount = $row["order_amount"];
        $date_ordered = strtotime($row["date_ordered"]);
        $date_finished = strtotime($row["date_finished"]);
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 60px;">'.$order_id.'</td>
                <td style="border: 0.5px solid #000000; width: 150px;">'.$acc_fname. ' ' .$acc_lname.'</td>
                <td style="border: 0.5px solid #000000; width: 180px;">'.$acc_company.'</td>
                <td style="border: 0.5px solid #000000; width: 120px;">'.date("F j, Y", $date_ordered).'</td>
                <td style="border: 0.5px solid #000000; width: 120px;">'.date("F j, Y", $date_finished).'</td>
                <td style="border: 0.5px solid #000000; width: 130px; text-align:right">'.number_format($order_amount, 2).'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');


             //==============================================================
    $connect = mysqli_connect("localhost", "root", "", "tcishop");  

    if(!empty($_POST['sdate']) && !empty($_POST['edate'])){
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    

    echo $sdate;
    echo $edate;


      $sql = "SELECT SUM(order_amount) as 'total', order_id, acc_fname, acc_lname, acc_company, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE date_finished between '$sdate' and '$edate' AND order_finish = 'Delivered'"; 

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $total = "Total Sales";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                  <td style="border: 0px solid #ffffff; width: 180px;"></td>
                  <td style="border: 0px solid #ffffff; width: 110px;"></td>
                  <td style="border: 0px solid #ffffff; width: 120px;"></td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$total.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $total = $row["total"];
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                  <td style="border: 0px solid #ffffff; width: 180px;"></td>
                  <td style="border: 0px solid #ffffff; width: 110px;"></td>
                  <td style="border: 0px solid #ffffff; width: 115px;"></td>
                <td style="border: 0.5px solid #000000; width: 130px; text-align:right">'."Php " .number_format($total, 2).'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================
        ob_end_clean();
        $pdf->Output('Sales_report.pdf', 'I');

        }
      }
    }

    if($categ=='DTS'){
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


Purok, Ma. Morena, Calumangan,
Bago City, Negros Occidental,
Philippines 6101
702-2658|+63917-301-7571

    Tumandok Craft Industries Management System

    Detailed Sales Report



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

      $sql = "SELECT discount.*, orders.*, account.* from orders INNER JOIN discount ON orders.discount_amount=discount.total INNER JOIN account ON orders.acc_id = account.acc_id WHERE order_finish = 'Delivered'"; 

      $result = mysqli_query($connect, $sql);  

       $tbl = '<table style="width: 638px;" cellspacing="0">';
        $order_id = "OID";
        $acc_fname = "Customer Name";
        $acc_company = "Company";
        $order_amount = "Total Amount";
        $discount = "Discount";
        $grand_total = "Grand Total";
        $date_ordered = "Ordered Date";
        $date_finished = "Delivery Date";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$order_id.'</td>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$acc_fname.'</td>
                  <td style="border: 0px solid #ffffff; width: 180px;">'.$acc_company.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$date_ordered.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$date_finished.'</td>
                  <td style="border: 0px solid #ffffff; width: 90px;">'.$order_amount.'</td>
                  <td style="border: 0px solid #ffffff; width: 50px;">'.$discount.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$grand_total.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $order_id = $row["order_id"];
        $acc_fname = $row["acc_fname"];
        $acc_lname = $row["acc_lname"];
        $acc_company = $row["acc_company"];
        $order_amount = $row["order_amount"];
        $discount = $row["discount"];
        $grand_total = $order_amount - $discount;
        $date_ordered = strtotime($row["date_ordered"]);
        $date_finished = strtotime($row["date_finished"]);
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$order_id.'</td>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$acc_fname. ' ' .$acc_lname.'</td>
                <td style="border: 0.5px solid #000000; width: 180px;">'.$acc_company.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;">'.date("F j, Y", $date_ordered).'</td>
                <td style="border: 0.5px solid #000000; width: 100px;">'.date("F j, Y", $date_finished).'</td>
                <td style="border: 0.5px solid #000000; width: 90px;text-align:right">'.number_format($order_amount, 2).'</td>
                <td style="border: 0.5px solid #000000; width: 50px;text-align:right">'.$discount."%".'</td>
                <td style="border: 0.5px solid #000000; width: 100px;text-align:right">'.number_format($grand_total, 2).'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');


             //==============================================================
    $connect = mysqli_connect("localhost", "root", "", "tcishop");  

      $sql = "SELECT SUM(order_amount) as 'total', order_id, acc_fname, acc_lname, acc_company, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE order_finish = 'Delivered'"; 

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $total = "Total Sales";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                  <td style="border: 0px solid #ffffff; width: 180px;"></td>
                  <td style="border: 0px solid #ffffff; width: 110px;"></td>
                  <td style="border: 0px solid #ffffff; width: 120px;"></td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$total.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $total = $row["total"];
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                  <td style="border: 0px solid #ffffff; width: 180px;"></td>
                  <td style="border: 0px solid #ffffff; width: 110px;"></td>
                  <td style="border: 0px solid #ffffff; width: 115px;"></td>
                <td style="border: 0.5px solid #000000; width: 130px;text-align:right">'."Php " .number_format($total, 2).'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================
        ob_end_clean();
        $pdf->Output('Sales_report.pdf', 'I');

        }
      }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($categ1=='SB') {
    if($categ=='STS'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Sales Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD


Purok, Ma. Morena, Calumangan,
Bago City, Negros Occidental,
Philippines 6101
702-2658|+63917-301-7571

    Tumandok Craft Industries Management System

    Sales Report
    Single Buyers




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


      $sql = "SELECT order_id, acc_fname, acc_lname, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE date_finished between '$sdate' and '$edate' AND order_finish = 'Delivered' AND user_type = 'Single Buyer'"; 

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $order_id = "Order ID";
        $acc_fname = "Customer Name";
        $order_amount = "Total Amount";
        $date_ordered = "Ordered Date";
        $date_finished = "Delivery Date";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;">'.$order_id.'</td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$acc_fname.'</td>
                  <td style="border: 0px solid #ffffff; width: 150px;">'.$date_ordered.'</td>
                  <td style="border: 0px solid #ffffff; width: 150px;">'.$date_finished.'</td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$order_amount.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $order_id = $row["order_id"];
        $acc_fname = $row["acc_fname"];
        $acc_lname = $row["acc_lname"];
        $order_amount = $row["order_amount"];
        $date_ordered = strtotime($row["date_ordered"]);
        $date_finished = strtotime($row["date_finished"]);
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 60px;">'.$order_id.'</td>
                <td style="border: 0.5px solid #000000; width: 200px;">'.$acc_fname. ' ' .$acc_lname.'</td>
                <td style="border: 0.5px solid #000000; width: 150px;">'.date("F j, Y", $date_ordered).'</td>
                <td style="border: 0.5px solid #000000; width: 150px;">'.date("F j, Y", $date_finished).'</td>
                <td style="border: 0.5px solid #000000; width: 200px; text-align: right">'.number_format($order_amount, 2).'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');


             //==============================================================
    $connect = mysqli_connect("localhost", "root", "", "tcishop");  

    if(!empty($_POST['sdate']) && !empty($_POST['edate'])){
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    

    echo $sdate;
    echo $edate;


      $sql = "SELECT SUM(order_amount) as 'total', order_id, acc_fname, acc_lname, acc_company, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE date_finished between '$sdate' and '$edate' AND order_finish = 'Delivered' AND user_type = 'Single Buyer'"; 

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $total = "Total Sales";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;"></td>
                  <td style="border: 0px solid #ffffff; width: 190px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$total.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $total = $row["total"];
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;"></td>
                  <td style="border: 0px solid #ffffff; width: 190px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                <td style="border: 0.5px solid #000000; width: 200px; text-align: right">'.number_format($total, 2).'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================
        ob_end_clean();
        $pdf->Output('Single Buyer Sales_report.pdf', 'I');

        }
      }
    }

    if($categ=='DTS'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Single Buyer Sales Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD


Purok, Ma. Morena, Calumangan,
Bago City, Negros Occidental,
Philippines 6101
702-2658|+63917-301-7571

    Tumandok Craft Industries Management System

    Sales Report
    Single Buyer



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

      $sql = "SELECT order_id, acc_fname, acc_lname, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE order_finish = 'Delivered' AND user_type = 'Single Buyer'"; 

      $result = mysqli_query($connect, $sql);  

       $tbl = '<table style="width: 638px;" cellspacing="0">';
        $order_id = "Order ID";
        $acc_fname = "Customer Name";
        $order_amount = "Total Amount";
        $date_ordered = "Ordered Date";
        $date_finished = "Delivery Date";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 80px;">'.$order_id.'</td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$acc_fname.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$date_ordered.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$date_finished.'</td>
                  <td style="border: 0px solid #ffffff; width: 220px;">'.$order_amount.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $order_id = $row["order_id"];
        $acc_fname = $row["acc_fname"];
        $acc_lname = $row["acc_lname"];
        $order_amount = $row["order_amount"];
        $date_ordered = strtotime($row["date_ordered"]);
        $date_finished = strtotime($row["date_finished"]);
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 80px;">'.$order_id.'</td>
                <td style="border: 0.5px solid #000000; width: 200px;">'.$acc_fname. ' ' .$acc_lname.'</td>
                <td style="border: 0.5px solid #000000; width: 130px;">'.date("F j, Y", $date_ordered).'</td>
                <td style="border: 0.5px solid #000000; width: 130px;">'.date("F j, Y", $date_finished).'</td>
                <td style="border: 0.5px solid #000000; width: 220px;text-align:right">'.number_format($order_amount, 2).'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');


             //==============================================================
    $connect = mysqli_connect("localhost", "root", "", "tcishop");  

      $sql = "SELECT SUM(order_amount) as 'total', order_id, acc_fname, acc_lname, acc_company, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE order_finish = 'Delivered' AND user_type = 'Single Buyer'"; 

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $total = "Total Sales";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 80px;"></td>
                  <td style="border: 0px solid #ffffff; width: 200px;"></td>
                  <td style="border: 0px solid #ffffff; width: 130px;"></td>
                  <td style="border: 0px solid #ffffff; width: 115px;"></td>
                  <td style="border: 0px solid #ffffff; width: 220px;">'.$total.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $total = $row["total"];
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                  <td style="border: 0px solid #ffffff; width: 80px;"></td>
                  <td style="border: 0px solid #ffffff; width: 200px;"></td>
                  <td style="border: 0px solid #ffffff; width: 130px;"></td>
                  <td style="border: 0px solid #ffffff; width: 115px;"></td>
                <td style="border: 0.5px solid #000000; width: 220px;text-align:right">'."Php " .number_format($total, 2).'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================
        ob_end_clean();
        $pdf->Output('Single Buyer Sales_report.pdf', 'I');

        }
      }

      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($categ1=='C') {
    if($categ=='STS'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Sales Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD


Purok, Ma. Morena, Calumangan,
Bago City, Negros Occidental,
Philippines 6101
702-2658|+63917-301-7571

    Tumandok Craft Industries Management System

    Sales Report
    Company



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


      $sql = "SELECT order_id, acc_fname, acc_lname, acc_company, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE date_finished between '$sdate' and '$edate' AND order_finish = 'Delivered' AND user_type = 'Company'"; 

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $order_id = "Order ID";
        $acc_fname = "Customer Name";
        $acc_company = "Company";
        $order_amount = "Total Amount";
        $date_ordered = "Ordered Date";
        $date_finished = "Delivery Date";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;">'.$order_id.'</td>
                  <td style="border: 0px solid #ffffff; width: 150px;">'.$acc_fname.'</td>
                  <td style="border: 0px solid #ffffff; width: 180px;">'.$acc_company.'</td>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$date_ordered.'</td>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$date_finished.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$order_amount.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $order_id = $row["order_id"];
        $acc_fname = $row["acc_fname"];
        $acc_lname = $row["acc_lname"];
        $acc_company = $row["acc_company"];
        $order_amount = $row["order_amount"];
        $date_ordered = strtotime($row["date_ordered"]);
        $date_finished = strtotime($row["date_finished"]);
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 60px;">'.$order_id.'</td>
                <td style="border: 0.5px solid #000000; width: 150px;">'.$acc_fname. ' ' .$acc_lname.'</td>
                <td style="border: 0.5px solid #000000; width: 180px;">'.$acc_company.'</td>
                <td style="border: 0.5px solid #000000; width: 120px;">'.date("F j, Y", $date_ordered).'</td>
                <td style="border: 0.5px solid #000000; width: 120px;">'.date("F j, Y", $date_finished).'</td>
                <td style="border: 0.5px solid #000000; width: 130px;text-align:right">'.number_format($order_amount, 2).'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');


             //==============================================================
    $connect = mysqli_connect("localhost", "root", "", "tcishop");  

    if(!empty($_POST['sdate']) && !empty($_POST['edate'])){
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    

    echo $sdate;
    echo $edate;


      $sql = "SELECT SUM(order_amount) as 'total', order_id, acc_fname, acc_lname, acc_company, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE date_finished between '$sdate' and '$edate' AND order_finish = 'Delivered' AND user_type = 'Company'"; 

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $total = "Total Sales";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                  <td style="border: 0px solid #ffffff; width: 180px;"></td>
                  <td style="border: 0px solid #ffffff; width: 110px;"></td>
                  <td style="border: 0px solid #ffffff; width: 120px;"></td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$total.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $total = $row["total"];
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                  <td style="border: 0px solid #ffffff; width: 180px;"></td>
                  <td style="border: 0px solid #ffffff; width: 110px;"></td>
                  <td style="border: 0px solid #ffffff; width: 115px;"></td>
                <td style="border: 0.5px solid #000000; width: 130px;text-align:right">'."Php " .number_format($total, 2).'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================
        ob_end_clean();
        $pdf->Output('Company Sales_report.pdf', 'I');

        }
      }
    }

    if($categ=='DTS'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Company Sales Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD


Purok, Ma. Morena, Calumangan,
Bago City, Negros Occidental,
Philippines 6101
702-2658|+63917-301-7571

    Tumandok Craft Industries Management System

    Sales Report
    Company



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

      $sql = "SELECT order_id, acc_fname, acc_lname, acc_company, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE order_finish = 'Delivered' AND user_type = 'Company'"; 

      $result = mysqli_query($connect, $sql);  

       $tbl = '<table style="width: 638px;" cellspacing="0">';
        $order_id = "Order ID";
        $acc_fname = "Customer Name";
        $acc_company = "Company";
        $order_amount = "Total Amount";
        $date_ordered = "Ordered Date";
        $date_finished = "Delivery Date";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;">'.$order_id.'</td>
                  <td style="border: 0px solid #ffffff; width: 150px;">'.$acc_fname.'</td>
                  <td style="border: 0px solid #ffffff; width: 180px;">'.$acc_company.'</td>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$date_ordered.'</td>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$date_finished.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$order_amount.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $order_id = $row["order_id"];
        $acc_fname = $row["acc_fname"];
        $acc_lname = $row["acc_lname"];
        $acc_company = $row["acc_company"];
        $order_amount = $row["order_amount"];
        $date_ordered = strtotime($row["date_ordered"]);
        $date_finished = strtotime($row["date_finished"]);
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 60px;">'.$order_id.'</td>
                <td style="border: 0.5px solid #000000; width: 150px;">'.$acc_fname. ' ' .$acc_lname.'</td>
                <td style="border: 0.5px solid #000000; width: 180px;">'.$acc_company.'</td>
                <td style="border: 0.5px solid #000000; width: 120px;">'.date("F j, Y", $date_ordered).'</td>
                <td style="border: 0.5px solid #000000; width: 120px;">'.date("F j, Y", $date_finished).'</td>
                <td style="border: 0.5px solid #000000; width: 130px;text-align:right">'.number_format($order_amount, 2).'</td>
            </tr>';
        }

        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');


             //==============================================================
    $connect = mysqli_connect("localhost", "root", "", "tcishop");  

      $sql = "SELECT SUM(order_amount) as 'total', order_id, acc_fname, acc_lname, acc_company, order_amount, date_ordered, date_finished  FROM orders JOIN account ON orders.acc_id = account.acc_id WHERE order_finish = 'Delivered' AND user_type = 'Company'"; 

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $total = "Total Sales";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                  <td style="border: 0px solid #ffffff; width: 180px;"></td>
                  <td style="border: 0px solid #ffffff; width: 110px;"></td>
                  <td style="border: 0px solid #ffffff; width: 120px;"></td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$total.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $total = $row["total"];
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                  <td style="border: 0px solid #ffffff; width: 60px;"></td>
                  <td style="border: 0px solid #ffffff; width: 150px;"></td>
                  <td style="border: 0px solid #ffffff; width: 180px;"></td>
                  <td style="border: 0px solid #ffffff; width: 110px;"></td>
                  <td style="border: 0px solid #ffffff; width: 115px;"></td>
                <td style="border: 0.5px solid #000000; width: 130px;text-align:right">'."Php " .number_format($total, 2).'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================
        ob_end_clean();
        $pdf->Output('Single Buyer Sales_report.pdf', 'I');

        }
      }
    }
?>