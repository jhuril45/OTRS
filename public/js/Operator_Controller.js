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
                    $scope.Get_Tickets();
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

  $scope.Get_Tickets = function(){
    $http({
        method : "GET",
        url : 'operator/Get_Tickets',        
      }).then(function mySuccess(response) {
        console.log(response.data);
        $scope.List_Ticket = response.data;
        a = $scope.List_Ticket.length;
        for(i = 0; i < a; i++){
          hr = 0;
          min = 0;
          day_check = 0;
          if($scope.List_Ticket[i].time_passed > 60){
            while($scope.List_Ticket[i].time_passed > 60){
              if($scope.List_Ticket[i].time_passed > 60){
              $scope.List_Ticket[i].time_passed = $scope.List_Ticket[i].time_passed - 60;
                hr = hr + 1;
              }  
            }
            min = $scope.List_Ticket[i].time_passed;
            if(hr >= 24){
              day = 0;
              day_check = 0;
              while(hr >= 24){
                hr = hr -24;
                day = day + 1;
              }
              if(day > 1){
                $scope.List_Ticket[i].time_passed = day+" days ago";  
              }else{
                $scope.List_Ticket[i].time_passed = day+" day ago";  
              }
              
            }else{
              if(hr > 1){
                $scope.List_Ticket[i].time_passed = hr+" hours and "+min+" minutes ago";
              }else{
                $scope.List_Ticket[i].time_passed = hr+" hour and "+min+" minutes ago";
              }
              
            }            
          }else if($scope.List_Ticket[i].time_passed == 0){
            $scope.List_Ticket[i].time_passed = "Few Seconds Ago";
          }else if($scope.List_Ticket[i].time_passed > 0 && $scope.List_Ticket[i].time_passed < 60 && $scope.List_Ticket[i].time_passed > 1){
            $scope.List_Ticket[i].time_passed = $scope.List_Ticket[i].time_passed+" minutes ago";
          }else if($scope.List_Ticket[i].time_passed > 0 && $scope.List_Ticket[i].time_passed < 60 && $scope.List_Ticket[i].time_passed == 1){
            $scope.List_Ticket[i].time_passed = $scope.List_Ticket[i].time_passed+" minute ago";
          }
        }
        $scope.List_Tickets = $scope.List_Ticket;
        setTimeout(function(){ $scope.Get_Tickets();}, 5000);
      }, function myError(response) {
        console.log(response);
        setTimeout(function(){ $scope.Get_Tickets();}, 5000);
      }); 
  }

	$scope.Check_Ticket = function(){
		$http({
        method : "PATCH",
        url : 'operator/Check_Ticket',
        data: {},
    	}).then(function mySuccess(response) {
        console.log(response.data);
        // $scope.Check_Ticket();
        setTimeout(function(){ $scope.Check_Ticket();}, 1000);
    	}, function myError(response) {
        console.log(response);
        setTimeout(function(){ $scope.Check_Ticket();}, 1000);
    	});
    	
	}
  


	$scope.Check_Ticket();
});