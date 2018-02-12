<?php
include '../login_success.php';
require_once('tcpdf.php');
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // Logo
         $image_file = K_PATH_IMAGES.'logo.png';
       $this->Image($image_file, 10, 10, 200, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
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
    $act_type3=$_POST['slocation'];
    $act_type4=$_POST['p1category'];
    
    //BY store
    if ($act_type3=='CCR' && $act_type4=='all1') {
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Inventory Report - By Store');
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

    Inventory Report - By Store
    Cybergate Center Robinsons



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
      $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity, storename FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid =  store.storeid WHERE storename = 'G/F Cybergate Center Robinsons, Singcang'";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Inventory Report - By Store_report.pdf', 'I');
        }//end sang all1
        elseif ($act_type3=='CCR' && $act_type4=='LF1'){
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Light Furnitures Inventory Report - By Store');
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

    Inventory Report - By Store
    Cybergate Center Robinsons - Light Furnitures



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
    $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid = store.storeid WHERE storename = 'G/F Cybergate Center Robinsons, Singcang' AND pc_name = 1";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Light Furnitures_Inventory Report - By Store_report.pdf', 'I');
        }//end sang LF1
        elseif ($act_type3=='CCR' && $act_type4=='A1'){
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Accessories Inventory Report - By Store');
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

    Inventory Report - By Store
    Cybergate Center Robinsons - Accessories



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
    $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid = store.storeid WHERE storename = 'G/F Cybergate Center Robinsons, Singcang' AND pc_name = 2";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Accessories_Inventory Report - By Store_report.pdf', 'I');
        }//end sang A1
        elseif ($act_type3=='CCR' && $act_type4=='WD1'){
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Wall Decor Inventory Report - By Store');
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

    Inventory Report - By Store
    Cybergate Center Robinsons - Wall Decor



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
    $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid = store.storeid WHERE storename = 'G/F Cybergate Center Robinsons, Singcang' AND pc_name = 3";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Wall Decor_Inventory Report - By Store_report.pdf', 'I');
        }//end sang WD1
        elseif ($act_type3=='CCR' && $act_type4=='L1'){
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Luminaries Inventory Report - By Store');
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

    Inventory Report - By Store
    Cybergate Center Robinsons - Luminaries



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
    $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid = store.storeid WHERE storename = 'G/F Cybergate Center Robinsons, Singcang' AND pc_name = 4";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Luminaries_Inventory Report - By Store_report.pdf', 'I');
        }//end sang L1
        elseif ($act_type3=='CCR' && $act_type4=='HF1'){
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Home Furnishing Inventory Report - By Store');
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

    Inventory Report - By Store
    Cybergate Center Robinsons - Home Furnishing



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
    $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid = store.storeid WHERE storename = 'G/F Cybergate Center Robinsons, Singcang' AND pc_name = 5";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Home Furnishing_Inventory Report - By Store_report.pdf', 'I');
        }//end sang HF1
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    elseif ($act_type3=='ANP' && $act_type4=='all1') {
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Inventory Report - By Store');
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

    Inventory Report - By Store
    ANP, City Walk Robinsons Mall



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
      $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity, storename FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid =  store.storeid WHERE storename = 'ANP, City Walk Robinsons Mall, Mandalagan'";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Inventory Report - By Store_report.pdf', 'I');
        }//end sang all1
        elseif ($act_type3=='ANP' && $act_type4=='LF1'){
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Light Furnitures Inventory Report - By Store');
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

    Inventory Report - By Store
    ANP, City Walk Robinsons Mall - Light Furnitures



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
    $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid = store.storeid WHERE storename = 'ANP, City Walk Robinsons Mall, Mandalagan' AND pc_name = 1";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Light Furnitures_Inventory Report - By Store_report.pdf', 'I');
        }//end sang LF1
        elseif ($act_type3=='ANP' && $act_type4=='A1'){
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Accessories Inventory Report - By Store');
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

    Inventory Report - By Store
    ANP, City Walk Robinsons Mall - Accessories



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
    $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid = store.storeid WHERE storename = 'ANP, City Walk Robinsons Mall, Mandalagan' AND pc_name = 2";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Accessories_Inventory Report - By Store_report.pdf', 'I');
        }//end sang A1
        elseif ($act_type3=='ANP' && $act_type4=='WD1'){
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Wall Decor Inventory Report - By Store');
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

    Inventory Report - By Store
    ANP, City Walk Robinsons Mall - Wall Decor



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
    $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid = store.storeid WHERE storename = 'ANP, City Walk Robinsons Mall, Mandalagan' AND pc_name = 3";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Wall Decor_Inventory Report - By Store_report.pdf', 'I');
        }//end sang WD1
        elseif ($act_type3=='ANP' && $act_type4=='L1'){
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Luminaries Inventory Report - By Store');
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

    Inventory Report - By Store
    ANP, City Walk Robinsons Mall - Luminaries



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
    $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid = store.storeid WHERE storename = 'ANP, City Walk Robinsons Mall, Mandalagan' AND pc_name = 4";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Luminaries_Inventory Report - By Store_report.pdf', 'I');
        }//end sang L1
        elseif ($act_type3=='ANP' && $act_type4=='HF1'){
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Home Furnishing Inventory Report - By Store');
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

    Inventory Report - By Store
    ANP, City Walk Robinsons Mall - Home Furnishing



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
    $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid = store.storeid WHERE storename = 'ANP, City Walk Robinsons Mall, Mandalagan' AND pc_name = 5";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 140px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 250px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 140px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 250px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Home Furnishing_Inventory Report - By Store_report.pdf', 'I');
        }//end sang HF1
        elseif ($act_type=='BS') {
        $pdf = new MYPDF('R', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Inventory Report - By Store');
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
    
    Inventory Report - By Store
    ANP, City Walk Robinsons Mall


    
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
      $connect =  mysqli_connect("localhost", "root", "", "tcishop");
        $sql = "SELECT prod_code, prod_image, prod_name, quantity, storename FROM inventory JOIN product ON inventory.prod_id = product.prod_id JOIN store ON inventory.storeid =  store.storeid";
                
         $result = mysqli_query($connect, $sql);
        $tbl = '<table style="width: 638px;" cellspacing="0">';
        $prod_code = "Product Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $quantity = "Qty.";
        $storename = "Store Name";
 
       $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 150px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 30px;">'.$quantity.'</td>
                  <td style="border: 0px solid #ffffff; width: 150px;">'.$storename.'</td>
              </tr>';
        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = "../prod_img/" . $row['prod_image'];
        $prod_name = $row["prod_name"];
        $quantity = $row["quantity"];
        $storename = $row["storename"];
        
        
        
          // -----------------------------------------------------------------------------
        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0.5px solid #000000; width: 120px;">'.$prod_code.'</td>
                <td style="border: 0.5px solid #000000; width: 100px;"><img src="'.$prod_image.'" alt="Product Image" style="width:65px; height: 65px;"/></td>
                <td style="border: 0.5px solid #000000; width: 150px;">'.$prod_name.'</td>
                <td style="border: 0.5px solid #000000; width: 30px;">'.$quantity.'</td>
                <td style="border: 0.5px solid #000000; width: 150px;">'.$storename.'</td>
            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        //==============================================================
        $pdf->Output('Inventory Report - By Store_report.pdf', 'I');
        }//end sang all1
    }//if($act_type2=='all')
?>