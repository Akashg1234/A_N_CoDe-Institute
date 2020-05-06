
<?php
session_start();
include "connect.php";
$q=" SELECT COUNT(*) FROM adminreg ";
$res=mysqli_query($connect,$q);
$v=mysqli_fetch_array($res);
$count=$v[0]+3;
$str="ANCDADMIN1000";
?>
<!DOCTYPE html>
<html>
<head>
   <title>Admin registration desk</title>
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
<!--script type="text/javascript" src="formValidation.js"></script-->
<script type="text/javascript">
   $("#formValidation").validate();

</script>
<script type="text/javascript" src="jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
<style type="text/css">
  #formValidation{background-color: #e5ddd0;}
   a{text-decoration: none;}a:hover{text-decoration: none;}label{font-weight: bold;font-size: 20px;float: left;}#REGISTER{   top: 100px;   background-color: yellow;   color: red;}#PROFILE{   top: 165px;   color: white;   background-color: grey;}#CONTACT{   top: 230px;   color: yellow;   background-color: red;}#STUDENT{   top: 296px;   color: white;   background-color: blue;}#INSTRUCTOR{   top: 362px;   color: yellow;   width: 187px;   left: -116px;   background-color: green;}#NOTICE{   top: 428px; color: white; background-color: #ff00dd;}.mySidenav a{   text-decoration: none; position: absolute; padding: 15px 5px 10px 10px;   transition: 0.2s;left: -80px; border-radius: 0px 10px 10px 0px; width: 150px; margin-top: 50px;height: 60px;color: white;}.mySidenav a:hover{ left: 0;}.mySidenav a#INSTRUCTOR:hover{left: 0;}.mySidenav a#NOTICE:hover{   left: 0;}
</style>  
</head>
<body>
   <div class="w-100 bg-dark" style="height: 53px; position: sticky;">
      <center>
         <img src="profile.jpg" class="border-white rounded-circle" style="width: 50px;height: 50px;">
         <!--i class="fas fa-user-alt border-white rounded-circle" style="color: white;"></i-->
      </center>
      <a href="logout.php" class="text-decoration-none" style="float: right;  margin-top: -40px;"><img src="logout.png" style="width: 35px;height: 35px;"></a>
   </div>
   <div class=" bg-dark shadow mb-5 w-100">
      <h2 class="text-center text-white">
         ADMIN REGISTRATION DESK
      </h2>
   </div>
   <nav class="navbar shadow bg-dark navbar-expand-lg navbar-dark" id="navbarNav" style="margin-top: -25px; margin-bottom: 20px;">
      <ul class="navbar-nav" style="list-style: none;">
         <li class="nav-item" style="font-size:18px;">
            <a href="admin-view.php"  class=" nav-link text-white " style="margin-left:  0px; font-size:18px;">Dashboard </a>
         </li>
         <li class="nav-item">
            <div class="dropdown">
               <a href="#" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn dropdown-toggle nav-link text-white font-weight-bold" style="margin-left:  15px; font-size:18px;"> Register </a>
               <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="#" class="btn dropdown-item font-weight-bold" type="button">Admin</a>
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
            <a href="admin-profile-view.php" class=" nav-link text-white" style="margin-left:  15px; font-size:18px;"> Admin Profile</a>
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
      <div class="form m-5 shadow-lg w-50 pl-5 pb-5 pr-5 rounded " >
      <div class="text-center text-white w-100 bg-dark rounded-top" style="height: 40px;">
         <h3 class="">Admin Registreation Form</h3>
      </div><br><br>
      <form method="post" action="" class="form pt-5 pl-5 pb-5 pr-5 w-100" id="formValidation" >
         <label>Id:</label>
         <input type="text" class="form-control text-center w-100" readonly="" value="<?php echo $str.$count; ?>" name="id"><br>
         <label>Name:</label>
         <input type="text" name="name" required="" class="form-control text-center w-100"><br>
         <label>Phone:</label>
         <input type="text" name="phone" required="" class="form-control text-center w-100">
         <br>
         <label>Date of Birth:</label>
         <input type="date" name="dob" required="" class="form-control text-center w-100">
         <br>
         <label>Email:</label>
         <input type="text" name="email" required="" class="form-control text-center w-100">
         <br>
         <label>Password:</label>
         <input type="password" name="psw" required="" class="form-control text-center w-100">
         <br>
         <label>Confirm Password:</label>
         <input type="password" name="conpsw" required="" class="form-control text-center w-100">
         <br>
         <label>Qualification:</label>
         <select name="quali" required="" class="form-control text-center w-100">
            <option>--Select--</option>
            <option>MTech</option>
            <option>MCA</option>
            <option>MBA</option>
            <option>M.A.</option>
            <option>M.Sc</option>
            <option>BTech</option>
            <option>B.A.</option>
            <option>B.Com</option>
            <option>B.Sc</option>
            <option>B.Ed</option>
         </select><br>

         <label>Experience:</label>
         <input type="text" name="experience" required="" class="form-control text-center w-100" ><br>
         <label>Gender:</label>
         <select class="form-control w-100 text-center" required="" name="gen">
            <option selected="" disabled="">--select--</option>
            <option>Male</option>
            <option>Female</option>
            <option>Others</option>
         </select><br>
         <label>Passout Institute:</label>
         <input type="text" name="passins" required="" class="form-control text-center w-100"><br>
         <label>Passout year:</label>
         <input type="date" name="passyr" required="" class="form-control text-center w-100"><br>
         <label>Passout Percentage:</label>
         <input type="text" name="passper" required="" class="form-control text-center w-100"><br>
         <label>Previous Institute:</label>
         <input type="text" name="previnst" required="" class="form-control text-center w-100"><br>
         <label>Adhar No:</label>
         <input type="text" name="adhar" required="" class="form-control text-center w-100"><br>
         <label>Pan No:</label>
         <input type="text" name="pan" required="" class="form-control text-center w-100"><br>
         <label>Salary:</label>
         <input type="text" name="sal" required="" class="form-control text-center w-100"><br>
         <label>Date of Join:</label>
         <input type="text" name="doj" class="form-control text-center w-100" readonly="" value="<?php echo date('Y-m-d'); ?>">
         <br><br>
         <center>
            <button class="btn btn-success w-25" name="subbtn">
               REGISTER
               <i class="fas fa-pen-alt" style="margin-left: 10px;"></i>
            </button>
         </center>
      </form>
   </div>
   </center>
