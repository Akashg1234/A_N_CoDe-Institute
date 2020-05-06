<?php
session_start();
include "connect.php";
$q=" SELECT COUNT(*) FROM student ";
$res=mysqli_query($connect,$q);
$v=mysqli_fetch_array($res);
$count=$v[0]+1;
$str="ANCDSTU1000";
?>
<!DOCTYPE html>
<html>
<head>
   <title>Student registration desk</title>
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
<!--script type="text/javascript" src="dataAccess.js"></script-->
<!--script type="text/javascript" src="formValidation.js"></script-->
<script type="text/javascript" src="jquery.js"></script> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

<style type="text/css">
a{text-decoration: none;}a:hover{text-decoration: none;}label{font-weight: bold;font-size: 20px;float: left;}#REGISTER{top: 100px;background-color: yellow;color: red;}#PROFILE{top: 165px;color: white;background-color: grey;}#CONTACT{top: 230px;color: yellow;background-color: red;}#STUDENT{top: 296px;color: white;background-color: blue;}#INSTRUCTOR{top: 362px;color: yellow;width: 187px;left: -116px;background-color: green;}#NOTICE{top: 428px;color: white;background-color: #ff00dd;}.mySidenav a{text-decoration: none;position: absolute;padding: 15px 5px 10px 10px;color: white;transition: 0.2s;left: -80px;border-radius: 0px 10px 10px 0px;width: 150px;height: 60px;margin-top: 50px;} #PASS
{
   top: 494px;
   color: white;
   background-color: red;
   width: 230px;
   left: -160px;
}#formValidation{background-color: #e5ddd0;}
.mySidenav a#INSTRUCTOR:hover,a#STUDENT:hover,a#CONTACT:hover,a#PROFILE:hover,a#REGISTER:hover,a#PASS:hover,a#NOTICE:hover
{
   left: 0;
}  
</style>  
<script type="text/javascript">
  $("#formValidation").validate();
</script>
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
         STUDENT REGISTRATION DESK
      </h2>
   </div>
   <div class="mySidenav" style="">
      <a href="staff-view.php" id="REGISTER">HOME <i class="fas fa-home" style="margin-left: 45px; width: 30px;height: 30px;"></i></a>
      <a href="profile.php" id="PROFILE">PROFILE  <i class="fas fa-user-circle" style="margin-left: 35px; width: 30px;height: 30px;"></i></a>
      <a href="contact-show.php"  id="CONTACT">CONTACT  <i class="fas fa-phone-volume" style="margin-left: 25px;width: 30px;height: 30px;"></i></a>
      <a href="student.php"  id="STUDENT">STUDENT  <i class="fas fa-user-graduate" style="margin-left: 25px;width: 30px;height: 30px;"></i></a>
      <a href="staff-instructor-view.php"  id="INSTRUCTOR">INSTRUCTOR  <i class="fas fa-chalkboard-teacher" style="margin-left: 30px;width: 30px;height: 30px;"></i></a>
      <a href="staff-notice-creation.php"  id="NOTICE">NOTICE  <i class="fas fa-volume-up" style="margin-left: 35px;width: 30px;height: 30px;"></i></a>
      <a href="staffpasswordupdate.php"  id="PASS"> UPDATE PASSWORD <i class="fas fa-unlock-alt" style="margin-left: 28px;width: 30px;height: 30px;"></i></a>
   </div>
   <center>
      <div class="form m-5 shadow-lg w-50 pl-5 pb-5 pr-5 rounded">
      <div class="text-center text-white w-100 bg-dark rounded-top" style="height: 40px;">
         <h3 class="">Registreation Form</h3>
      </div><br><br>
      <form method="post" action="" class="form pt-5 pl-5 pb-5 pr-5 w-100" id="formValidation" >
         <label>Id:</label>
         <input type="text" class="form-control text-center w-100" readonly="" value="<?php echo $str.$count; ?>" name="id"><br>
         <label>Name:</label>
         <input type="text" name="name" id="name" minlength="5" required="" class="form-control text-center w-100"><br>
         <label>Gurdian name:</label>
         <input type="text" name="sgname" id="sgname" minlength="5" required="" class="form-control text-center w-100">
         <br>
         <label>Phone:</label>
         <input type="text" name="phone" required="" minlength="10" maxlength="10" id="phone" class="form-control text-center w-100">
         <br>
         <label>Phone(Optional):</label>
         <input type="text" name="phoneop" id="phone" minlength="10" maxlength="10" class="form-control text-center w-100">
         <br>
         <label>Email:</label>
         <input name="email" type="email" id="email" required="" class="form-control text-center w-100">
         <br>
         <label>Password:</label>
         <input type="password" name="psw" id="password" required="" class="form-control text-center w-100">
         <br>
         <label>Confirm Password:</label>
         <input type="password" name="conpsw" id="conpassword" required="" class="form-control text-center w-100">
         <br>

         <label>Course:</label>
            <select class="form-control w-100 text-center" required="" onclick="" name="course" id="course">
               <option selected="" disabled="">--Select--</option>
                  <?php
                    $q="SELECT * FROM course ";
                    $res=mysqli_query($connect,$q);
                    for ($i = 1; $i <=mysqli_num_rows($res); $i++) 
                    {
                       $val=mysqli_fetch_array($res);
                       echo '<option class=" w-50 text-center">'.$val[1].'</option>';
                    }

                  ?>
               </select>
          <br>
         <label>Gender:</label>
         <select class="form-control w-100 text-center" required="" name="gen">
            <option selected="" disabled="">--Select--</option>
            <option>Male</option>
            <option>Female</option>
            <option>Others</option>
         </select><br>
         <label>Date of Register:</label>
         <input type="text" name="doj" class="form-control text-center w-100" readonly="" value="<?php echo date('Y-m-d'); ?>"><br>
         <label>Institute Name:</label>
         <input type="text" name="instname" required="" class="form-control text-center w-100"><br>
         <label>Payment:</label>
         <select class="form-control w-100 text-center" required="" onchange="" name="paystatus">
            <option selected="" disabled="">--Select--</option>
            <option>PAID</option>
            <option>NOT PAID</option>
         </select>
         <br><br>
         <center>
            <button class="btn btn-success w-25" name="subbtn">
               NEXT
               <i class="fas fa-arrow-right" style="margin-left: 10px;"></i>
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
     $_SESSION['regid']= $_POST['id'];
     $_SESSION['name']=$_POST['name'];
     $_SESSION['gurname']=$_POST['sgname'];
     $_SESSION['phone']=$_POST['phone'];
     $_SESSION['phoneop']=$_POST['phoneop'];
     $_SESSION['email']=$_POST['email'];
     $pass1=$_POST['psw'];$pass2=$_POST['conpsw'];
     $_SESSION['course']=$_POST['course'];
     $_SESSION['gender']=$_POST['gen'];
     $_SESSION['doj']=$_POST['doj'];
     $_SESSION['instname']=$_POST['instname'];
     $_SESSION['payment']=$_POST['paystatus'];
     if($pass1==$pass2)
     {
      $newPass=password_hash($pass2, PASSWORD_BCRYPT);
      $_SESSION['passw']=$newPass;
      echo '<script>alert("Password are not same");</script>';
     }
   }

?>