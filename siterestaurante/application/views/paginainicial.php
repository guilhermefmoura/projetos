<br />
<div id="content">
	<div class="container">
		<div id="main">
                    <div class="entry" style="width: 606px;">
                            <div style="background-image: url(images/selfservice.jpg); background-repeat: no-repeat; height: 400px; border: 1px solid #D8D8D8;">
                                <div style="width: 200px; height: 100%; background-color: #000; color: #fff; filter:alpha(opacity=60); opacity:.6; text-align: justify; padding: 15px;">
                                        <h1>Restaurante Tia Lourdes</h1>
                                    <p>
                                        O <strong>Restaurante Tia Loures</strong> é uma empresa familiar que oferece pratos deliciósos da típica comida mineira.
                                    </p>
                                </div>
                            </div>
			</div>
		</div>
		<div id="sidebar">
                        <?php if(!$this->session->userdata('autenticado')) {?>
                        <!-- se estiver autenticado -->
                        <div id="recent-tabs" class="box">
				<div class="box-header">
					<ul class="nav">
						<li><a class="current" href="#">Área do cliente</a></li>
					</ul>
				</div>
				<div class="list-wrap">
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
                                    <div id="progress"></div>
				</div>
			</div>
                        <?php } ?>
                        <!-- fim se estiver autenticado -->
			<div id="recent-tabs" class="box">
				<div class="box-header">
					<ul class="nav">
						<li><a class="current" href="#">Publicidade</a></li>
					</ul>
				</div>
				<div class="list-wrap">
					<div id="list-publicidade">
						Anuncie aqui!
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>