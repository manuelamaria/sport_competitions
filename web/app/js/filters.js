angular.module('competitionsFilters', [])
    .filter('starred', function() {
        
        return function(c) {
            if (localStorage['fav']) {
                var favorites = JSON.parse(localStorage['fav']);

                var index = favorites.indexOf(c);
                if (index !== -1) {
                    return 'Unstarr';
                }
            }
            return 'Starr';
        }
    })
    .filter('getFavorites', function() {
            
        return function(comps, enabled) {
            if (!enabled) return comps;
            
            var favorites = JSON.parse(localStorage['fav']);
            var result = [];
            for (var i=0; i<comps.length; i++) {
                if (favorites.indexOf(comps[i].id) !== -1) {
                    result.push(comps[i]);
                }
            }
            return result;
        }
    })
    

