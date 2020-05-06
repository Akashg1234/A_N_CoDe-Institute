<?php
include 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</head>
<body>
<nav class="navbar bg-dark navbar-expand-lg navbar-dark w-100" id="navbarNav">
		<ul class="navbar-nav" style="list-style: none;">
			<li class="nav-item" style="font-size:18px;">
				<a href="index.php" class=" nav-link text-white">Home</a>
			</li>
			<li class="nav-item" style="font-size:18px; ">
				<a href="cources.php" class=" nav-link text-white " style="margin-left:  15px; font-size:18px;">Cources</a>
			</li>
			<li class="nav-item"><a href="about.php" class=" nav-link text-white" style="margin-left: 15px; font-size:18px;"> About </a></li>
			<li class="nav-item"><a href="notice.php" class=" nav-link text-white" style="margin-left:  15px; font-size:18px;"> Notice </a></li>
			<li class="nav-item"><a href="#" class=" nav-link text-white font-weight-bold" style="margin-left:  15px;font-size:18px;"> Contact </a></li>
			<li class="nav-item"><a href="exameforum.php" class=" nav-link text-white" style="margin-left:  15px;font-size:18px;width: 125px; "> Exame Forum </a></li>
			<li class="nav-item"><a href="faq.php" class=" nav-link text-white" style="margin-left: 15px;font-size:18px;"> FAQ </a></li>
			<li class="nav-item rounded" style="float: right; margin-left: 800px; background-image: linear-gradient(90deg,#ff3838,#ff4d4d,#F97F51,#f9ca24); width: 70px;"><a href="login.php" class="navbar-brand nav-link text-white"> Login </a></li>
		</ul>
</nav><br>
<div class="mr-5" style="float: right;font-size: 20px;">
	<i class="fab fa-whatsapp text-success mr-2" style="font-size: 35px;"></i>
	7003791580
	<i class="fas fa-at text-primary ml-4 mr-2" style="font-size: 30px;"></i>
	xyz@gmail.com
	<i class="fas fa-phone-volume text-success ml-4 mr-2" style="font-size: 30px;"></i>
	8282812232
</div>

<div class=" form-group w-25 shadow rounded" style="margin-top: 90px; margin-left: 540px; height: 535px;">
	<form class="p-4 " style="font-size: 20px ;" action="" method="post">
		<label>Enter Your Name:</label>
		<input type="text" name="name" class="form-control rounded-pill"><br>
		<label>Enter Your Phone no:</label>
		<input type="text" name="phone" class="form-control rounded-pill"><br>
		<label>Enter Your Email:</label>
		<input type="text" name="email" class="form-control rounded-pill"><br>
		<label>Enter Your Query:</label>
		<textarea class="form-control rounded-pill" name="qry"></textarea><br>
		<button name="sendbtn" class="text-white btn btn-success rounded"  style="float: right;">Submit<i class="fas fa-paper-plane ml-2"></i></button>
	</form>
</div>
</body>
</html>
<?php

if(isset($_POST['sendbtn']))
{
			$name=$_POST["name"];
			$phone=$_POST["phone"];
			$email=$_POST["email"];
			$query=$_POST["qry"];
         $date=date('Y-m-d');
			$q="INSERT INTO contact(name,phone,email,date,query) VALUES ('$name',$phone,'$email','$date','$query')";
			
			if(mysqli_query($connect,$q))
				{
					echo "<script>alert('submitted')</script>";
					#SendMessage($name,$phone);
				}

			else
				echo mysqli_error($connect);
			mysqli_close($connect);
}

?>