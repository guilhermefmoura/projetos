<div id="context">
    <h1>Nova Empresa</h1>
   
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
