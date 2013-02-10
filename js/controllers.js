function PreferencesCtrl($scope, $http) {
  // loads current data for page
  function loadCurrent() {

  }
  // $http.post(
  //   '../scripts/php/get_owlspace.php', 
  //   {netid: $scope.netid, pass: $scope.pass}
  // ).success(function(data)) {
  //   $scope.rows = data.rows; $scope.columns = data.columns;
  // };

  $scope.numDays = 0;

  $scope.changeDays = function(numDays) {
    $scope.numDays = numDays;
  }
}