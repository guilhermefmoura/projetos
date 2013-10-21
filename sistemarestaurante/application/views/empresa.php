<div id="context">
    <h1>Empresa</h1>

    <p>Pesquisar empresa</p>

    <form id="frmPesquisar" name="frmPesquisar">
        <input type="text" id="txt-buscar" name="txt-buscar" placeholder="Digite o nome da empresa"/>
        <button id="btn-pesquisar" name="btn-pesquisar">Pesquisar</button>
    </form>
    
    <table id="table-itens">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Login</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="<?php print base_url(); ?>empresa/editar/10">Atual Transportes</a></td>
                <td>atual.transportes</td>
                <td><img src="images/icon-Ativo.png" /></td>
                <td><a href="<?php print base_url(); ?>empresa/editar/10"><img src="images/editar-empresa.png" /></a></td>
            </tr>
            <tr>
                <td><a href="<?php print base_url(); ?>empresa/editar/10">Atual Transportes</a></td>
                <td>atual.transportes</td>
                <td><img src="images/icon-Ativo.png" /></td>
                <td><a href="<?php print base_url(); ?>empresa/editar/10"><img src="images/editar-empresa.png" /></a></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" id="paginacao">1 | 2 | 3 | Próximo</td>
            </tr>
        </tfoot>
    </table>
    
    <button id="btn-novo" name="btn-novo">Nova Empresa</button>
</div>