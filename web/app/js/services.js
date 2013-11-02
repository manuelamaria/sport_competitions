angular.module('competitionsServices', ['ngResource']).
    factory('Competition', function($resource){
        return $resource('app_dev.php/competition/list/:filter', {}, {
            query: {method:'GET', params:{}, isArray:true}
        });
});


