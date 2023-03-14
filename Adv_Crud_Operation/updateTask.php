<?php
## Database configuration
include 'config.php';
// var_dump($_POST);
// exit();
$id = $_POST["id"];
    $title = $_POST["title"];
    $details = $_POST["details"];
    $date = $_POST["taskDate"];
   
$insert_user = "update todotask set title='" . $title. "',details='" . $details. "', date='" .$date. "' where id =$id";
 
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