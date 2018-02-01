<!DOCTYPE html>
<html class="backend image-body">
    <!-- START Head -->
    <head>
    <!-- START META SECTION -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KKP SKP ONLINE</title>
        <?php $this->load->view('pages_part/part_head');?>
        <script>
            const BASE_URL = "<?php echo base_url(); ?>";
        </script>
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body>
        <?php
        $this->load->view('pages_part/part_header');
        $this->load->view('pages_part/part_sidebar');
        ?>

        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid" style="min-height:84vh;margin-bottom:50px;">
            <!-- START MAIN CONTENT -->
            <!-- Page Header -->

			<div class="page-header page-header-block">
                <div class="page-header-section">
                    <h4 class="title semibold"><?php
                    if (isset($page_title)) {
                        echo($page_title);
                    }
                    ?></h4>
                </div>
            </div>
            <!-- Page Header -->
			<?php
				if($this->global_alert != ""){
                    if($this->global_alert == "revised"){
            ?>
				<div class="alert alert-info fade in">
				<h4 class="semibold">Revisi sudah diajukan!</h4>
				<h6 class="semibold">Harap menunggu verfikasi dari KKP</h6>
				</div>
			<?php
                    } else {
			?>
				<div class="alert alert-danger fade in">
				<h4 class="semibold">Peringatan, Anda Belum Bisa Mengajukan SKP!</h4>
				<p class="mb10"><?=$this->global_alert?></p>
				<a href="<?=site_url('upi/edit_detail')?>" class="btn btn-xs btn-danger">Kunjungi Halaman Ini</a>
				</div>
			<?php
                    }
				}
				// var_dump($this->session->userdata());
                if(isset($content)){
                $this->load->view($content);
                }
            ?>
            <!--/ END MAIN CONTENT -->
            </div>
            <!--/ END Template Container -->
			<!-- START Template Footer -->
			<footer id="footer" style="background:#F9F9F9;">
				<!-- START container-fluid -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<!-- copyright -->
							<p class="nm text-muted">&copy; <?php echo date('Y'); ?> by <a target="_blank" href="https://makrodevs.com">Makrodevs</a> </p>

							<!--/ copyright -->
						</div>
						<div class="col-sm-6 text-right visible-lg visible-sm" style="color:#0C5AA9;">
							SKP Online Kementrian Kelautan dan Perikanan
						</div>
					</div>
				</div>
				<!--/ END container-fluid -->
			</footer>
			<!--/ END Template Footer -->
            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
        <!--/ END Template Main -->

        <?php $this->load->view('pages_part/part_js');?>
        <?php $this->load->view('pages_part/part_custom_js');?>
    </body>
    <!--/ END Body -->
</html>
