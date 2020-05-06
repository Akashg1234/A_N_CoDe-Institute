<?php
session_start();
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
    <center>
      <div><h2>Hellow...<?php echo $_SESSION['name'];  ?></h2></div>
      <div class="w-50 shadow-lg rounded p-4">
        <form action="" method="post" class="w-75 ">
          <label>Id:</label><input type="text" class="text-center form-control w-75" name="id" readonly="" value="<?php echo $_SESSION['staffid']; ?>" ><br>
          <label>Phone:</label><input type="text" name="phone" class="form-control text-center w-75"  value="<?php echo $_SESSION['phone'] ?>"><br>
          <label>Email:</label><input type="text" name="email" class="form-control text-center w-75" value="<?php echo $_SESSION['email'] ?>"><br>
          <?php 
            if($_SESSION['stafftype']!='Normal Staff') 
            {  ?>
          <div id="domain" >
             <label>Domain:</label>
             <select type="text" name="domain" class="form-control text-center w-75">
               <option selected="" disabled=""><?php echo $_SESSION['domain'] ?></option>
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
          </div><?php }?>
          
          <br>
          <button class="btn-success text-center btn" name="upbtn">
            Update
            <i class="fas fa-pen-alt" style="margin-left: 10px;"></i>
          </button>
        </form>
      </div>
    </center>
  </body>
</html>
<?php

if(isset($_POST['upbtn']))
{
  $id=$_POST['id'];
  $phone=$_POST['phone'];
  if($_SESSION['stafftype']=='Normal Staff')
  {
      $email=$_POST['email'];
     $q=" UPDATE staff SET phone='$phone',email='$email' WHERE staffid='$id' ";
     if(mysqli_query($connect,$q))
     {
       echo "<script>
             confirm('Sure to update...??');
             alert('Successfully updated');
              window.location.href='profile.php';
           </script>";
     }
  }
  else if($_SESSION['stafftype']=='Instructor')
  {
      $domain=$_POST['domain'];
      $q0="SELECT cid FROM course WHERE cname='$domain' ";
      $res0=mysqli_query($connect,$q0);
      $domainid=mysqli_fetch_array($res0);
     $email=$_POST['email'];
     $q=" UPDATE staff SET phone='$phone',email='$email',domain='$domain',dom_id='$domainid[0]' WHERE staffid='$id' ";
     if(mysqli_query($connect,$q))
     {
       echo "<script>
             confirm('Sure to update...??');
             alert('Successfully updated');
             window.location.href='profile-instructor.php'; 
           </script>";
     }
  }

  

}
?>