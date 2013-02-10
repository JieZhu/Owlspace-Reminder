<?php
  session_start();

  if(isset($_POST['user'])) {
    // call python job for CAS
    $command = '/Library/Frameworks/EPD64.framework/Versions/Current/bin/ipython ./scripts/python/auth.py ' . $_POST['user']['netid'] . ' ' . $_POST['user']['password'];
    if(exec($command, $retval)) {
      include_once('./scripts/php/db_utils.php');

      connectToDatabase();
      addUser($_POST['user']['netid'], $_POST['user']['password']);
      $_SESSION['netid'] = $_POST['user']['netid'];
    }
  }

  if(isset($_SESSION['netid'])) {
    header('Location: assignments.php');
  }
?>

<!DOCTYPE html>
 <html>
 <head>
         <meta charset="utf-8">
         <title>O+: OwlSpace Reminders</title>
         <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
         <script src="js/jquery-1.8.2.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="@Url.Content("~/Scripts/bootstrap-dropdown.js")" type="text/javascript"></script>
 </head>
 <body>
 
  <?php
    include_once('./scripts/php/navbar.php');
    getNav(basename($_SERVER['SCRIPT_NAME']));
  ?>

<div class="container">

<div class="hero-unit">
        <div class="row-fluid">
          <div class="span5">
                  <img src="images/landing_page.jpg" class="img-rounded">
                </div>
                <div class="span7">
                  <h1><font face="Arial"><span><font color="White">Introducing O+</font></span><br> An Assignment Management<br> Tool for OwlSpace</font></h1>
                </div>
        </div>
      </div>

         <div class="span3">
          <h2>Rice NetID and Password</h2>

    <form action="index.php" method="post" accept-charset="UTF-8">
              <input id="netid" style="margin-bottom: 15px;" type="text" name="user[netid]" placeholder="NetID" size="30" />  
              <input id="password" style="margin-bottom: 15px;" type="password" name="user[password]" placeholder="Password" size="30" />
              <button class="btn btn-primary" type="submit">Login</button>
    </form>
    </div><!-- .span3 -->
    
    
    
      <div class="span7 offset1">
        <br/><br/>
          <p align="justify"><font face="Arial" size="4">Having trouble remembering which assignments are due in which classes? Got a poor grade on a homework
          because you turned it in late? Afraid you'll miss an online quiz? O+ keeps track of all that for you!<br/><br/> Simply enter your NetID and Password,
          and O+ will automatically track your assignments, quizzes, and tests, and notify you before they are due.</font></p>
    </div><!-- .span6 -->
 </div><!-- .container -->
 
 
     
 </body>
</html>