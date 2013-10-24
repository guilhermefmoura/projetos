<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <title>Welcome to CodeIgniter</title>
        <link rel="stylesheet" href="<?php print base_url(); ?>css/styleGeral.css" type="text/css" media="screen" />        
        <link rel="stylesheet" href="<?php print base_url(); ?>css/jquery-ui-1.10.3.custom.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

        <style type="text/css">
            
        </style>
    </head>
    <body>

        <div id="container">
            <?php if ($this->session->userdata('CLIENTE_AUT')) { ?>
                <div id="logo">
                    <img src="<?php print base_url(); ?>images/logo-geral.png" alt="Tia Lourdes Restaurante"/>
                </div>
                <div id="menu">
                    <ul>
<!--                        <li class="li">
                            <a href="#">Site</a>
                            <ul>
                                <li><a href="#">Cardápio</a></li>
                                <li><a href="">Horário</a></li>
                                <li><a href="">Página Inícial</a></li>
                                <li><a href="">Informações</a></li>
                            </ul>		
                        </li>-->
                        <li class="li">
                            <a href="#">Operacional</a>
                            <ul>
<!--                                <li><a href="">Recebimentos</a></li>-->
                                <li><a href="<?php print base_url(); ?>registrarconta">Registar Conta</a></li>
<!--                                <li><a href="">Registrar Crédito</a></li>-->
<!--                                <li><a href="">Caixa</a></li>-->
                            </ul>		
                        </li>
                        <li class="li">
                            <a href="#">Cadastros</a>
                            <ul>
                                <li><a href="<?php print base_url(); ?>cliente">Cliente</a></li>
                                <li><a href="<?php print base_url(); ?>empresa">Empresa</a></li>
                                <li><a href="<?php print base_url(); ?>setor">Setor</a></li>
                                <li><a href="<?php print base_url(); ?>produto">Produto</a></li>
<!--                                <li><a href="">Grupo</a></li>
                                <li><a href="">Menu</a></li>
                                <li><a href="">Tipo Comida</a></li>-->
                            </ul>		
                        </li>
<!--                        <li class="li">
                            <a href="#">Consultas</a>
                            <ul>
                                <li><a href="">Cliente</a></li>
                                <li><a href="">Empresa</a></li>
                            </ul>		
                        </li>-->
                        <li class="li">
                            <a href="#">Relatórios</a>
                            <ul><li><a href="">Empresa</a></li></ul>		
                        </li>
                    </ul>
                </div>
                <div id="info-usuario">
                    <ul>
                        <li>Bem vindo(a) <strong><?php print utf8_decode($this->session->userdata('NOMEUSUARIO')); ?></strong></li>
                        <li>Grupo: <strong><?php print utf8_decode($this->session->userdata('NOMEGRUPO')); ?></strong></li>
                        <li><?php print anchor('login/sair', 'Sair', array('id'=> 'btn-sair')) ?> </li>
                    </ul>
                </div>
            <?php } ?>