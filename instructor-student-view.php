<?php
session_start();
include "connect.php";
$ins_id=$_SESSION['staffid'];
$q=" SELECT * FROM student WHERE cours_ins_id='$ins_id' AND status='Active'AND payment='PAID' ";
$res=mysqli_query($connect,$q);
$rownum=mysqli_num_rows($res);
?>
<!DOCTYPE html>
<html>
<head>
   <title>student of instructor</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
<script type="text/javascript" src="jqueryFileScript.js"></script>
<script type="text/javascript" src="jqueryTableedit.js"></script> 
<style type="text/css">
   a{text-decoration: none;}a:hover{text-decoration: none;}
</style>   
<script type="text/javascript">
   $(document).ready(function()
      {
        $("#value_search").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#mytable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
</script>
</head>
<body>
   <div class="w-100 bg-dark shadow" style="height: 53px;">
      <center>
         <h2 class="text-white">Student Table</h2>
      </center>
      <a href="logout.php" class="text-decoration-none" style="float: right;  margin-top: -38px;"><img src="logout.png" style="width: 35px;height: 35px;"></a>
   </div><br>
   <center><input type="text" name="q" id="value_search" class="rounded-pill w-25 shadow border-0 form-control" placeholder="Search..."></center><br>
   <table class="table table-striped table-hover" >
      <thead class="bg-dark text-center text-white">
         <th scope="col">ID.</th>
         <th scope="col">Name</th>
         <th scope="col">Gur.Name</th>
         <th scope="col">Phone</th>
         <th scope="col">Phone1</th>
         <th scope="col">Email</th>
         <th scope="col">Course</th>
         <th scope="col">Course Inst</th>
         <th scope="col">Date. Reg</th>
         <th scope="col">Inst Name</th>
         <th scope="col">Payment</th>
         
      </thead>
      <tbody id="mytable">
      <?php

         for($i=1;$i<=$rownum;$i++)
         {
            $val=mysqli_fetch_array($res);
      ?>
      <tr>
         <td class="text-center"><?php echo $val[0]; ?></td>
         <td class="text-center"><?php echo $val[1]; ?></td>
         <td class="text-center"><?php echo $val[2]; ?></td>
         <td class="text-center"><?php echo $val[3]; ?></td>
         <td class="text-center"><?php echo $val[4]; ?></td>
         <td class="text-center"><?php echo $val[5]; ?></td>
         <td class="text-center"><?php echo $val[7]; ?></td>
         <td class="text-center"><?php echo $val[9]; ?></td>
         <td class="text-center"><?php echo $val[11]; ?></td>
         <td class="text-center"><?php echo $val[12]; ?></td>
         <td class="text-center"><?php echo $val[14]; ?></td>
         
         
      </tr>
      <?php
         }
      ?>
   </tbody>
   </table>
</body>
</html>