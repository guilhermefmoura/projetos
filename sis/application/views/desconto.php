<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <title>Welcome to CodeIgniter</title>
        <link rel="stylesheet" href="<?php print base_url(); ?>css/styleGeral.css" type="text/css" media="screen" />        
        <link rel="stylesheet" href="<?php print base_url(); ?>css/jquery-ui-1.10.3.custom.css" type="text/css" media="screen" />
    </head>
    <body>
        <h1>Cadastrar Desconto</h1>
        <form id="frmCadastro" name="frmCadastro">
            <fieldset>
                <label>Produto</label>
                <input type="text" id="txt-produto" name="txt-produto"/>
            </fieldset>
            <fieldset>
                <label>Valor Desconto</label>
                <input type="text" id="txt-valor-desconto" name="txt-valor-desconto"/>
            </fieldset>
            <fieldset>
                <button id="btn-salvar" name="btn-salvar">Salvar</button>
                <button id="btn-adicionar" name="btn-adicionar">Adicionar</button>
            </fieldset>
        </form>
        
        <script src="<?php print base_url(); ?>js/jquery-1.9.1.js" type="text/javascript"></script>
        <script src="<?php print base_url(); ?>js/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
        <script src="<?php print base_url(); ?>js/jquery-action.js" type="text/javascript"></script>
        <script src="<?php print base_url(); ?>js/action.js" type="text/javascript"></script>
        <script src="<?php print base_url(); ?>js/desconto/action.js" type="text/javascript"></script>
    </body>
</html>