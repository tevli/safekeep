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
    <title>Check Box</title>
    <link rel="stylesheet" href="../dashboard.css">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <a href="dashboard.php" class="btn btn-mini">Back to admin</a>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
  $dep = new DB;
  $depClass = $dep->getBox('deposits',$id); 
  if($depClass==false){ 
?>

<form action="checkbox.php" method="post" class="center">
    <label for="Content">Content of Box:</label>
    <input type="text" name="content" class="form-control"><br>
    <label for="depositor">Name of Depositor:</label>
    <input type="text" name="depositor" class="form-control"><br>
    <label for="date">date of Deposit:</label>
    <input type="date" name="date" class="form-control"><br>
    <label for="nok">Next Of Kin</label>
    <input type="text" name="nok" class="form-control"><br>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="Submit"><br>
</form> 
<?php
  } else{?>
  <div class="center"><table class="table table-striped center">
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
      $box= $dep->getBox('deposits',$id);
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
            <td scope='row'>$depositor&nbsp;<a href='edit.php?id=$id&row=depositor&old=$depositor' class='btn btn-mini'>edit</a></td>
            <td>$date<a href='edit.php?id=$id&row=deposit_date&old=$date' class='btn btn-mini'>edit</a></td>
            <td>$nok<a href='edit.php?id=$id&row=nok&old=$nok' class='btn btn-mini'>edit</a></td>
            <td>$content<a href='edit.php?id=$id&row=content&old=$content' class='btn btn-mini'>edit</a></td>

            
   
            <tr>
            ";
        }
  }
  ?>
  </table></div><?php
}

if (isset($_POST['depositor'])) {
    $id = $_POST['id'];
    $content = $_POST['content'];
    $depositor = $_POST['depositor'];
    $nok = $_POST['nok'];
    $date= $_POST['date'];
    $q1 = new DB;
    $q1x = $q1->checkBox($depositor,$date,$nok,$content,$id);
    
    ?> 
    <div style="text-align: center" class="center"><img src="../img/check-icon.png" alt="box create success">
    <h5>Deposit Box Successfully Created</h5>
    </div>
    <?php
}



?>  
</body>
</html>

