<?php
session_start();
require("../database.php");
<<<<<<< HEAD
$id = $_REQUEST['id'];
=======
<<<<<<< HEAD
$id = $_REQUEST['id'];
=======

$id = $_REQUEST['id'];

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
$pdo = Database::connect();
$donor = $pdo->prepare("SELECT * FROM order WHERE order_id = '10");
$donor->execute(array($id));
$donor = $donor->fetch(PDO::FETCH_ASSOC);
<<<<<<< HEAD
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
=======
<<<<<<< HEAD
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
=======



// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
<<<<<<< HEAD
=======
=======

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
<<<<<<< HEAD
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
=======
<<<<<<< HEAD
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
=======

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
<<<<<<< HEAD
// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true);
=======
<<<<<<< HEAD
// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true);
=======

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
<<<<<<< HEAD
=======
=======

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
// Set some content to print
$html = <<<EOD
<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
<i>This is the first example of TCPDF library.</i>
<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
<p>Please check the source code documentation and other examples for further information.</p>
<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;
<<<<<<< HEAD
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// ---------------------------------------------------------
=======
<<<<<<< HEAD
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// ---------------------------------------------------------
=======

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

>>>>>>> 8b1eaa9840c376c5f9560bea61aca7095bc43c62
>>>>>>> 6e0e0e5b34916c22913f8874abc337791265b03c
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
?>