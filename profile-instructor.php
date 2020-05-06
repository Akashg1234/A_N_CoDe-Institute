<?php
session_start();
$id=$_SESSION['staffid'];
include 'connect.php';
$q=" SELECT * FROM staff WHERE staffid='$id' ";
$res=mysqli_query($connect,$q);
$info=mysqli_fetch_array($res);
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
<!DOCTYPE html>
<html>
<head>
   <title>Profile</title>
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
 #REGISTER
{
   top: 100px;
   background-color: yellow;
   color: red;width: 170px;
   left: -100px;
}
#PROFILE
{
   top: 165px;
   color: white;
   background-color: grey;
}

#STUDENT
{
   top: 230px;
   color: white;
   background-color: blue;
}
#PASS
{
   top: 360px;
   color: white;
   background-color: red;
   width: 230px;
   left: -160px;
}
#NOTICE
{
   top: 295px;
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
.mySidenav a#PROFILE:hover,a#STUDENT:hover,a#INSTRUCTOR:hover,a#NOTICE:hover,a#REGISTER:hover,a#PASS:hover
{
   left: 0;
}
</style>    
</head>
<body>
<div class="w-100 bg-dark" style="height: 55px;">
      <center>
         <img src="profile.jpg" class="border-white rounded-circle" style="width: 50px;height: 50px;">
         <!--i class="fas fa-user-alt border-white rounded-circle" style="color: white;"></i-->
      </center>
      <a href="logout.php" class="text-decoration-none" style="float: right;  margin-top: -40px;"><img src="logout.png" style="width: 35px;height: 35px;"></a>
      <div class=" bg-dark shadow mb-5 w-100">
      <h2 class="text-center text-white">
         INSTRUCTOR BOARD
      </h2>
      </div>
</div>
<div class="mySidenav" style="">
      <a href="marksupload.php" id="REGISTER">MARKS ADD<i class="fas fa-upload" style="margin-left: 30px; width: 30px;height: 30px;"></i></a>
      <a href="instructor-view.php" id="PROFILE">HOME  <i class="fas fa-home" style="margin-left: 45px; width: 30px;height: 30px;"></i></a>
      <a href="instructor-student-view.php"  id="STUDENT">STUDENT  <i class="fas fa-user-graduate" style="margin-left: 25px;width: 30px;height: 30px;"></i></a>
      <a href="instructor-notice-creation.php"  id="NOTICE">NOTICE  <i class="fas fa-volume-up" style="margin-left: 35px;width: 30px;height: 30px;"></i></a>
      <a href="staffpasswordupdate.php"  id="PASS"> UPDATE PASSWORD <i class="fas fa-unlock-alt" style="margin-left: 28px;width: 30px;height: 30px;"></i></a>
   </div>
<center>
   
      <div class="form-group shadow-lg w-50 p-4 rounded mt-5">
         <div class="mt-3 p-4">
            <h2 class="text-center ">Welcome..
               <?php echo $info[2]; $_SESSION['name']=$info[2];?>!
            </h2>
            <form action="" method="post">
               <label>Id :</label><input class="form-control w-50 text-center" type="text" name="phone" readonly="" value="<?php echo $id; ?>" ><br>
               <label>Phone :</label><input class="form-control w-50 text-center" type="text" name="phone" readonly="" value="<?php echo $info[3]; ?>" ><br>
               <label>Email :</label><input class="form-control text-center w-50" type="text" name="email" readonly="" value="<?php echo $info[4]; ?>"><br>
               <label>Domain :</label><input class="form-control text-center w-50" type="text" name="domain" readonly="" value="<?php echo $info[10]; ?>"><br>
               <label>Passout Institute :</label><input class="form-control text-center w-50" type="text" name="passins" readonly="" value="<?php echo $info[12]; ?>"><br>
               <label>Passout year :</label><input class="form-control text-center w-50" type="text" name="passyr" readonly="" value="<?php echo $info[13]; ?>"><br>
               <label>Passout Percentage :</label><input class="form-control text-center w-50" type="text" name="passper" readonly="" value="<?php echo $info[14]; ?>"><br>
               <label>Adhar No :</label><input class="form-control text-center w-50" type="text" name="adhar" readonly="" value="<?php echo $info[16]; ?>"><br>
               <label>Pan No :</label><input class="form-control text-center w-50" type="text" name="adhar" readonly="" value="<?php echo $info[17]; ?>"><br>
               <label>Date of Join :</label><input class="form-control text-center w-50" type="text" name="doj" readonly="" value="<?php echo $info[18]; ?>"><br>
               <button class="btn btn-success text-white">
                  <a href="staffupdatestaff.php?id=<?php echo getName();$_SESSION['updateid']=$id; ?>&name=<?php echo getName();$_SESSION['name']=$info[2]; ?>&phone=<?php echo getName();$_SESSION['phone']=$info[3]; ?>&email=<?php echo getName();$_SESSION['email']=$info[4]; ?>&domain=<?php echo getName();$_SESSION['domain']= $info[10]; ?>" class="text-white">UPDATE
                  </a >
                  <i class="fas fa-pen-alt" style="margin-left: 10px;"></i>
               </button>
            </form>
         </div>
      </div>
</center>
</body>
</html>