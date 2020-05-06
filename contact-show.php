<?php
session_start();
include 'connect.php';
$q="SELECT * FROM contact ORDER BY date DESC";
$res=mysqli_query($connect,$q);

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
<!DOCTYPE html>
<html>
<head>
   <title>contact query list</title>

<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
<script src="https://kit.fontawesome.com/4ce794378e.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="jqueryFileScript.js"></script>
<script type="text/javascript" src="jqueryTableedit.js"></script>


<script type="text/javascript">

   
   $(document).ready(function() {
      $('#editable_table').Tabledit({

         url:'deletecontact.php',
         rowIdentifier:'id',
         deleteButton:true,
         rowIdentifier: 'data-id',
    editButton: false,
    restoreButton: false,
         deletemethod:'post',
         eventType:'click',
         buttons: {
            delete: {
               class: 'btn btn-danger',
               html: '<i class="far fa-trash-alt" ></i> &nbsp DELETE',
               action: 'delete'
                     },
               confirm: {
                     class: 'btn btn-warning',
                     html: 'Are you sure?'
                        }      
                  },         
         columns: {
               identifier: [0, 'id'],
               editable: [[1, 'name'], [2, 'phone'], [3, 'email']]},
         
      
    });
   });

</script>

<style type="text/css">
   a{text-decoration: none;}a:hover{text-decoration: none;}
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
         FRONT STAFF BOARD
      </h2>
   </div>
   <table class="table-striped table table-hover" id="editable_table">
      <thead class="bg-dark text-center text-white">
         <th scope="col" class="text-center">ID.</th>
         <th scope="col" class="text-center">Name</th>
         <th scope="col" class="text-center">Phone</th>
         <th scope="col" class="text-center">Email</th>
         <th scope="col" class="text-center">Query</th>
         <th scope="col" class="text-center">Date</th>
         
      </thead>
      <?php

         for($i=1;$i<=mysqli_num_rows($res);$i++)
         {
            $val=mysqli_fetch_array($res);
      ?>
      <tr>
         <td class="text-center"><?php echo $val[0]; ?></td>
         <td class="text-center"><?php echo $val[1]; ?></td>
         <td class="text-center"><?php echo $val[2]; ?></td>
         <td class="text-center"><?php echo $val[3]; ?></td>
         <td class="text-center"><?php echo $val[5]; ?></td>
         <td class="text-center"><?php echo $val[4]; ?></td>
         
      </tr>
   <?php   }?>
   </table>
</body>
</html>
<?php



?>