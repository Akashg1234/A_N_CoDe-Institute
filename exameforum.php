<?php
	include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exam forum</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- Latest compiled and minified CSS -->
   <script type="text/javascript" src="jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!--link rel="stylesheet" type="text/css" href="exame.css"-->
	<style type="text/css">
    a {text-decoration: none;}
    a:hover {text-decoration: underline;}
	</style>
	<script type="text/javascript">
		/*function myfun1()
		{
			$(document).ready(function() 
         {
            var id=$("#stu_id").val();
            
            $.ajax({
                     method:'POST',
                     url: 'loaddetail.php',
                     dataType: 'JSON',
                     data: {student_id: id},
                     cache: false,
                     success:  function(name_data_json)
                     {
                        console.log(name_data_json);
                        $("#student_id").text(name_data_json.sid);
                        //$("#name").text(name_data_json.sname);
                        $("#inst_id").text(name_data_json.staffid);
                        //$("#inst_name").text(name_data_json.name);
                        $("#marks").text(name_data_json.marks);
                        $("#subject").text(name_data_json.subject);
                        $("#numberofexame").text(name_data_json.No_of_exame);
                     }

                  });         
         });
		}*/
   
      $(document).ready(function() {
         $("#refbtn").on('click', function(event) {
             $("#exam_data").remove();
         
          });
            
      });
      
	</script>
</head>
<body>
<nav class="navbar bg-dark navbar-expand-lg navbar-dark" id="navbarNav">
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
			<li class="nav-item"><a href="#" class=" nav-link text-white font-weight-bold" style="margin-left:  15px;font-size:18px;width: 140px; "> Exame Forum </a></li>
			<li class="nav-item"><a href="faq.php" class=" nav-link text-white" style="margin-left: 15px;font-size:18px;"> FAQ </a></li>
			<li class="nav-item rounded" style="float: right; margin-left: 785px; background-image: linear-gradient(90deg,#ff3838,#ff4d4d,#F97F51,#f9ca24); width: 72px;"><a href="login.php" class="navbar-brand nav-link text-white"> Login </a></li>
		</ul>
</nav>
<br>	
	<div class="card-header bg-dark">
		<label class="font-weight-bolder text-white" style="font-size: 20px;">Exame Forum</label>
	</div>
	<div class="form pl-5 " style="background-color: pink;">
		<form method="post"  class="form pb-3 pt-3" action="">
			<label for="text-center" class="font-weight-bolder">Enter Student Id:</label>
			<input type="text" name="id" id="stu_id" class="inp form-control w-25 rounded-pill" id="stuid" required="">
			<label for="text-center" class="font-weight-bolder">Enter Password:</label>
			<input type="password" name="psw" id="password" class="inp form-control w-25 rounded-pill" id="stuid" required="">
			<a href="student-pchange.php" class="text-danger">Forget Password</a><br><br>
			<button style="font-size:17px;" type="submit" id="subbtn" name="subbtn" class="btn btn-primary rounded" >
				Search
				<i class="fas fa-search"></i>
			</button>
         <button style="font-size:17px;" type="reset" id="refbtn" class="btn btn-danger rounded" >
            Refresh
            <i class="fas fa-sync-alt"></i>
         </button>
		</form>
	</div>
	
	</div>
<?php

function showExameData($array,$row_num,$val_array)
{
   echo "function executting".$array[0]."  ".$array[2]."  ".$array[4]."  ";
   print_r($val_array);

}
if(isset($_POST['subbtn']))
{

   $nameQuery=" SELECT sid,password FROM student WHERE sid='".$_POST['id']."' ";
   if($res=mysqli_query($connect,$nameQuery))
   {
      $val_array=mysqli_fetch_array($res);
      if(is_array($val_array))
      {
         if(password_verify($_POST['psw'], $val_array[1]))
         {
            $query=" SELECT stuid FROM exam WHERE stuid='".$_POST['id']."' ";
            
                           
            if(mysqli_query($connect,$query))
            {
               $query_for_exam_detail="SELECT inst_id, No_of_exame, stuid, subject, marks, no_submit_date FROM exam WHERE stuid='".$_POST['id']."'  ";
               $result=mysqli_query($connect,$query_for_exam_detail);
               ?>                
<div id="exam_data">
   <?php 
      for($i=1;$i<=mysqli_num_rows($result);$i++)
      {
         $value_of_array=mysqli_fetch_array($result);
   ?>
   <center>
    <div class="w-50 shadow-lg rounded p-4" style="margin-top: 30px;">
     <table class="table table-hover  w-100">
      <thead id="table_head" class="thead-dark text-white ">
         <tr>
            <th scope="col">
               Selection
            </th>
            <th scope="col">
               Details
            </th>
         </tr>
      </thead>
      <tbody class="table-bordered">
         <tr>
            <td class="font-weight-bold">
               Id:
            </td>
            <td id="student_id" class="text-center">
               <?php echo $value_of_array[2]; ?>
            </td>
         </tr>
         <tr>
            <td class="font-weight-bold">
               Name:
            </td>
            <td id="name" class="text-center"> 
            <?php
            $name_query1="SELECT sname FROM student WHERE sid='$value_of_array[2]'";
            $name_query1=mysqli_query($connect,$name_query1);
            $name_array1=mysqli_fetch_array($name_query1);
            echo $name_array1[0];
            ?>   
            </td>
         </tr>
         <tr>
            <td class="font-weight-bold">
               Number of exam:
            </td>
            <td id="numberofexame" class="text-center"> 
               <?php echo $value_of_array[1]; ?>
            </td>
         </tr>
         <tr>
            <td class="font-weight-bold">
               Instructor Id:
            </td>
            <td id="inst_id" class="text-center">
               <?php echo $value_of_array[0]; ?>
            </td>
         </tr>
         <tr>
            <td class="font-weight-bold">
               Instructor:
            </td>
            <td id="inst_name" class="text-center">
            <?php
            $name_query="SELECT name FROM staff WHERE staffid='$value_of_array[0]'";
            $name_query=mysqli_query($connect,$name_query);
            $name_array=mysqli_fetch_array($name_query);
            echo $name_array[0];
            ?>
            </td>
         </tr>
         <tr>
            <td class="font-weight-bold">
               Subject:
            </td>
            <td id="subject" class="text-center">
               <?php echo $value_of_array[3]; ?>
            </td>
         </tr>
         <tr>
            <td class="font-weight-bold">
               Marks:
            </td>
            <td id="marks" class="text-center">
               <?php echo $value_of_array[4]; ?>
            </td>
         </tr>
         <tr>
            <td class="font-weight-bold">
               Marks submit date:
            </td>
            <td id="marks" class="text-center">
               <?php echo $value_of_array[5]; ?>
            </td>
         </tr>
      </tbody>  
     </table>  
   </center>
   <?php 
      }
      ?>
</div>               
               
           <?php  
               }
            else
            {
               echo "<script>alert('Id. Not Found...');</script>".mysqli_error($connect);
            }
         }
         else
         {
            echo "<script>alert('Password not matched...');</script>";
         }
      }
      else
      {
         echo "<script>alert('Something not matched...');</script>";
      }
   }
}

?>
</body>
</html>
