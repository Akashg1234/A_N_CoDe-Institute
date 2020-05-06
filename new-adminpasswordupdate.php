<?php
session_start();
include 'connect.php';
$msg="";
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
      <a href="login.php" class="p-2" 
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
      <div class="ml-4">
      <form action="" method="post">
         <label for="text-center" class="font-weight-bolder" style="font-size: 17px;">Your Unique Id:</label>
         <input type="text" name="id" class="inp form-control w-75 text-center rounded-pill" id="stuid" required="">
         <!--label for="text-center" class="font-weight-bolder">Enter Password:</label>
         <input type="password" name="psw" class="inp form-control w-25 rounded-pill" id="stuid" required="">
         <a href="student-pchange.php" class="text-danger">Forget Password</a><br--><br>
         <button type="submit" name="subbtn" class="btn btn-primary rounded mt-3" value="" style="margin-left: 190px; font-size:17px; ">
            Next
            <i class="fas fa-arrow-right"></i>
         </button>
         <?php echo $msg; ?>
      </form>
      </div>
   </div>
   
</body>
</html>
<?php

if(isset($_POST['subbtn']))
{
   $stuid=$_POST['id'];
   $q=" SELECT adminid FROM adminreg WHERE adminid='$stuid' ";
   if($v=mysqli_query($connect,$q))
   {
      /*echo '<script>window.location.href("s-pupdate.php");</script>';
      print_r($v);*/
      $p=mysqli_fetch_array($v);
      $_SESSION['admin_pass_up_id']=$sendingid=$p[0];
      echo '<script>window.location.href="new-admin-pupdate.php"</script>';
      #?id="$p[0]"');
      #echo '$p[0]';
      /*print_r($p[0]);*/
   }
   else
      $msg="<div class='text-danger'>No id exist</div>" ;
}

?>