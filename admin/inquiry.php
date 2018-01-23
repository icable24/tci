<?php 
  include('../login_success.php');
  include('../database.php');
  
 $pdo = Database::connect();
  $inquiry = $pdo->prepare("SELECT * FROM inquiry WHERE NOT (status = 'Unread')");
  $inquiry->execute();
  $inquiry = $inquiry->fetchAll();
?>

<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<body>
<style>
    select, input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
  }
  input[type=text]{
     background-image: url('../img/searchicon.png');
  }
  select{
     width: 20%;
      background-image: url('../img/filter-icon.png');
  }
  input[type=text]:focus {
      width: 50%;
  }
</style>
<?php 
  include("sidenavbar.php");
?>
  <div class="page home-page">
    <?php include("header.php"); ?>
    <br>
    <div class="container">
      <div> 
        <input type="text" id="myInput" onkeyup="myFunction()" name="search" placeholder="Search..">                 
            </div>
            <br><br>
            <div><h1>Customer Inquiries</h1></div>
            <br>
            <table class="table" id="myTable">
        <thead>
          <tr class="alert-success">
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php 
            foreach($inquiry as $row){
              $inquiryID = $row['inquiryID'];
              $iqname = $row['acc_name'];
              $iqemail = $row['acc_email'];
              $subject = $row['subject'];
              $status = $row['status'];
              echo "
                <tr>
                  <td>$iqname</td>
                  <td>$iqemail</td>
                  <td>$subject</td>
                  <td>$status</td>
                  <td class='class-center'>
                    <a href='viewInquiry.php?id=$inquiryID' class='btn btn-primary btn-md' data-toggle='tooltip' title='View'><span>View</span></a>
                  </td>
                </tr>
              ";
            }
          ?>
          <tr>  
          <td></td>
          </tr>
        </tbody>              
            </table>
        </div>
    <?php include("footer.php"); ?>
  <?php include("js.php"); ?>
</body>
</html>