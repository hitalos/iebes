var app = angular.module('iebesApp', ['ngRoute']);
app.config(function($routeProvider){
	$routeProvider.
	when('/', {
		controller: 'MembrosController',
		templateUrl: 'templates/busca.html'
	}).
	when('/aniversariantes',{
		controller: 'AniversariantesController',
		templateUrl: 'templates/aniversariantes.html'
	}).
	otherwise({
		redirectTo: '/'
	});
});

app.controller('MembrosController', function($scope, $http){
	$http.get('/api/').success(function(data, status, headers, config) {
    	 $scope.membros = data;
    }).
    error(function(data, status, headers, config) {
		console.info('Erro ao retornar lista de membros');
    });
});

app.controller('AniversariantesController', function($scope, $http){
	$http.get('/api/?aniversariantes').success(function(data, status, headers, config) {
    	 $scope.aniversariantes = data;
    }).
    error(function(data, status, headers, config) {
		console.info('Erro ao retornar lista de membros');
    });
});
