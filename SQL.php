<?php

$myServerName="localhost";
$myUserName="root";
$myPassword="";
$myDatabaseName="colleges";

$connection=mysqli_connect($myServerName,$myUserName,$myPassword,$myDatabaseName);
if($connection)
{
	//echo "Connected!";
}
else
{
	echo "Connection Failure to DB";
}

?>