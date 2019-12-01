<?php

require "db.php";

$mobile=$_POST["id"];
//$name=$_POST["name"];
//$caste=$_POST["caste"];
//$dob=$_POST["dob"];
$pwd=$_POST["pwd"];

$query="select * from users where mobile='$mobile' and pwd='$pwd';";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{
	echo "true";
}
else
{
	echo "true";
}

?>