<!DOCTYPE html>
<html ng-app>
<head>
  <title>Owlspace Assignments</title>

  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
  <div class="navbar">
    <div class="navbar-inner">
      <a class="brand" href="#">O+</a>
      <ul class="nav">
        <li><a href="#">Home</a></li>
        <li class="active"><a href="#">Assignments</a></li>
        <li><a href="#">Preferences</a></li>
      </ul>
    </div>
  </div>

<!--   <div ng-controller="AssignmentsCtrl">
    <div class="container-fluid">
      <table class="table table-striped">
        <tr>
          <td ng-repeat="column in columns"><b><a ng-click="chooseSort(column)" href="#">{{column}} <i ng-class="SelectedCol(column)"></a></i></b></td>
        </tr>
        <tr ng-repeat="row in rows | orderBy:sort.column">
          <td ng-repeat="column in columns"><div ng-bind-html-unsafe="row[column]"></div></td>
        </tr>
      </table>
    </div>
  </div> -->

<script src="http://code.angularjs.org/1.1.2/angular.min.js"></script>
<script src="./js/controllers.js"></script>
</body>
</html>