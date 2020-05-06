<?php
session_start();#work is left
include "connect.php";
$id=$_SESSION['staffid'];
?>
<!DOCTYPE html>
<html>
<head>
   <title>Marks upload</title>
<script type="text/javascript" src="jquery.js"></script>   
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">
    
      $(document).ready(function() 
      {
         $('#id').on('change', function(event) 
         {
            var student_id=$('#id').val();
            $.ajax({
                method: "POST",
                url: "loaddetail.php",
                data: {studentid:student_id},
                dataType:"JSON",
                cache: false,
                success:  function(data_of_json)
                {
                   $("#name").val(data_of_json.sname);
                   $("#phone").val(data_of_json.phone);
                   $("#sub").val(data_of_json.course);
                }
            });
            
         });
            
      });
      
   
</script>

<style type="text/css">
 .mySidenav  #REGISTER
{
   top: 100px;
   background-color: yellow;
   color: red;width: 170px;
   left: -100px;
}
#PROFILE
{
   top: 165px;
   color: white;
   background-color: grey;
}

#STUDENT
{
   top: 230px;
   color: white;
   background-color: blue;
}
#PASS
{
   top: 360px;
   color: white;
   background-color: red;
   width: 230px;
   left: -160px;
}
#NOTICE
{
   top: 295px;
   color: white;
   background-color: #ff00dd;
}.mySidenav a
{
   text-decoration: none;
   position: absolute;
   padding: 15px 5px 10px 10px;
   color: white;
   transition: 0.2s;
   left: -80px;
   border-radius: 0px 10px 10px 0px;
   width: 150px;
   height: 60px;
   margin-top: 50px;
}
.mySidenav a#PROFILE:hover,a#STUDENT:hover,a#INSTRUCTOR:hover,a#NOTICE:hover,a#REGISTER:hover,a#PASS:hover
{
   left: 0;
}
</style>   
</head>
<body>
   <div class="w-100 bg-dark" style="height: 53px;">
      <center>
         <img src="profile.jpg" class="border-white rounded-circle" style="width: 50px;height: 50px;">
         <!--i class="fas fa-user-alt border-white rounded-circle" style="color: white;"></i-->
      </center>
      <a href="logout.php" class="text-decoration-none" style="float: right;  margin-top: -40px;"><img src="logout.png" style="width: 35px;height: 35px;"></a>
   </div>
   <div class=" bg-dark shadow mb-5 w-100">
      <h2 class="text-center text-white">
         INSTRUCTOR BOARD
      </h2>
   </div>
   <div class="mySidenav" style="">
      <a href="instructor-view.php" id="REGISTER">HOME<i class="fas fa-home" style="margin-left: 70px; width: 30px;height: 30px;"></i></a>
      <a href="profile-instructor.php" id="PROFILE">PROFILE  <i class="fas fa-user-circle" style="margin-left: 35px; width: 30px;height: 30px;"></i></a>
      <a href="instructor-student-view.php"  id="STUDENT">STUDENT  <i class="fas fa-user-graduate" style="margin-left: 25px;width: 30px;height: 30px;"></i></a>
      <a href="instructor-notice-creation.php"  id="NOTICE">NOTICE  <i class="fas fa-volume-up" style="margin-left: 35px;width: 30px;height: 30px;"></i></a>
      <a href="staffpasswordupdate.php"  id="PASS"> UPDATE PASSWORD <i class="fas fa-unlock-alt" style="margin-left: 28px;width: 30px;height: 30px;"></i></a>
   </div>
   <center>
      <div class="w-50 shadow p-4 rounded">
         <?php
            $query="SELECT sid FROM student WHERE cours_ins_id='$id' AND status='Active'AND payment='PAID'";
            $res=mysqli_query($connect,$query);
            $rownum=mysqli_num_rows($res);
         ?>
         <div class="w-75">
            <form class="form" method="post" action="">
               <label>Id: </label>
               <select class="w-100 form-control" name="id" id="id" >
                  <option selected="" disabled="">--select--</option>
                  <?php
                     for($i=1;$i<=$rownum;$i++)
                     {
                        $val=mysqli_fetch_array($res);
                        echo '<option>'.$val[0].'</option>';
                     }
                  ?>
               </select>
         <label>Name: </label>
         <input type="text" name="name" value="" id="name" readonly="" class="w-100 form-control text-center" >
         <label>Phone: </label>
         <input type="text" name="phone" value="" id="phone" readonly="" class="w-100 form-control text-center" >
         <label>Subject:</label>
         <input type="text" name="sub" value="" id="sub" readonly="" class="w-100 form-control text-center" value="">
         <label>Exame No:</label>
         <select class="w-100 form-control text-center" name="exameno" required="">
            <option selected="" disabled="">--select--</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
         </select>
         <label>Marks:</label>
         <input type="text" name="marks" required="" class="w-100 text-center form-control" ><br>
         <button class="btn btn-success" name="subbtn">Submit<i class="fas fa-angle-double-down" style="margin-left: 10px;"></i></button>
            </form>
         </div>
      </div>
   </center>
</body>
</html>
<?php

if(isset($_POST['subbtn']))
{
   $inst_id=$id;
   $stuid=$_POST['id'];
   $exameno=$_POST['exameno'];
   $subject=$_POST['sub'];
   $marks=$_POST['marks'];
   $date=date('Y-m-d');
   $q=" INSERT INTO exam(inst_id,No_of_exame,stuid,subject,marks,no_submit_date)VALUES('$inst_id','$exameno','$stuid','$subject','$marks','$date') ";
   if(mysqli_query($connect,$q))
   {
      #message sending function <?php echo $val[1]; <?php echo $val[2]; 
      #ALTER TABLE student
      #ADD CONSTRAINT cours_ins_id
      #FOREIGN KEY (cours_ins_id) REFERENCES staff(staffid);
      echo "<script>alert('successfully submited');
      windows.location.href='marksupload.php';</script>";
      
   }
   else
   {
      echo mysqli_error($connect);
   }
}

function sendMessage($name,$stuid,$exameno,$subject)
{
   $name=$name;
   $mon="July2019";
   $field = array(
       "sender_id" => "FSTSMS",
       "language" => "english",
       "route" => "qt",
       "numbers" => "",
       "message" => "9920",
       "variables" => "{#EE#}|{#DD#}",#variables to add, work is left
       "variables_values" => "'$name'|'$mon'"
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
   ));

   $response = curl_exec($curl);
   $err = curl_error($curl);

   curl_close($curl);

   if ($err) 
      {
        echo "cURL Error #:" . $err;
      } 
   else 
      {
        echo $response;
      }
}
?>