<div id="context">
    <h1>Registro de Pagamento</h1>
    
    <form id="frmCadastro">
        <fieldset>
            <label>Cliente</label>
            <input type="text" disabled="disabled" id="txt_nome" name="txt_nome" value="<?php print utf8_decode($conta->nome_cliente); ?>"/>
        </fieldset>
        <fieldset>
            <label>Fechar conta até</label>
            <input type="text" id="txt_fechar_conta" name="txt_fechar_conta" />
        </fieldset>
        <fieldset>
            <label>Pago em</label>
            <input type="text" id="txt_pagamento_conta" name="txt_pagamento_conta" />
        </fieldset>
        <fieldset>
            <label>Valor da conta R$ </label>
            <input type="text" disabled="disabled" id="txt_valor_conta" name="txt_valor_conta" value="<?php print $conta->val_conta; ?>"/>
            <button id="btn-calcular"></button>
        </fieldset>
        <fieldset>
            <label>Valor pago</label>
            <input type="text" id="txt_valor_pago" name="txt_valor_pago" />
        </fieldset>
        <fieldset>
            <label>Registra crédito:</label>
            <select id="ch_registra_credito" name="ch_registra_credito">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </fieldset>
        <fieldset>
            <label>Comprovante:</label>
            <select id="ch_envia_comprovante" name="ch_envia_comprovante">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </fieldset>
        <fieldset>
            <input type="hidden" name="tipocliente" id="tipocliente" value="<?php print $this->uri->segment("4");?>"/>
            <input type="hidden" name="codcliente" id="codcliente" value="<?php print $this->uri->segment("3");?>"/>
            <button id="btn-salvar" name="btn-salvar">Salvar</button>
        </fieldset>
    </form>
</div>
