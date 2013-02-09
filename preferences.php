<!DOCTYPE html>
 <html>
 <head>
         <meta charset="utf-8">
         <title>Preferences</title>
         <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
         <script src="bootstrap/js/jquery-1.8.2.min.js"></script> 
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <script src="bootstrap/js/controllers.js"></script>
 </head>
 <body>
 
    <div class="navbar">
    <div class="navbar-inner">
    <a class="brand" href="#">O+</a>
    <ul class="nav">
    <li><a href="#">Home</a></li>
    <li><a href="#">Assignments</a></li>
    <li class="active"><a href="#">Preferences</a></li>
    </ul>
    </div>
    </div>

 <div class="container">
         
         <div class="hero-unit">
         <h1>O+</h1>
         <p></p>
         <p><a class="btn btn-primary btn-large"> Update Preferences &raquo;</a></p>
         </div><!-- .hero-unit -->
         
        
 <div class="row-fluid">
         <div class="span4">
         <h2>Reminder Timing</h2>
         <p>How many hours before each deadline would you like O+ to remind you?</p>
         
        <div class="btn-group">
      <a class="btn dropdown-toggle" data-toggle="dropdown" data-target="#">
      Time
  <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
      <li><a href="#">1 Hour</a> </li> 
      <li><a href="#">2 Hours</a> </li>   
          <li><a href="#">3 Hours</a> </li>
        <li><a href="#">4 Hours</a> </li>
          <li><a href="#">5 Hours</a> </li>
          <li><a href="#">12 Hours</a> </li>
          <li><a href="#">1 Day</a> </li>
          <li><a href="#">3 Days</a> </li>
       </ul>
       </div><!-- .btn-group -->       
         </div><!-- .span4 -->
   
         <div class="span4">
   <h2>Delivery Method</h2>
         <p>Would you like to be notified by email, text message, or both?<br/></p>
         
          <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
        Notification
    <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Email</a> </li> 
        <li><a href="#">Text Message</a> </li>   
            <li><a href="#">Both (I'm Forgetful)</a> </li>
        </ul>
        </div><!-- .btn-group -->      
         
         </div><!-- .span4 -->
   
         <div class="span4">
         <h2>Change Email or Phone Number</h2>
         <p>How can O+ best reach you?<br/><p/>

    <form action="[YOUR ACTION]" method="post" accept-charset="UTF-8">
          <input id="email_address" style="margin-bottom: 15px;" type="text" name="user[email]" placeholder="Email Address" size="30" />  
          <input id="phone_number" style="margin-bottom: 15px;" type="text" name="user[phone]" placeholder="Phone Number" size="30" />
      </form>
      
         </div><!-- .span4 -->
   
 </div><!-- .row -->
 </div><!-- .container -->
 
 <script src="js/jquery-1.8.2.min.js"></script> 
 <script src="js/bootstrap.min.js"></script>
 <script src="@Url.Content("~/Scripts/bootstrap-dropdown.js")" type="text/javascript"></script>
     
 </body>
</html>