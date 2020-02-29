app.controller('Tech_Staff_Controller', function($scope,$http) {
	console.log("Tech_Staff_Controller");
	
    $scope.List_Ticket =function(){
        $("#List_Catered_Tickets").attr("hidden","hidden");
        $("#List_Tickets").attr("hidden",false);
        $scope.List_Tickets = [];
        $http({
        method : "GET",
        url : 'tech_staff/Get_Tickets',
        data: {},
        }).then(function mySuccess(response) {
        console.log(response.data);
        $scope.List_Tickets = response.data;
        }, function myError(response) {
        console.log(response);
        });
        $scope.Ticket_Type = 0;
    }

	$scope.Get_Tickets = function(){
		$http({
        method : "GET",
        url : 'tech_staff/Get_Tickets',        
    	}).then(function mySuccess(response) {
        console.log(response.data);
        $scope.List_Tickets = response.data;
    	}, function myError(response) {
        console.log(response);
    	});
        $scope.Ticket_Type = 0;
	}

    $scope.View_Address_Ticket = function(List){
        $scope.Specific_Address_Ticket = List;
        console.log(List);
    }

    $scope.Finish_Ticket =function(comment,ticket_id){
        Swal.fire({
        title: 'Submit',
        text: "Submit Ticket as Finished?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        }).then((result) => {
        if(result.value){
            Swal.fire({
            title: "Submitting...",
            text: "Please wait",
            imageUrl: "../img/loader2.gif",
            showConfirmButton: false,
            allowOutsideClick: false
            });
            $http({
            method : "POST",        
            url : 'tech_staff/Finish_Ticket',
            data : {comment : comment, ticket_id : ticket_id},
            }).then(function mySuccess(response) {
            console.log(response.data);
            Swal.close();
            Swal.fire(
              'Good job!',
              'Ticket Successfully Finished!',
              'success'
            );
            $("#Address_Ticket_Modal").modal("hide");
            $scope.List_Tickets = response.data;
            }, function myError(response) {
            console.log(response);
            Swal.close();
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Error'+response.status+' '+response.statusText,                          
            })
            });

        }
        });
        
        
    }

    $scope.List_Cater_Ticket = function(){
        $("#List_Tickets").attr("hidden","hidden");
        $("#List_Catered_Tickets").attr("hidden",false);
        
        $scope.List_Tickets = [];
        $http({
        method : "GET",
        url : 'tech_staff/List_Cater_Ticket',
        data: {},
        }).then(function mySuccess(response) {
        console.log(response.data);
        $scope.List_Tickets = response.data;
        }, function myError(response) {
        console.log(response);
        });
        $scope.Ticket_Type = 1;
    }

    $scope.Check_Ticket = function(){
        $http({
        method : "GET",
        url : 'tech_staff/Check_Ticket',
        data: {},
        }).then(function mySuccess(response) {
        console.log(response.data);
        if(response.data == "Match"){
            alert("Match");
            return 1;
        }
        }, function myError(response) {
        console.log(response);

        });
        // setTimeout($scope.Check_Ticket, 1000);
    }

    $scope.Cater_Ticket = function(ticket_id){
        $http({
        method : "POST",
        url : 'tech_staff/Cater_Ticket',
        data: {ticket_id:ticket_id},
        }).then(function mySuccess(response) {
        console.log(response.data);
        $scope.List_Tickets = response.data;
        }, function myError(response) {
        console.log(response);

        });
    }
  

    // $scope.Check_Ticket();

});