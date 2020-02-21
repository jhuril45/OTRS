  <!-- The Modal -->
  <div class="modal fade" id="Add_Ticket_Modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Ticket</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label>Service Type</label>
                <select ng-model="Service_Id" class="form-control form-control-sm">
                  <option value="1">CCTV</option>
                  <option value="2">ATK</option>
                </select>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label>Comment</label>
                <input type="text" name="" ng-model="Comment" class="form-control form-control-sm">
              </div>

            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" ng-click="Submit_Ticket(Service_Id,Comment)">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
