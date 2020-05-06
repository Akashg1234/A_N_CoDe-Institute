<?php
include "connect.php";

?>
<!DOCTYPE html>
<html>
<head>
   <title>
      Frequently asked question
   </title>
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
   p{float: left;}
   #ques{font-weight: bold;font-size: 20px;}
   #ans{margin-left: -10px;}

</style>
</head>
<body>
<nav class="navbar bg-dark navbar-expand-lg navbar-dark w-100" id="navbarNav">
      <ul class="navbar-nav" style="list-style: none;">
         <li class="nav-item" style="font-size:18px;">
            <a href="index.php" class=" nav-link text-white">Home</a>
         </li>
         <li class="nav-item" style="font-size:18px; ">
            <a href="cources.php" class=" nav-link text-white" style="margin-left:  15px; font-size:18px;">Cources</a>
         </li>
         <li class="nav-item"><a href="about.php" class=" nav-link text-white" style="margin-left: 15px; font-size:18px;"> About </a></li>
         <li class="nav-item"><a href="notice.php" class=" nav-link text-white" style="margin-left:  15px; font-size:18px;"> Notice </a></li>
         <li class="nav-item"><a href="contact.php" class=" nav-link text-white" style="margin-left:  15px;font-size:18px;"> Contact </a></li>
         <li class="nav-item"><a href="exameforum.php" class=" nav-link text-white " style="margin-left:  15px;font-size:18px;width: 140px; "> Exame Forum </a></li>
         <li class="nav-item"><a href="#" class=" nav-link text-white font-weight-bold" style="margin-left: 15px;font-size:18px;"> FAQ </a></li>
         <li class="nav-item rounded" style="float: right; margin-left: 790px; background-image: linear-gradient(90deg,#ff3838,#ff4d4d,#F97F51,#f9ca24); width: 70px;"><a href="login.php" class="navbar-brand nav-link text-white"> Login </a></li>
      </ul>
</nav>

<div class=" p-5  w-75" style="margin-left: 13%;">
      <div class=" w-75 p-4 ">
      <div>
         <p id="ques">
            Can it be use in a high scale production?
         </p><br>
         <p id="ans">
            Yes, definitely .But it should need maintanance and customization as per client requirement.
         </p><br>
         <p id="ques">
            Which language use in back end?
         </p><br>
         <p id="ans">
            PHP is used in back end, which is one of the language widely used web development and used in approx 78.9% websites are living online.
         </p><br>
         <p id="ques">
            Why client chose this web app?
         </p><br>
         <p id="ans">
            That's a good question. So, when some is using some thing which is connect to the internet, their are some threat and be appear line hack persoanl data. So , I tried my best to make as sequere as possible , but if some vulnarability found , I promiss that I will fix it as soon as possible.
         </p><br>
         <p id="ques">
            Which language use in back end?
         </p><br>
         <p id="ans">
            PHP is used in back end, which is one of the language widely used web development and used in approx 78.9% websites are living online.
         </p><br>
         <p id="ques">
            Is it user friendly?
         </p><br>
         <p id="ans">
            Defenitely yes. I try to make is as simple as possible for the end users. The user interface is help the users to easy it to use.
         </p><br>
      </div>
   </div>
</div>
</body>
</html>