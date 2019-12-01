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
                                <li><a href="addmumbai.php">Add</a></li>
                              
                            </ul>
                        </div>
                    </div>
                </nav>
                

                <h3>Predict My College</h3>
                <p>Mumbai</p>
		    <!-- jQuery CDN -->

        <form method="post" action="mumbai.php">
      <center>Year ?
      <select name="year">
      <option value="Show all">Show all</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>

          
      </select>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
      <div class="col-md-12 text-center"> 
          <button input = "button"  class = "btn btn-primary  center-block" name="submit">Submit</button>
      </div>
      <br>
      
    </form>
	</div>
	</div>
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
