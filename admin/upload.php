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
    <title>Upload Portfolio</title>
    <link rel="stylesheet" href="../dashboard.css">
   <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <a href="dashboard.php" class="float_left ">Back to Dashboard</a>
<div class="center">
    <?php 
        if (isset($_POST['username'])) {
              
            $file = "../portfolio/".basename($_FILES['pic']['name']);
            move_uploaded_file($_FILES["pic"]["tmp_name"],$file);
            $dname =$_POST['username'] ;
            $id = $_POST['id'];
            $desc = $_POST['description'];
           // echo $file;
           // var_dump($_FILES['pic']);
           $action = new DB;
            $xaction = $action->InsFile($dname,$desc,$id,$file);


        }
    ?>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <h4>Upload files from here</h4>
    <hr>
        <label for="Name of User">Name of Project:</label> <br>
        <input type="text" name="username"  class="form-control" > <br>
        <label for="description">Enter Project Description </label><br>
        <input type="text" name="description" class="form-control"><br>
        <label for="picture">Upload Pictures</label> <br>
        <input name="pic" id="" type="file" class="form-control"  required>
		<span>Attach high quality design here (130px X 160px)</span> <br>
        <input type="hidden" name="id" value="<?php echo rand(1,999); ?>"> <br>
        <input type="submit" value="Submit" class="btn btn-info">
        <hr>
    </form>

    </div>
</body>
</html>