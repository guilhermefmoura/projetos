<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Site Restaurante - <?php print $titulo; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
        <link rel="stylesheet" href="<?php print base_url(); ?>css/jquery-ui-1.10.3.custom.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php print base_url(); ?>css/reset000.css" type="text/css" media="screen" />
	<!--[if ! lte IE 6]><!--><link rel="stylesheet" href="<?php print base_url(); ?>css/style000.css" type="text/css" media="screen" /><!--<![endif]-->
	<!--[if gt IE 6]><link rel="stylesheet" href="<?php print base_url(); ?>css/ie.css" type="text/css" media="screen" /><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" href="<?php print base_url(); ?>css/ie7.css" type="text/css" media="screen" /><![endif]-->
	<!--[if lte IE 6]><link rel="stylesheet" href="<?php print base_url(); ?>css/ie6.1.1.css" media="screen, projection"><![endif]-->
	<link rel="stylesheet" href="<?php print base_url(); ?>css/fancybox.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php print base_url(); ?>css/styleGeral.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
</head>
<body>
    <div id="header-top">
	<div class="container">
                <?php if($this->session->userdata('CLIENTE_AUT')) {?>
                <!-- inicio se houver sessão -->
                <p class="right">
                    Bem vindo(a) <strong><?php print utf8_decode($this->session->userdata('nome_cliente'));?></strong> - 
                    <?php print anchor('login/sair', 'Sair')?>
                </p>
                <!-- fim se houver sessão -->
                <?php } ?>
	</div>
    </div>
    <div id="header">
            <div class="container">
                <h1 id="logo">
                    <a href="index/index">
                        <img src="<?php print base_url(); ?>images/logo-geral.png" alt="Restaurante Tia Lourdes" />
                    </a>
                </h1>
            </div>
    </div>
    <div id="nav">
	<div class="container">
            <?php if(!$this->session->userdata('CLIENTE_AUT')) {?>
            <!-- se não tiver sessão -->
		<ul>
                    <li id="index"><?php print anchor(base_url(), 'Página Inicial')?></li>
                    <li id="orestaurante"><?php print anchor(base_url() . 'orestaurante', 'O Restaurante')?></li>
                    <li id="pedidos"><?php print anchor(base_url() . 'pedidoonline', 'Pedido Online')?></li>
                    <li id="localizacao"><?php print anchor(base_url() . 'localizacao', 'Localização')?></li>
                    <li id="contato"><?php print anchor(base_url() . 'contato', 'Contato')?></li>
		</ul>
            <!-- fim se não tiver sessão -->
            <?php } else { ?>
            <!-- se tiver sessão -->
                <ul>
                    <li id="index"><?php print anchor(base_url() . 'areacliente', 'Home do cliente')?></li>
                    <li id="index"><?php print anchor(base_url() . 'areacliente/minhaconta', 'Minha Conta')?></li>
                    <li id="orestaurante"><?php print anchor(base_url() . 'pedidoonline', 'Pedido Online')?></li>
                    <li id="localizacao"><?php print anchor(base_url() . 'areacliente/avisos', 'Avisos')?></li>
                    <li id="localizacao"><?php print anchor(base_url() . 'contato', 'Contato')?></li>
                    <li id="contato"><?php print anchor(base_url() . 'areacliente/meusdados', 'Meus Dados')?></li>
		</ul>
            <!-- fim se tiver sessão -->
            <?php } ?>
            <!--
		<div id="search">
			<input type="text" class="input" value="" />
			<input type="submit" class="submit" value="Buscar" />
		</div>
            -->
            </div>
    </div>