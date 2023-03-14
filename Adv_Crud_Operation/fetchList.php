<?php
// include("database.php");
include 'config.php';
$db=$conn;
// fetch query
function fetch_data()
{
 global $db;
  $query="SELECT * from todotask";
  $exec=mysqli_query($db, $query);
  if(mysqli_num_rows($exec)>0)
  {
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;      
  }
  else
  {
    return $row=[];
  }
}
$fetchData = fetch_data();
show_data($fetchData);

function show_data($fetchData)
{
 if(count($fetchData)>0)
 {
      $sn=1;
      foreach($fetchData as $data)
      { 
        echo '<div class="card bgcolor p-3 mb-3">';
        echo "
        <p>POST ".$sn."</p>
        <p>".$data['title']."</p>
        <p>".$data['details']."</p>
        <p>".$data['date']."<p>
         
        <button type='submit' class='btn btn-success editbtn' data-toggle='modal' onclick='return GetTaskDetail(".$data['id'].")'>Edit</button>
        <button type='submit' class='btn  btn-danger dltbtn' onclick='return deleteTask(".$data['id'].")'>Remove</button>
        </div> ";
        $sn++; 
      }  
  }
  else
  {
  echo "<p>No Data Found</p>"; 
  }
//   echo "</table>";
}
?>