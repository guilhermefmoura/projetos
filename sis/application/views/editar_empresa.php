<div id="context">
    <h1>Editar Empresa</h1>
    <div id="editarLeft">
        <form class="frmCadastro" id="frmCadastro">
            
            <fieldset>
                <label for="nome_empresa">Nome Empresa: </label>
                <input type="text"  id="nome_empresa" name="nome_empresa"  placeholder="Digite o nome da empresa"/>
            </fieldset>

            <fieldset>
                <label for="status_empresa">Status: </label>
                <select name="status_empresa" id="status_empresa">
                    <option value="1" selected>Ativo</option>
                    <option value="2">Inativo</option>
                </select>
            </fieldset>

            <fieldset>
                <label for="cnpj">CNPJ: </label>
                <input type="text"  id="cnpj" name="cnpj"  placeholder="Digite o cnpj"/>
            </fieldset>

            <fieldset>
                <label for="endereco">Endereço: </label>
                <input type="text"  id="endereco" name="endereco"  placeholder="Digite o endereço"/>
            </fieldset>
            
            <fieldset>
                <label for="email_empresa">Email: </label>
                <input type="text"  id="email_cliente" name="email_empresa"  placeholder="Digite o email"/>
            </fieldset>

            <fieldset>
                <label for="contato">Contato: </label>
                <input type="text"  id="contato" name="contato"  placeholder="Digite o contato"/>
            </fieldset>

            <fieldset>
                <label for="telefone">Telefone: </label>
                <input type="text"  id="telefone" name="telefone"  placeholder="Digite o telefone"/>
            </fieldset>

            <fieldset>
                <label for="login_usuario">Login:</label>
                <input type="text" id="login_usuario" name="login_usuario"  placeholder="Digite o login"/>
            </fieldset>

            <fieldset>
                <label for="senha_usuario">Senha:</label>
                <input type="password" id="txt-senha" name="txt-senha"  placeholder="Digite a senha"/>
            </fieldset>

            <fieldset>
                <label for="observacao">Observação: </label>
                <textarea id="observacao" name="observacao"></textarea>
            </fieldset>
            <fieldset>
                <button id="btn-salvar" name="btn-salvar">Salvar</button>
            </fieldset>
        </form>
    </div>
    <div id="editarRight">
        <h1>Outras opções</h1>

        <button link="<?php print base_url(); ?>empresa/visualizarconta/10" id="btn-visualizar-conta">Visualizar Conta</button>
        <a href="<?php print base_url(); ?>desconto/index/10/E" id="btn-desconto" class="btn-desconto" data-fancybox-type="iframe">Desconto em produto</a>
        <a href="<?php print base_url(); ?>credito/index/10/E" id="btn-credito" class="btn-credito" data-fancybox-type="iframe">Crédito</a>
        <button link="<?php print base_url(); ?>empresa/funcionariosempresa/10" id="btn-visualizar-funcionarios">Funcionários da empresa</button><br /><br />
        <button link="<?php print base_url(); ?>empresa/redefinirsenha/10" id="btn-redefinir-senha">Redefinir senha</button>

        <h1>Informações de conta</h1>

        <ul>
            <li>Última compra: <strong>01/10/2013</strong></li>
            <li>Valor da conta atual: <strong>R$ 20,00</strong></li>
            <li>Último pagamento: <strong>30/09/2013</strong></li>
            <li>Valor do último pagamento: <strong>R$ 20,00</strong></li>
        </ul>
    </div>
</div>
