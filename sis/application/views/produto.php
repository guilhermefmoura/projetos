<div id="context">
    <h1>Produto</h1>

    <p>Pesquisar produto</p>

    <form id="frmPesquisar" name="frmPesquisar">
        <input type="text" id="txt-buscar" name="txt-buscar" placeholder="Digite o nome do produto"/>
        <button id="btn-pesquisar" name="btn-pesquisar">Pesquisar</button>
    </form>
    
    <table id="table-itens">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="<?php print base_url(); ?>produto/editar/10">Almoço</a></td>
                <td>R$ 9,00</td>
                <td><img src="<?php print base_url(); ?>images/icon-Ativo.png" /></td>
                <td><a href="<?php print base_url(); ?>produto/editar/10"><img src="<?php print base_url(); ?>images/editar-usuario.png" /></a></td>
            </tr>
            <tr>
                <td><a href="<?php print base_url(); ?>produto/editar/10">Coca-cola 2L</a></td>
                <td>R$ 9,00</td>
                <td><img src="<?php print base_url(); ?>images/icon-Ativo.png" /></td>
                <td><a href="<?php print base_url(); ?>produto/editar/10"><img src="<?php print base_url(); ?>images/editar-usuario.png" /></a></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" id="paginacao">1 | 2 | 3 | Próximo</td>
            </tr>
        </tfoot>
    </table>
    
    <button id="btn-novo" name="btn-novo">Novo Produto</button>
</div>