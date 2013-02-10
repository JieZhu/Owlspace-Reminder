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


  $scope.notification = 'No';
  $scope.numDays = 0;

  $scope.changeNotification = function(preference) {
    $scope.notification = preference;
  }

  $scope.changeDays = function(numDays) {
    $scope.numDays = numDays;
  }

  $scope.testEmailSMS = function() {
    $http({
      url: './scripts/php/testEmailSMS.php',
      method: 'GET'
    }).success(function() {
      // something
    });   
  }
}