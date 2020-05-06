<?php
session_start();
include "connect.php";
$id=$_SESSION['regid'];
$name=$_SESSION['name'];
$sgname=$_SESSION['gurname'];
$phone=$_SESSION['phone'];
$phone2=$_SESSION['phoneop'];
$email=$_SESSION['email'];
$course=$_SESSION['course'];
$newPass=$_SESSION['passw'];
$gen=$_SESSION['gender'];
$doj=$_SESSION['doj'];
$instname=$_SESSION['instname'];
$payment=$_SESSION['payment'];
#echo $id." ".$name." ".$course." ".$newPass." ".$sgname." ".$phone." ".$email;

if (isset($_POST['subbtn'])) 
{
   $coursinst=$_POST['course_ins'];
   $Q="SELECT staffid FROM staff WHERE name='$coursinst' AND stafftype='Instructor'  ";
   $result=mysqli_query($connect,$Q);
   $arr=mysqli_fetch_array($result);
   $coursinstid=$arr[0];
   $q2=" INSERT INTO student VALUES('$id','$name','$sgname','$phone','$phone2','$email','$newPass','$course','$coursinst','$coursinstid','$gen','$doj','$instname','Active','$payment') ";
      if(mysqli_query($connect,$q2))
      {
         #SendMessage($name,$phone,$id,$pass2,$course,$coursinst);
         echo "<script>alert('Successfully inserted...');
            window.location.href='register.php';</script>";
      }
      else
         {echo mysqli_error($connect);}
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





<!DOCTYPE html>
<html>
<head>
   <title>Student registration desk</title>
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="dataAccess.js"></script>
<script type="text/javascript" src="formValidation.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style type="text/css">
a{text-decoration: none;}a:hover{text-decoration: none;}label{font-weight: bold;font-size: 20px;float: left;}#REGISTER{top: 100px;background-color: yellow;color: red;}#PROFILE{top: 165px;color: white;background-color: grey;}#CONTACT{top: 230px;color: yellow;background-color: red;}#STUDENT{top: 296px;color: white;background-color: blue;}#INSTRUCTOR{top: 362px;color: yellow;width: 187px;left: -116px;background-color: green;}#NOTICE{top: 428px;color: white;background-color: #ff00dd;}.mySidenav a{text-decoration: none;position: absolute;padding: 15px 5px 10px 10px;color: white;transition: 0.2s;left: -80px;border-radius: 0px 10px 10px 0px;width: 150px;height: 60px;margin-top: 50px;}.mySidenav a:hover{left: 0;}.mySidenav a#INSTRUCTOR:hover{left: 0;}.mySidenav a#NOTICE:hover{left: 0;}   
</style></head>
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
         STUDENT REGISTRATION DESK
      </h2>
      </div>
      <center>
         <form action="" method="POST">
            <div class="form m-5 shadow-lg w-50 pl-5 pb-5 pr-5 rounded " >
               <div class="text-center text-white w-100 bg-dark rounded-top" style="height: 40px;">
                  <h3 class="">Registreation Form</h3>
               </div><br><br>
               <label>Course Instructor:</label>
            <select class="form-control w-100 text-center" required="" onclick="" name="course_ins" id="course">
               <option selected="" disabled="">--Select--</option>


               <?php
               
                  $q="SELECT DISTINCT name FROM staff WHERE stafftype='Instructor' AND domain='$course'AND status='Active'";
                  $res=mysqli_query($connect,$q);
                  for($i=1;$i<=mysqli_num_rows($res);$i++)
                  {
                     $row=mysqli_fetch_array($res);
                     echo '<option >'.$row[0].'</option>';
                  }
               

               ?>
            </select><br><br>
            <center>
               <button class="btn btn-success w-25" name="subbtn">
                  REGISTER
                  <i class="fas fa-pen-alt" style="margin-left: 10px;"></i>
               </button>
            </center>
            </div>
            
         </form>
      </center>
         
         
   
</body>
</html> 
      