  <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Branch <i class = "fa fa-building"></i></h2>
                    <ul class="nav navbar-right panel_toolbox"> 
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action = "add_branch.php" method = "POST" enctype = "multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name = "branch_name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Address</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <textarea style = "resize:none;" name = "branch_address" class="form-control"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Contact #</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name = "branch_contact" required>
                        </div>
                      </div>
                   
                      
                     
                      <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <button name = "" class="btn btn-block btn-primary" style="margin-left: -45px;"><i class = "fa fa-save"></i> Save</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>