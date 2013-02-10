<?php
  session_start();

  if(!isset($_SESSION['netid'])) {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html ng-app>
<head>
  <title>Owlspace Assignments</title>

  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
  <?php
    include_once('./scripts/php/navbar.php'); 
    getNav(basename($_SERVER['SCRIPT_NAME']));
  ?>

<div class="span6">
	<div class="hero-unit">
    <h1><font color="White">Current Assignments</font></h1>
	<br/>
    <p><font size="3">To the right is a list of all your assignments that O+ is currently tracking. <br/><br/>Please ensure that your OwlSpace is configured to display tabs for all of your current classes. A user with 4 classes on OwlSpace would see something like this:<br/> <br/><img src="images/tab_demo.png"> <br/><br/> If you do not see a recently posted assignment, please allow some time for it to be integrated into the O+ database.</font></p>
    </div>
</div>

<div class="span10">
        <?php
          include_once('./scripts/php/db_utils.php');
          connectToDatabase();

          $assignments = getAssignments($_SESSION['netid']);

          echo '<table class="table table-bordered">
                  <tr>
                    <td></td>
                    <td>Class</td>
                    <td>Assignment</td>
                    <td>Due Date</td>
                  </tr>';

          foreach ($assignments as $key => $assignment) {
            echo '<tr>
                    <td></td>
                    <td>', $assignment['class'], '</td>
                    <td>', $assignment['assignment'], '</td>
                    <td>', $assignment['deadline'], '</td>
                  </tr>';
          }

          echo '</table>';
        ?>
</div>

</body>
</html>