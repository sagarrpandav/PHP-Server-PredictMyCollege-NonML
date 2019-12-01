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
                <form method="post" action="postaddshivaji.php">
					<div class="row">
						<div class="col-sm-3">University :</div>
						<div class="container col-sm-3">
							<select name="university">
								<option value="SPPU">SPPU</option>
								<option value="SHIVAJI">Shivaji</option>
								<option value="MUMBAI">Mumbai</option>
							</select>
						</div>
						<div class="col-sm-3">Cut-Off List for Year ?</div>
						<div class="col-sm-3">
							<select name="year">
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
							</select>
						</div>
					</div> 
					<br>

					<div class="row">
						<div class="col-sm-3">Select File :</div>
						<div class="container col-sm-3">
							<input type="file" name="path">
						</div>
					</div> 
					<br>
					<br>
					<br>
					<br>
					<br>
					<div class="col-md-12 text-center"> 
						<button input = "button"  class = "btn btn-primary  center-block" name="submit">Submit</button>
					</div>
		</form>
                        <form method="post" action="postaddshivaji.php">
                    <div class="row">
                    <div class="col-md-12 text-center">
                    <br>
                    <h4>Insert Record Manually</h4>
                    <br>
                    <br>
                    <div class="row">
					<div class="col-sm-3">University :</div>
						<div class="container col-sm-3">
							<select name="university" required="">
                                                                <option value="">Select University</option>
								<option value="SPPU">SPPU</option>
								<option value="SHIVAJI">Shivaji</option>
								<option value="MUMBAI">Mumbai</option>
							</select>
						</div>
                                        <div>
					<div class="col-sm-3">Cut-Off List for Year ?</div>
                                               <div class="col-sm-3" required="">
                                                    <select name="year">
                                                            <option value="">Select Year</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            </select>
                                                </div>
                                         </div> 
					
                    <br>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">College Name:   </lable>
                    <input class="col-md-3 text-center" type="text" name="name" value=""  style="height:5%;margin-top:12px" required =""/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;">Address:   </lable>
                    <input class="col-md-3 text-center" type="text" name="address" value="" required style="height:5%;"/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">Branch :   </lable>
                    <input class="col-md-3 text-center" type="text" name="branch" value="" required style="height:5%;margin-top:12px"/>
                    <br>
                    <lable  class="col-md-3 text-right" style="height:5%;">OPEN  :    </lable>
                    <input class="col-md-3 text-center" type="number" name="open" value="" required style="height:5%;"/>
                   
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">SC     :   </lable>
                    <input class="col-md-3 text-center" type="number" name="sc" value="" required style="height:5%;margin-top:12px"/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">ST    :    </lable>
                    <input class="col-md-3 text-center" type="number" name="st" value="" required style="height:5%;margin-top:12px"/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">NT     :   </lable>
                    <input class="col-md-3 text-center" type="number" name="nt" value="" required style="height:5%;margin-top:12px"/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">VJ    :   </lable>
                    <input class="col-md-3 text-center" type="number" name="vj" value="" required style="height:5%;margin-top:12px"/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">OBC     :   </lable>
                    <input class="col-md-3 text-center" type="number" name="obc" value="" required style="height:5%;margin-top:12px"/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">TFWS   :   </lable>
                    <input class="col-md-3 text-center" type="number" name="tfws" value="" style="height:5%;margin-top:12px" required/>
                    <br>
                    <lable class="col-md-3 text-right" style="height:5%;margin-top:12px">PWD    :   </lable>
                    <input class="col-md-3 text-center" type="number" name="pwd" value="" required style="height:5%;margin-top:12px"/>
                    <br>
             
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                         <input type = "submit"  class = "btn btn-primary  " name="insert" value = "Insert" onclick="myFunction()">
                        <input type = "reset"  class = "btn btn-primary  " name="reset" value = "Reset">
                       
                    </div>
                    </div>
                    </div>
		</form>

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
	   </div>
               </div>
                  </div>
 
    </body>
</html>