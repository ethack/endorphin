var endorphinApi = '/api/v1';
var endorphinApp = angular.module("endorphin", ['ngRoute'])
.config(function($routeProvider) {
	$routeProvider
	.when('/', {
		// controller: 'endorphinMapController'
	})
	.otherwise({
    	redirectTo:'/404'
  	});
}).service('endorphinNetService', ['$rootScope', '$http', function($rootScope, $http) {
  this.apiGet = function(url, callback) {
    $http({method: 'GET', url: endorphinApi + url}).
      success(function(data, status, headers, config) {
        callback(status, data);
      }).
      error(function(data, status, headers, config) {
        callback(status, data);
      });
  };

  this.apiPost = function(url, data, callback) {
    $http.post(endorphinApi + url, data).
      success(function(data, status, headers, config) {
        callback(status, data);
      }).
      error(function(data, status, headers, config) {
        callback(status, data);
      });
  };

  this.apiPut = function(url, data, callback) {
    $http.put(endorphinApi + url, data).
      success(function(data, status, headers, config) {
        callback(status, data);
      }).
      error(function(data, status, headers, config) {
        callback(status, data);
      });
  };

  this.apiDelete = function(url, callback) {
    $http.delete(endorphinApi + url).
      success(function(data, status, headers, config) {
        callback(status, data);
      }).
      error(function(data, status, headers, config) {
        callback(status, data);
      });
  };
}]);