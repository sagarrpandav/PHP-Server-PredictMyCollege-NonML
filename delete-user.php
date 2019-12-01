<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Admin Panel</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style5.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
             <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Garbage Monitoring</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Admin Panel</p>
                    <li > <a href="admin.php">Home</a> </li>
                    <li> <a href="add-user.php">Add User</a> </li>
                    <li>
                        <a href="update-user.php">Update User</a>
                    </li>
                    <li  class="active">
                        <a href="delete-user.php">Delete User</a>
                    </li>
					 <li>
                        <a href="show-all.php">Show All</a>
                    </li>
					 <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>

              
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="admin.php">Home</a></li>
                                <li><a href="add-user.php">Add</a></li>
                                <li><a href="update-user.php">Update</a></li>
                                <li><a href="delete-user.php">Delete</a></li>
								 <li><a href="show-all.php">Show</a></li>
								 <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
<?php
include 'db.php';
$level=0;
$color="";
$sql="SELECT * FROM level ORDER BY ID DESC LIMIT 1";

$result=$conn->query($sql);
if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
		 $level=$row['level'];
	}
}
if($level<=50)
{
	$color="progress-bar-success";
}
else if($level>50 && $level<=75)
{
	$color="progress-bar-warning";
}
else if($level>75 && $level<=100)
{
	$color="progress-bar-danger";
}

?>
                 <div class="progress">
    <div class="progress-bar <?php echo $color; ?> progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $level; ?>%">
     <?php echo $level; ?>%
    </div>
  </div>
                

                <h3>Monitoring Level</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna incididunt ut labore et dolore magna</p>
	 
	 
	 <form class="form-horizontal" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="name" required>
      </div>
    </div>
    
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="add">Delete</button>
      </div>
    </div>
  </form>
		<?php
		include 'db.php';
		if(isset($_POST['add']))
		{
			$uname=$_POST['name'];
			 
			$sql="select * from register where Username='$uname'";
			$result=$conn->query($sql);
			if($result->num_rows>0)
			{
				$sql="delete from register where Username='$uname'";
				if($conn->query($sql)==TRUE)
				{
					 echo "<script type='text/javascript'>alert('User Deleted Successfully')</script>";
				}
				else
				{
					echo "<script type='text/javascript'>alert('Not Deleted')</script>";
				}
			}
			else
			{
			 echo "<script type='text/javascript'>alert('Useranme Not Exist')</script>";
				
				
			}
		}
		
		?>		
				
            </div>
        </div>





        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>
 
    </body>
</html>
