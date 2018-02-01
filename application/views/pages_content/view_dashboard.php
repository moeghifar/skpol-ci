<?php
	$this->level = $this->session->userdata($this->session_prefix.'-userlevel');
	$exclude = array('Masuk Direktur','Keluar Direktur','Masuk Dirjen','Keluar Dirjen');
	if($pagetype=='history'){ ?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Detail History SKP</h3>
					</div>
					<div class="panel-body">
						<a class="btn btn-sm btn-primary mb10" href="<?=site_url('home')?>"><i class="ico ico-arrow-left"></i> Kembali</a>
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Tanggal</th>
									<th>Status Terakhir</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$x=1; foreach($skp as $k=>$v){
										if(in_array($v['status_log'],$exclude) && ($this->level == 'upi' || $this->level == 'dinas')){

										}else{
								?>
								<tr>
									<td><?=$x?></td>
									<td><?=date("d-m-Y", strtotime($v['date_log']))?></td>
									<td><?=$v['status_log']?></td>
								</tr>
								<?php $x++; } }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	<?php

		}else{
			if($this->level == 'kp'){
		?>

		<div class="row">
			<div class="col-sm-4">
	            <!-- START Widget Panel -->
	            <div class="widget panel bgcolor-primary">
	                <!-- panel body -->
	                <div class="panel-body">
	                    <div class="text-center">
	                        <p class="semibold" style="font-size:120%;color:#fff;border-bottom:1px dotted #0C5AA9;padding-bottom:5px;margin-bottom:-10px;">TOTAL SKP TERBIT</p>
	                    </div>
	                    <div class="text-center mt15 mb15">
	                        <h1 class="semibold">
	                            <i class="ico-file-check"></i>
	                            <span class=""><?=number_format(count($SkpTerbit),'0',',','.')?></span>
	                        </h1>
	                    </div>
	                    <div class="text-center">
	                        <p class="semibold nm">
	                            <a href="<?=site_url('home/exportExcel/skp_terbit')?>" class="btn btn-danger btn-xs"><i class="ico-download"></i> Report in Excel</a>
	                        </p>
	                    </div>
	                </div>
	                <!--/ panel body -->
	            </div>
	            <!--/ END Widget Panel -->
			</div>
			<div class="col-sm-4">
	            <!-- START Widget Panel -->
	            <div class="widget panel bgcolor-info">
	                <!-- panel body -->
	                <div class="panel-body">
	                    <div class="text-center">
	                        <p class="semibold" style="font-size:120%;color:#fff;border-bottom:1px dotted #0C5AA9;padding-bottom:5px;margin-bottom:-10px;">UPI TERDAFTAR</p>
	                    </div>
	                    <div class="text-center mt15 mb15">
	                        <h1 class="semibold">
	                            <i class="ico-users2"></i>
	                            <span class=""><?=number_format(count($UpiTerdaftar),'0',',','.')?></span>
	                        </h1>
	                    </div>
	                    <div class="text-center">
	                        <p class="semibold nm">
	                            <a href="<?=site_url('home/exportExcel/upi_terdaftar')?>" class="btn btn-danger btn-xs"><i class="ico-download"></i> Report in Excel</a>
	                        </p>
	                    </div>
	                </div>
	                <!--/ panel body -->
	            </div>
	            <!--/ END Widget Panel -->
			</div>
			<div class="col-sm-4">
	            <!-- START Widget Panel -->
	            <div class="widget panel bgcolor-teal">
	                <!-- panel body -->
	                <div class="panel-body">
	                    <div class="text-center">
	                        <p class="semibold" style="font-size:120%;color:#fff;border-bottom:1px dotted #0C5AA9;padding-bottom:5px;margin-bottom:-10px;">SKP DALAM PROSES</p>
	                    </div>
	                    <div class="text-center mt15 mb15">
	                        <h1 class="semibold">
	                            <i class="ico-spinner10"></i>
	                            <span class=""><?=number_format(count($SkpProses),'0',',','.')?></span>
	                        </h1>
	                    </div>
						<div class="text-center" style="margin-bottom:3px">
	                        <p class="semibold nm">
	                            <span class="label label-danger"><?=number_format(count($SkpProsesBaru),'0',',','.')?> Baru & <?=number_format(count($SkpProsesPer),'0',',','.')?> Perpanjang</span>
	                        </p>
	                    </div>
	                </div>
	                <!--/ panel body -->
	            </div>
	            <!--/ END Widget Panel -->
			</div>
        </div>
		<?php
		}
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Proses Pengajuan SKP</h3>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-bordered" id="table-list-unsortable">
							<thead>
								<tr>
									<th>#</th>
									<?php
									if ($this->level != 'upi') {
										if ($this->level == 'dinas') {
											echo '<th>Kabupaten / Kota</th>';
										}elseif ($this->level == 'kp') {
											echo '<th>Provinsi</th>';
										}
										echo '<th>Nama UPI</th>';
									}
									?>
									<th>Nama Produk</th>
									<th>Kategori</th>
									<th>Tanggal</th>
									<th>Status Terakhir</th>
									<th style="width:30px;">History</th>
								</tr>
							</thead>
							<tbody>
								<?php $x=1; foreach($skp as $k=>$v){
									if(in_array($v['status_log'],$exclude) && ($this->level == 'upi' || $this->level == 'dinas')){
										$stat = 'Penerbitan SKP';
									}else{
										$stat = $v['status_log'];
									}
									?>
								<tr>
									<td><?=$x?></td>
									<?php
									if ($this->level != 'upi') {
										if ($this->level == 'dinas') {
											echo '<td>'.$v['kabupaten_upi'].'</td>';
										}elseif ($this->level == 'kp') {
											echo '<td>'.$v['nama_provinsi'].'</td>';
										}
										echo '<td>'.$v['nama_upi'].'</td>';
									}
									?>
									<td><?=$v['namaind_produk']?></td>
									<td><?=$v['kategori_produk']?></td>
									<td><?=date("d-m-Y", strtotime($v['date_log']))?></td>
									<td><?=$stat?></td>
									<td><a href="<?=site_url('home/history/'.$v['idtbl_skp'])?>" class="btn btn-xs btn-inverse"><i class="ico ico-search"></i> detail</a></td>
								</tr>
								<?php $x++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		    <div class="col-md-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                <h3 class="panel-title">Daftar SKP Terbit (Softcopy sudah di upload)</h3>
		            </div>
		            <div class="panel-body">
		                <table class="table table-striped table-bordered" id="table-list-unsortable">
		                    <thead>
		                        <tr>
		                            <th>#</th>
		                            <th><i class="ico ico-files"></i></th>
		                            <th>Nama Upi</th>
		                            <th>Produk</th>
		                            <th>No. Seri</th>
		                            <th>No. SKP</th>
		                            <th>Tanggal Berlaku</th>
		                            <th>Tanggal Kedaluarsa</th>
		                            <th>Aksi</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        <?php $i=1; foreach($skpTerbit as $k){ if($k['file_skp_terbit']!=""){?>
		                        <tr>
		                            <td><?=$i?></td>
		                            <td>
										<?php
											if($k['file_skp_terbit']==""){
												echo '<i class="ico ico-file-remove2"></i>';
											}else{
												echo '<a target="_blank" href="'.base_url($k['file_skp_terbit']).'"><i class="ico ico-file-check"></i></a>';
											}
										?>
									</td>
		                            <td><?=strtoupper($k['nama_upi'])?></td>
		                            <td><?=$k['namaind_produk']?></td>
		                            <td><?=$k['noseri_skp_terbit']?></td>
		                            <td><?=$k['no_skp_terbit']?></td>
		                            <td><?=date("d-m-Y", strtotime($k['tglmulai_skp_terbit']))?></td>
		                            <td><?=date("d-m-Y", strtotime($k['tglkadaluarsa_skp_terbit']))?></td>
		                            <td>
										<a class="btn btn-sm btn-primary mb5" href="<?php echo base_url('skp/detail_skp/'.$k['idtbl_skp_terbit'].'/'.$k['idtbl_skp']);?>"><i class="ico ico-eye-open"></i></a>
									</td>
		                        </tr>
		                        <?php $i++; }} ?>
		                    </tbody>
		                </table>
		            </div>
		        </div>
		    </div>
		</div>
	<?php } ?>
