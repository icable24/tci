<?php
include('../database.php');
$tbl_name="account"; 

session_start();
{
    $user=$_POST['email'];
    $pass=$_POST['password'];
    $pdo = Database::connect();
    $query = $pdo->prepare("SELECT * FROM account WHERE 
                         acc_email='$user' and acc_password ='$pass'");
    $query->execute();
    $count = $query->fetch(PDO::FETCH_ASSOC);
    if($count!="")
    {
        $_SESSION['login_username']=$user;

        $order = $pdo->prepare("SELECT * FROM orders WHERE acc_id = ? AND order_finish = ?");
        $order->execute(array($count['acc_id'], "No"));
        $order = $order->fetch();
        if(!$order){
            $insert = $pdo->prepare("INSERT INTO orders(acc_id, order_finish) VALUES(?, ?)");
            $insert->execute(array($count['acc_id'], "No"));
        }
        if($count['user_type'] == 'admin'){
           header("Location:../admin/index.php"); 
        }elseif($count['user_type'] == 'inventory'){
            header("location:../admin/index.php");
        }else{
            header("Location:../index.php");
        }     
         
    }
    else
    {
       header('Location:../wrong_login.php');
       
    }
}
?>