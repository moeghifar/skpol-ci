<?php
    $sessionJen = $this->session->userdata($this->session_prefix.'-userlevel');
	if($sessionJen == 'kp'){
		$level = 'Kantor Pusat';
	}elseif($sessionJen == 'upi'){
		$level = 'UPI';
	}else{
		$level = ucfirst($sessionJen);
	}
?>
<aside class="sidebar sidebar-left sidebar-menu">
    <!-- START Sidebar Content -->
    <section class="content slimscroll">
		<p class="heading" style="line-height:0px;margin:0px;padding-bottom:0px;font-size:0.8em;">
			User <?php echo $level; ?>
		</p>
		<p class="heading" style="line-height:0px;margin:0px;padding:15px 10px 25px 25px;">
			<?php
			if($this->session->userdata($this->session_prefix.'-userprovinsi') == 'all'){
				echo 'Semua Provinsi';
			}else{
				echo 'Provinsi '.$this->session->userdata($this->session_prefix.'-userprovinsi');
			}
			?>
		</p>
        <!-- START Template Navigation/Menu -->
        <ul class="topmenu topmenu-responsive" data-toggle="menu">

            <!--DASHBOARD-->
            <li class="<?php if($this->uri->segment(1) == '' || ($this->uri->segment(1) == 'home' && $this->uri->segment(2) == null)) echo "active";?>">
                <a href="<?php echo base_url('home');?>">
                    <span class="figure"><i class="ico-dashboard"></i></span>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <!--UPI DETAIL-->
            <?php if($sessionJen=='upi' && $this->global_alert == ""){?>
            <li class="<?php if($this->uri->segment(1) == 'upi' && $this->uri->segment(2) == 'edit_detail') echo "active";?>">
                <a href="<?php echo base_url('upi/edit_detail');?>">
                    <span class="figure"><i class="ico-user"></i></span>
                    <span class="text">Detail UPI</span>
                </a>
            </li>

            <!--PENGAJUAN SKP V2-->
            <li class="<?php if($this->uri->segment(1) == 'skp' && $this->uri->segment(2) == 'create' && $this->uri->segment(3) == 'v2') echo "active";?>">
                <a class="disabled" href="<?php echo base_url('skp/create/v2');?>">
                    <span class="figure"><i class="ico-briefcase"></i></span>
                    <span class="text">Pengajuan SKP</span>
                </a>
            </li>

            <!--PENGIRIMAN SKP-->
            <li class="<?php if($this->uri->segment(1) == 'pengiriman' && $this->uri->segment(2) == 'view_pengiriman_list') echo "active";?>">
                <a class="disabled" href="<?php echo base_url('pengiriman/view_pengiriman_list');?>">
                    <span class="figure"><i class="ico-paper-plane"></i></span>
                    <span class="text">Pengiriman SKP</span>
                </a>
            </li>

            <!--INPUT TINDAK LANJUT-->
            <li class="<?php if($this->uri->segment(1) == 'kunjungan' && $this->uri->segment(2) == 'tindak_lanjut') echo "active";?>">
                <a href="<?php echo base_url('kunjungan/tindak_lanjut');?>">
                    <span class="figure"><i class="ico-tools"></i></span>
                    <span class="text">Tindak Lanjut</span>
                </a>
            </li>
            <?php }?>

            <?php if($sessionJen!='upi'){?>
            <?php if($sessionJen!='pejabat-dirjen'&&$sessionJen!='pejabat-direktur'){?>
            <!--MENU UPI-->
            <li class="<?php if($this->uri->segment(1) == 'upi') echo "active open";?>">
                <a href="javascript:void(0);" data-target="#upi" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-office"></i></span>
                    <span class="text">UPI</span>
                    <span class="arrow"></span>
                </a>
                <ul id="upi" class="submenu collapse <?php if($this->uri->segment(2) == 'filing_list'||$this->uri->segment(2) == 'view_list'||$this->uri->segment(2) == 'filing_detail'||$this->uri->segment(2) == 'view_detail'||$this->uri->segment(2) == 'view_upi_revisi') echo "in";?>">
                    <li class="submenu-header ellipsis">UPI</li>
                    <li class="<?php if (($this->uri->segment(1) == 'upi' && $this->uri->segment(2) == 'filing_list')||($this->uri->segment(1) == 'upi' && $this->uri->segment(2) == 'filing_detail') ) echo "active";?>">
                        <a href="<?php echo base_url('upi/filing_list');?>">
                            <span class="text">UPI Pengajuan Baru</span>
                        </a>
                    </li>
					<li class="<?php if (($this->uri->segment(1) == 'upi' && $this->uri->segment(2) == 'view_upi_revisi')||($this->uri->segment(1) == 'upi' && $this->uri->segment(2) == 'filing_detail') ) echo "active";?>">
                        <a href="<?php echo base_url('upi/view_upi_revisi');?>">
                            <span class="text">UPI Revisi Data</span>
                        </a>
                    </li>
                    <li class="<?php if (($this->uri->segment(1) == 'upi' && $this->uri->segment(2) == 'view_list')||($this->uri->segment(1) == 'upi' && $this->uri->segment(2) == 'view_detail') ) echo "active";?>">
                        <a href="<?php echo base_url('upi/view_list');?>">
                            <span class="text">UPI Terdaftar</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php }?>

             <?php if($sessionJen=='pejabat-dirjen'||$sessionJen=='pejabat-direktur'||$sessionJen=='admin'){?>
            <!--Monitoring-->
            <li class="<?php if($this->uri->segment(2) == 'monitoring_skp'||$this->uri->segment(2) == 'monitoring_upi') echo "active open";?>">
                <a href="javascript:void(0);" data-target="#monitoring" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-bar-chart"></i></span>
                    <span class="text">Monitoring</span>
                    <span class="arrow"></span>
                </a>
                <ul id="monitoring" class="submenu collapse <?php if($this->uri->segment(2) == 'monitoring_skp'||$this->uri->segment(2) == 'monitoring_upi') echo "in";?>">
                    <li class="submenu-header ellipsis">Monitoring</li>
                    <li class="<?php if ($this->uri->segment(1) == 'home' && $this->uri->segment(2) == 'monitoring_skp' ) echo "active";?>">
                        <a href="<?php echo base_url('home/monitoring_skp');?>">
                            <span class="text">Monitoring SKP</span>
                        </a>
                    </li>
                    <!-- <li class="<?php if ($this->uri->segment(1) == 'home' && $this->uri->segment(2) == 'monitoring_upi' ) echo "active";?>">
                        <a href="<?php echo base_url('home/monitoring_upi');?>">
                            <span class="text">Monitoring UPI</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <?php }?>

            <?php if($sessionJen=='kp'||$sessionJen=='admin'){?>
            <!--User Management-->
            <li class="<?php if($this->uri->segment(1) == 'user') echo "active open";?>">
                <a href="javascript:void(0);" data-target="#usermgmnt" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-users"></i></span>
                    <span class="text">User Management</span>
                    <span class="arrow"></span>
                </a>
                <ul id="usermgmnt" class="submenu collapse <?php if($this->uri->segment(1) == 'user') echo "in";?>">
                    <li class="submenu-header ellipsis">User Management</li>
                    <li class="<?php if ($this->uri->segment(1) == 'user' && ($this->uri->segment(2) == ''||$this->uri->segment(2) == 'user_detail'||$this->uri->segment(2) == 'user_edit')) echo "active";?>">
                        <a href="<?php echo base_url('user');?>">
                            <span class="text">User</span>
                        </a>
                    </li>
                    <li class="<?php if ($this->uri->segment(1) == 'user' && ($this->uri->segment(2) == 'upi'||$this->uri->segment(2) == 'upi_detail'||$this->uri->segment(2) == 'upi_edit')) echo "active";?>">
                        <a href="<?php echo base_url('user/upi');?>">
                            <span class="text">UPI</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!--Alur Proses-->
            <li class="<?php if($this->uri->segment(1) == 'skp' && $this->uri->segment(2) == 'alurproses') echo "active";?>">
                <a href="<?php echo base_url('skp/alurproses');?>">
                    <span class="figure"><i class="ico-spinner11"></i></span>
                    <span class="text">Alur Proses</span>
                </a>
            </li>
            <?php }?>

             <?php if($sessionJen!='pejabat-dirjen'&&$sessionJen!='pejabat-direktur'){?>
            <!--DAFTAR PRODUK-->
            <li class="<?php if($this->uri->segment(1) == 'produk') echo "active open";?>">
                <a href="javascript:void(0);" data-target="#produk" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-bag"></i></span>
                    <span class="text">Produk</span>
                    <span class="arrow"></span>
                </a>
                <ul id="produk" class="submenu collapse <?php if ( $this->uri->segment(1) == 'produk' ) echo "in";?>">
                    <li class="submenu-header ellipsis">Produk</li>
                    <li class="<?php if($this->uri->segment(1) == 'produk' && $this->uri->segment(2) == 'view_produk_list') echo "active";?>">
                        <a href="<?php echo base_url('produk/view_produk_list');?>">
                            <span class="text">Daftar Produk</span>
                        </a>
                    </li>
                    <?php if($sessionJen=='kp'||$sessionJen=='admin'){?>
                    <li class="<?php if ($this->uri->segment(1) == 'produk' && $this->uri->segment(2) == 'view_approval_produk' ) echo "active";?>">
                        <a href="<?php echo base_url('produk/view_approval_produk');?>">
                            <span class="text">Approval Produk</span>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </li>
            <?php }?>


            <!--SKP MENU-->
            <li class="<?php if(($this->uri->segment(1) == 'skp'||$this->uri->segment(1) == 'pengiriman') && $this->uri->segment(2) != 'alurproses') echo "active open";?>">
                <a href="javascript:void(0);" data-target="#skp" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-briefcase2"></i></span>
                    <span class="text">SKP</span>
                    <span class="arrow"></span>
                </a>
                <ul id="skp" class="submenu collapse <?php if(($this->uri->segment(1) == 'skp'|| $this->uri->segment(1) == 'pengiriman') && $this->uri->segment(2) != 'alurproses') echo "in";?>">
                    <li class="submenu-header ellipsis">SKP</li>
                    <li class="<?php if ( $this->uri->segment(1) == 'skp' && $this->uri->segment(2) == 'skp_list'  ) echo "active";?>">
                        <a href="<?php echo base_url('skp/skp_list');?>">
                            <span class="text">SKP Terbit</span>
                        </a>
                    </li>
                    <?php if($sessionJen=='kp'||$sessionJen=='dinas'||$sessionJen=='admin'){?>
                    <li class="<?php if ( $this->uri->segment(1) == 'skp' && $this->uri->segment(2) == 'pengajuan_list'  ) echo "active";?>">
                        <a href="<?php echo base_url('skp/pengajuan_list');?>">
                            <span class="text">Pengajuan SKP</span>
                        </a>
                    </li>
                    <?php }?>
                    <?php if($sessionJen=='kp'||$sessionJen=='admin'){?>
                    <li class="<?php if ( $this->uri->segment(1) == 'skp' && $this->uri->segment(2) == 'rekomendasi_list'  ) echo "active";?>">
                        <a href="<?php echo base_url('skp/rekomendasi_list');?>">
                            <span class="text">Rekomendasi SKP</span>
                        </a>
                    </li>
                    <?php }?>
                    <?php if($sessionJen=='kp'||$sessionJen=='admin'||$sessionJen=='pejabat-dirjen'||$sessionJen=='pejabat-direktur'){?>
                    <li class="<?php if ( $this->uri->segment(1) == 'skp' && $this->uri->segment(2) == 'tandatangan_list'  ) echo "active";?>">
                        <a href="<?php echo base_url('skp/tandatangan_list');?>">
                            <span class="text">Tanda Tangan SKP</span>
                        </a>
                    </li>
                    <?php }?>
                    <?php if($sessionJen=='kp'||$sessionJen=='admin'){?>
                    <li class="<?php if ( $this->uri->segment(1) == 'pengiriman' && $this->uri->segment(2) == 'pengiriman_skp_terbit'  ) echo "active";?>">
                        <a href="<?php echo base_url('pengiriman/pengiriman_skp_terbit');?>">
                            <span class="text">Pengiriman SKP</span>
                        </a>
                    </li>
                    <?php }?>
                    <?php if($sessionJen=='dinas'||$sessionJen=='kp'||$sessionJen=='admin'){?>
                    <li class="<?php if ( $this->uri->segment(1) == 'pengiriman' && $this->uri->segment(2) == 'view_pengiriman_list'  ) echo "active";?>">
                        <a href="<?php echo base_url('pengiriman/view_pengiriman_list');?>">
                            <span class="text">Informasi Pengiriman</span>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </li>

            <?php if($sessionJen!='pejabat-dirjen'&&$sessionJen!='pejabat-direktur'){?>
            <!--DAFTAR PRODUK-->
            <li class="<?php if($this->uri->segment(1) == 'kunjungan') echo "active open";?>">
                <a href="javascript:void(0);" data-target="#kunjungan" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-paper-plane"></i></span>
                    <span class="text"><?php if($sessionJen == 'dinas'){ echo 'Pembinaan'; }else{ echo 'Supervisi'; }?></span>
                    <span class="arrow"></span>
                </a>
                <ul id="kunjungan" class="submenu collapse <?php if ( $this->uri->segment(1) == 'kunjungan' ) echo "in";?>">
                    <li class="submenu-header ellipsis">Kunjungan</li>
                    <li class="<?php if($this->uri->segment(1) == 'kunjungan' && ($this->uri->segment(2) == 'kunjungan_list' || $this->uri->segment(2) == 'kunjungan_detail')) echo "active";?>">
                        <a href="<?php echo base_url('kunjungan/kunjungan_list');?>">
                            <span class="text">Daftar Pembinaan</span>
                        </a>
                    </li>
                    <li class="<?php if ($this->uri->segment(1) == 'kunjungan' && ($this->uri->segment(2) == 'approval_list' || $this->uri->segment(2) == 'perbaikan_detail') ) echo "active";?>">
                        <a href="<?php echo base_url('kunjungan/approval_list');?>">
                            <span class="text">Saran Perbaikan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php }}?>

			<?php if($sessionJen!='pejabat-dirjen'&&$sessionJen!='pejabat-direktur'){?>
            <li class="<?php if($this->uri->segment(2) == 'informasi') echo "active";?>">
                <a href="<?php echo base_url('setting/informasi');?>">
                    <span class="figure"><i class="ico-info-sign"></i></span>
                    <span class="text">Informasi</span>
                </a>
            </li>
			<?php } ?>
            <!--Setting-->
            <li class="<?php if($this->uri->segment(1) == 'setting' && $this->uri->segment(2) == null) echo "active";?>">
                <a href="<?php echo base_url('setting');?>">
                    <span class="figure"><i class="ico-cog5"></i></span>
                    <span class="text">Setting</span>
                </a>
            </li>
        </ul>
        <!--/ END Template Navigation/Menu -->
    </section>
    <!--/ END Sidebar Container -->
</aside>
