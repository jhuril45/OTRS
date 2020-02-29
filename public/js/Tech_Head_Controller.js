app.controller('Tech_Head_Controller', function($scope,$http) {
	console.log("Tech_Head_Controller");
	
    $scope.Get_Services = function(){
        $("#list_services").attr("hidden",false);
        $("#list_tickets").attr("hidden","hidden");
        $("#list_catered_tickets").attr("hidden","hidden");
        
        $http({
        method : "GET",
        url : 'tech_head/Get_Services',        
        }).then(function mySuccess(response) {
        console.log(response.data);
        $scope.List_Services = response.data;
        }, function myError(response) {
        console.log(response);
        });
    }

    $scope.Get_Tickets =function(){
        $("#list_services").attr("hidden","hidden");        
        $("#list_catered_tickets").attr("hidden","hidden");
        $("#list_tickets").attr("hidden",false);
        $scope.List_Tickets = [];
        $http({
        method : "GET",
        url : 'tech_head/Get_Tickets',
        data: {},
        }).then(function mySuccess(response) {        
        $scope.List_Tickets = response.data;
        }, function myError(response) {
        console.log(response);
        });
        $scope.Ticket_Type = 0;
    }

    $scope.Get_Cater_Tickets = function(){
        $("#list_services").attr("hidden","hidden");        
        $("#list_tickets").attr("hidden","hidden");
        $("#list_catered_tickets").attr("hidden",false);
        $http({
        method : "GET",
        url : 'tech_head/Get_Cater_Tickets',
        data: {},
        }).then(function mySuccess(response) {        
        $scope.List_Catered_Tickets = response.data;
        }, function myError(response) {
        console.log(response);
        });
    }

    $scope.Submit_Service = function(service_name,service_deadline){
        Swal.fire({
                  title: 'Submit',
                  text: "Submit Service?",
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
                        url : 'tech_head/Submit_Service',
                        data: {service_name : service_name, service_deadline : service_deadline},
                        }).then(function mySuccess(response) {
                        Swal.close();
                        Swal.fire(
                          'Good job!',
                          'Service Successfully Added!',
                          'success'
                        );
                        $scope.List_Services = response.data;
                        $("#Add_Service_Modal").modal("hide");
                        $scope.service_name = "";
                        $scope.service_deadline = "";
                        }, function myError(response) {
                        Swal.close();
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Error'+response.status+' '+response.statusText,                          
                        })

                        console.log(response);
                        });
                    }
                });
        
    }
    

});