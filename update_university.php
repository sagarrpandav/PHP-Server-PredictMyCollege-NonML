<?php
session_start();
include 'db.php';
$university;
$name;
$year;
$address;
$branch;
$OPEN;
$SC;
$ST;
$NT;
$OBC;
$TFWS;
$PWD;
        if(!isset($_POST['update']) && !isset($_POST['delete']))
         {
             $url=basename($_SERVER['REQUEST_URI']);
                $parts=parse_url($url);
                parse_str($parts['query'], $query);
               $university = $_SESSION["university"] = $query['university'];
                $year =  $_SESSION["year"] = $query['year'];
                $name = $_SESSION["name"] = $query['name'];
                $address = $_SESSION["address"] = $query['address'];
                $branch = $_SESSION["branch"] = $query['branch'];
                $OPEN = $_SESSION["OPEN"] = $query['OPEN'];
                $SC = $_SESSION["SC"] = $query['SC'];
                $ST = $_SESSION["ST"] = $query['ST'];
                $NT = $_SESSION["NT"] = $query['NT'];
                $OBC = $_SESSION["OBC"] = $query['OBC'];
                $TFWS = $_SESSION["TFWS"] = $query['TFWS'];
                $PWD = $_SESSION["PWD"] = $query['PWD'];
                 
        }
        
 if(isset($_POST['update']))
     {
    // echo $_SESSION["university"];
     $university = $_SESSION["university"];
     //echo $university;
     $year = $_SESSION["year"];
     $name = $_SESSION["name"];
     $address = $_SESSION["address"];
     $branch = $_SESSION["branch"];
     $OPEN = $_POST['open'];
     $SC = $_POST['sc'];
     $ST = $_POST['st'];
     $NT = $_POST['nt'];
     $OBC = $_POST['obc'];
     $TFWS = $_POST['tfws'];
     $PWD = $_POST['pwd'];
     
        $result = "UPDATE `$university` SET `OPEN`='$OPEN',`SC`='$SC',`ST`='$ST',`NT`='$NT',`OBC`='$OBC',`TFWS`='$TFWS',`PWD`='$PWD' where `year`='$year' and `name`='$name' and `branch`= '$branch' and `address`='$address'";
        //echo $university;

        if($conn->query($result)==true)
        {
                echo '<script language="javascript">';
                echo 'function myFunction() { window.close(); }';
                echo 'alert("Successfully Updated")';
		echo '</script>';
	
        }
        else
        {
        echo '<script language="javascript">';
	echo 'alert("Updation Failed")';
	echo '</script>';
        }
 }
        
 if(isset($_POST['delete']))
 {
     // echo $_SESSION["university"];
     $university = $_SESSION["university"];
     //echo $university;
     $year = $_SESSION["year"];
     $name = $_SESSION["name"];
     $address = $_SESSION["address"];
     $branch = $_SESSION["branch"];
     $OPEN = $_POST['open'];
     $SC = $_POST['sc'];
     $ST = $_POST['st'];
     $NT = $_POST['nt'];
     $OBC = $_POST['obc'];
     $TFWS = $_POST['tfws'];
     $PWD = $_POST['pwd'];
     
        $result = "DELETE FROM `$university` where `year`='$year' and `name`='$name' and `branch`= '$branch' and `address`='$address'";
        //echo $university;

        if($conn->query($result)==true)
        {
                echo '<script language="javascript">';
                echo 'function myFunction() { window.close(); }';
		echo 'alert("Deleted Successfully")';
		echo '</script>';
	
        }
        else
        {
                echo '<script language="javascript">';
		echo 'alert("Deletion Failed")';
                echo 'close();';
		echo '</script>';
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
                            </ul>
                        </div>
                    </div>
                </nav>

                
                <h3>Predict My College</h3>
                <h4><?php echo $university;?> University</h4>
                
                <form method="post" action="update_university.php">
                    <div class="row">
                    <div class="col-md-12 text-center">
                    <br>
                    <br>
                    <lable style="width:250px;">Year : <?php echo $year; ?> </lable>
                    <lable style="width:250px;margin-left:150px">Name : <?php echo $name; ?> </lable>
                    <lable style="width:250px;margin-left:150px">Addres : <?php echo $address; ?> </lable>
                    <lable style="width:250px;margin-left:150px">Branch : <?php echo $branch; ?> </lable>
                    <br>
                    <br>
                    <br>
                    <br>
                    <lable  class="col-md-3 text-right" style="height:5%;">OPEN  :    </lable>
                    <input class="col-md-3 text-center" type="text" name="open" value="<?php echo $OPEN; ?> " required style="height:5%;"/>
                   
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">SC     :   </lable>
                    <input class="col-md-3 text-center" type="text" name="sc" value="<?php echo $SC; ?> " required style="height:5%;margin-top:12px"/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;">ST    :    </lable>
                    <input class="col-md-3 text-center" type="text" name="st" value="<?php echo $ST; ?> " required style="height:5%;"/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">NT     :   </lable>
                    <input class="col-md-3 text-center" type="text" name="nt" value="<?php echo $NT; ?> " required style="height:5%;margin-top:12px"/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;">OBC     :   </lable>
                    <input class="col-md-3 text-center" type="text" name="obc" value="<?php echo $OBC; ?> " required style="height:5%;"/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">TFWS   :   </lable>
                    <input class="col-md-3 text-center" type="text" name="tfws" value="<?php echo $TFWS; ?> " style="height:5%;margin-top:12px" required/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;">PWD    :   </lable>
                    <input class="col-md-3 text-center" type="text" name="pwd" value="<?php echo $PWD; ?> " required style="height:5%;"/>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                         <input type = "submit"  class = "btn btn-primary  " name="update" value = "Update" onclick="myFunction()">
                        <input type = "submit"  class = "btn btn-primary  " name="delete" value = "Delete">
                        <script>
                        
                        </script>
                    </div>
                    </div>
		</form>


		</div>
	

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