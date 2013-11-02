function CompetitionsCtrl($scope) {
  $scope.hi = 'Yo';
}
 
var competitionsApp = angular.module('CompetitionsApp',[], function($interpolateProvider) {
    $interpolateProvider.startSymbol('{ang');
    $interpolateProvider.endSymbol('ang}');
});
competitionsApp.controller('CompetitionsCtrl', CompetitionsCtrl);
