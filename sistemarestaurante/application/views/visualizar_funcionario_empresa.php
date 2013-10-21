<div id="context">
    <h1>Lista de Funcionários - Atual Transportes</h1>
    
    <p>Pesquisar funcionário</p>

    <form id="frmPesquisar" name="frmPesquisar">
        <input type="text" id="txt-buscar" name="txt-buscar" placeholder="Digite o nome do funcionário"/>
        <button id="btn-pesquisar" name="btn-pesquisar">Pesquisar</button>
    </form>
    
    <table id="table-itens">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Setor</th>
                <th>Login</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="<?php print base_url(); ?>cliente/editar/10">Guilherme de Freitas</a></td>
                <td>Informática</td>
                <td>guilherme.moura</td>
                <td><img src="<?php print base_url(); ?>images/icon-Ativo.png" /></td>
                <td><a href="<?php print base_url(); ?>cliente/editar/10"><img src="<?php print base_url(); ?>images/editar-usuario.png" /></a></td>
            </tr>
            <tr>
                <td><a href="<?php print base_url(); ?>cliente/editar/10">Guilherme de Freitas</a></td>
                <td>Informática</td>
                <td>guilherme.moura</td>
                <td><img src="<?php print base_url(); ?>images/icon-Ativo.png" /></td>
                <td><a href="<?php print base_url(); ?>cliente/editar/10"><img src="<?php print base_url(); ?>images/editar-usuario.png" /></a></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" id="paginacao">1 | 2 | 3 | Próximo</td>
            </tr>
        </tfoot>
    </table>
</div>