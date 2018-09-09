<!DOCTYPE html>
<html class="image-body">
    <!-- START Head -->
    <head>
    <!-- START META SECTION -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KKP SKP ONLINE</title>
        <?php $this->load->view('pages_part/part_head');?>
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body class="bgcover">

        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <div class="row" style="margin-top:-30px;">
                    <!-- START MAIN CONTENT -->
					<div class="col-lg-12" style="padding:10px;">
						<div class="text-center">
							<img src="<?=base_url('template/image/logo.png')?>" style="width:100px;margin-bottom:-10px;">
							<h4 class="semibold" style="font-size:1.4em;">
								SKP - ONLINE
								<br/>KEMENTERIAN KELAUTAN DAN PERIKANAN
								<br/>DIREKTORAT JENDERAL PENGUATAN DAYA SAING PRODUK KELAUTAN DAN PERIKANAN
								<br/>SISTEM PENERBITAN SERTIFIKAT KELAYAKAN PENGOLAHAN ( SKP )
							</h4>
						</div>
					</div>
					<div class="col-lg-2 col-lg-offset-5">
						<?php
							$pos = $this->uri->segment(2);
							if($pos == 'login'){
								$active['login'] = 'active';
								$active['reg'] = '';
							}elseif($pos == 'registrasi'){
								$active['login'] = '';
								$active['reg'] = 'active';
							}
						?>
						<div class="btn-group btn-group-justified mb15">
							<a class="btn btn-primary <?=$active['login']?>" href="<?=site_url('auth/login')?>">Login</a>
							<a class="btn btn-primary <?=$active['reg']?>" href="<?=site_url('auth/registrasi')?>">Daftar</a>
						</div>
					</div>
					<?php $this->load->view($content); ?>
                	<!--/ END MAIN CONTENT -->
                </div>
            </div>
            <!--/ END Template Container -->
        </section>
        <!--/ END Template Main -->
		<?php 
		$this->load->view('pages_part/part_js');
		if($pos == 'registrasi'){
			$this->load->view('pages_part/part_login_js');
		}
		?>
    </body>
    <!--/ END Body -->
</html>
