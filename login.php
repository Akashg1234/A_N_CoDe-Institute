<?php
$msg="";
session_start();
include 'connect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | A_N_CoDe</title>
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
<style type="text/css">
a:hover{text-decoration: none;text-shadow: 3px 3px 9px gray}
 #home {color: blue;margin-right: 20px;}
 #fgtpass {color: red;}
</style>
<body>

   <div class="" style="float: right; margin-top: -150px;margin-right: 50px; ">
      <a href="index.php" id="home" >Home</a>
      <a href="new-staffpasswordupdate.php" id="fgtpass" >Forgot password</a>
   </div>
	<div class=" w-25 rounded pb-4 shadow" style="margin-left: 525px;margin-top: 200px;">
		<div class="text-center text-white w-100 rounded-top" style="background-image: linear-gradient(90deg,#ff3838,#ff4d4d,#F97F51,#f9ca24);
			font-family: 'Raleway', sans-serif;
			font-size: 30px;">
			Login
		</div>
		<br>
		<center>
		<form action="" method="post">
			<input type="text" placeholder="Enter Your Id" name="logid" class="rounded-pill w-75 form-control" required=""><br>
			<input type="password" placeholder="Enter password" name="pswd" class="rounded-pill w-75 form-control" required=""><br>
			<button class="w-75 rounded-pill form-control bg-success text-white border-0" name="loginbtn">Login<i class="fas fa-sign-in-alt ml-2"></i></button><br>
			<button class="w-75 rounded-pill form-control bg-primary text-decoration-none text-white border-0" name="loginbtn"><a href="adminlogin.php" class="text-white" style="text-decoration: none;">Admin Section</a><i class="fas fa-user-tie ml-2"></i></button>
		</form>
		</center>
	</div>
</body>
</html>
<?php

if(isset($_POST['loginbtn']))
{
	$id=$_POST["logid"];
   $pass=$_POST["pswd"];
   $q=" SELECT * FROM staff WHERE staffid='$id'  ";
   
   #$salt="63y#t8t$bds6@^$674^#tg@if7#@";
	#$passhashed=password_hash($_POST["pswd"], PASSWORD_BCRYPT);
   if($res=mysqli_query($connect,$q))
   {
      $val=mysqli_fetch_array($res);
      if(is_array($val))
      {
         if(password_verify($pass, $val[5]))
         {
            if($val[1]=='Normal Staff')
            {
               $_SESSION['staffid']=$val[0];
               $_SESSION['pass']=$val[5];
               $_SESSION['stafftype']=$val[1];
               #header('Location:');
               echo "<script>window.location.href='staff-view.php';</script>";
            }
            else if($val[1]=='Instructor')
            {
               $_SESSION['staffid']=$val[0];
               $_SESSION['pass']=$val[5];
               $_SESSION['stafftype']=$val[1];
               #header('Location:instructor-view.php');
               echo "<script>window.location.href='instructor-view.php';</script>";
            }
         }
         else
         {
            echo "<script>alert('Password not matched...');</script>";
         }
      }
      else
      {
         echo "<script>alert('Id. Not Found...');</script>";
      }
   }
}


?>