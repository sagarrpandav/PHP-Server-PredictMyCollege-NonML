<?php

require "db.php";
require "PdfToText-master/PdfToText.phpclass";

//$caste=$_POST["caste"];
$university=$_POST["university"];
$year=$_POST["year"];
$path=$_POST["path"];

//echo $caste."<br>";
//echo $university."<br>";
//echo $year."<br>";
//echo $path;

mysqli_query($conn,"create table if not exists $university(year int,name varchar(40),OPEN float,OBC float,SC float,ST float,NC float,NT float,GIRLS float,Primary Key(year,name));");


$pdfvar=new PdfToText($path);

$data=$pdfvar->Text;

//echo $data;

//$words=str_word_count($data);

$parts=explode(" ",$data);

//echo sizeof($parts);

$count=0;;

for($i=8;$i<sizeof($parts)-9;$i++)
{
  $name=trim($parts[$i]);
  //echo $name;
  //echo "______".$parts[$i]."________".$name."______";
  //$tot=$parts[$i + 1];
  $openperc=$parts[$i + 1];
  //$obccount=$parts[$i + 3];
  $obcperc=$parts[$i + 2];

  ///////11234567890
  //$indiv=explode(",",$parts[$i +3]);
  //$opencount=$parts[$i + 5];
  
  //$indiv=explode(",",$parts[$i +4]);
  //$sccount=$parts[$i + 7];
  $scperc=$parts[$i + 3];
  //$indiv=explode(",",$parts[$i +5]);
  //$ntcount=$parts[$i + 9];
  $stperc=$parts[$i + 4];
  $ncperc=$parts[$i + 5];

  $ntperc=$parts[$i+6];

  //$indiv=explode(",",$parts[$i +6]);
  //$stcount=$parts[$i + 11];
  
  //$indiv=explode(",",$parts[$i +7]);
  //$othercount=$parts[$i + 13];
  $girls=$parts[$i + 7];

  //echo $parts[$i];

  //echo $name." ".$tot." ".$obccount." ".$obcperc;
  /*$j=$i+1;
  echo $parts[$i]." ".$parts[$j];
  $name=$parts[$i];
  $seats=$parts[$j];
  //mysqli_query($connection,"insert into Info values('$name','$seats');");
  $i++;
  */
  $i=$i+7;
  if(mysqli_query($conn,"insert into $university values('$year','$name','$openperc','$obcperc','$scperc','$stperc','$ncperc','$ntperc','$girls');"))
  {
    //echo "Data for Year ".$year." University ".$university."College ".$name." Uploaded Successfully!<br>";
  }
  //echo "...............".$i."->".$parts[$i]."++++++++++++++++++";

  $count++;

//  echo "Name is ".$name." Seats are ".$seats;
}

$res=mysqli_query($conn,"select * from universities where Name='$university';");
if(mysqli_num_rows($res)==0)
{
  mysqli_query($conn,"insert into universities values('$university','$count');");
}

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
                        <a href="pre_delhi.php">Delhi University</a>
                    </li>
           
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
           
                </ul>

              
            </nav>

            <!-- Page Content Holder -->
			<div class = "container">
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
                

                <h3 class = "text-primary">Predict My College</h3>
                <p class = "text-success">Delhi</p>
				
        <form method="post" action="delhi.php">
      <center>Year ?
      <select name="year">
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="1111">Show all</option>
      </select>
      <input type="submit" name="submit"></center>
      <br>
      
    </form>
    <h1 class = "text-success"><?php echo"$year"?></h1>
<table class="table table-hover text-center">
    <thead>
      <tr class = "text-center">
        <th class = "text-center">Year</th>
        <th class = "text-center">College</th>
        <th class = "text-center">OPEN</th>
        <th class = "text-center">OBC</th>
        <th class = "text-center">SC</th>
		<th class = "text-center">ST</th>
        <th class = "text-center">NC</th>
        <th class = "text-center">NT</th>
        <th class = "text-center">GIRLS</th>
	 
      </tr>
    </thead>
    <tbody>
	<?php
	include 'db.php';
  $sql;
	if($year=="1111")
  {
    $sql="SELECT * FROM sppu;";  
  }
  else
  {
    $sql="SELECT * FROM sppu where year='$year';";  
  }
	

	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{?>
			  <tr>
          <td><?php echo $row['year']; ?></td>
        <td><?php echo $row['name']; ?></td>
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
