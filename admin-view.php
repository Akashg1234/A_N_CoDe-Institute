<?php
session_start();
include "connect.php";
$id=$_SESSION['admin_id'];

$a="SELECT adminname FROM adminreg WHERE adminid='$id' ";
$q=mysqli_query($connect,$a);
$name=mysqli_fetch_array($q);

$q1=" SELECT stafftype,count(*) as number FROM staff GROUP BY stafftype ";
$res1=mysqli_query($connect,$q1);

$q2=" SELECT domain,count(*) as number FROM staff GROUP BY domain ";
$res2=mysqli_query($connect,$q2);

$q3=" SELECT course,count(*) as number FROM student GROUP BY course ";
$res3=mysqli_query($connect,$q3);

$q4=" SELECT 'date',count(*) as number FROM contact GROUP BY 'date' ";
$res4=mysqli_query($connect,$q4);

$q5=" SELECT doreg,count(*) as date FROM student GROUP BY doreg";
$res5=mysqli_query($connect,$q4);

?>
<!DOCTYPE html>
<html>
<head>
   <title>Admin Board</title>
<script type="text/javascript" src="jquery.js"></script>   
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://www.google.com/jsapi"></script>
<script>
    // Load Charts and the corechart package.
   google.charts.load('current', {packages: ['corechart']});
   //google.charts.load('current', {packages: ['corechart', 'bar']});
      //google.charts.setOnLoadCallback(drawChartExample);
   google.charts.setOnLoadCallback(drawChartByGender);
   google.charts.setOnLoadCallback(drawChartByDomainInst);
   google.charts.setOnLoadCallback(drawChartByDomainStu);
   /*google.charts.setOnLoadCallback(drawChartByContactDate);
   google.charts.setOnLoadCallback(drawChartByStudentRegDate);

   function drawChartByStudentRegDate() 
   {
      var data=google.visualization.arrayToDataTable([
            ['Date','Number'],

            <?php
               while($row=mysqli_fetch_array($res5))
               {
                  echo "['".$row[1]."',".$row[0]."],";
               }
            ?>

            ]);
      var options = {
          title: 'Number of Student Registration ',
          legend: { position: 'bottom' },
                     hAxis: {
                           title: 'Number of registration'
                        },
                     vAxis: {
                           title: 'Day'
                        },
                    
                       width:450,
                       height:450
        };

      var chart = new google.visualization.AreaChart(document.getElementById('student_reg_date_chart_div'));
        chart.draw(data, options);
   }

   function drawChartByContactDate() 
   {
     
      var data=google.visualization.arrayToDataTable([
            ['Date','Number'],

            <?php
               while($row=mysqli_fetch_array($res4))
               {
                  echo "['".$row[0]."',".$row[1]."],";
               }
            ?>

            ]);
      var options = {title:'Contact query as per Date',
                     legend: { position: 'bottom' },
                      hAxis: {
                      title: 'Time'
                        },
                        vAxis: {
                      title: 'Query'
                        },
                    
                       width:450,
                       height:450
                        };
      var chart = new google.visualization.LineChart(document.getElementById('Line_contact_chart_div'));
         chart.draw(data, options);

   }*/
   function drawChartByDomainStu() 
   {
     
      var data=google.visualization.arrayToDataTable([
            ['Student','Number'],

            <?php
               while($row=mysqli_fetch_array($res3))
               {
                  echo "['".$row[0]."',".$row[1]."],";
               }
            ?>

            ]);
      var options = {title:'Students as per Course',
                       width:430,
                       height:450
                        };
      var chart = new google.visualization.PieChart(document.getElementById('student_course_chart_div'));
         chart.draw(data, options);

   }

   function drawChartByDomainInst() //pie chart
   {
        
      var data=google.visualization.arrayToDataTable([
            ['Domain','Number'],

            <?php
               while($row=mysqli_fetch_array($res2))
               {
                  echo "['".$row[0]."',".$row[1]."],";
               }
            ?>

            ]);
      var options = {title:'Instructors as per Domain',
                       width:450,
                       height:450,
                        };
      var chart = new google.visualization.PieChart(document.getElementById('inst_domain_chart_div'));
         chart.draw(data, options);
   }

  

   function drawChartByGender() //pie chart
   {
         // body...
      var data=google.visualization.arrayToDataTable([
            ['Gender','Number'],

            <?php
               while($row=mysqli_fetch_array($res1))
               {
                  echo "['".$row[0]."',".$row[1]."],";
               }
            ?>

            ]);
      var options = {title:'Percentage ratio of Instructor and Normal staff',
                       width:450,
                       height:450,
                        };
      var chart = new google.visualization.PieChart(document.getElementById('staff_chart_div'));
         chart.draw(data, options);
      }

    function drawChartExample() {
      // Create the data table.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Slices');
      data.addRows([
        ['Mushrooms', 3],
        ['Onions', 1],
        ['Olives', 1], 
        ['Zucchini', 1],
        ['Pepperoni', 2]
      ]);
      // Define the chart to be drawn.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Element');
      data.addColumn('number', 'Percentage');
      data.addRows([
        ['Nitrogen', 0.78],
        ['Oxygen', 0.21],
        ['Other', 0.01]
      ]);
      // Set options for Anthony's pie chart.
        var options = {title:'How Much Pizza Anthony Ate Last Night',
                       width:40,
                       height:30};

      // Instantiate and draw the chart.
      var chart = new google.visualization.PieChart(document.getElementById(''));
      chart.draw(data, options);
    }
  </script>
</head>
<body>
   <div class="w-100 bg-dark" style="height: 53px;">
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
   <div class="text-center" style="margin-top: -40px;margin-bottom: 35px;">
      <h3 ass="text-center mb-4" >
         Hi..<?php  echo $name[0]; ?>!
      </h3>
   </div>
   <nav class="navbar shadow bg-dark navbar-expand-lg navbar-dark" id="navbarNav" style="margin-top: -25px; margin-bottom: 20px;">
      <ul class="navbar-nav" style="list-style: none;">
         <li class="nav-item" style="font-size:18px;">
            <a href="#"  class=" nav-link text-white font-weight-bold" style="margin-left:  0px; font-size:18px;">Dashboard </a>
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
   <table class="table">
      <tr>
         <td class="text-center shadow rounded-bottom"><div id="staff_chart_div" style=""></div></td>
         <td class="text-center shadow rounded-bottom"><div id="inst_domain_chart_div" style=" margin-left: 30px;"></div></td>
         <td class="text-center shadow rounded-bottom"><div id="student_course_chart_div" style="margin-left: 30px;"></div></td>
      </tr>
      <!--tr style="margin-top: 10px;">
         <td class="text-center shadow rounded-bottom"><div id="Line_contact_chart_div" style=""></div></td>
         <td class="text-center shadow rounded-bottom"><div id="student_reg_date_chart_div" style=" margin-left: 30px;"></div></td>
      </tr-->
   </table>
</table>
</body>
</html>