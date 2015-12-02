(function(){

	var twitterApp = angular.module('twitterApp', ['ngSanitize', 'twitterApp.services']);




	twitterApp.controller('searchController', ['$scope', '$http', '$q', 'twitterService', searchController]);	

	function searchController($scope, $http, $q, twitterService) {    

		$scope.tweets = []; //array of tweets
		twitterService.initialize();

        $scope.query = $scope.resultsearch = "";
        $scope.rateLimitError = false;
        $scope.connectedTwitter = false;

        $scope.searchTwitter = function() {

	        twitterService.connectTwitter().then(function() {
	            if (twitterService.isReady()) {

					twitterService.searchTweetsCustom($scope.query).then(function(data) {
					    	$scope.tweets = $scope.tweets.concat(data.statuses);

					    	$scope.connectedTwitter = true;

						}, function() {
					    	$scope.rateLimitError = false;
						});

	            } else {
            		$scope.rateLimitError = true;
	            }
	        });

        };

	}

})(); 
