<?php  require_once 'classes/DB.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Deposit Box</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="dashboard.css">
<!--===============================================================================================-->
</head>
<body>
	<script>
		function printer(){
			window.print();
		}
	</script>
<?php
			if(isset($_POST['box_code'])){
				$sec_code = trim(htmlentities($_POST['sec_code']));
				$box_code = trim(htmlentities($_POST['box_code']));
				$box = new DB;
				$box = $box->useBox($sec_code,$box_code);
				foreach ($box as $boxs) {
					$depositor = $boxs['depositor'];
					$date = $boxs['deposit_date'];
					$nok = $boxs['nok'];
					$content = $boxs['content'];
					//$id = $boxs['user_id'];
					$sec_code = $boxs['sec_code'];
					$box_code = $boxs['box_code']; }

?>
	
	<div class="limiter"> 
	<a href="index.html">Back to Home Page</a> <br> <button class="btn btn-success" onclick="printer()" id="btn">Print</button><br>
	
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1">
					<div class="table100 center">
						<h5>We Found (1) box!</h5>
						
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Box Code No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?=$box_code?></th>
								</tr>
							</thead>
							<tbody>
								<tr class="row100 body">
									<td class="cell100 column1"><b>Security Code Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$sec_code?></b></td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Beneficiary/Next-of-Kin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$nok?></td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Content of DepositBox:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$content?></td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Name of Depositor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$depositor?></td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Date Of Deposit:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$date?></td>
								</tr>
								<tr class="row100 body">
									<td class="cell100 column1"><h6>To Retrieve your deposit Box, visit our Branch at xxxxxxxx</h6></td>
								</tr>
								

			<?php	} ?>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})

			$(this).on('ps-x-reach-start', function(){
				$(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
			});

			$(this).on('ps-scroll-x', function(){
				$(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
			});

		});

		
		
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>