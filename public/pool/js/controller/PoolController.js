 
app.controller('poolController', function($scope,$http){
 
  $scope.pools = [];
 
	 $http.get('http://localhost/ytforum/public/api/pool').
	 success(function(data, status, headers, config) {
		 $scope.pools = data;	 
	 });
 
	$scope.addVote = function(pooloptions){
 		$http.get('http://localhost/ytforum/public/api/pooloption/addvote/'+ pooloptions.id).
			success(function(data, status, headers, config) {
				 pooloptions.vote++;
			});
	}
   
});
 