<!DOCTYPE html>
<html class="backend">
    <!-- START Head -->
    <head>
    <!-- START META SECTION -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Error Page</title>
        <?php $this->load->view('pages_part/part_head');?>
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body>
        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <section class="container">
                <?php $this->load->view($content);?>
            </section>
            <!--/ END Template Container -->
        </section>
        <!--/ END Template Main -->

        <?php $this->load->view('pages_part/part_js');?>
    </body>
    <!--/ END Body -->
</html>
