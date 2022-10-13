<?php
$link1 = strtolower($this->uri->segment(1));
$link2 = strtolower($this->uri->segment(2));
$link3 = strtolower($this->uri->segment(3));
$link4 = strtolower($this->uri->segment(4));
?> 
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
                            <h4 class="panel-title">Data Table</h4>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-1">
                              <br>
                              <a href="<?php echo $link1; ?>/<?php echo $link2; ?>/<?php echo $link3; ?>/<?php echo $link4; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i></a>
                            </div>
														<div class="col-md-2">
															<div class="form-group"> <b>Dari Tanggal</b>
						                    <div class="input-group">
						                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
						                      <input type="text" name="tgl1" id="tgl_1" class="form-control daterange-single" value="<?php echo $tgl1; ?>" maxlength="10" required>
						                    </div>
						                  </div>
														</div>
														<div class="col-md-2">
						                  <div class="form-group"> <b>Sampai dengan Tanggal</b>
						                    <div class="input-group">
						                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
						                      <input type="text" name="tgl2" id="tgl_2" class="form-control daterange-single" value="<?php echo $tgl2; ?>" maxlength="10" required>
						                    </div>
						                  </div>
														</div>
														<div class="col-md-2">
															<br>
															<button onclick="tampilkan();" class="btn btn-success" style="width:100%;">Tampilkan</button>
														</div>
														<div class="col-md-3"></div>
													</div>
                          <hr>
													<div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="1%">NO.</th>
																				<th width="15%">ID. Registrasi</th>
																				<th>Nama</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no=1;
                                   foreach ($query->result() as $baris):
																		 $data_p = $this->db->get_where('tbl_penyeleksian', array('id_karyawan'=>$baris->id_karyawan));
																		 if ($data_p->num_rows()==0) {?>
                                    <tr>
                                        <td><b><?php echo $no++; ?>.</b> </td>
																				<td><?php echo $baris->id_karyawan; ?></td>
																				<td><?php echo $baris->nama; ?></td>
																				<td align="center">
																					<a href="<?php echo $link1; ?>/<?php echo $link2; ?>/<?php echo $link3; ?>/<?php echo $link4; ?>/n/<?php echo hashids_encrypt($baris->id_karyawan); ?>" class="btn btn-primary btn-xs" title="Pilih"><i class="fa fa-check"></i> PILIH</a>
                                        </td>
                                    </tr>
                                  <?php
																			}
																		endforeach; ?>
                                </tbody>
                            </table>
													</div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->



    		<script src="assets/js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/panel/plugin/datetimepicker/jquery.datetimepicker.css"/>
        <script src="assets/panel/plugin/datetimepicker/jquery.datetimepicker.js"></script>
        <script>
        $('#tgl_1').datetimepicker({
          lang:'en',
          timepicker:false,
          format:'d-m-Y'
        });
    		$('#tgl_2').datetimepicker({
          lang:'en',
          timepicker:false,
          format:'d-m-Y'
        });

    		function tampilkan()
    		{
    			tgl1 = $('#tgl_1').val();
    			tgl2 = $('#tgl_2').val();
    			if (tgl1=='' || tgl2=='') {
    				alert('Tanggal wajib diisi!');
    				return false;
    			}
    			window.location.href = "penyeleksian/v/"+tgl1+"/"+tgl2+"/t";
    		}
        </script>
