<?php
  function getNav($pagename) {
    echo '<div class="navbar">
            <div class="navbar-inner">
              <a class="brand" href="#">O+</a>
              <ul class="nav">';
    if(isset($_SESSION['netid'])) {
      if($pagename == 'assignments.php')
        echo '<li class="active"><a href="#">Assignments</a></li>';
      else
        echo '<li><a href="#">Assignments</a></li>';
      if($pagename == 'preferences.php')
        echo '<li class="active"><a href="#">Preferences</a></li>';
      else
        echo '<li><a href="#">Preferences</a></li>';    
      echo '<li><a href="./scripts/php/logout.php">Logout</a></li>';
    }
    else {
      echo '<li class="active"><a href="#">Login</a></li>';
    }
    echo '</ul>
          </div>
          </div>';
  }
?>