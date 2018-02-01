<?php
require_once('tcpdf.php');

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'tci.png';
       $this->Image($image_file, 80, 10, 300, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetY(15);
        $this->SetFont('times', 'B', 24);
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
        $this->Cell(0, 20, 'Tumandok Craft Industries Management System', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

if(!empty($_POST)){

//start sang arguement
    $act_type=$_POST['rcategory'];
    $act_type2=$_POST['pcategory'];
    //$act_type3=$_POST['slocation'];

    
    //BY Product
    
if ($act_type=='BP') {
        
    if($act_type2=='all'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Inventory Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD



    Tumandok Craft Industries Management System

    Inventory Report




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
      $sql = "SELECT * FROM product ORDER BY prod_id ASC";  
      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $prod_code = "Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $pc_name = "Category";
        $prod_desc = "Description";

 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 50px;">'.$pc_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 2900px;">'.$prod_desc.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = $row["prod_image"];
        $prod_name = $row["prod_name"];
        $pc_name = $row["pc_name"];
        $prod_desc = $row["prod_desc"];
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 120px;">'.$prod_code.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$prod_image.'</td>
                <td style="border: 1px solid #000000; width: 200px;">'.$prod_name.'</td>
                <td style="border: 1px solid #000000; width: 50px;">'.$pc_name.'</td>
                <td style="border: 1px solid #000000; width: 290px;">'.$prod_desc.'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('Inventory_report.pdf', 'I');

        }//end sang all
        elseif ($act_type2=='LF'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');

    $pdf->SetTitle('Light Furnitures Inventory Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD



    Tumandok Craft Industries Management System

    Inventory Report

    Light Furnitures



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
      $sql = "SELECT * FROM product WHERE pc_name = '1' ORDER BY prod_id ASC";  
      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $prod_code = "Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $prod_desc = "Description";
 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 3300px;">'.$prod_desc.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = $row["prod_image"];
        $prod_name = $row["prod_name"];
        $prod_desc = $row["prod_desc"];
        
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 120px;">'.$prod_code.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$prod_image.'</td>
                <td style="border: 1px solid #000000; width: 200px;">'.$prod_name.'</td>
                <td style="border: 1px solid #000000; width: 330px;">'.$prod_desc.'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('Light Furnitures_Inventory_report.pdf', 'I');
        }//end sang LF

        elseif ($act_type2=='A'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');

    $pdf->SetTitle('Accessories Inventory Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD



    Tumandok Craft Industries Management System

    Inventory Report

    Accessories



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
      $sql = "SELECT * FROM product WHERE pc_name = '2' ORDER BY prod_id ASC";  
      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $prod_code = "Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $prod_desc = "Description";
 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 3300px;">'.$prod_desc.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = $row["prod_image"];
        $prod_name = $row["prod_name"];
        $prod_desc = $row["prod_desc"];
        
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 120px;">'.$prod_code.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$prod_image.'</td>
                <td style="border: 1px solid #000000; width: 200px;">'.$prod_name.'</td>
                <td style="border: 1px solid #000000; width: 330px;">'.$prod_desc.'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('Accessories_Inventory_report.pdf', 'I');
        }//end sang A

        elseif ($act_type2=='WD'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');

    $pdf->SetTitle('Wall Decor Inventory Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD



    Tumandok Craft Industries Management System

    Inventory Report

    Wall Decor



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
      $sql = "SELECT * FROM product WHERE pc_name = '3' ORDER BY prod_id ASC";  
      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $prod_code = "Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $prod_desc = "Description";
 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 3300px;">'.$prod_desc.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = $row["prod_image"];
        $prod_name = $row["prod_name"];
        $prod_desc = $row["prod_desc"];
        
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 120px;">'.$prod_code.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$prod_image.'</td>
                <td style="border: 1px solid #000000; width: 200px;">'.$prod_name.'</td>
                <td style="border: 1px solid #000000; width: 330px;">'.$prod_desc.'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('Wall Decor_Inventory_report.pdf', 'I');
        }//end sang WD
        elseif ($act_type2=='L'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');

    $pdf->SetTitle('Luminaries Inventory Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD



    Tumandok Craft Industries Management System

    Inventory Report

    Luminaries



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
      $sql = "SELECT * FROM product WHERE pc_name = '4' ORDER BY prod_id ASC";  
      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $prod_code = "Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $prod_desc = "Description";
 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 3300px;">'.$prod_desc.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = $row["prod_image"];
        $prod_name = $row["prod_name"];
        $prod_desc = $row["prod_desc"];
        
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 120px;">'.$prod_code.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$prod_image.'</td>
                <td style="border: 1px solid #000000; width: 200px;">'.$prod_name.'</td>
                <td style="border: 1px solid #000000; width: 330px;">'.$prod_desc.'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('Luminaries_Inventory_report.pdf', 'I');
    }//end sang L
        elseif ($act_type2=='HF'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');

    $pdf->SetTitle('Home Furnitures Inventory Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD



    Tumandok Craft Industries Management System

    Inventory Report

    Home Furnitures



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
      $sql = "SELECT * FROM product WHERE pc_name = '5' ORDER BY prod_id ASC";  
      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $prod_code = "Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $prod_desc = "Description";
 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$prod_code.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 3300px;">'.$prod_desc.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $prod_code = $row["prod_code"];
        $prod_image = $row["prod_image"];
        $prod_name = $row["prod_name"];
        $prod_desc = $row["prod_desc"];
        
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 120px;">'.$prod_code.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$prod_image.'</td>
                <td style="border: 1px solid #000000; width: 200px;">'.$prod_name.'</td>
                <td style="border: 1px solid #000000; width: 330px;">'.$prod_desc.'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('Home Furnitures_Inventory_report.pdf', 'I');
        }//end sang HF
    }//if($act_type2=='all')

//...................................................................................................................................//
//...................................................................................................................................//
//...................................................................................................................................//
//...................................................................................................................................//
//...................................................................................................................................//
//...................................................................................................................................//

if ($act_type=='BC') {
    if ($act_type3=='R') {
    
    if($act_type2=='A'){
        $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tumandok Craft Industries');
    $pdf->SetTitle('Inventory Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD



    Tumandok Craft Industries Management System

    Inventory Report




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
      $sql = "SELECT * FROM inventory, product WHERE storeid = '1' ORDER BY inventory_id ASC";

      $result = mysqli_query($connect, $sql);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $inventory_id = "Code";
        $prod_image = "Product Image";
        $prod_name = "Product Name";
        $pc_name = "Category";
        $prod_desc = "Description";
        $quantity = "Qty.";


 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 80px;">'.$inventory_id.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$prod_image.'</td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$prod_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 50px;">'.$pc_name.'</td>
                  <td style="border: 0px solid #ffffff; width: 2900px;">'.$prod_desc.'</td>
                  <td style="border: 0px solid #ffffff; width: 50px;">'.$quantity.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
        $inventory_id = $row["inventory_id"];
        $prod_image = $row["prod_image"];
        $prod_name = $row["prod_name"];
        $pc_name = $row["pc_name"];
        $prod_desc = $row["prod_desc"];
        $quantity = $row["quantity"];
        
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$inventory_id.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$prod_image.'</td>
                <td style="border: 1px solid #000000; width: 200px;">'.$prod_name.'</td>
                <td style="border: 1px solid #000000; width: 50px;">'.$pc_name.'</td>
                <td style="border: 1px solid #000000; width: 290px;">'.$prod_desc.'</td>
                <td style="border: 0px solid #ffffff; width: 50px;">'.$quantity.'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('Inventory_report.pdf', 'I');

        }//end sang all
       
      
    }//if($act_type2=='all')
}//if ($act_type=='R') end
}//if ($act_type=='BC')end


?>