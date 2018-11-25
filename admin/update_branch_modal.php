<div id = "update<?php echo $id;?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
					 <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header box-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Edit Branch Details</h4>
                        </div>
                        <div class="modal-body">
                         <form method = "POST" action = "update_branch.php"> 
						   <input type="hidden" name="branch_id" value="<?php echo $id;?>">
								<label>Name</label>
									<input type="text" name = "branch_name" class="form-control" value = "<?php echo $row1['branch_name'];?>">
									<br/>								
								<label>Address</label>
									<input type="text" name = "branch_address" class="form-control" value = "<?php echo $row1['branch_address'];?>">
									<br/>
								<label>Contact #</label>
									<input type="text" name = "branch_contact" class="form-control" value = "<?php echo $row1['branch_contact'];?>">
									<br/>
								
									
							<div style="text-align: center;">
								<button  name = "update" class="btn btn-primary">Save changes</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
							
						</form>
						</div>
                        <div class="modal-footer">
                          
                        </div>
                      </div>
                    </div>
				</div>


