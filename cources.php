<?php

include 'connect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cources</title>
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
<nav class="navbar bg-dark navbar-expand-lg w-100 navbar-dark" id="navbarNav">
		<ul class="navbar-nav" style="list-style: none;">
			<li class="nav-item" style="font-size:18px;">
				<a href="index.php" class=" nav-link text-white">Home</a>
			</li>
			<li class="nav-item" style="font-size:18px; ">
				<a href="#" class=" nav-link text-white font-weight-bold" style="margin-left:  15px; font-size:18px;">Cources</a>
			</li>
			<li class="nav-item"><a href="about.php" class=" nav-link text-white" style="margin-left: 15px; font-size:18px;"> About </a></li>
			<li class="nav-item"><a href="record.php" class=" nav-link text-white" style="margin-left:  15px; font-size:18px;"> Record </a></li>
			<li class="nav-item"><a href="contact.php" class=" nav-link text-white" style="margin-left:  15px;font-size:18px;"> Contact </a></li>
			<li class="nav-item"><a href="exameforum.php" class=" nav-link text-white" style="margin-left:  15px;font-size:18px;width: 125px; "> Exame Forum </a></li>
			<li class="nav-item"><a href="faq.php" class=" nav-link text-white" style="margin-left: 15px;font-size:18px;"> FAQ </a></li>
			<li class="nav-item rounded" style="float: right; margin-left: 797px; background-image: linear-gradient(90deg,#ff3838,#ff4d4d,#F97F51,#f9ca24); width: 70px;"><a href="login.php" class="navbar-brand nav-link text-white"> Login </a></li>
		</ul>
</nav>
<br>
<center>
	<div class="w-100" style="background-image: linear-gradient(90deg,#ff243d,#fff700,#ff243d);">
		<h1 style="font-family: 'Courier New', Courier, monospace;font-weight: bold;" class="text-danger">
		Our_Cources
		</h1>
	</div>
</center>
<div class="m-5">
	<?php
		$q=" SELECT * FROM course ";
		$res=mysqli_query($connect,$q);
		$row_num=mysqli_num_rows($res); 
		$val=mysqli_fetch_array($res);
		for($i=1;$i<=$row_num;$i++)
		{
			if($i%2!=0)
			{
	?>	
		<div class="w-25 shadow rounded p-5" style="margin-left: 250px; margin-top: 35px;
			background-image: linear-gradient(90deg,#00a4e6,#00ddfa,#5efff7);
			font-family: 'Inconsolata', monospace;">
			<h3><?php  echo $val[1]; ?></h3>
			<p>Course duration :<?php echo$val[2]." Weeks"; ?></p>
			<br>Course fees :<?php echo $val[3]."/-"; ?>
		</div>
		<?php
			}
			else
			{
		?>
		<div class="w-25 shadow rounded p-5" style="margin-left: 800px; margin-top: -225px;
			background-image: linear-gradient(90deg,#ff4794,#ff75af,#ffa3ca);
			font-family: 'Inconsolata', monospace;">
			<h3><?php  echo $val[1]; ?></h3>
			<p>Course duration :<?php echo$val[2]." Weeks"; ?></p>
			<br>Course fees :<?php echo $val[3]."/-"; ?>
		</div>
		<br>
		<?php
		}
		$val=mysqli_fetch_array($res);
	}
	?>
</div>
</body>
</html>