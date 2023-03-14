<?php
## Database configuration
include 'config.php';

if(isset($_POST["emp_id"]))
{
  $emp_id = $_POST["emp_id"];
//$conn = mysqli_connect("localhost", "markaklq", "HyQsoft!@34", "markaklq_db_istanbul");
   
  $db = mysqli_select_db($conn, $db);
  $sql = "select * from todotask where id = " . $emp_id;

  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
        
//$sql_role = "select * from user_menu_access1 where user_uk_id = " . $row["user_uk_id"];     
//$result_role = mysqli_query($conn,$sql_role);
//$row_role = mysqli_fetch_array($result_role);
      
//$web_sql_role = "select * from vweb_user_menu_access where user_uk_id = " . $row["user_uk_id"];     
//$web_result_role = mysqli_query($conn,$web_sql_role);
//$web_row_role = mysqli_fetch_array($web_result_role);         
  $output["id"] = $row["id"];
  $output["title"] = $row["title"];
  $output["details"] = $row["details"];
  $output["date"] = $row["date"];
            
  echo json_encode($output);   
}
?>