<?php

session_start();
include 'connect.php';
$q=" SELECT * FROM staff WHERE stafftype='Normal Staff'AND status='Active' ";
$res=mysqli_query($connect,$q);
$rownum=mysqli_num_rows($res);
?>
<!DOCTYPE html>
<html>
<head>
   <title>Front Staff Board</title>
   <script type="text/javascript" src="jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script type="text/javascript" src="jqueryFileScript.js"></script>
 <script type="text/javascript" src="jqueryTableedit.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
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
   $(document).ready(function() {
      $('#editable_table').Tabledit({
          url: 'updatestaff.php',
          deleteButton: true,
          saveButton: true,
          autoFocus: true,
          buttons: {
               edit: {
                  class: 'btn btn-success',
                  html: '<i class="fas fa-pen-alt" style="size:10px;"></i> ',
                  action: 'edit'
               },
               delete: {
                     class: 'btn btn-danger',
                     html: '<i class="fas fa-trash-alt" style="size:10px;"></i>',
                     action: 'delete'
                     },
               confirm: {
                           class: 'btn btn-warning',
                           html: 'Are you sure?'
                     }
          },
          columns: {
              identifier: [0, 'id'],
              editable: [[1, 'name'], [2, 'phone'],[3,'email'],[4, 'quail'],[5, 'expe'],[11,'salary']]
          },
          onDraw: function() 
          {
              console.log('onDraw()');
          },
          onSuccess: function(data, textStatus, jqXHR) 
          {
              console.log('onSuccess(data, textStatus, jqXHR)');
              console.log(data);
              console.log(textStatus);
              console.log(jqXHR);
          },
          onFail: function(jqXHR, textStatus, errorThrown) 
          {
              console.log('onFail(jqXHR, textStatus, errorThrown)');
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
          },
          onAlways: function() 
          {
              console.log('onAlways()');
          },
          onAjax: function(action, serialize) 
          {
              console.log('onAjax(action, serialize)');
              console.log(action);
              console.log(serialize);
          }
      });
   });
</script>
<style type="text/css">
   a{text-decoration: none;}a:hover{text-decoration: none;}
</style>
</head>
<body>
   <div class="w-100 bg-dark shadow" style="height: 53px;">
      <center>
         <h2 class="text-white">Staff Table</h2>
      </center>
      <a href="logout.php" class="text-decoration-none" style="float: right;  margin-top: -38px;"><img src="logout.png" style="width: 35px;height: 35px;"></a>
   </div><br>
   <center>
      <input type="text" name="q" id="value_search" class="rounded-pill w-25 shadow border-0 form-control" placeholder="Search...">
   </center><br><br>
   <nav class="navbar shadow bg-dark navbar-expand-lg navbar-dark" id="navbarNav" style="margin-top: -25px; margin-bottom: 20px;">
      <ul class="navbar-nav" style="list-style: none;">
         <li class="nav-item" style="font-size:18px;">
            <a href="admin-view.php"  class=" nav-link text-white " style="margin-left:  0px; font-size:18px;">Dashboard </a>
         </li>
         <li class="nav-item">
            <div class="dropdown">
               <a href="#" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn dropdown-toggle nav-link text-white " style="margin-left:  15px; font-size:18px;"> Register </a>
               <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="admin-register.php" class="btn dropdown-item " type="button">Admin</a>
                <a href="instructor-register.php" class="btn dropdown-item " type="button">Instructor</a>
                <a href="staff-register.php" class="btn dropdown-item" type="button">Front Staff</a>
              </div>
            </div>
         </li>
         <li class="nav-item">
            <div class="dropdown">
               <a href="#" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn dropdown-toggle nav-link text-white font-weight-bold" style="margin-left:  15px; font-size:18px;"> Office Staff </a>
               <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="instructor-admin-view.php" class="btn dropdown-item " type="button">Instructor</a>
                <a href="#" class="btn dropdown-item font-weight-bold" type="button">Front Staff</a>
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
   <table class="table table-striped table-hover" id="editable_table">
      <thead class="bg-dark text-center text-white">
         <th scope="col">ID.</th>
         <th scope="col">Name</th>
         <th scope="col">Phone</th>
         <th scope="col">Email</th>
         <th scope="col">Quali</th>
         <th scope="col">Expe.</th>
         <th scope="col">Pass.Per</th>
         <th scope="col">Prev.Ins</th>
         <th scope="col">Adhar No.</th>
         <th scope="col">Pan No.</th>
         <th scope="col">D.O.J.</th>
         <th scope="col">Salary</th>
         
      </thead>
      <tbody id="mytable">
      <?php

         for($i=1;$i<=$rownum;$i++)
         {
            $val=mysqli_fetch_array($res);
      ?>
      <tr>
         <td class="text-center"><?php echo $val[0]; ?></td>
         <td class="text-center"><?php echo $val[2]; ?></td>
         <td class="text-center"><?php echo $val[3]; ?></td>
         <td class="text-center"><?php echo $val[4]; ?></td>
         <td class="text-center"><?php echo $val[7]; ?></td>
         <td class="text-center"><?php echo $val[9]; ?></td>
         <td class="text-center"><?php echo $val[14]; ?></td>
         <td class="text-center"><?php echo $val[15]; ?></td>
         <td class="text-center"><?php echo $val[16]; ?></td>
         <td class="text-center"><?php echo $val[17]; ?></td>
         <td class="text-center"><?php echo $val[18]; ?></td>
         <td class="text-center"><?php echo $val[19]; ?></td>
         
      </tr>
      <?php
         }
      ?>
   </tbody>
   </table>
</body>
</html>
<?php

if(isset($_POST['delbtn']))
{

   $q="UPDATE staff SET status='Deactive'";


}
 
function getName() 
{ 
   $n=10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 

?>