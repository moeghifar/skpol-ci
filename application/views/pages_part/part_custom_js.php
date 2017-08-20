<script type="text/javascript" src="<?php echo site_url('template/javascript/backend/custom.js');?>"></script>
<?php
    if(isset($js)) {
        if(is_array($js)) {
            foreach($js as $v) {
                echo '<script type="text/javascript" src="'.site_url($v).'"></script>';
            }
        } else {
            echo '<script type="text/javascript" src="'.site_url($js).'"></script>';
        }
    }
?>
