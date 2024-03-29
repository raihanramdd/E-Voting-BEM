  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Dashboard Admin</li>
        <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
          <a href="<?php echo site_url('admin/dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>  

        <li class="<?php echo $this->uri->segment(2) == 'kelas' ? 'active' : '' ?>">
          <a href="<?php echo site_url('admin/kelas'); ?>">
            <i class="fa fa-book"></i> <span>Kelas</span>
          </a>
        </li>   

        <li class="<?php echo $this->uri->segment(2) == 'kandidat' ? 'active' : '' ?>">
          <a href="<?php echo site_url('admin/kandidat'); ?>">
            <i class="fa fa-users"></i> <span>Kandidat</span>
          </a>
        </li> 
        
        <li class="<?php echo $this->uri->segment(2) == 'visi_misi' ? 'active' : '' ?>">
          <a href="<?php echo site_url('admin/visi_misi'); ?>">
            <i class="fa fa-paper-plane"></i> <span>Visi & Misi</span>
          </a>
        </li> 
        
        <li class="<?php echo $this->uri->segment(2) == 'suara' ? 'active' : '' ?>">
          <a href="<?php echo site_url('admin/suara'); ?>">
            <i class="fa fa-bell"></i> <span>Suara</span>
          </a>
        </li>   

        <li class="<?php echo $this->uri->segment(2) == 'user' ? 'active' : '' ?>">
          <a href="<?php echo site_url('admin/user'); ?>">
            <i class="fa fa-user"></i> <span>User</span>
          </a>
        </li> 
        
        <li class="<?php echo $this->uri->segment(2) == 'logout' ? 'active' : '' ?>">
          <a href="<?php echo site_url('auth/logout'); ?>">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
            
          </a>
        </li>   
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">