<?php 
#work is left
session_start();
include 'connect.php';
header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);


if ($input['action'] == 'edit') 
{
    mysqli_query($connect,
      "UPDATE student 
      SET email='".$input['email']."',
      phone='".$input['phone']."',
      phone1='".$input['phoneop']."',
      sname='".$input['name']."',
      sgname='".$input['gname']."',
      insti_name='".$input['institute']."' 
      WHERE sid='".$input['id']."' ");
} 
else if ($input['action'] == 'delete') 
{
    mysqli_query($connect,
      "UPDATE student 
      SET status='Deactive' WHERE sid='" . $input['id'] . "' ");
} 
else if ($input['action'] == 'restore') 
{
    mysqli_query($connect,
      "UPDATE student 
      SET status='Active' WHERE sid='" . $input['id'] . "' ");
}

mysqli_close($mysqli);

echo json_encode($input);
?>
<!--DOCTYPE html>
<html>
<head>
   <title>Update student table</title>
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
         <h2 class="text-white">Staff Table</h2>
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
            <label>Gurdian Name </label><br>
            <input type="text" class="form-control w-50 text-center" readonly="" name="name" value="<?php echo $_SESSION['sgname']; ?>"><br>
            <label>Phone</label><br>
            <input type="text" class="form-control w-50 text-center"  name="phone" value="<?php echo $_SESSION['phone']; ?>"><br>
            <label>Phone2</label><br>
            <input type="text" class="form-control w-50 text-center"  name="phone2" value="<?php echo $_SESSION['phone2']; ?>"><br>
            <label>Email</label><br>
            <input type="text" class="form-control w-50 text-center"  name="email" value="<?php echo $_SESSION['email']; ?>"><br>
            <label>Course</label><br>
            <select class="form-control w-50 text-center" onchange="" name="course">
               <option selected="" disabled=""><?php echo $_SESSION['course']; ?></option>
               <?php
                 $q="SELECT * FROM course ";
                 $res=mysqli_query($connect,$q);
                 for ($i = 1; $i <=mysqli_num_rows($res); $i++) 
                 {
                    $val=mysqli_fetch_array($res);
                    echo '<option class=" w-50 text-center">'.$val[1].'</option>';
                 }

               ?>
            </select><br>
            <label>Course Instructor</label><br>
            <select class="form-control w-50 text-center" name="course_inst">
               <option selected="" disabled="">--scelect instructor--</option>
               


            </select><br>
            <label>Institute Name</label><br>
            <input type="text" class="form-control w-50 text-center"  name="intname" value="<?php echo $_SESSION['instname']; ?>"><br>
            <button class="btn btn-success " name="subbtn">
               UPDATE
               <i class="fas fa-pen-alt" style="margin-left: 10px;"></i>
            </button>
         </center>
      </form>
   </div>
</center>
</body>
</html-->
<?php

/*if(isset($_POST['subbtn']))
{
   $id=$_POST['id'];
   $name=$_POST['name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $phone2=$_POST['phone2'];
   $course=$_POST['course'];
   $instname=$_POST['intname'];
   $q=" UPDATE student SET email='$email',phone='$phone',phone1='$phone2',sname='$name',insti_name='$instname',course='$course' WHERE sid='$id' ";
   
   if(mysqli_query($connect,$q))
   {
      echo "<script>alert('Successfully updated...');
            window.location.href='instructortable.php';</script>";
      #message sending and message sending      
   }
   
}
#work is left
if(isset($_POST['course']))
{
   $q2=" SELECT DISTINCT staffid,name FROM staff WHERE domain='$course' AND stafftype='Instructor' ";
   $res=mysqli_query($connect,$q2);
   for ($i = 1; $i <=mysqli_num_rows($res); $i++) 
   {
      $val=mysqli_fetch_array($res);
      echo '<option class=" w-50 text-center" id="$val[0]">'.$val[1].'</option>';
   }
}*/

              
?>