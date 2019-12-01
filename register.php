<?php

include 'db.php';
$mobile = $_POST['mobile'];
$name=$_POST['name'];
$caste=$_POST['caste'];
$dob = $_POST['dob'];
$pass = $_POST['pwd'];



$sql = "select * from users where mobile ='$mobile' ";
		if($conn->query($sql)->num_rows>0)
		{
			echo "Member Id Already Used";
		}
		else
		{
			$sql1 = "insert into Users values('$mobile','$name','$pass','$mobile','$pass')";
			if($conn->query($sql1)==true)
                        {
                                echo "true";
                        }
                        else
                        {
                                echo "false";
                        }
		}


?>