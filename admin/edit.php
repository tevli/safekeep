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
    <title>Edit</title>
    <link rel="stylesheet" href="../dashboard.css">
    
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    
<?php
if (isset($_GET['row'])) {
  $id=$_GET['id'];
  $row = $_GET['row'];
  $old = $_GET['old'];  
?>
<a href='checkbox.php?id=<?=$id?>'>Back</a>
<form action="edit.php" method="post" class="center">
    <hr><b>Edit</b><hr>
    <label for="Content">Old Value:</label>
    <input type="text" name="old" value="<?=$old?>" class="form-control"><br>
    <label for="depositor">Enter new Value:</label>
    <input type="text" name="new" class="form-control"><br>
    <input type="hidden" name="row" value="<?=$row?>">
    <input type="hidden" name="id" value="<?=$id ?>">
    <input type="submit" value="Submit"><br>
</form>
<?php
}
elseif(isset($_POST['id'])) {
   // var_dump($_POST);
    $id = $_POST['id'];
    $new = $_POST['new'];
    $row= $_POST['row'];
    
    $edit = new DB;
    $editer = $edit->update('deposits',$row,$new,$id);
}
?>  
</body>
</html>