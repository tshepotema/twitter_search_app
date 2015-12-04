(function(){

	var twitterApp = angular.module('twitterApp', ['ngSanitize', 'twitterApp.services']);




	twitterApp.controller('searchController', ['$scope', '$http', '$q', 'twitterService', searchController]);	

	function searchController($scope, $http, $q, twitterService) {    

		$scope.tweets = []; //array of tweets
		twitterService.initialize();

        $scope.query = $scope.resultsearch = "";
        $scope.rateLimitError = false;
        $scope.connectedTwitter = false;

        $scope.retrieveSavedTweets = function() {
			$http.get('tweets/list').success(function(tweets) {
				$scope.tweets = null;
				if (tweets) {					
					$scope.connectedTwitter = true;
					$scope.tweets = tweets;					
				}
			})
			.error(function(errorData, status, headers, config) {
				$scope.connectedTwitter = false;
				console.log('failed to retrieve tweets/list !' + status);
			});
        };

        $scope.searchTwitter = function() {

	        twitterService.connectTwitter().then(function() {
	            if (twitterService.isReady()) {

					twitterService.searchTweetsCustom($scope.query).then(function(data) {
					    	//$scope.tweets = $scope.tweets.concat(data.statuses);

							$http.post('/tweets/save', data.statuses).
								success(function(successData, status, headers, config) {
				    				console.log('successfully posted to tweets/save !' + status);
				    				$scope.retrieveSavedTweets();
								})
								.error(function(errorData, status, headers, config) {
			    					$scope.connectedTwitter = false;
				    				console.log('failed to post to tweets/save !' + status);
								});

						}, function() {
					    	$scope.rateLimitError = false;
						});

	            } else {
            		$scope.rateLimitError = true;
	            }
	        });

        };

        $scope.retrieveSavedTweets();

	}

})(); 
