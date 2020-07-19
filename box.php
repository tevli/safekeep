<?php
require_once 'classes/DB.php';
 if (isset($_POST['sec_code'])) {
     
     $sec_code = trim(htmlentities($_POST['sec_code']));
     $box_code = trim(htmlentities($_POST['box_code']));
     $box = new DB;
     $box = $box->useBox($sec_code,$box_code);
    //var_dump($_POST); ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=
        , initial-scale=1.0">
        <title>Deposit Box</title>
        <link rel="stylesheet" href="dashboard.css">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>

    <div class="center"><table class="table table-striped center" style="background-image: 'img/museum.png';">
        <h5>Congrats! Your Deposit Box is Intact. Here are the Details</h5><br>
     <!-- <img src="img/museum.png" alt="Deposit ready"> -->
    <tr>
             
              
        <thead>
            <tr>
            <th scope="col">Depositor</th>
            <th scope="col">Date</th>
            <th scope="col">Next-Of-Kin</th>
            <th scope="col">Box Content</th>
            </tr>
        </thead>
        <tbody>
    
       <?php 
          foreach ($box as $boxs) {
              $depositor = $boxs['depositor'];
              $date = $boxs['deposit_date'];
              $nok = $boxs['nok'];
              $content = $boxs['content'];
              $id = $boxs['user_id'];
              $sec_code = $boxs['sec_code'];
              $box_code = $boxs['box_code']; 
              echo "
              <tr>
              <td><b>Box code</b></td>
              <td>$box_code</td>
              <td><b>Security Code:</b> </td>
              <td>$sec_code</td>
              </tr>
              <tr>
              <td scope='row'>$depositor</td>
              <td>$date</td>
              <td>$nok</td>
              <td>$content</td>
  
              
     
              <tr>
              ";
          }
        
    }
    ?>
    </table></div>
            
    </body>
    </html>
 