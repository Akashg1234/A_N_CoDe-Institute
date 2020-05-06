<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>staff table</title>
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
<style type="text/css">
	a{text-decoration: none;}a:hover{text-decoration: none;}label{font-weight: bold;}
#REGISTER
{
	top: 100px;
	background-color: yellow;
	color: red;
}
#PROFILE
{
	top: 165px;
	color: white;
	background-color: grey;
}
#CONTACT
{
	top: 230px;
	color: yellow;
	background-color: red;
}
#STUDENT
{
	top: 296px;
	color: white;
	background-color: blue;
}
#INSTRUCTOR
{
	top: 362px;
	color: yellow;
	width: 187px;
	left: -116px;
	background-color: green;
}
#NOTICE
{
   top: 428px;
   color: white;
   background-color: #ff00dd;
}.mySidenav a
{
	text-decoration: none;
	position: absolute;
	padding: 15px 5px 10px 10px;
	color: white;
	transition: 0.2s;
	left: -80px;
	border-radius: 0px 10px 10px 0px;
	width: 150px;
	height: 60px;
	margin-top: 50px;
}
 #PASS
{
   top: 494px;
   color: white;
   background-color: red;
   width: 230px;
   left: -160px;
}

.mySidenav a#INSTRUCTOR:hover,a#STUDENT:hover,a#CONTACT:hover,a#PROFILE:hover,a#REGISTER:hover,a#PASS:hover,a#NOTICE:hover
{
	left: 0;
}
</style>	
</head>
<body>
	<div class="w-100 bg-dark " style="height: 53px;">
		<center>
			<img src="profile.jpg" class="border-white rounded-circle" style="width: 50px;height: 50px;">
			<!--i class="fas fa-user-alt border-white rounded-circle" style="color: white;"></i-->
		</center>
		<a href="logout.php" class="text-decoration-none" style="float: right;  margin-top: -40px;"><img src="logout.png" style="width: 35px;height: 35px;"></a>
	</div>
	<div class=" bg-dark shadow mb-5 w-100">
		<h2 class="text-center text-white">
			FRONT STAFF BOARD
		</h2>
	</div>
	<div class="mySidenav" style="">
		<a href="register.php" id="REGISTER">REGISTER <i class="fas fa-clipboard-list" style="margin-left: 30px; width: 30px;height: 30px;"></i></a>
		<a href="profile.php" id="PROFILE">PROFILE  <i class="fas fa-user-circle" style="margin-left: 35px; width: 30px;height: 30px;"></i></a>
		<a href="contact-show.php"  id="CONTACT">CONTACT  <i class="fas fa-phone-volume" style="margin-left: 25px;width: 30px;height: 30px;"></i></a>
		<a href="student.php"  id="STUDENT">STUDENT  <i class="fas fa-user-graduate" style="margin-left: 25px;width: 30px;height: 30px;"></i></a>
		<a href="staff-instructor-view.php"  id="INSTRUCTOR">INSTRUCTOR  <i class="fas fa-chalkboard-teacher" style="margin-left: 30px;width: 30px;height: 30px;"></i></a>
      <a href="staff-notice-creation.php"  id="NOTICE">NOTICE  <i class="fas fa-volume-up" style="margin-left: 35px;width: 30px;height: 30px;"></i></a>
      <a href="staffpasswordupdate.php"  id="PASS"> UPDATE PASSWORD <i class="fas fa-unlock-alt" style="margin-left: 28px;width: 30px;height: 30px;"></i></a>
	</div>
</body>
</html>