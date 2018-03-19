<!-- Only list orders that are still unpaid -->
	<div class="modal fade" id="delete_order_modal" tabindex="-1" role="dialog" aria-labelledby="delete_order_modal">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="delete_order_modal">Delete Order #<span id="del_order_id"></span></h4>
		  </div>
		  <div class="modal-body">
			<span>
			<h4>Are you sure you want to delete order #<span class="del_order_id"></span>? This action cannot be undone and the order will be deleted from the database.</h4>
			</span>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-danger" id="delete_order_from_db">Delete Order</button>
		  </div>
		</div>
	  </div>
	</div>
