<?php
include 'connect.php';
session_start();
$stuid=$_SESSION['student_pass_up_id'];
$q2=" SELECT sname,phone FROM student WHERE sid='$stuid' ";
$r=mysqli_query($connect,$q2);
$resVal=mysqli_fetch_array($r);
$name=$resVal[0];

if(isset($_POST['subbtn']))
{
	$npass=$_POST['newpass'];
   
	$hashedpass=password_hash($npass, PASSWORD_BCRYPT);
	$q=" UPDATE student SET password='$hashedpass' WHERE sid='$stuid' ";
	if(mysqli_query($connect,$q))
	{
      SendMessage($resVal[0],$resVal[1],$stuid,$npass);
		echo "<script>
			alert('Successfully updated');
         window.location.href = 'exameforum.php'
			</script>";
	}
	else
	{
		echo "<script>alert('NOT FOUND');</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Password Change</title>
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
	<div class="topw"
	style="
	margin-left: 775px;
	font-family: 'Courier New', Courier, monospace;
	font-size: 50px;
	font-stretch: 3px;
	text-align: center;
	color: yellow;
	transform: translate(-50%,-50%); 
	margin-top: 100px;
	/*text-shadow: 0px 0px 80px grey,0px 0px 100px grey,0px 0px 150px grey,0px 0px 200px grey;*/">
		A_N_CoDe
	</div>
	<div style=" margin-top: 30px;">
		<a href="student-pchange.php" class="p-2" 
		style="
		margin-left: 575px;
		font-size:30px; 
		color: grey; 
		">
		<i class="fas fa-arrow-left" ></i></a>
	</div>
	<div class="form-group  rounded w-25 pl-5 pb-4 pt-4 border border-primary" 
	style="margin-left: 580px;
			margin-top: 30px;">
		<div class="text-center " style="margin-left: -30px;">Hi <?php echo $name; ?></div>
		<div class="ml-4 m-4">
		<form action="" method="post">
			<label for="text-center" class="font-weight-bolder">Enter New Password:</label>
			<input type="password" name="newpass" class="inp form-control w-75 rounded-pill" id="stuid" required="">
			<!--label for="text-center" class="font-weight-bolder">Enter Password:</label>
			<input type="password" name="psw" class="inp form-control w-25 rounded-pill" id="stuid" required="">
			<a href="student-pchange.php" class="text-danger">Forget Password</a><br--><br>
			<button type="submit" name="subbtn" class="btn btn-success rounded mt-3" value="" style="margin-left: 170px; font-size:17px; ">
				Update
				<i class="fas fa-pen-alt"></i>
			</button>
			<!--?php echo $msg; ?-->
		</form>
		</div>
	</div>
</body>
</html>
<?php
function SendMessage($name,$phone,$id,$pass)
{
	$name=$name;
	$passw=$pass;
	$sid=$id;
	$mon=date('Y-m-d');
	$field = array(
	    "sender_id" => "FSTSMS",
	    "language" => "english",
	    "route" => "qt",
	    "numbers" => '$phone',
	    "message" => "9920",
	    "variables" => "{#EE#}|{#DD#}",
	    "variables_values" => "'$name'|'$mon'|'$passw'|'$sid'"
	);

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_SSL_VERIFYHOST => 0,
	  CURLOPT_SSL_VERIFYPEER => 0,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => json_encode($field),
	  CURLOPT_HTTPHEADER => array(
	    "authorization: zbB4EXUERtpF01lQXy3LBKPSBkejJrRhHSxC5ufrO7934rZEet1SQFUWSS7r",
	    "cache-control: no-cache",
	    "accept: */*",
	    "content-type: application/json"
	  ),
	));#working is left

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

}
?>