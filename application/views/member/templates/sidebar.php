
  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-sidebar-navbar">
      <!-- Brand Logo -->
      <a href="#" class="brand-link bg-transparent">
        <img src="<?= base_url() ?>assets/img/<?php echo $this->website['image'] ?>"
             alt="Koreksoft Logo"
             class="brand-image">
        <span class="brand-text font-weight-light"><?php echo $this->website['nama_organisasi'] ?></span>
      </a>

      
        <!-- Sidebar -->
        <div class="sidebar">

          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image text-white h4">
              <i class="fa fa-user nav-icon ml-1"></i>
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $this->session->userdata('name'); ?></a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              <li class="nav-item has-treeview">
                <a href="<?php echo base_url() ?>" class="nav-link do_transition">
                  <i class="nav-icon fa fa-globe"></i>
                  <p>
                    <span>Buka Website</span>
                  </p>
                </a>
              </li> <!-- sidebar_item -->

                <?php if ($this->session->userdata('level') == 'member') { ?>
                                  <li class="nav-header">CONTROL PANEL</li>

                                  <li class="nav-item has-treeview" >
                                    <a href="<?php echo base_url() ?>admin/dashboard" class="nav-link do_transition">
                                      <i class="nav-icon fa fa-tachometer-alt"></i>
                                      <p>
                                        <span>Dashboard</span>
                                      </p>
                                    </a>
                                  </li> <!-- sidebar_item -->
                    
                                  <li class="nav-item has-treeview" >
                                    <a href="<?php echo base_url() ?>admin/event" class="nav-link do_transition">
                                      <i class="nav-icon fa fa-calendar-alt"></i>
                                      <p>
                                        <span>Event</span>
                                      </p>
                                    </a>
                                  </li> <!-- sidebar_item -->
                                  
                                  <li class="nav-item">
                                            <a href="<?= base_url('admin/event/download_sertifikat'); ?>"" class="nav-link do_transition">
                                              <i class="fa fa-minus-circle nav-icon"></i>
                                              <p>Download sertifikat</p>
                                            </a>
                                          </li>
                    
                                  <!-- Proker Starts -->
                                    <li class="nav-item has-treeview">
                                      <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-tasks"></i>
                                        <p>
                                          <span>Proker</span>
                                          <i class="right fas fa-angle-left"></i>
                                        </p>
                                      </a>
                                      <ul class="nav nav-treeview" style="display: none;">
                                        <?php foreach ($this->all_divisi as $key => $val): ?>
                                          <li class="nav-item">
                                            <a href="<?php echo base_url() ?>admin/proker/i/<?php echo $val['id_divisi'] ?>" class="nav-link do_transition">
                                              <i class="fa fa-minus-circle nav-icon"></i>
                                              <p><?php echo $val['nama_divisi'] ?></p>
                                            </a>
                                          </li>
                                        <?php endforeach ?>
                                      </ul>
                                    </li>
                                  <!-- Proker Ends -->
                    
                                  <!-- Keanggotaan Starts -->
                                    <li class="nav-item has-treeview">
                                      <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                          <span>Keanggotaan</span>
                                          <i class="right fas fa-angle-left"></i>
                                        </p>
                                      </a>
                                      <ul class="nav nav-treeview" style="display: none;">
                                        <li class="nav-item">
                                          <a href="<?php echo base_url() ?>admin/anggota" class="nav-link do_transition">
                                            <i class="fa fa-minus-circle nav-icon"></i>
                                            <p>Anggota</p>
                                          </a>
                                        </li>
                                        <li class="nav-item">
                                          <a href="<?php echo base_url() ?>admin/jabatan" class="nav-link do_transition">
                                            <i class="fa fa-minus-circle nav-icon"></i>
                                            <p>Jabatan</p>
                                          </a>
                                        </li>
                                        <li class="nav-item">
                                          <a href="<?php echo base_url() ?>admin/divisi" class="nav-link do_transition">
                                            <i class="fa fa-minus-circle nav-icon"></i>
                                            <p>Divisi</p>
                                          </a>
                                        </li>
                                      </ul>
                                    </li>
                                <!-- Keanggotaan Ends -->
                                  
                              
                    
                                  <!-- Organisasi Starts -->
                                    <li class="nav-item has-treeview">
                                      <a href="#" class="nav-link ">
                                        <i class="nav-icon fas fa-cogs"></i>
                                        <p>
                                          <span>Website</span>
                                          <i class="right fas fa-angle-left"></i>
                                        </p>
                                      </a>
                                      <ul class="nav nav-treeview" style="display: none;">
                                        <li class="nav-item">
                                          <a href="<?php echo base_url() ?>admin/organisasi" class="nav-link do_transition">
                                            <i class="fa fa-minus-circle nav-icon"></i>
                                            <p>Organisasi</p>
                                          </a>
                                        </li>
                                        <li class="nav-item">
                                          <a href="<?php echo base_url() ?>admin/carousel" class="nav-link do_transition">
                                            <i class="fa fa-minus-circle nav-icon"></i>
                                            <p>Carousel</p>
                                          </a>
                                        </li>
                                      </ul>
                                    </li>
                                  <!-- Organisasi Ends -->
                                  
                                <li class="nav-header">CALON HMP</li>
                                  <!-- Oprek Starts -->
                                    <li class="nav-item has-treeview">
                                      <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                          <span>Calon HMP</span>
                                          <i class="right fas fa-angle-left"></i>
                                        </p>
                                      </a>
                                      <ul class="nav nav-treeview" style="display: none;">
                                        <li class="nav-item">
                                          <a href="<?php echo base_url() ?>admin/oprek" class="nav-link do_transition">
                                            <!--<i class="fa fa-plus-circle nav-icon"></i>-->
                                            <i class="fas fa-user-circle nav-icon"></i>
                                            <p>All Data</p>
                                          </a>
                                        </li>
                                        <li class="nav-item">
                                          <a href="<?php echo base_url() ?>admin/oprek/diterima" class="nav-link do_transition">
                                            <i class="fa fa-plus-circle nav-icon"></i>
                                            <p>Diterima</p>
                                          </a>
                                        </li>
                                        <li class="nav-item">
                                          <a href="<?php echo base_url() ?>admin/oprek/ditolak" class="nav-link do_transition">
                                            <i class="fa fa-minus-circle nav-icon"></i>
                                            <p>Ditolak</p>
                                          </a>
                                        </li>
                                      </ul>
                                    </li>
                                  <!-- Oprek Ends -->
                                  
                    
                                  <li class="nav-header">USER</li>
                    
                                  <li class="nav-item has-treeview" >
                                    <a href="<?php echo base_url() ?>admin/login_log" class="nav-link do_transition">
                                      <i class="nav-icon fas fa-clock"></i>
                                      <p>
                                        <span>Login log</span>
                                      </p>
                                    </a>
                                  </li> <!-- sidebar_item -->
                <?php } elseif ($this->session->userdata('level') == 'pengunjung'){ ?>
                     <li class="nav-item has-treeview" >
                            <a href="<?php echo base_url() ?>pengunjung" class="nav-link do_transition">
                                  <i class="nav-icon fas fa-user"></i>
                                  <p>
                                    <span>Profil</span>
                                  </p>
                            </a>
                      </li> <!-- sidebar_item -->
                      
                      <li class="nav-item has-treeview">
                                      <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-calendar-alt"></i>
                                        <p>
                                          <span>Event</span>
                                          <i class="right fas fa-angle-left"></i>
                                        </p>
                                      </a>
                                      <ul class="nav nav-treeview" style="display: none;">
                                          <li class="nav-item">
                                            <a href="<?= base_url('/pengunjung/daftar_event'); ?>" class="nav-link do_transition">
                                              <i class="fa fa-minus-circle nav-icon"></i>
                                              <p>Daftar Event</p>
                                            </a>
                                          </li>
                                          <!--<li class="nav-item">-->
                                          <!--  <a href="<?= base_url('/pengunjung/event_diikuti'); ?>" class="nav-link do_transition">-->
                                          <!--    <i class="fa fa-minus-circle nav-icon"></i>-->
                                          <!--    <p>Event Diikuti</p>-->
                                          <!--  </a>-->
                                          <!--</li>-->
                                          <li class="nav-item">
                                            <a href="<?= base_url('/pengunjung/sertifikat_event'); ?>"" class="nav-link do_transition">
                                              <i class="fa fa-minus-circle nav-icon"></i>
                                              <p>Download sertifikat</p>
                                            </a>
                                          </li>
                                      </ul>
                        </li>
                <?php } ?>

              <li class="nav-item has-treeview" >
                <a href="#" class="nav-link" id="logout_btn">
                  <i class="nav-icon fa fa-sign-out-alt"></i>
                  <p>
                    <span>Logout</span>
                  </p>
                </a>
              </li> <!-- sidebar_item -->

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
      <!-- /.sidebar -->
    </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-transparent">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">