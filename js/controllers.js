function AssignmentsCtrl($scope, $http) {
  $http.post(
    '../scripts/php/get_owlspace.php', 
    {netid: $scope.netid, pass: $scope.pass}
  ).success(function(data)) {
    $scope.rows = data.rows; $scope.columns = data.columns;
  };

  // $http({
  //   url: '../scripts/php/get_owlspace.php',
  //   method: 'POST',
  //   params: {table: $scope.choice, index: $scope.index, viewingSize: $scope.viewingSize, descending: $scope.sort.descending}
  // }).
  // success(function(data) {
  //   $scope.rows = data.rows; $scope.columns = data.columns;

  //   // convert the id's to an int, so we can sort it
  //   for(var i=0; i<$scope.rows.length; i++) {
  //     $scope.rows[i]['id'] = parseInt($scope.rows[i]['id']);
  //   }
  // });
}