<?php

session_start();
include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
   <title>A_N_CoDe</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--link rel="stylesheet" type="text/css" href="index.css"-->
</head>
<body style=
   "margin: 0px;
   padding: 0px;
   background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6));">
<nav class="navbar bg-dark navbar-expand-lg navbar-dark " id="navbarNav">
      <ul class="navbar-nav" style="list-style: none;">
         <li class="nav-item" style="font-size:18px;">
            <a href="index.php" class=" nav-link text-white " style="margin-left:  0px; font-size:18px;">Home </a>
         </li>
         <li class="nav-item">
            <a href="cources.php" class=" nav-link text-white" style="margin-left:  15px; font-size:18px;"> Cources </a>
         </li>
         <li class="nav-item">
            <a href="about.php" class=" nav-link text-white" style="margin-left:  15px; font-size:18px;"> About </a>
         </li>
         <li class="nav-item">
            <a href="#" class=" nav-link text-white font-weight-bold" style="margin-left:  15px; font-size:18px;"> Notice </a>
         </li>
         <li class="nav-item">
            <a href="contact.php" class=" nav-link text-white" style="margin-left:  15px;font-size:18px;"> Contact </a>
         </li>
         <li class="nav-item">
            <a href="exameforum.php" class=" nav-link text-white" style="margin-left:  15px;font-size:18px;width: 125px; "> Exame Forum </a>
         </li>
         <li class="nav-item"><a href="faq.php" class=" nav-link text-white" style="margin-left: 15px;font-size:18px;"> FAQ </a>
         </li>
         <li class="nav-item rounded" style="float: right; margin-left: 800px; background-image: linear-gradient(90deg,#ff3838,#ff4d4d,#F97F51,#f9ca24); width: 70px;"><a href="login.php" class="navbar-brand nav-link text-white"> Login </a>
         </li>
      </ul>
</nav>

   <div class="" id="notice_show" style="margin-left: 17%;margin-top: 3%;width: 65%;">
      <h4 class="text-white">STAFF NOTICE</h4>
      <div>
         <?php
            $q="SELECT * FROM notice ";
            $res=mysqli_query($connect,$q);
            for($i=1;$i<=mysqli_num_rows($res);$i++)
            { 
               $row=mysqli_fetch_array($res);
            ?>

         <div class="w-50 shadow rounded bg-white mt-3">
            <div class="d-inline ml-2 bg-light text-primary">
               <?php echo $row[2]; ?>
            </div>
            <div class="d-inline ml-2 font-weight-bold bg-light text-primary">
               <?php echo $row[3]; ?>
            </div>
            <div class=" p-2 bg-light mt-2 rounded-bottom">
               <?php echo $row[4]; ?>
            </div>
         </div>
               
         <?php
            }
         ?>
      </div>
   </div>

   <div class="" id="notice_show" style="margin-left: 50%;margin-top: -24.7%;width: 65%;">
      <h4 class="text-white">ADMIN NOTICE</h4>
      <div>
         <?php
            $q="SELECT * FROM adminnotice ";
            $res=mysqli_query($connect,$q);
            for($i=1;$i<=mysqli_num_rows($res);$i++)
            { 
               $row=mysqli_fetch_array($res);
            ?>

         <div class="w-50 shadow rounded bg-white mt-3">
            <div class="d-inline ml-2 bg-light text-success">
               <?php echo $row[4]; ?>
            </div>
            <div class="d-inline ml-2 font-weight-bold bg-light text-success">
               <?php echo $row[2]; ?>
            </div>
            <div class=" p-2 bg-light mt-2 rounded-bottom">
               <?php echo $row[3]; ?>
            </div>
         </div>
               
         <?php
            }
         ?>
      </div>
   </div>
</body>
</html>