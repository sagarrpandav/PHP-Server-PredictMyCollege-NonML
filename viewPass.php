<?php

require "db.php";

$mobile=$_POST["id"];

$sql = "select * from users where mobile='$mobile'";// where id=$id";
if($conn->query($sql)->num_rows<=0)
{
     echo "mobile not found";   
}else
{
$query="select pwd from users where mobile='$mobile'";
$result=mysqli_query($conn,$query);
while($res=mysqli_fetch_array($result))
{
        $data =$res['pwd'];
        echo $data;
}
}

?>
