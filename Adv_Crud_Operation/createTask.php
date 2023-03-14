<?php
## Database configuration
include 'config.php';
// var_dump($_POST);
// exit();
    $title = $_POST["title"];
    $details = $_POST["details"];
    $taskDate = $_POST["taskDate"];
   
$insert_user = "INSERT INTO  todotask (title,details,date)VALUES ('" . $title. "','" . $details. "','$taskDate')";
    
$status=0;
if (mysqli_query($conn, $insert_user)) 
{
    // header("Location:user_summary.php"); 
    $status= 200;
}    
else 
{ 
    echo "Error: " . $insert_user . "<br>" . mysqli_error($conn);  
    $status=400;
}
$output["status"] =$status;
echo json_encode($status); 
?>