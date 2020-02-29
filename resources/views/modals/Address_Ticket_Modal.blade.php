  <!-- The Modal -->
  <div class="modal fade" id="Address_Ticket_Modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" ng-bind="'Ticket for '+Specific_Address_Ticket.ticket.service.service_name"></h4>        
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label>Comment</label>
                <textarea type="text" name="" class="form-control form-control-sm" ng-model="Comment" ng-if="Specific_Address_Ticket.ticket.status == 1"></textarea>
                <textarea type="text" name="" class="form-control form-control-sm" ng-bind="Specific_Address_Ticket.comment" ng-if="Specific_Address_Ticket.ticket.status != 1" disabled="disabled"></textarea>
              </div>              

            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" ng-click="Finish_Ticket(Comment,Specific_Address_Ticket.ticket_id)" ng-if="Specific_Address_Ticket.ticket.status == 1">Done</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
