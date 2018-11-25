
<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- search form -->
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
            <li class="treeview">
              <a href="">
                <i class="glyphicon glyphicon-bullhorn"></i>
                <span>Product</span>
                <i class="glyphicon glyphicon-menu-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li class="header">You have <?php echo$row['count'];?> products that needs reorder</li>
                      <li>
              </ul>
            </li>
            <li class="treeview">
              <a href="">
                <i class="glyphicon glyphicon-certificate"></i>
                <span>Unit</span>
                <i class="glyphicon glyphicon-menu-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
		<li><a href="business_clearance.php"><i class="glyphicon glyphicon-print"></i>Add Unit</a></li>
		<li><a href="clearance.php"><i class="glyphicon glyphicon-print"></i>Unit List</a></li>	
              </ul>
            </li>
	    
		<li><a href="ordinance.php"><i class="glyphicon glyphicon-compressed"></i> <span>Inventory</span></a></li>
		<li><a href="resolution.php"><i class="glyphicon glyphicon-blackboard"></i> <span>Stock in</span></a></li>
		<li><a href="resolution.php"><i class="glyphicon glyphicon-blackboard"></i> <span>Stock out</span></a></li>
		
		
	   
             
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
