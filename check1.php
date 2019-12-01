<?php
include 'db.php';
header('Content-Type: application/json');
$list=array();
$image=array();
$caste=$_POST["caste"];
$university=$_POST["university"];
$university=strtoupper($university);
$marks=$_POST["marks"];
//echo $marks;
$lmarks = ($marks - 1000);
$mmarks = ($marks + 1000);
//echo $mmarks;
$result = mysqli_query($conn,"select * from $university where $caste<=$mmarks AND $caste>=$lmarks AND $caste != 0 order by $caste desc");
$json_response = array();
while ($row = mysqli_fetch_array($result)) {  
// Fetch data of Fname Column and store in array of row_array  

$row_array['name'] = $row['name'];
$row_array['branch'] = $row['branch'];
$row_array['address'] = $row['address'];

//push the values in the array  
array_push($json_response,$row_array);  
}  
//  
echo json_encode($json_response); 
?>