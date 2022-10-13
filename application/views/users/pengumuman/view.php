
<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="dashboard.html">Dashboard</a></li>
				<li class="active"><?php echo $judul_web; ?></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Data <small><?php echo $judul_web; ?></small></h1>
			<!-- end page-header -->

			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
              <?php
                echo $this->session->flashdata('msg');
              ?>
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title"><?php echo $judul_web; ?></h4>
                        </div>
                        <div class="panel-body">
													<center>
													<?php if ($query->status_pengumuman!=''){ ?>
                            <?php if ($query->status_pengumuman=='Lulus'){ ?>
															<h1>
	                            	Selamat anda <?php echo $this->Mcrud->ket_nilai($query->status_pengumuman,'status'); ?> seleksi
															</h1>
															<hr>
															<div style="text-align:left;">
																<?php echo $this->db->get_where('tbl_set_pengumuman', array('id_set_pengumuman'=>1))->row()->isi; ?>
															</div>
														<?php }else{ ?>
															<h1>
	                            	Maaf anda <?php echo $this->Mcrud->ket_nilai($query->status_pengumuman,'status'); ?> seleksi
															</h1>
														<?php } ?>
                          <?php }else{ ?>
														<h1 style="color:red;">Pengumuman belum keluar</h1>
													<?php } ?>
													</center>
													<br>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->
