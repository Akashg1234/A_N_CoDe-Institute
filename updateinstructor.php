<?php 

session_start();
include 'connect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update staff table</title>
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
</style>	
</head>
<body>
<div class="w-100 bg-dark shadow" style="height: 53px;">
		<center>
			<h2 class="text-white">Instructor Table</h2>
		</center>
		<a href="logout.php" class="text-decoration-none" style="float: right;  margin-top: -38px;"><img src="logout.png" style="width: 35px;height: 35px;"></a>
</div><br><br>

<center>
	<div class="w-50 rounded shadow pb-4">
		<div class="bg-dark text-white text-center rounded-top" style="height: 50px;"><h4>Update Form</h4></div>
		<form action="" method="post" class="form text-center pt-3">
			<center>
				<label>Id</label><br>
				<input type="text" class="form-control w-50 text-center" name="id" readonly="" value="<?php echo $_SESSION['updateid']; ?>"><br>
				<label>Name </label><br>
				<input type="text" class="form-control w-50 text-center" readonly="" name="name" value="<?php echo $_SESSION['name']; ?>"><br>
				<label>Phone</label><br>
				<input type="text" class="form-control w-50 text-center"  name="phone" value="<?php echo $_SESSION['phone']; ?>"><br>
				<label>Email</label><br>
				<input type="text" class="form-control w-50 text-center"  name="email" value="<?php echo $_SESSION['email']; ?>"><br>
				<label>Qualification</label><br>
				<input type="text" class="form-control w-50 text-center"  name="quali" value="<?php echo $_SESSION['quali']; ?>"><br>
				<label>Experience</label><br>
				<input type="text" class="form-control w-50 text-center"  name="exep" value="<?php echo $_SESSION['experience']; ?>"><br>
				<label>Salary</label><br>
				<input type="text" class="form-control w-50 text-center"  name="sal" value="<?php echo $_SESSION['salary']; ?>"><br>
				<button class="btn btn-success " name="subbtn">
					UPDATE
					<i class="fas fa-pen-alt" style="margin-left: 10px;"></i>
				</button>
			</center>
		</form>
	</div>
</center>
</body>
</html>
<?php

if(isset($_POST['subbtn']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$quali=$_POST['quali'];
	$expe=$_POST['exep'];
	$salary=$_POST['sal'];
	$q=" UPDATE staff SET email='$email',phone='$phone',quali='$quali',expe='$expe',salary='$salary' WHERE staffid='$id' ";
	if(mysqli_query($connect,$q))
	{
		echo "<script>alert('Successfully updated...');
				window.location.href='instructor-admin-view.php';</script>";
		#message sending and message sending		
	}
}

?>