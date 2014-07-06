function CompetitionsCtrl($scope, Competition) {
    $scope.filters = [];
    $scope.favoritesEnabled = false;

    $scope.competitions = [];
    $scope.page = 0;
    $scope.itemsPerPage = 10;
    $scope.loading = false;

    if ((typeof localStorage['fav'] != 'undefined') && (localStorage['fav'].length > 0)) {
        $scope.favorites = JSON.parse(localStorage.getItem('fav'));
    } else {
        $scope.favorites = [];
    }

    $scope.search = function() {

        $scope.competitions = Competition.query({'filter': JSON.stringify($scope.filters),
            'offset': $scope.page * $scope.itemsPerPage,
            'limit': $scope.itemsPerPage});

    }

    $scope.loadNextPage = function() {
        if ($scope.loading)
            return;
        $scope.loading = true;

        $scope.page++;
        $scope.newPage = Competition.query({'filter': JSON.stringify($scope.filters),
            'offset': $scope.page * $scope.itemsPerPage,
            'limit': $scope.itemsPerPage}, function() {
            $scope.addNewPage();
        });
    }

    $scope.addNewPage = function() {
        for (var i = 0; i < $scope.newPage.length; i++) {
            $scope.competitions.push($scope.newPage[i]);
        }
        $scope.loading = false;
    }


    $scope.toggleFilter = function(c) {
        $scope.page = 0;
        var index = $scope.filters.indexOf(c);
        if (index === -1) {
            $scope.filters.push(c);
        } else {
            $scope.filters.splice(index, 1);
        }
        $scope.search();
    }

    $scope.toggleFav = function(c) {
        // add, remove to storage
        var index = $scope.favorites.indexOf(c);
        if (index === -1) {
            $scope.favorites.push(c);
        } else {
            $scope.favorites.splice(index, 1);
        }
        localStorage['fav'] = JSON.stringify($scope.favorites);
    }

    $scope.toggleFavFilter = function() {
        $scope.favoritesEnabled = !$scope.favoritesEnabled;
    }



}