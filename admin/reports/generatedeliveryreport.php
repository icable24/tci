<?php
include('../database.php');
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
    $categ =$_POST['sdate']='0' && $_POST['edate']='0';
    //$act_type3=$_POST['slocation'];

    
        
    if($categ=='sdate' && 'edate'){
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
    $pdo = Database::connect();

    if(!empty($_POST['sdate']) && !empty($_POST['edate'])){
    $sdate = DateTime::createFromFormat("Y-m-d", $_POST['sdate'])->format('m-d-Y');
    $edate = DateTime::createFromFormat("Y-m-d", $_POST['edate'])->format('m-d-Y');
    
    $orders = $pdo->prepare("SELECT * FROM orders ORDER BY order_id ASC");
    $orders->execute();
    $orders = $orders->fetchAll(); 
      foreach($orders as $rows){
         $customer = $pdo->prepare("SELECT * FROM account WHERE acc_id = ?");
         $customer->execute(array($rows['acc_id']));
         $customer = $customer->fetch();
                            

      $result = mysqli_query($pdo, $orders);  

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $order_id = "ID";
        $customerName = "Name";
        $total = "TOtal Amount";
        $date_ordered = "Date Ordered";
 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$order_id.'</td>
                  <td style="border: 0px solid #ffffff; width: 130px;">'.$customerName.'</td>
                  <td style="border: 0px solid #ffffff; width: 200px;">'.$total.'</td>
                  <td style="border: 0px solid #ffffff; width: 50px;">'.$date_ordered.'</td>


              </tr>';

        while($row = mysqli_fetch_array($result)){
            $order_id = $row['order_id'];
            $customerName = $customer['acc_fname'] . ' ' . $customer['acc_lname'];
            $total = "Php " . number_format($row['order_amount'], 2);
            $date_ordered = $row['date_ordered'];
        

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 120px;">'.$order_id.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$customerName.'</td>
                <td style="border: 1px solid #000000; width: 200px;">'.$total.'</td>
                <td style="border: 1px solid #000000; width: 50px;">'.$date_ordered.'</td>

            </tr>';
        }
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('Inventory_report.pdf', 'I');
    }

        }//end sang all
}//if ($act_type=='BC')end


?>