<?php  
 function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "tcishop");  
      $sql = "SELECT * FROM orders JOIN account ON orders.acc_id=account.acc_id ORDER BY order_id desc";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["order_id"].'</td>  
                          <td>'.$row["acc_fname"].' '.$row["acc_lname"].'</td>  
                          <td>'.$row["order_amount"].'</td>  
                          <td>'.$row["date_ordered"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  
      require_once('tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="5%">Id</th>  
                <th width="30%">Name</th>  
                <th width="15%">Age</th>  
                <th width="50%">Email</th>  
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>  

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<!-- Script -->
<script>
$(document).ready(function(){
  $.datepicker.setDefaults({
    dateFormat: 'mm-dd-yy'
  });
  $(function(){
    $("#From").datepicker();
    $("#to").datepicker();
  });
  $('#range').click(function(){
    var From = $('#From').val();
    var to = $('#to').val();
    if(From != '' && to != '')
    {
      $.ajax({
        url:"sample3.php",
        method:"POST",
        data:{From:From, to:to},
        success:function(data)
        {
          $('#purchase_order').html(data);
        }
      });
    }
    else
    {
      alert("Please Select the Date");
    }
  });
});
</script>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SoftAOX | Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>            
      </head>  
      <body>  
           <br />
           <div class="container">  

                <h4 align="center"> Cancelled Orders</h4><br />  

                <div class="table-responsive"> 
                <div class="col-md-2">
<input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
</div>
<div class="col-md-2">
<input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
</div> 
<div class="col-md-8">
<input type="button" name="range" id="range" value="Range" class="btn btn-success"/>
</div>
                	<div class="col-md-12" align="right">
                     <form method="post">  
                            
                       
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">Order Id</th>  
                               <th width="20%">Customer Name</th>  
                               <th width="15%">Amount</th>  
                               <th width="10%">Date Ordered</th> 
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>
                     <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
                     </form>
                </div>  
           </div>  
      </body>  
</html> 