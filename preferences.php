<?php
  session_start();
?>

<!DOCTYPE html>
 <html ng-app>
 <head>
         <meta charset="utf-8">
         <title>Preferences</title>
		 <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
         <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

 </head>
 <body>
 
  <?php
    include_once('./scripts/php/navbar.php'); 
    getNav(basename($_SERVER['SCRIPT_NAME']));
  ?>
 <div class="container" ng-controller="PreferencesCtrl">
         
         <div class="hero-unit">
         <h1><font color="White">O+ Settings</font></h1>
         <p></p>
         <p><a class="btn btn-primary btn-large"> Update Preferences &raquo;</a></p>
         </div><!-- .hero-unit -->
         
        
 <div class="row-fluid">
   
         <div class="span4 offset">
   <h2>Text Messaging</h2>
         <br/><p>Would you like to be notified by SMS? <br/></p>
         <br/>
		<div class="btn-group">
        	<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
<<<<<<< HEAD
       		Notification 		
    			<span class="caret"></span>
        	</a>
        	<ul class="dropdown-menu">
          		<li><a href="#">Yes</a> </li> 
        		<li><a href="#">No</a> </li>
=======
       		{{numDays}}
    			<span class="caret"></span>
        	</a>
        	<ul class="dropdown-menu">
          		<li><a href="#" ng-click="changeDays(5)">5 dayz</a> </li> 
        		<li><a href="#" ng-click="changeDays(3)">3 dayz</a> </li>
			<li><a href="#" ng-click="changeDays(1)">1 day...z</a></li>  
>>>>>>> 3528b7e6901f02bfb6c4c1e056532e72c5d9feef
        	</ul>    
         </div><!-- .buttongroup -->

         </div><!-- .span4 -->

         <div class="span4">
         <h2>Change Phone Number</h2>
         <p>How can O+ best reach you?<br/><p/>

    <form action="preferences.php" method="post" accept-charset="UTF-8">
          <input id="phone_number" style="margin-bottom: 15px;" type="text" name="user[phone]" placeholder="Phone Number" size="30" />
      </form>

	</div><!-- .span4 -->

		<div class="span4 offset">
 			<h2>Test Delivery</h2>
       		<br/><p>Asks O+ to deliver a test email or SMS.<br/></p> 
       <br/>
        <div class="btn-group">
      <a class="btn" href="#">
      Test
      </a>
      
       
       </div><!-- .span4 -->
      
         
   </div><!-- .row -->
 </div><!-- .container -->
 

  <script src="./js/controllers.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="http://code.angularjs.org/1.1.2/angular.min.js"></script>
 </body>
</html>