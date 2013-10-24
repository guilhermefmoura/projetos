<div id="context">
    <h1>Cliente</h1>

    <p>Pesquisar cliente</p>

    <form id="frmPesquisar" name="frmPesquisar">
        <input type="text" id="txt-buscar" name="txt-buscar" placeholder="Digite o nome do cliente"/>
        <input type="hidden" id="hidCodCliente" name="hidCodCliente" />
        <button id="btn-pesquisar" name="btn-pesquisar">Pesquisar</button>
    </form>
    <div id="tblClientes">
        <table id="table-itens">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Empresa / Setor</th>
                    <th>Login</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <button id="btn-novo" name="btn-novo">Novo Cliente</button>
</div>