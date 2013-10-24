<div id="context">
    <h1>Registro de Pagamento</h1>
    
    <form id="frmCadastro">
        <fieldset>
            <label>Cliente</label>
            <input type="text" disabled="disabled" id="txt-nome" name="txt-nome" value="Guilherme de Freitas Moura"/>
        </fieldset>
        <fieldset>
            <label>Fechar conta até</label>
            <input type="text" id="txt-fechar-conta" name="txt-fechar-conta" />
        </fieldset>
        <fieldset>
            <label>Pago em</label>
            <input type="text" id="txt-pagamento-conta" name="txt-pagamento-conta" />
        </fieldset>
        <fieldset>
            <label>Valor da conta</label>
            <input type="text" disabled="disabled" id="txt-valor-conta" name="txt-valor-conta" value="R$ 10,00"/>
        </fieldset>
        <fieldset>
            <label>Valor pago</label>
            <input type="text" id="txt-valor-pago" name="txt-valor-pago" />
        </fieldset>
        <fieldset>
            <label>Comprovante:</label>
            <select id="ch-envia-comprovante" name="ch-envia-comprovante">
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
