<?php print css_default(); ?>        
<?php print css_jquery_ui(); ?>

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
        
        <?php print js_jquery(); ?>
        <?php print js_jquery_ui(); ?>
        <?php print js_action(); ?>
        <script src="<?php print base_url(); ?>js/action.js" type="text/javascript"></script>
        <?php print js_action_controller($this->router->fetch_class()); ?>
    </body>
</html>