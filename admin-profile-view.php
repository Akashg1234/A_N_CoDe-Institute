<?php
session_start();
$id=$_SESSION['admin_id'];
include 'connect.php';
$q=" SELECT * FROM adminreg WHERE adminid='$id' ";
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
.mySidenav  #REGISTER
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

#NOTICE
{
   top: 297px;
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
.mySidenav a:hover
{
   left: 0;
}
.mySidenav a#NOTICE:hover
{
   left: 0;
}.mySidenav  a#REGISTER:hover{left: 0;}
</style>    
</head>
<body>
   <div class="w-100 bg-dark" style="height: 55px;">
      <center>
         <img src="profile.jpg" class="border-white rounded-circle" style="width: 50px;height: 50px;">
         <!--i class="fas fa-user-alt border-white rounded-circle" style="color: white;"></i-->
      </center>
      <a href="logout.php" class="text-decoration-none" style="float: right;  margin-top: -40px;"><img src="logout.png" style="width: 35px;height: 35px;"></a>
   </div>
   <div class=" bg-dark shadow mb-5 w-100" style="background-image: linear-gradient(90deg,#ff0000,#ff3838,#ff4d4d,#F97F51,#ff8800,#f9ca24,#fffb1c);">
      <h2 class="text-center text-white">
         ADMINSTRATION
      </h2>
   </div>
   <nav class="navbar shadow bg-dark navbar-expand-lg navbar-dark" id="navbarNav" style="margin-top: -25px; margin-bottom: 20px;">
      <ul class="navbar-nav" style="list-style: none;">
         <li class="nav-item" style="font-size:18px;">
            <a href="admin-view.php"  class=" nav-link text-white " style="margin-left:  0px; font-size:18px;">Dashboard </a>
         </li>
         <li class="nav-item">
            <div class="dropdown">
               <a href="#" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn dropdown-toggle nav-link text-white" style="margin-left:  15px; font-size:18px;"> Register </a>
               <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="admin-register.php" class="btn dropdown-item" type="button">Admin</a>
                <a href="instructor-register.php" class="btn dropdown-item" type="button">Instructor</a>
                <a href="staff-register.php" class="btn dropdown-item" type="button">Front Staff</a>
              </div>
            </div>
         </li>
         <li class="nav-item">
            <div class="dropdown">
               <a href="#" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn dropdown-toggle nav-link text-white" style="margin-left:  15px; font-size:18px;"> Office Staff </a>
               <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="instructor-admin-view.php" class="btn dropdown-item" type="button">Instructor</a>
                <a href="staff-admin-view.php" class="btn dropdown-item" type="button">Front Staff</a>
              </div>
            </div>
         </li>
         <li class="nav-item">
            <a href="#" class=" nav-link text-white font-weight-bold" style="margin-left:  15px; font-size:18px;"> Admin Profile</a>
         </li>
         <li class="nav-item">
            <a href="student-admin-view.php" class=" nav-link text-white" style="margin-left:  15px;font-size:18px;"> Student </a>
         </li>
         <li class="nav-item">
            <a href="admin-notice-creation.php" class=" nav-link text-white" style="margin-left:  15px;font-size:18px;"> Notice </a>
         </li>
         <li class="nav-item">
            <a href="exame-forum-admin-view.php" class=" nav-link text-white" style="margin-left:  15px;font-size:18px;width: 140px;"> Exame Monitor </a>
         </li>
      </ul>
   </nav>
<center>
   
      <div class="form-group shadow-lg w-50 p-4 rounded mt-5">
         <div class="mt-3 p-4">
            <h2 class="text-center ">Welcome..
               <?php echo $info[1]; $_SESSION['name']=$info[1];?>!
            </h2>
            <form action="" method="post">
               <label>Id :</label><input class="form-control w-50 text-center" type="text" name="phone" readonly="" value="<?php echo $id; ?>" ><br>
               <label>Phone :</label><input class="form-control w-50 text-center" type="text" name="phone" readonly="" value="<?php echo $info[2]; ?>" ><br>
               <label>Email :</label><input class="form-control text-center w-50" type="text" name="email" readonly="" value="<?php echo $info[3]; ?>"><br>
               <label>Date of Birth :</label><input class="form-control text-center w-50" type="text" name="domain" readonly="" value="<?php echo $info[5]; ?>"><br>
               <label>Passout Institute :</label><input class="form-control text-center w-50" type="text" name="passins" readonly="" value="<?php echo $info[9]; ?>"><br>
               <label>Passout year :</label><input class="form-control text-center w-50" type="text" name="passyr" readonly="" value="<?php echo $info[10]; ?>"><br>
               <label>Passout Percentage :</label><input class="form-control text-center w-50" type="text" name="passper" readonly="" value="<?php echo $info[11]; ?>"><br>
               <label>Adhar No :</label><input class="form-control text-center w-50" type="text" name="adhar" readonly="" value="<?php echo $info[13]; ?>"><br>
               <label>Pan No :</label><input class="form-control text-center w-50" type="text" name="adhar" readonly="" value="<?php echo $info[14]; ?>"><br>
               <label>Date of Join :</label><input class="form-control text-center w-50" type="text" name="doj" readonly="" value="<?php echo $info[15]; ?>"><br>
               <button class="btn btn-success text-white">
                  <a href="admin-update-admin.php?id=<?php echo getName();$_SESSION['updateid']=$id; ?>&name=<?php echo getName();$_SESSION['name']=$info[1]; ?>&phone=<?php echo getName();$_SESSION['phone']=$info[2]; ?>&email=<?php echo getName();$_SESSION['email']=$info[3]; ?>" class="text-white">UPDATE
                  </a >
                  <i class="fas fa-pen-alt" style="margin-left: 10px;"></i>
               </button>
            </form>
         </div>
      </div>
</center>
</body>
</html>