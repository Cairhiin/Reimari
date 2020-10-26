(function() {
  var app = angular.module('tekstarit', ['ngRoute', 'ngSanitize']);

  app.controller('CommentController', ['$scope', '$http', '$routeParams', function($scope, $http, $routeParams) {
    this.offset = 0;
    this.setOffset = function(setOffset){
    	this.offset += setOffset;
    };

    $http.get('http://www.reimari.fi/wp-json/wp/v2/posts?categories=40&orderby=date&offset=' + this.offset).then(successCallback, errorCallback);

	function successCallback(res){
    	$scope.posts = res.data;
    	
	}
	function errorCallback(error){
    	tekstarit.data = error;
	}

  }]);
})();