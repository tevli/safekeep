<?php
require_once '../classes/Login.php';
require_once '../classes/DB.php';
Login::asAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
      
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../dashboard.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
</head>
<body>
   <a href="../index.html">Home page</a>
   <?php 
   if (isset($_GET['action'])) {
      if ($_GET['action']=='delete') {
         $id= $_GET['id'];
         $portF = new DB;
         $act = $portF->Delete('deposits','user_id',$id);
         $act = $portF->Delete('user_details','user_id',$id);

      }
      elseif($_GET['action']=='edit'){
         
      }
     
   }
   
   ?>
 <?php
 $portF = new DB;
 $Files= $portF->getUsers();
    if (empty($Files)) {
        echo "<div class='center'><h5>No Deposit Boxes Created yet!</h5><img src='../img/deposit.png' alt='deposit.png'><br>
        <a href='../register.php' class='badge badge-success'>Register New User</a></div>";
       
    }
    else{ ?>
        <a href='../register.php' class='badge badge-success'>Register New User</a></div>";
       <div class="center"><table class="table table-striped center">
        <?php
       foreach ($Files as $Files) {
        // var_dump($Files);
         $name = $Files['name'];
         $email = $Files['email'];
         $user_id = $Files['user_id'];
         echo "
         <tr>
         <td><h5>$name&nbsp;&nbsp;&nbsp;<a href='dashboard.php?action=delete&id=$user_id' class='btn btn-danger'>Delete</a></h5>&nbsp;&nbsp;&nbsp; <a href='checkbox.php?id=$user_id' class=''><img src='../img/search-icon.png'>Check Box</a>
         </td>

         <tr>
         ";
      
      
      
      
      
      
      
      
      
      
      
         } 

         ?></table> </div> <?php
      
    }
 
 ?>
  
</html>
