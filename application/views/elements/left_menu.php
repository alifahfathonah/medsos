  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php 
         $menu_trans_arr= array('dashboard','');
         if(in_array($this->uri->segment(1), $menu_trans_arr)) {echo "class='active'";}?>>
          <a href="<?php echo base_url("dashboard");?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li <?php 
         $menu_trans_arr= array('telegram');
         if(in_array($this->uri->segment(1), $menu_trans_arr)) {echo "class='active'";}?>>
          <a href="<?php echo base_url("telegram");?>">
            <i class="fa fa-telegram"></i> <span>Telegram</span>
          </a>
        </li>
        <noscript>
        <li <?php 
         $menu_trans_arr= array('instagram');
         if(in_array($this->uri->segment(1), $menu_trans_arr)) {echo "class='active'";}?>>
          <a href="<?php echo base_url("instagram");?>">
            <i class="fa fa-instagram"></i> <span>Instagram</span>
          </a>
        </li>
        <li <?php 
         $menu_trans_arr= array('facebook');
         if(in_array($this->uri->segment(1), $menu_trans_arr)) {echo "class='active'";}?>>
          <a href="<?php echo base_url("facebook");?>">
            <i class="fa fa-facebook"></i> <span>Facebook</span>
          </a>
        </li>
        <li <?php 
         $menu_trans_arr= array('whatsapp');
         if(in_array($this->uri->segment(1), $menu_trans_arr)) {echo "class='active'";}?>>
          <a href="<?php echo base_url("whatsapp");?>">
            <i class="fa fa-whatsapp"></i> <span>Whats App</span>
          </a>
        </li></noscript>                        
        <li <?php 
         $menu_trans_arr= array('whatsapp','instagram','telegram','facebook');
         if(in_array($this->uri->segment(2), $menu_trans_arr)) {echo "class='treeview active'";}else{echo "class='treeview'";}?>>
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($this->uri->segment(2) == 'telegram') { echo "active"; } ?>">
              <a href="<?php echo base_url("setting/telegram");?>"><i class="fa fa-telegram"></i> Telegram</a>
            </li>
            <noscript>
            <li class="<?php if ($this->uri->segment(2) == 'instagram') { echo "active"; } ?>">
              <a href="<?php echo base_url("setting/instagram");?>"><i class="fa fa-instagram"></i> Instagram</a>
            </li>
            <li class="<?php if ($this->uri->segment(2) == 'facebook') { echo "active"; } ?>">
              <a href="<?php echo base_url("setting/facebook");?>"><i class="fa fa-facebook"></i> Facebook</a>
            </li>
            <li class="<?php if ($this->uri->segment(2) == 'whatsapp') { echo "active"; } ?>">
              <a href="<?php echo base_url("setting/whatsapp");?>"><i class="fa fa-whatsapp"></i> Whats App</a>
            </li>
            </noscript>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>