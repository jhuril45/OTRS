app.controller('Tech_Staff_Controller', function($scope,$http) {
	console.log("Tech_Staff_Controller");
	
	$scope.Get_Tickets = function(){
		$http({
        method : "GET",
        url : 'techstaff/Get_Tickets/',
        data: {},
    	}).then(function mySuccess(response) {
        console.log(response.data);
        $scope.List_Tickets = response.data;
    	}, function myError(response) {
        console.log(response);
    	});
    	// setTimeout($scope.Check_Ticket, 1000);
	}

});