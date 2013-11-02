<div id="context">
    <h1>Adicionar itens a conta (<?php print $codtempconta; ?>)</h1>
    
    <div id="editarLeft">
        <form class="frmCadastro">
            <fieldset>
                <label>Nome</label>
                <input type="text" disabled="disabled" id="txt-nome" name="txt-nome" value="<?php print utf8_decode($cliente->nome_cliente); ?>"/>
            </fieldset>
            <fieldset>
                <label>Empresa</label>
                <input type="text" disabled="disabled" id="txt-empresa" name="txt-empresa" value="<?php print utf8_decode($cliente->nome_empresa); ?>"/>
            </fieldset>
            <fieldset>
                <label>Setor</label>
                <input type="text" disabled="disabled" id="txt-setor" name="txt-setor" value="<?php print utf8_decode($cliente->nome_setor); ?>"/>
            </fieldset>
            <fieldset>
                <label>Matrícula</label>
                <input type="text" disabled="disabled" id="txt-matricula" name="txt-matricula" value="<?php print utf8_decode($cliente->matricula); ?>"/>
            </fieldset>
        </form>
    </div>
    <div id="editarRight">
        <h1>Atalhos</h1>
        <a href="<?php print base_url(); ?>cliente/visualizarcontafancybox/<?php print utf8_decode($cliente->cod_cliente); ?>" class="btn-visualizar-conta" id="btn-visualizar-conta" data-fancybox-type="iframe">Visualizar Conta</a>
        <a href="<?php print base_url(); ?>desconto/fancybox/10/C" id="btn-desconto" class="btn-desconto" data-fancybox-type="iframe">Desconto em produto</a>
        <a href="<?php print base_url(); ?>cliente/editarfancybox/10" class="btn-editar" id="btn-editar" data-fancybox-type="iframe">Editar Cliente</a>
        <a href="<?php print base_url(); ?>produto/fancybox" class="btn-produtos" id="btn-produtos" data-fancybox-type="iframe">Produtos</a>
        <br /><br />
        <h1>Adicionar Produtos</h1>
        <form class="frmCadastro" name="frmCadastro">
            <fieldset>
                <label>Produto</label>
                <input type="text" id="txt-produto" name="txt-produto" placeholder="Digite o nome do produto" />
            </fieldset>
            <fieldset>
                <label>Quantidade</label>
                <input type="text" id="txt-quantidade" name="txt-quantidade" placeholder="Quantidade"/>
            </fieldset>

            <fieldset>
                <button id="btn-adicionar">Adicionar</button>
            </fieldset>
        </form>
    </div>
    <h1>Lista de Produtos Adicionados</h1>
    <table id="table-itens">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor unitário</th>
                <th>Valor desconto</th>
                <th>Valor total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Coca 2L</td>
                <td>1</td>
                <td>6,00</td>
                <td>0,00</td>
                <td>6,00</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" align="right"><strong>Total Geral</strong>R$ 6,00</td>
            </tr>
        </tfoot>
    </table>
    
    <h1>Fechar Conta</h1>
    
     <form class="frmCadastro" name="frmCadastro">
            <fieldset>
                <label>Data da compra</label>
                <input type="text" id="txt-data-compra" name="txt-data-compra" />
            </fieldset>

            <fieldset>
                <button id="btn-salvar">Salvar</button>
                <button id="btn-cancelar">Cancelar</button>
            </fieldset>
        </form>
</div>