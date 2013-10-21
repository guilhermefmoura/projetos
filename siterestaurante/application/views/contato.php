<div id="geral">
    <div class="entry">
        <h3><?php print $titulo; ?></h3>
        
        <div id="meus_dados">
            <?php if($this->session->flashdata('enviado')){
                    print '<p><strong>'.$this->session->flashdata('enviado').'</strong></p>';
                }
            ?>
            <?php print form_open('contato/enviar');?>
            <?php print validation_errors('<p>', '</p>'); ?>
            <?php print form_label('Nome: ')?> <br />
            <?php print form_input(array('id' => 'txt_nome', 'name' => 'txt_nome'), set_value('txt_nome')); ?><br />
            <?php print form_label('Email: ')?> <br />
            <?php print form_input(array('id' => 'txt_email', 'name' => 'txt_email'), set_value('txt_email')); ?><br />
            <?php print form_label('Assunto: ')?> <br />
            <?php print form_input(array('id' => 'txt_assunto', 'name' => 'txt_assunto'), set_value('txt_assunto')); ?><br />
            <?php print form_label('Mensagem: ')?> <br />
            <?php print form_textarea(array('id' => 'txt_mensagem', 'name' => 'txt_mensagem'), set_value('txt_mensagem')); ?><br />
            <?php print form_submit(array('id' => 'btn_submit', 'name' => 'btn_submit'), 'Enviar')?>
            <?php print form_close();?>
        </div>
        
    </div>
</div>