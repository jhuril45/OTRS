app.controller('Operator_Controller', function($scope,$http) {
	console.log("Operator_Controller");

	$scope.Submit_Ticket = function(Service_Id,Comment){

		Swal.fire({
                  title: 'Submit',
                  text: "Submit Ticket?",
                  icon: 'question',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes!'
                }).then((result) => {
                    if(result.value){
                        try{
                        Swal.fire({
                        title: "Submitting...",
                        text: "Please wait",
                        imageUrl: "../img/loader2.gif",
                        showConfirmButton: false,
                        allowOutsideClick: false
                        });
                    $http({
				            method : "POST",
				            url : 'operator/Submit_Ticket',
				            data: {Service_Id:Service_Id,Comment:Comment},
				        	}).then(function mySuccess(response) {
                    Swal.close();
                    Swal.fire(
                          'Good job!',
                          'Service Successfully Added!',
                          'success'
                        );
                    $("#Add_Ticket_Modal").modal("hide");
				            console.log(response.data);
				        	}, function myError(response) {
                    Swal.close();
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Error'+response.status+' '+response.statusText,                          
                        })
				            console.log(response);
				        	});
                        }catch(err){
                        	console.log(err);
                        }
                    }
                });
	}

  $scope.Initiate_Add_Ticket = function(){
    $http({
        method : "GET",
        url : 'operator/Get_Services',        
      }).then(function mySuccess(response) {
        console.log(response.data);
        $scope.List_Services = response.data;
        $scope.Service_Id = $scope.List_Services[0].service_id;
      }, function myError(response) {
        console.log(response);
      });
  }

	$scope.Check_Ticket = function(){
		$http({
        method : "POST",
        url : 'operator/Check_Ticket',
        data: {},
    	}).then(function mySuccess(response) {
        console.log(response.data);
        if(response.data == "Jhuril"){
        	alert("Sakto");
        }
    	}, function myError(response) {
        console.log(response);
    	});
    	// setTimeout($scope.Check_Ticket, 1000);
	}

  

	$scope.Check_Ticket();
});