<?php

session_start();
include 'connect.php';
$q=" SELECT * FROM staff WHERE stafftype='Normal Staff'AND status='Active' ";
$res=mysqli_query($connect,$q);
$rownum=mysqli_num_rows($res);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Front Staff Board</title>
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
<style type="text/css">
	a{text-decoration: none;}a:hover{text-decoration: none;}
</style>
</head>
<body>
	<div class="w-100 bg-dark shadow" style="height: 53px;">
		<center>
			<h2 class="text-white">Staff Table</h2>
		</center>
		<a href="logout.php" class="text-decoration-none" style="float: right;  margin-top: -38px;"><img src="logout.png" style="width: 35px;height: 35px;"></a>
	</div><br>
	<center><input type="text" name="q" class="rounded-pill w-25 shadow border-0 form-control" placeholder="Search..."></center><br>
	<table class="table table-striped table-hover">
		<thead class="bg-dark text-center text-white">
			<th scope="col">ID.</th>
			<th scope="col">Name</th>
			<th scope="col">Phone</th>
			<th scope="col">Email</th>
			<th scope="col">Quali</th>
			<th scope="col">Adhar No.</th>
			<th scope="col">Pan No.</th>
			<th scope="col">Date of Join</th>
			<th scope="col">Salary</th>
			<th scope="col">Action</th>
		</thead>
		<?php

			for($i=1;$i<=$rownum;$i++)
			{
				$val=mysqli_fetch_array($res);
		?>
		<tr>
			<td class="text-center"><?php echo $val[0]; ?></td>
			<td class="text-center"><?php echo $val[2]; ?></td>
			<td class="text-center"><?php echo $val[3]; ?></td>
			<td class="text-center"><?php echo $val[4]; ?></td>
			<td class="text-center"><?php echo $val[7]; ?></td>
			<td class="text-center"><?php echo $val[16]; ?></td>
			<td class="text-center"><?php echo $val[17]; ?></td>
			<td class="text-center"><?php echo $val[18]; ?></td>
			<td class="text-center"><?php echo $val[19]; ?></td>
			<td>
				<button class="btn btn-danger text-white" name="delbtn">
					<a href="deletestaff.php?
					id=<?php echo getName();
					$_SESSION['updateid']=$val[0]; ?>
					&name=<?php echo getName();
					$_SESSION['name']=$val[2]; ?>
					&phone=<?php echo getName();
					$_SESSION['phone']=$val[3]; ?>
					&email=<?php echo getName();
					$_SESSION['email']=$val[4]; ?>" class="text-white">DROP</a>
				</button>
				<button class="btn btn-success ">
					<a href="updatestaff.php?
					id=<?php echo getName();
					$_SESSION['updateid']=$val[0]; ?>
					&name=<?php echo getName();
					$_SESSION['name']=$val[2]; ?>
					&phone=<?php echo getName();
					$_SESSION['phone']=$val[3]; ?>
					&email=<?php echo getName();
					$_SESSION['email']=$val[4]; ?>
					&quali=<?php echo getName();
					$_SESSION['quali']= $val[7]; ?>
					&expe=<?php echo getName();
					$_SESSION['experience']=$val[9]; ?>
					&salary=<?php echo getName();
					$_SESSION['salary']=$val[19]; ?>" class="text-white">UPDATE
					</a>
				</button>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
</body>
</html>
<?php

if(isset($_POST['delbtn']))
{

	$q="UPDATE staff SET status='Deactive'";


}
 
function getName() 
{ 
	$n=10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 

?>