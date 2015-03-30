var logApp = angular.module("app", ["ui.router", "ngResource"]);

logApp.config(function($stateProvider, $urlRouterProvider) {
    
    $urlRouterProvider.otherwise('/home');
    
    $stateProvider
        
        // HOME STATES AND NESTED VIEWS ========================================
        .state('home', {
            url: '/home',
            templateUrl: 'app/components/logger/partial-home.html',
            controller: 'HomeCtrl'
        })
        
         
        // nested list with custom controller
        .state('edit', {
            url: '/edit/:id',
            templateUrl: 'app/components/logger/partial-edit.html',
            controller: 'EditCtrl'
        })
        
        // nested list with custom controller
        .state('create', {
            url: '/create',
            templateUrl: 'app/components/logger/partial-create.html',
            controller: 'CreateCtrl'
        })
        
});


logApp.controller('HomeCtrl', 'Logger', ['$scope', 'Logger', '$route', function($scope, Logger, $route) {
    
    $scope.message = 'test';
   
    $scope.scotches = [
        {
            name: 'Macallan 12',
            price: 50
        },
        {
            name: 'Chivas Regal Royal Salute',
            price: 10000
        },
        {
            name: 'Glenfiddich 1937',
            price: 20000
        }
    ];
    
}]);

logApp.controller('EditCtrl', ['$scope', 'Logger', '$routeParams', function($scope, Logger, $routeParams) {


}]);

logApp.controller('CreateCtrl', ['$scope', 'Logger', '$routeParams', function($scope, Logger, $routeParams) {


}]);
