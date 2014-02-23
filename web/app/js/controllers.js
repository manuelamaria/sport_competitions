function CompetitionsCtrl($scope, Competition) {
  $scope.filters = [];  
    
  $scope.competitions = [];  
  $scope.pagedCompetitions = [];
  $scope.currentPage = 0;
  
  
  
  $scope.search = function () {
      $scope.competitions = Competition.query({'filter' : JSON.stringify($scope.filters)}, function () { $scope.paginate(); });
      
  }
  
  
  var itemsPerPage = 5;
  $scope.paginate = function () {
      $scope.pagedCompetitions = [];
      $scope.currentPage = 0;
      
      for (var i = 0; i < $scope.competitions.length; i++) {
      if (i % itemsPerPage === 0) {
        $scope.pagedCompetitions[Math.floor(i / itemsPerPage)] = [ $scope.competitions[i] ];
      } else {
        $scope.pagedCompetitions[Math.floor(i / itemsPerPage)].push($scope.competitions[i]);
      }

    }
    $scope.finishedPagination = true;
  }
 
  $scope.setPage = function(n) {
      $scope.currentPage = n;
  }
  
  $scope.prevPage = function () {
    if ($scope.currentPage > 0) {
      $scope.currentPage--;
    }
  };

  $scope.nextPage = function () {
    if ($scope.currentPage < $scope.pagedCompetitions.length - 1) {
      $scope.currentPage++;
    }
  };
  
  $scope.toggleFilter = function (c) {
    var index = $scope.filters.indexOf(c);
    if ( index === -1)  {
      $scope.filters.push(c);
    } else {
      $scope.filters.splice(index, 1);
    }
    $scope.search();
  }
 
}
 
var competitionsApp = angular.module('CompetitionsApp',['competitionsServices']);
competitionsApp.controller('CompetitionsCtrl', CompetitionsCtrl);
