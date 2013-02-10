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
</body>
</html>