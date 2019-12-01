<?php
$univer=$_POST["university"];
?>
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
                    <h3>Predict My College</h3>
                </div>
                 <ul class="list-unstyled components">
                    <p>Admin Panel</p>
                    <li class="active"> <a href="admin.php">Home</a> </li>
           <li> 
                        <a href="pre_sppu.php">SPPU</a>
                    </li>
           <li>
                        <a href="pre_mumbai.php">MUMBAI University</a>
                    </li>
           <li>
                        <a href="pre_shivaji.php">Shivaji University</a>
                    </li>
           
           <li>
                        <a href="pre_prediction.php">Predicted Table</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
           
                </ul>

              
            </nav>

            <!-- Page Content Holder -->
			<div class="container">
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
                                
								 <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                

                  
				
        <form method="post" action="prediction.php">
		<div class = "row">
      <center>University ?
      <select name="university">
          <option value="SPPU">SPPU</option>
          <option value="SHIVAJI">Shivaji</option>
          <option value="MUMBAI">Mumbai</option>
      </select>
      <button class = "btn btn-primary" name="submit">Submit</button></center>
	  <div class="col-sm-2">
             
        </div>
      <br>
	  </div>
      
    </form>
    <?php echo "<h3>".$univer."</h3>"; ?>                           
<table class="table table-hover">
    <thead>
      <tr>
        <th>College</th>
        <th>OPEN</th>
        <th>OBC</th>
        <th>SC</th>
        <th>ST</th>
        <th>NC</th>
        <th>NT</th>
        <th>GIRLS</th>
	 
      </tr>
    </thead>
    <tbody>
	<?php
	include 'db.php';
  $univer=$univer."_prediction";	
	$sql="SELECT * FROM $univer;";

	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{?>
			  <tr>
          
        <td><?php echo $row['Name']; ?></td>
        <td><?php echo $row['OPEN']; ?></td>
        <td><?php echo $row['OBC']; ?></td>
        <td><?php echo $row['SC']; ?></td>
        <td><?php echo $row['ST']; ?></td>
        <td><?php echo $row['NC']; ?></td>
        <td><?php echo $row['NT']; ?></td>
        <td><?php echo $row['GIRLS']; ?></td> 
      </tr>
		<?php }
	}
	
	?>
     
     
    </tbody>
  </table>
				
				
            </div>
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
