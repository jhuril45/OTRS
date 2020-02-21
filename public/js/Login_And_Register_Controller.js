app.controller('Register_Controller', function($scope,$http) {
    console.log("Register_Controller");

    $scope.Register_User = function(username,password,confirm_password){
    	if(password == confirm_password){
    		
    		$http({
            method : "POST",
            url : '/Register_User',
            data: {username:username,password:password},            
        	}).then(function mySuccess(response) {
            alert("Registered");
            window.location.href = "/login";
        	}, function myError(response) {
            console.log(response);
        	});

    	}

    }

});


app.controller('Login_Controller', function($scope,$http) {
    console.log("Login_Controller");

    $scope.Login_User = function(username,password){
        try{

            Swal.fire({
                        title: "Logging In...",
                        text: "Please wait",
                        imageUrl: "../img/loader2.gif",
                        showConfirmButton: false,
                        allowOutsideClick: false
                        });
            $http({
            method : "POST",
            url : '/Login_User',
            data: {username:$scope.username,password:$scope.password},
            }).then(function mySuccess(response) {
            console.log(response.data);
            Swal.close();
            if(response.data == "admin"){
                console.log("Admin");
                window.location.href = "admin/routes";
            }
            else if(response.data == "operator"){
                console.log(response.data);
                window.location.href= "operator";
            }
            else if(response.data == "techstaff"){
                console.log(response.data);
                window.location.href= "techstaff";
            }
            else if(response.data == "marketing_manager"){
                console.log(response.data);
                window.location.href= "marketing_manager/routes";
            }
            else if(response.data == "incorrect"){
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Incorrect Username or Password!',                  
                })
            }
            
            }, function myError(response) {
            console.log(response);
            });

        }catch(err){
            console.log(err);
        }
    		

   	}

});