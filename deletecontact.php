<?php

session_start();
include 'connect.php';
header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

echo  $input['id']."  ".$input['action'] ;
echo '<script>console.log('.$input["id"].');</script>';

if ($input['action'] == 'delete') {
    mysqli_query($connect,"DELETE FROM contact WHERE conid='" . $input['id'] . "'");
} 

mysqli_close($connect);

echo json_encode($input);
 


?>