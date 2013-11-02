angular.module('CompetitionsApp', []).
  config(['$routeProvider', function($routeProvider) {
  $routeProvider.
      when('/', {templateUrl: Routing.generate('competitions_frontend_list'), controller: CompetitionsCtrl}).
      otherwise({redirectTo: '/'});
}]);