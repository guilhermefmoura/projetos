</div>

<?php

    $model = $this->uri->segment(1);
    
    if(empty($model)){
        $model = 'index';
    }
?>
<script src="<?php print base_url(); ?>js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="<?php print base_url(); ?>js/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
<script src="<?php print base_url(); ?>js/jquery-action.js" type="text/javascript"></script>
<script src="<?php print base_url(); ?>js/action.js" type="text/javascript"></script>
<script src="<?php print base_url(); ?>js/<?php print $model; ?>/action.js" type="text/javascript"></script>
<script src="<?php print base_url(); ?>js/fancybox/jquery.fancybox.pack.js?v=2.1.5" type="text/javascript"></script>
<script src="<?php print base_url(); ?>js/jquery.maskedinput.js" type="text/javascript"></script>

</body>
</html>