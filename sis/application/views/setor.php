<div id="context">
    <h1>Setor</h1>
    
    <p>Pesquisar setor</p>

    <form id="frmPesquisar" name="frmPesquisar">
        <input type="text" id="txt-buscar" name="txt-buscar" placeholder="Digite o nome do setor"/>
        <button id="btn-pesquisar" name="btn-pesquisar">Pesquisar</button>
    </form>
    
    <table id="table-itens">
        <thead>
            <tr>
                <th>Nome</th>
                <th>A��o</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="<?php print base_url(); ?>setor/editar/10">Inform�tica</a></td>
                <td><a href="<?php print base_url(); ?>setor/editar/10"><img src="images/editar-setor.png" /></a></td>
            </tr>
            <tr>
                <td><a href="<?php print base_url(); ?>setor/editar/10">Manuten��o</a></td>
                <td><a href="<?php print base_url(); ?>setor/editar/10"><img src="images/editar-setor.png" /></a></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" id="paginacao">1 | 2 | 3 | Pr�ximo</td>
            </tr>
        </tfoot>
    </table>
    
    <button id="btn-novo" name="btn-novo">Novo Setor</button>
</div>