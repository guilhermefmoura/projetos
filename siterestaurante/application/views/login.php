<div id="geral">
    <div class="entry">
        <h3><?php print $titulo; ?></h3>
        
        <p><?php print $mensagem; ?></p>
        
        <div id="div-login">
            <?php print form_open('login/entrar') ?>
            <?php print form_label('Usuário:')?> <br />
            <?php print form_input(array('name' => 'txt-login', 'id' => 'txt-login'), set_value('txt-login'), 'autofocus'); ?><br />
            <?php print form_label('Senha:')?> <br />
            <?php print form_password(array('name' => 'txt-senha', 'id' => 'txt-senha')); ?><br /><br />
            <?php print form_submit(array('name' => 'btn-entrar', 'id' => 'btn-entrar'), 'Entrar')?>
            <?php print form_close(); ?>
            <?php print validation_errors('<p>', '</p>'); ?>
        </div>
    </div>
</div>