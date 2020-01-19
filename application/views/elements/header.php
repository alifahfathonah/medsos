            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Logout</h4>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin akan keluar dari aplikasi ini</p>
                        </div>
                        <div class="modal-footer">
                            <!-- <a href="<?php echo site_url('login/logout') ?>"> -->
                            <a href="<?php echo site_url('login/logout') ?>"> 
                                <button class="btn btn-primary">Ya</button>
                            </a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo APPSORT;?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo APPLICATION;?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Welcome, <span class="hidden-xs"><?php echo $this->asd['nama'];?></span>
            </a>
            <ul class="dropdown-menu" style="height: 50px">
              <li>
                <a data-toggle="modal" data-target="#myModal" style="padding: 13px 20px">
                  <div>
                    <i class="fa fa-power-off"></i> Keluar
                  </div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>