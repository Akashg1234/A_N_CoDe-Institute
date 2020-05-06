<?php

session_start();
include 'connect.php';
$q=" SELECT * FROM staff WHERE stafftype='Instructor'AND status='Active' ";
$res=mysqli_query($connect,$q);
$rownum=mysqli_num_rows($res);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Instructor Board</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jqueryFileScript.js"></script>
<script type="text/javascript" src="jqueryTableedit.js"></script> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
<style type="text/css">
	a{text-decoration: none;}a:hover{text-decoration: none;}
</style>
<script type="text/javascript">
   $(document).ready(function()
   {
     $("#value_search").on("keyup", function() {
       var value = $(this).val().toLowerCase();
       $("#mytable tr").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
       });
     });
   });
</script>
</head>
<body>
	<div class="w-100 bg-dark shadow" style="height: 53px;">
		<center>
			<h2 class="text-white">Instructor Table</h2>
		</center>
		<a href="logout.php" class="text-decoration-none" style="float: right;  margin-top: -38px;"><img src="logout.png" style="width: 35px;height: 35px;"></a>
	</div>
   <div class=" bg-dark shadow mb-5 w-100">
      <h2 class="text-center text-white">
         FRONT STAFF BOARD
      </h2>
   </div>
	<center>
      <input type="text" name="q" id="value_search" class="rounded-pill w-25 shadow border-0 form-control" placeholder="Search...">
   </center><br>
	<table class="table table-striped table-hover" >
		<thead class="bg-dark text-center text-white">
			<th scope="col">ID.</th>
			<th scope="col">Name</th>
			<th scope="col">Phone</th>
			<th scope="col">Email</th>
			<th scope="col">Quali</th>
			<th scope="col">Domain</th>
			<!--th scope="col">Pass.Yr</th-->
			<th scope="col">Prev.Ins</th>
			<th scope="col">Adhar</th>
			<th scope="col">Pan No.</th>
			<th scope="col">Date of Join</th>
			
		</thead>
      <tbody id="mytable">
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
			<td class="text-center"><?php echo $val[10]; ?></td>
			<!--td class="text-center"><?php echo $val[13]; ?></td-->
			<td class="text-center"><?php echo $val[15]; ?></td>
			<td class="text-center"><?php echo $val[16]; ?></td>
			<td class="text-center"><?php echo $val[17]; ?></td>
			<td class="text-center"><?php echo $val[18]; ?></td>
			
			<!--td>
				<button class="btn btn-danger text-white" name="delbtn">
					<a href="deletestaff.php?
					id=<?php echo getName();
					$_SESSION['updateid']=$val[0]; ?>
					&name=<?php echo getName();
					$_SESSION['name']=$val[2]; ?>
					&phone=<?php echo getName();
					$_SESSION['phone']=$val[3]; ?>
					&email=<?php echo getName();
					$_SESSION['email']=$val[4]; ?>" class="text-white">
						<i class="fas fa-trash-alt"></i>
					</a>
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
					$_SESSION['salary']=$val[19]; ?>" class="text-white">
					<i class="fas fa-pen-alt"></i>
					</a>
				</button>
			</td-->
		</tr>
		<?php
			}
		?>
      </tbody>
	</table>
</body>
</html>
<?php


 
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