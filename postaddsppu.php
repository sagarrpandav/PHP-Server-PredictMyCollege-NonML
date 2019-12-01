<?php

require "db.php";
if(isset($_POST['insert']))
	{
		$university = $_POST['university'];
		$year = $_POST['year'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$branch = $_POST['branch'];
		$OPEN = $_POST['open'];
                $SC = $_POST['sc'];
                $ST = $_POST['st'];
                $NT = $_POST['nt'];
                $VJ = $_POST['vj'];
                $OBC = $_POST['obc'];
                $TFWS = $_POST['tfws'];
                $PWD = $_POST['pwd'];
               // echo $university;
		$sql1 =	"INSERT INTO $university (`year`,`name`,`address`,`branch`,`OPEN`, `SC`, `ST`, `NT`, `VJ`, `OBC`, `TFWS`, `PWD`) VALUES ('$year','$name', '$address', '$branch','$OPEN','$SC','$ST','$NT','$VJ','$OBC','$TFWS','$PWD')";
		if($conn->query($sql1)==true)
		{
			echo '<script language="javascript">';
			echo 'alert("Added Successfully")';
			echo '</script>';
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Not Inserted")';
			echo '</script>';
		}
	}
if(isset($_POST['submit'])){
        
require "PdfToText-master/PdfToText.phpclass";

//$caste=$_POST["caste"];
$university=$_POST["university"];
$year=$_POST["year"];
$path=$_POST["path"];



mysqli_query($conn,"create table if not exists $university(year int,name varchar(40),address varchar(40),branch varchar(40),OPEN int,SC int,ST int,NT int,VJ int,OBC int,TFWS int,PWD int, Primary Key(year,name,branch));");


$pdfvar=new PdfToText($path);

$data=$pdfvar->Text;

//echo $data;

//$words=str_word_count($data);

$parts=explode(" ",$data);

//echo sizeof($parts);

$count=0;;

for($i=11;$i<sizeof($parts)-12;$i++)
{
  $name=trim($parts[$i]);
  $address=$parts[$i + 1];
  $branch=$parts[$i + 2];
  
  $openperc=$parts[$i + 3];
  $scperc=$parts[$i + 4];
  $stperc=$parts[$i + 5];
  $ntperc=$parts[$i+6];
  $vjperc=$parts[$i + 7];
  $obcperc=$parts[$i + 8];
  $tfwsperc=$parts[$i + 9];
  $pwdperc=$parts[$i + 10];
  $i=$i+10;
  if(mysqli_query($conn,"insert into $university values('$year','$name','$address','$branch','$openperc','$scperc','$stperc','$ntperc','$vjperc','$obcperc','$tfwsperc','$pwdperc');"))
  {

  }

  $count++;

}

$res=mysqli_query($conn,"select * from universities where Name='$university';");
if(mysqli_num_rows($res)==0)
{
  mysqli_query($conn,"insert into universities values('$university','$count');");
}
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

                

                <h3>Predict My College</h3>
                <p>SPPU</p>
				
        <form method="post" action="postaddsppu.php">
      <center>Year ?
      <select name="year">
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="Show all">Show all</option>
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
        <th class="text-center">Address</th>
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
	include 'db.php';
  $sql;
	if($year=="Show all")
  {
    $sql="SELECT * FROM SPPU;";  
  }
  else
  {
    $sql="SELECT * FROM SPPU where year='$year';";  
  }
	

	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{?>
			  <tr>
          <td><?php echo $row['year']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['branch']; ?></td>
        <td><?php echo $row['OPEN']; ?></td>
        <td><?php echo $row['SC']; ?></td>
        <td><?php echo $row['ST']; ?></td>
        <td><?php echo $row['NT']; ?></td>
        <td><?php echo $row['OBC']; ?></td>
        <td><?php echo $row['TFWS']; ?></td>
        <td><?php echo $row['PWD']; ?></td>
      </tr>
		<?php }}?>
     
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
