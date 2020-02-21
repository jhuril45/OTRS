var app = angular.module('Main_Function',[] );
app.filter('date_time', function(){
        return function(input){
            
            res = input.split(" ");
            date = convertDate(res[0]);
            
            time = res[1].split(":");
            console.log(time);
            hr = parseInt(time[0],10);
            min = time[1];
            

            if(hr >= 12){                
                hr = hr - 12;
                if(hr < 10){
                    time = "0" + hr + ":";
                    time = time + min;
                    time = time + "PM";
                    return date + " " + time;  
                    }
                if(hr > 10){
                    time = hr + ":";
                    time = time + min;
                    time = time + "PM";
                    return date + " " + time;
                }
                
            }
            if(hr < 12){
                if(hr < 10){
                    time = "0" + hr + ":";
                    time = time + min;
                    time = time + "AM";
                    return date + " " + time;    
                }
                if(hr > 10){
                    time = hr + ":";
                    time = time + min;
                    time = time + "PM";
                    return date + " " + time;
                }
                
            }
            
            
        }
        
        function convertDate(date_str) {
          var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
          temp_date = date_str.split("-");          
          month = parseInt(temp_date[1],10);                    
          return months[month - 1]+ " " +temp_date[2] + ", " + temp_date[0];
        }
    });

app.filter('time', function(){
        return function(input){
            
            res = input.split(" ");
            time = res[1].split(":");
            console.log(time);
            hr = parseInt(time[0],10);
            min = time[1];
            

            if(hr >= 12){                
                hr = hr - 12;
                if(hr < 10){
                    time = "0" + hr + ":";
                    time = time + min;
                    time = time + "PM";
                    return time;  
                    }
                if(hr > 10){
                    time = hr + ":";
                    time = time + min;
                    time = time + "PM";
                    return time;
                }
                
            }
            if(hr < 12){
                if(hr < 10){
                    time = "0" + hr + ":";
                    time = time + min;
                    time = time + "AM";
                    return time;    
                }
                if(hr > 10){
                    time = hr + ":";
                    time = time + min;
                    time = time + "PM";
                    return time;
                }
                
            }
            
            
        }
        
       
    });