<div class="modal fade" id="move_table_modal" tabindex="-1" role="dialog" aria-labelledby="move_table_modal">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Move <span class="move_table_hdr"></span></h4>
	  </div>
		<div class="modal-body col-md-12">
			<div class="col-md-6">
				<label>From Table:</label>
				<select class="form-control select2" disabled="disabled" >
				   <option class="move_table_hdr"></option>
				</select>
			</div>
			<div class="col-md-6">
				<label>To Table:</label>
				<select class="form-control select2">
				<?php foreach ($table_list as $row) { ?>
				   <option><?=$row->table_id;?></option>
				  <?php } ?>
				</select>
			</div>
		</div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		<button type="button" class="btn btn-primary">Move</button>
	  </div>
	</div>
  </div>
</div>

<div class="modal fade" id="add_table_modal" tabindex="-1" role="dialog" aria-labelledby="add_table_modal">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="add_table_modal">Add New Table</h4>
	  </div>
	  <?=form_open('admin/orders/add_table'); ?>
		<div class="modal-body col-md-12">
			<div class="col-md-3">
				<label>Table Name:</label>	
			</div>
			<div class="col-md-6">
				<?php 
				$data = array(
						'name'          => 'table_name',
						'type'            => 'text',
						'class'         => 'form-control',
						'placeholder'     => 'Name'
				);

				echo form_input($data);
				?>
			</div>
		</div>
		
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			<?php echo form_submit('table_submit', 'Create', 'class="btn btn-primary"'); ?>
		  </div>
	  <?=form_close();?>
	</div>
  </div>
</div>