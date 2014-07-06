angular.module('CompetitionsApp', ['competitionsServices', 'competitionsFilters', 'infinite-scroll']).
  config(['$routeProvider', function($routeProvider) {
  $routeProvider.
      when('/', {templateUrl: 'partials/list.html', controller: CompetitionsCtrl}).
      otherwise({redirectTo: '/'});
}]).controller('CompetitionsCtrl', CompetitionsCtrl);