<div id="geral">
    <div class="entry">
        <h3><?php print $titulo; ?></h3>
        <div id="meus_dados">
            <?php if($this->session->flashdata('atualizado')){
                    print '<p><strong>'.$this->session->flashdata('atualizado').'</strong></p>';
                }
            ?>
            <?php print form_open('cliente/atualizar');?>

            <?php print form_label('Nome: ')?> <br />
            <?php print form_input(array('id' => 'nome_cliente', 'name' => 'nome_cliente'), utf8_decode($cliente->nome_cliente), 'disabled'); ?><br />
            <?php print form_label('CPF: ')?> <br />
            <?php print form_input(array('id' => 'cpf_cliente', 'name' => 'cpf_cliente'), $cliente->cpf_cliente, 'disabled'); ?><br />
            <?php print form_label('Endereço: ')?> <br />
            <?php print form_input(array('id' => 'endereco', 'name' => 'endereco'), utf8_decode($cliente->endereco), 'disabled'); ?><br />
            <?php print form_label('Celular: ')?> <br />
            <?php print form_input(array('id' => 'celular', 'name' => 'celular'), $cliente->celular); ?><br />
            <?php print form_label('Telefone: ')?> <br />
            <?php print form_input(array('id' => 'telefone', 'name' => 'telefone'), $cliente->telefone); ?><br />
            <?php print form_label('Email: ')?> <br />
            <?php print form_input(array('id' => 'email_cliente', 'name' => 'email_cliente'), $cliente->email_cliente); ?><br />
            
            <?php print form_submit(array('id' => 'btn_submit', 'name' => 'btn_submit'), 'Atualizar')?>
            <?php print form_close();?>
        </div>
    </div>
</div>