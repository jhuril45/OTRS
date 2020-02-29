@extends('layouts.app')
@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-controller="Operator_Controller">

	<div class="row">		
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="height: 500px;position: fixed; z-index:100;background-color: white;">
	      <div class="row">
	        
	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	          <br>
	          <center>
	            <img src="{{asset('img/user_logo.png')}}" style="width : 50%;height : 50%;border-radius: 50%;">
	          </center>
	          <br>
	        </div>

	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	          <br>
	        </div>

	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-black">
	          <center>
	            <h4>Name</h4>
	            <p><i>Operator</i></p>
	          </center>
	        </div>

	        <div class="col-lg-12">
	          <br>
	        </div>

	        
	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-primary bottom-top-radius">
	          <a href="" class="custom_nav_link">
	            <center>
	              <h4 class="text-white">Function</h4>
	            </center>
	          </a>
	        </div>
	        

	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	          <br>
	        </div>

	        
	          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  bg-primary bottom-top-radius">
	            <a href="" class="custom_nav_link">
	              <center>
	                <h4 class="text-white">Function</h4>
	              </center>
	            </a>
	          </div>
	        

	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	          <br>
	        </div>

	        
	          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-primary bottom-top-radius">
	            <a href="" class="custom_nav_link">
	              <center>
	                <h4 class="text-white">Function</h4>
	              </center>
	            </a>
	          </div>
	        

	      </div>
	    </div>

	    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
	     	<br>
	    </div>

	    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
	    	<div class="row">
	    		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    			<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_Ticket_Modal" ng-click="Initiate_Add_Ticket()">Add Ticket</button>
	    		</div>

	    		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    			<br>
	    		</div>

	    		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    			<center><h4>List Tickets</h4></center>
	    			<table class="table table-striped" ng-init="Get_Tickets()">
						<thead>
			              <tr>
				              <th>Date & Time</th>		              
				              <th>Time Passed</th>
				              <th>Service</th>
				              <th>Status</th>				              
				              <th>Action</th>
			              </tr>
			          	</thead>
				              
			          	<tbody>
			              <tr ng-repeat="List in List_Tickets">
			                  <th scope="row" ng-bind="List.created_at | date_time" class="text-color-gray"></th>	                  
			                  <th scope="row" ng-bind="List.time_passed" class="text-color-gray"></th>
			                  <th scope="row" ng-bind="List.service.service_name" class="text-color-gray"></th>
			                  <th scope="row" ng-if="List.status == 0" class="text-color-gray">Not Finished</th>
			                  <th scope="row" ng-if="List.status == 1" class="text-color-gray">Catering</th>
			                  <th scope="row" ng-if="List.status == 2" class="text-color-gray">Finished</th>
			                  
			                  <td>
			                    <span class="align-middle">
			                      <button class="btn btn-primary btn-sm">
			                        <i class="fas fa-eye fa-lg"></i> View Ticket
			                      </button>			                      
			                  	</span>
			                  </td>
			              </tr>
			              <tr ng-if="Filter_Customer.length == 0">
			                <th>None</th>
			                <th>None</th>
			                <th>None</th>
			              </tr>
			          	</tbody>
					</table>
	    		</div>
	    	</div>
			
	    </div>

	</div>
	
    
    
	
	@include('modals.Add_Ticket_Modal')
</div>

@endsection
