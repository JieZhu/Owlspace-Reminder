function PreferencesCtrl($scope, $http) {
  $http.post(
    '../scripts/php/get_owlspace.php', 
    {netid: $scope.netid, pass: $scope.pass}
  ).success(function(data)) {
    $scope.rows = data.rows; $scope.columns = data.columns;
  };

}