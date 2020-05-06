<?php
session_start();
include "connect.php";

if(isset($_POST['studentid']))
{
   $q=" SELECT sname,course,phone FROM student WHERE  sid='".$_POST['studentid']."' ";
   $res=mysqli_query($connect,$q);
   $value=mysqli_fetch_array($res);

   echo json_encode($value);
}          

if(isset($_POST['student_id']))
{
   $id=$_POST['student_id'];

   #$q2=" SELECT sname FROM student WHERE sid='$id' ";
   #$array1=mysqli_fetch_array(mysqli_query($connect,$q2));

   $q4=" SELECT stuid,NO_of_exame,inst_id,subject,marks,no_submit_date FROM exam WHERE stuid='$id' ";

   $array3=mysqli_fetch_array(mysqli_query($connect,$q4));

   #$q3=" SELECT name FROM staff WHERE staffid='$array3[2]' ";
   #$array2=mysqli_fetch_array(mysqli_query($connect,$q3));

   
   $arr=array_merge($array1,$array2,$array3);
   #print_r($arr) ;
   echo json_encode($array3);
   /*if(mysqli_query($connect,$q))
      echo json_encode(mysqli_fetch_array(mysqli_query($connect,$q)));
   elsePO
      echo mysqli_error($connect);*/
}
?>
