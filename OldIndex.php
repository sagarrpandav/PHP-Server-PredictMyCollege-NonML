<?php
	include 'db.php';
	
	if(isset($_POST['click']))
	{
		$uname=$_POST['username'];
		$pwd=$_POST['password'];
		
                
		$sql="select * from admins where Username='$uname' and Password='$pwd';";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
                        setcookie("username","Admin", time()+3600, "/","", 0);
			header("Location: http://predictmycollege.co.nf/admin.php");
		}
		else
		{
                        $sql="select * from users where mobile='$uname' and pwd='$pwd';";
                        $result=$conn->query($sql);
                        if($result->num_rows>0)
                        {
                                setcookie("username","Admin", time()+3600, "/","", 0);
                                header("Location: http://predictmycollege.co.nf/user.php");
                        }
                
		}
	}
                
	?>
<html>
  <head>
    <title>Predict My College</title>
        <link rel="stylesheet" href="css/stylelogin.css">     
  </head>

  <body>
        
    <div class="wrapper">
	<div class="container">
		<h1>Predict My College</h1>
		
		<form method="post">
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="submit" style="background-color:#FFFFFF; color:#33FF99" name="click"> 
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    <?php
	include 'db.php';
	
	if(isset($_POST['click']))
	{
		$uname=$_POST['username'];
		$pwd=$_POST['password'];
		
                echo "<center><h3>".$uname.$password."</h3></center>";
                
		$sql="select * from admins where Username='$uname' and Password='$pwd';";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			setcookie("username","Admin", time()+3600, "/","", 0);
			header("Location: admin.php");
		}
		else
		{
			 $sql="select * from register where Username='$uname' and Password='$pwd' and Type='User'";
			$result=$conn->query($sql);
			if($result->num_rows>0)
			{
				setcookie("username","User", time()+3600, "/","", 0);
				header("Location: user.php");
			}
			else
			{
                                               echo "<center><h3> Inside ELSE Inner</h3></center>";

			}
		}
	}
        else
        {
                echo "<center><h3> Inside ELSE</h3></center>";
        }
                
	?>
  </body>
</html>