</body>
</html>
<?php

   if (isset($_POST['subbtn'])) 
   {
     $id= $_POST['id'];
     $name=$_POST['name'];
     $phone=$_POST['phone'];
     $email=$_POST['email'];
     $pass1=$_POST['psw'];
     $pass2=$_POST['conpsw'];
     $quali=$_POST['quali'];
     $experience=$_POST['experience'];
     $gen=$_POST['gen'];
     $doj=$_POST['doj'];
     $passins=$_POST['passins'];
     $passyr=$_POST['passyr'];
     $passper=$_POST['passper'];
     $previns=$_POST['previnst'];
     $adharno=$_POST['adhar'];
     $panno=$_POST['pan'];
     $salary=$_POST['sal'];
     $dob=$_POST['dob'];
     if($pass1==$pass2)
     {
      $newPass=password_hash($pass2, PASSWORD_BCRYPT);
      $q2=" INSERT INTO  adminreg ( adminid ,  adminname ,  phone ,  email ,  passw ,  dob ,  qualification ,  gender ,  experience ,  passoutins ,  passyear ,  passoutper ,  previns ,  adharno ,  pan ,  dateofjoin ,  sal ,  status ) VALUES ('$id','$name','$phone','$email','$newPass','$dob','$quali','$gen','$experience','$passins','$passyr','$passper','$previns','$adharno','$panno','$doj','$salary','Active') ";
      if(mysqli_query($connect,$q2))
      {
         echo "<script>alert('Successfully inserted...')</script>";
         SendMessage($name,$phone,$id,$pass2,$course,$coursinst);
         echo "<script>  window.location.href='admin-register.php';</script>";
      }
      else {
         echo mysqli_error($connect);
      }
     }
   }
function SendMessage($name,$phone,$id,$pass2,$course,$coursinst)
{
   $name=$name;
   $passw=$pass2;
   $sid=$id;
   $inst=$coursinst;$course=$course;
   $mon=date('Y-m-d');
   $field = array(
       "sender_id" => "FSTSMS",
       "language" => "english",
       "route" => "qt",
       "numbers" => '$phone',
       "message" => "9920",
       "variables" => "{#EE#}|{#DD#}",#variable need to insert
       "variables_values" => "'$name'|'$mon'|'$passw'|'$sid'|'$inst'|'$course'"
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