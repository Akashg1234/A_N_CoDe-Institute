<?php

include "connect.php";

?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
<script type="text/javascript">
   
      $(document).ready(function() {
         
         $("#course").change(function(event) {
            var course_data=$("#course").val();
            $.ajax({
               url: 'loaddetail.php',
               type: 'POST',
               dataType: 'html',
               data: {course_data: 'course_data'},
               success:function (arguments) {
                  $("cousre_instructor").html(arguments);
               }
            })
            .done(function() {
               console.log("success");
            })
            .fail(function() {
               console.log("error");
            })
            .always(function() {
               console.log("complete");
            });
            
         });
      });
   

</script>   
</head>
<body>
<select  required=""  name="course" id="course">
   <option selected="" disabled="">--Select--</option>
      <?php
         $q="SELECT * FROM course ";
         $res=mysqli_query($connect,$q);
         for ($i = 1; $i <=mysqli_num_rows($res); $i++) 
         {
            $val=mysqli_fetch_array($res);
            echo '<option class=" w-50 text-center" value="$val[1]" '.$val[1].'</option>';
         }

      ?>
</select>
<select id="cousre_instructor">
               
</select>
</body>
</html>