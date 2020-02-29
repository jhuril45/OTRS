  <!-- The Modal -->
  <div class="modal fade" id="Add_Service_Modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Service</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label>Service Name</label>
                <input type="text" name="" ng-model="service_name" class="form-control form-control-sm">
              </div>

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label>Amount of Minutes to Address</label>
                <input type="number" name="" ng-model="service_deadline" class="form-control form-control-sm">
              </div>

            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" ng-click="Submit_Service(service_name,service_deadline)">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
