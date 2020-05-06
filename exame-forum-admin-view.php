<?php
session_start();
include "connect.php";

$query_1=" SELECT stuid,marks FROM exam  ";
$result_1=mysqli_query($connect,$query_1);

?>
<!DOCTYPE html>
<html>
<head>
<title>exame form admin view</title>

<meta charset="utf-8" http-equiv="refresh">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
      crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style type="text/css">
   a{text-decoration: none;}a:hover{text-decoration: none;}
</style>

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://www.google.com/jsapi"></script>

<script type="text/javascript">
   google.charts.load('current', {packages: ['corechart']});
   google.charts.setOnLoadCallback(drawChartByExam);

   function drawChartByExam() {
      var data=google.visualization.arrayToDataTable([
         ['Stdent_id','Marks'],
         <?php
            while($row=mysqli_fetch_array($result_1))
            {
               echo "['".$row[0]."',".$row[1]."],";
            }

         ?>

         ]);
      var options = 
      {
          title: 'Student Performance',
         legend: {position: 'top'},
         hAxis: 
          {
            title: 'Student Id',  
            titleTextStyle: {color: '#333'}
         },
         vAxis: 
         {
            minValue: 0
         },
         width:1536,
         height:500
      };

        var chart = new google.visualization.LineChart(document.getElementById('chart'));
        chart.draw(data, options);
   }
</script>

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
            <a href="admin-profile-view.php" class=" nav-link text-white " style="margin-left:  15px; font-size:18px;"> Admin Profile</a>
         </li>
         <li class="nav-item">
            <a href="student-admin-view.php" class=" nav-link text-white" style="margin-left:  15px;font-size:18px;"> Student </a>
         </li>
         <li class="nav-item">
            <a href="admin-notice-creation.php" class=" nav-link text-white" style="margin-left:  15px;font-size:18px;"> Notice </a>
         </li>
         <li class="nav-item">
            <a href="#" class="font-weight-bold nav-link text-white" style="margin-left:  15px;font-size:18px;width: 147px;"> Exame Monitor </a>
         </li>
      </ul>
   </nav>

   <center>
      <div class="shadow-lg rounded w-100" id="chart">
      
      </div>
   </center>
</body>
</html>