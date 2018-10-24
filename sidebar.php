 
 
 
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
		<p><?php echo $_SESSION['username'];?></p>
		</p>
          <p><i class="fa fa-circle text-success"></i>&ensp; <?php echo $_SESSION['user_role'];?> </p>
          
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		
		
		
		<?php if ($_SESSION['user_role'] == 'subadmin') { ?>
		
        <li class="active treeview">
         <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>        
            </span>
          </a>
           <ul class="treeview-menu">
		    <li><a href="dashboard.php"><i class="fa  fa-home"></i>Master</a></li>
			<li id="sidebar_noticemaster"><a href="noticemaster.php"><i class="fa fa-user-plus"></i>Create Notice</a></li>
		
          </ul>
        </li>
		
		
        <?php } ?>
		
		
		  <?php if ($_SESSION['user_role'] == 'admin') { ?>
		  <li class="header">Accounts</li>
		 <li class="active treeview">
		 <a href="#">
            <i class="fa fa-fw fa-folder-open-o"></i>
            <span>Accounts </span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
		  
		    <ul class="active treeview-menu">
			
			
            <li id="sidebar_subadminmaster"><a href="subadminmaster.php"><i class="fa fa-user-plus"></i>Create Subadmin</a></li>
			 <li id="sidebar_categorymaster"><a href="categorymaster.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Category</a></li> 
		<?php } ?>
		  </ul>
		    </li>
		   <ul class="active treeview-menu">
           
			</li>
		  </ul>
			
		  
		<!-- <?php if ($_SESSION['user_role'] == 'admin') { ?> -->
				
		<li class="active treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Utility</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
        
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="changepass.php"><i class="fa fa-lock text-blue"></i>Change Password</a></li> <?php } ?>
          </ul>
		  
        </li>
		  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>