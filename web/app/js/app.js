angular.module('CompetitionsApp', ['competitionsServices']).
  config(['$routeProvider', function($routeProvider) {
  $routeProvider.
      when('/', {templateUrl: 'partials/list.html', controller: CompetitionsCtrl}).
      otherwise({redirectTo: '/'});
}]);