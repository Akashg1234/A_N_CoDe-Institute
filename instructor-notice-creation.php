<?php
session_start();
include 'connect.php';
$id=$_SESSION['staffid'];

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
   <title>Notice From instructor</title>
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="jqueryFileScript.js"></script>
<script type="text/javascript" src="jqueryTableedit.js"></script>    
<style type="text/css">
   a{text-decoration: none;}a:hover{text-decoration: none;}
#REGISTER
{
   top: 100px;
   width: 165px;
   background-color: yellow;
   left: -97px;
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
#INSTRUCTOR
{
   top: 362px;
   color: yellow;
   width: 187px;
   left: -116px;
   background-color: green;
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
#NOTICE
{
   top: 296px;
   color: white;
   background-color: #ff00dd;
}
.mySidenav a:hover
{
   left: 0;
}
.mySidenav a#PROFILE:hover,a#STUDENT:hover,a#INSTRUCTOR:hover,a#NOTICE:hover,a#REGISTER:hover,a#PASS:hover
{
   left: 0;
}
</style>    
</head>
<body>
   <div class="w-100 bg-dark" style="height: 53px;">
      <center>
         <img src="profile.jpg" class="border-white rounded-circle" style="width: 50px;height: 50px;">
         <!--i class="fas fa-user-alt border-white rounded-circle" style="color: white;"></i-->
      </center>
      <a href="logout.php" class="text-decoration-none" style="float: right;  margin-top: -40px;"><img src="logout.png" style="width: 35px;height: 35px;"></a>
   </div>
   <div class=" bg-dark shadow mb-5 w-100">
      <h2 class="text-center text-white">
         INSTRUCTOR BOARD
      </h2>
   </div>

   <div class="mySidenav" style="">
      <a href="marksupload.php" id="REGISTER">MARKS ADD<i class="fas fa-upload" style="margin-left: 30px; width: 30px;height: 30px;"></i></a>
      <a href="profile-instructor.php" id="PROFILE">PROFILE  <i class="fas fa-user-circle" style="margin-left: 35px; width: 30px;height: 30px;"></i></a>
      <a href="instructor-student-view.php"  id="STUDENT">STUDENT  <i class="fas fa-user-graduate" style="margin-left: 25px;width: 30px;height: 30px;"></i></a>
      <a href="instructor-view.php"  id="NOTICE">HOME  <i class="fas fa-home" style="margin-left: 43px;width: 30px;height: 30px;"></i></a>
      <a href="staffpasswordupdate.php"  id="PASS"> UPDATE PASSWORD <i class="fas fa-unlock-alt" style="margin-left: 28px;width: 30px;height: 30px;"></i></a>
   </div>

<center style="margin-top: 150px;">
   <div class="w-25 shadow rounded p-4">
      <div class="text-center font-weight-bold text-white bg-dark rounded" 
      style="height: 40px;font-size: 25px;">
         Notice Board
      </div><br>
         <form class="form" action="" method="post" >
            <label>Notice Sub:</label><input type="" name="notsub" class="form-control w-75" placeholder="Type notice subject..">
            <label>Notice Topic:</label><textarea name="nottopic" class="form-control w-75 h-25" placeholder="Type the notice here..."></textarea><br>
            <button class="btn btn-success text-white" name="notice">
               Submit Notice
            </button>
         </form>
   </div>
</center>
</body>
</html>
<?php

if(isset($_POST['notice']))
{
   $noticesub=$_POST['notsub'];
   $noticetopic=$_POST['nottopic'];
   $notidate=date("Y-m-d");
   $q=" INSERT INTO notice(staffid,noticedate,note,noticesub) VALUES('$id','$notidate','$noticesub','$noticetopic')  ";
   if(mysqli_query($connect,$q))
   {
      echo "<script>
            alert('Successfully notice submited..');
            window.location.href='instructor-notice-creation.php';
            </script>";
   }
   else 
      echo mysqli_error($connect);
}

?>