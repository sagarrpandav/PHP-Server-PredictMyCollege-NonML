<?php
$year=$_POST["year"];
include 'db.php';
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
                        <a href="logout.php">Logout</a>
                    </li>
           
                </ul>

              
            </nav>

            <!-- Page Content Holder -->
			<div class = "container container-fluid">
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
                                <li><a href="addsppu.php">Add</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </nav>
                <h3>Predict My College</h3>
                <p>SPPU UNIVERSITY</p>
				
		<form method="post" action="sppu.php">
      <center>Year ?
      <select name="year">
          <option value="Show all">Show all</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          
      </select>
      <input type="submit" name="submit"></center>
      <br>
      
    </form>
    <h1><?php echo"$year"?></h1>
<table class="table table-hover text-center">
    <thead>
      <tr>
        <th class="text-center">Year</th>
        <th class="text-center">College</th>
        <th class="text-center">ADDRESS</th>
        <th class="text-center">BRANCH</th>
        <th class="text-center">OPEN</th>
        <th class="text-center">SC</th>
        <th class="text-center">ST</th>
        <th class="text-center">NT</th>
        <th class="text-center">OBC</th>
        <th class="text-center">TFWS</th>
        <th class="text-center">PWD</th>
	 
      </tr>
    </thead>
    <tbody>
    <?php
    $sql;
    if($year=="Show all")
          {
            $sql="SELECT * FROM SPPU;";  
          }
          else
          {
            $sql="SELECT * FROM SPPU where year='$year';";  
          }
            $result = mysqli_query($conn,$sql);
            $result=$conn->query($sql);
           // if($result->num_rows>0)
            //{
            while($row = mysqli_fetch_array($result))
      	    {
		echo "<tr>";
		echo "<td id = 'year'><a href=update_university.php?university=SPPU&year=". $row['year'] . "&name=".$row['name']. "&address=".$row['address']. "&branch=".$row['branch']."&OPEN=".$row['OPEN']."&SC=".$row['SC']."&ST=".$row['ST']."&NT=".$row['NT']."&OBC=".$row['OBC']."&TFWS=".$row['TFWS']."&PWD=".$row['PWD'].">".$row['year']."</a></td>";
		echo "<td id = 'name'><a href=update_university.php?university=SPPU&year=". $row['year'] . "&name=".$row['name']. "&address=".$row['address']. "&branch=".$row['branch']."&OPEN=".$row['OPEN']."&SC=".$row['SC']."&ST=".$row['ST']."&NT=".$row['NT']."&OBC=".$row['OBC']."&TFWS=".$row['TFWS']."&PWD=".$row['PWD'].">".$row['name']."</a></td>";
		echo "<td id = 'address'><a href=update_university.php?university=SPPU&year=". $row['year'] . "&name=".$row['name']. "&address=".$row['address']. "&branch=".$row['branch']."&OPEN=".$row['OPEN']."&SC=".$row['SC']."&ST=".$row['ST']."&NT=".$row['NT']."&OBC=".$row['OBC']."&TFWS=".$row['TFWS']."&PWD=".$row['PWD'].">".$row['address']."</a></td>";
		echo "<td id = 'branch'><a href=update_university.php?university=SPPU&year=". $row['year'] . "&name=".$row['name']. "&address=".$row['address']. "&branch=".$row['branch']."&OPEN=".$row['OPEN']."&SC=".$row['SC']."&ST=".$row['ST']."&NT=".$row['NT']."&OBC=".$row['OBC']."&TFWS=".$row['TFWS']."&PWD=".$row['PWD'].">".$row['branch']."</a></td>";
		echo "<td id = 'OPEN'><a href=update_university.php?university=SPPU&year=". $row['year'] . "&name=".$row['name']. "&address=".$row['address']. "&branch=".$row['branch']."&OPEN=".$row['OPEN']."&SC=".$row['SC']."&ST=".$row['ST']."&NT=".$row['NT']."&OBC=".$row['OBC']."&TFWS=".$row['TFWS']."&PWD=".$row['PWD'].">".$row['OPEN']."</a></td>";
		echo "<td id = 'SC'><a href=update_university.php?university=SPPU&year=". $row['year'] . "&name=".$row['name']. "&address=".$row['address']. "&branch=".$row['branch']."&OPEN=".$row['OPEN']."&SC=".$row['SC']."&ST=".$row['ST']."&NT=".$row['NT']."&OBC=".$row['OBC']."&TFWS=".$row['TFWS']."&PWD=".$row['PWD'].">".$row['SC']."</a></td>";
                echo "<td id = 'ST'><a href=update_university.php?university=SPPU&year=". $row['year'] . "&name=".$row['name']. "&address=".$row['address']. "&branch=".$row['branch']."&OPEN=".$row['OPEN']."&SC=".$row['SC']."&ST=".$row['ST']."&NT=".$row['NT']."&OBC=".$row['OBC']."&TFWS=".$row['TFWS']."&PWD=".$row['PWD'].">".$row['ST']."</a></td>";
		echo "<td id = 'NT'><a href=update_university.php?university=SPPU&year=". $row['year'] . "&name=".$row['name']. "&address=".$row['address']. "&branch=".$row['branch']."&OPEN=".$row['OPEN']."&SC=".$row['SC']."&ST=".$row['ST']."&NT=".$row['NT']."&OBC=".$row['OBC']."&TFWS=".$row['TFWS']."&PWD=".$row['PWD'].">".$row['NT']."</a></td>";
                echo "<td id = 'OBC'><a href=update_university.php?university=SPPU&year=". $row['year'] . "&name=".$row['name']. "&address=".$row['address']. "&branch=".$row['branch']."&OPEN=".$row['OPEN']."&SC=".$row['SC']."&ST=".$row['ST']."&NT=".$row['NT']."&OBC=".$row['OBC']."&TFWS=".$row['TFWS']."&PWD=".$row['PWD'].">".$row['OBC']."</a></td>";
                echo "<td id = 'TFWS'><a href=update_university.php?university=SPPU&year=". $row['year'] . "&name=".$row['name']. "&address=".$row['address']. "&branch=".$row['branch']."&OPEN=".$row['OPEN']."&SC=".$row['SC']."&ST=".$row['ST']."&NT=".$row['NT']."&OBC=".$row['OBC']."&TFWS=".$row['TFWS']."&PWD=".$row['PWD'].">".$row['TFWS']."</a></td>";
 		echo "<td id = 'PWD'><a href=update_university.php?university=SPPU&year=". $row['year'] . "&name=".$row['name']. "&address=".$row['address']. "&branch=".$row['branch']."&OPEN=".$row['OPEN']."&SC=".$row['SC']."&ST=".$row['ST']."&NT=".$row['NT']."&OBC=".$row['OBC']."&TFWS=".$row['TFWS']."&PWD=".$row['PWD'].">".$row['PWD']."</a></td>";
		echo "</tr>";
	    }
            //}
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
