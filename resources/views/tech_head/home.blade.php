@extends('layouts.app')
@section('content')
<div ng-controller="Tech_Head_Controller" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
	            <p><i>Tech Staff</i></p>
	          </center>
	        </div>

	        <div class="col-lg-12">
	          <br>
	        </div>

	        
	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-primary bottom-top-radius">
	          <a href="" class="custom_nav_link">
	            <center>
	              <h4 class="text-white" ng-click="Get_Tickets()">Tickets</h4>
	            </center>
	          </a>
	        </div>
	        

	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	          <br>
	        </div>

	        
	          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  bg-primary bottom-top-radius">
	            <a href="" class="custom_nav_link" ng-click="Get_Cater_Tickets()">
	              <center>
	                <h4 class="text-white">Catered Ticket</h4>
	              </center>
	            </a>
	          </div>
	        

	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	          <br>
	        </div>

	        
	          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-primary bottom-top-radius">
	            <a href="" class="custom_nav_link" ng-click="Get_Services()">
	              <center>
	                <h4 class="text-white">Services</h4>
	              </center>
	            </a>
	          </div>
	      </div>
	    </div>

	    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
	     	<br>
	    </div>

	    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" id="list_services" ng-init="Get_Services()">
	    		    	
	    	<br>
	    	<button class="float-left btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_Service_Modal">Add Service</button>
	    	<center><h4>Services</h4><center>
	    		<br>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Service Name</th>
						<th>Minutes to Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="Service in List_Services" ng-if="List_Services.length > 0">
						<th ng-bind="Service.service_name"></th>
						<th ng-bind="Service.service_deadline+' Minutes'"></th>
						<th>
							<button class="btn btn-primary btn-sm">View</button>
						</th>
					</tr>

					<tr ng-if="List_Services.length == 0">
						<th>None</th>
						<th>None</th>
					</tr>
				</tbody>
			</table>
	    </div>

	    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" id="list_tickets" hidden="hidden">
	    	<center><h4>Tickets</h4><center>
	    		<br>
			<table class="table table-striped">
				<thead>
	              <tr>
		              <th>Date & Time</th>		              
		              <th>Type</th>
		              <th>Action</th>
	              </tr>
	          	</thead>
		              
	          	<tbody>
	              <tr ng-repeat="List in List_Tickets">
	                  <th scope="row" ng-bind="List.created_at | date_time" class="text-color-gray"></th>
	                  <th scope="row" ng-bind="'CCTV'" class="text-color-gray" ng-if="List.service_id == 1"></th>
	                  <th scope="row" ng-bind="'ATK'" class="text-color-gray" ng-if="List.service_id == 2"></th>
	                  <td>
	                    <span class="align-middle">
	                      <button class="btn btn-primary btn-sm">
	                        <i class="fas fa-eye fa-lg"></i> View Ticket
	                      </button>	                      
	                  	</span>
	                  </td>
	              </tr>
	              <tr ng-if="List_Tickets.length == 0">
	                <th>None</th>
	                <th>None</th>
	                <th>None</th>
	              </tr>
	          	</tbody>
			</table>
	    </div>

	    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" id="list_catered_tickets" hidden="hidden">
	    	<center><h4> Catered Tickets</h4><center>
	    		<br>
			<table class="table table-striped">
				<thead>
	              <tr>
		              <th>Date & Time</th>		              
		              <th>Type</th>
		              <th>Action</th>
	              </tr>
	          	</thead>
		              
	          	<tbody>
	              <tr ng-repeat="List in List_Catered_Tickets">
	                  <th scope="row" ng-bind="List.created_at | date_time" class="text-color-gray"></th>
	                  <th scope="row" ng-bind="'CCTV'" class="text-color-gray" ng-if="List.service_id == 1"></th>
	                  <th scope="row" ng-bind="'ATK'" class="text-color-gray" ng-if="List.service_id == 2"></th>
	                  <td>
	                    <span class="align-middle">
	                      <button class="btn btn-primary btn-sm">
	                        <i class="fas fa-eye fa-lg"></i> View Ticket
	                      </button>	                      
	                  	</span>
	                  </td>
	              </tr>
	              <tr ng-if="List_Catered_Tickets.length == 0">
	                <th>None</th>
	                <th>None</th>
	                <th>None</th>
	              </tr>
	          	</tbody>
			</table>
	    </div>

	</div>
	@include('modals.Add_Service_Modal')
</div>
@endsection