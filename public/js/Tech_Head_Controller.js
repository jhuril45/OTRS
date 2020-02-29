app.controller('Tech_Head_Controller', function($scope,$http) {
	console.log("Tech_Head_Controller");
	
    $scope.Get_Services = function(){
        $("#list_services").attr("hidden",false);
        $("#list_tickets").attr("hidden","hidden");
        $("#list_catered_tickets").attr("hidden","hidden");
        $("#list_expired_tickets").attr("hidden","hidden");
        
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
        $("#list_expired_tickets").attr("hidden","hidden");
        $("#list_tickets").attr("hidden",false);        
        $http({
        method : "GET",
        url : 'tech_head/Get_Tickets',
        data: {},
        }).then(function mySuccess(response) {        
        $scope.List_Tickets = response.data;
        }, function myError(response) {
        console.log(response);
        });        
    }

    $scope.Get_Cater_Tickets = function(){
        $("#list_services").attr("hidden","hidden");        
        $("#list_tickets").attr("hidden","hidden");
        $("#list_expired_tickets").attr("hidden","hidden");
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

    $scope.View_Address_Ticket = function(List){
      
        $scope.Specific_Address_Ticket = List;
        console.log(List);
    }

    $scope.Get_Expired_Tickets = function(){
        $("#list_services").attr("hidden","hidden");        
        $("#list_tickets").attr("hidden","hidden");
        $("#list_catered_tickets").attr("hidden","hidden");
        $("#list_expired_tickets").attr("hidden",false);
        
        $http({
        method : "GET",
        url : 'tech_head/Get_Expired_Tickets',
        data: {},
        }).then(function mySuccess(response) {
        console.log(response.data);
        list_ticket = response.data;

        a = list_ticket.length;
        for(i = 0; i < a; i++){
          hr = 0;
          min = 0;
          day_check = 0;
          if(list_ticket[i].time_passed > 60){
            while(list_ticket[i].time_passed > 60){
              if(list_ticket[i].time_passed > 60){
              list_ticket[i].time_passed = list_ticket[i].time_passed - 60;
                hr = hr + 1;
              }  
            }
            min = list_ticket[i].time_passed;
            if(hr >= 24){
              day = 0;
              day_check = 0;
              while(hr >= 24){
                hr = hr -24;
                day = day + 1;
              }
              if(day > 1){
                list_ticket[i].time_passed = day+" days ago";  
              }else{
                list_ticket[i].time_passed = day+" day ago";  
              }
              
            }else{
              if(hr > 1){
                list_ticket[i].time_passed = hr+" hours and "+min+" minutes ago";
              }else{
                list_ticket[i].time_passed = hr+" hour and "+min+" minutes ago";
              }
              
            }            
          }else if(list_ticket[i].time_passed == 0){
            list_ticket[i].time_passed = "Few Seconds Ago";
          }else if(list_ticket[i].time_passed > 0 && list_ticket[i].time_passed < 60 && list_ticket[i].time_passed > 1){
            list_ticket[i].time_passed = list_ticket[i].time_passed+" minutes ago";
          }else if(list_ticket[i].time_passed > 0 && list_ticket[i].time_passed < 60 && list_ticket[i].time_passed == 1){
            list_ticket[i].time_passed = list_ticket[i].time_passed+" minute ago";
          }
        }
        $scope.List_Expired_Tickets = list_ticket;
        console.log($scope.List_Expired_Tickets);

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