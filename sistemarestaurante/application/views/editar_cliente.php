<div id="context">
    <h1>Editar Cliente</h1>
    <div id="editarLeft">
        <form class="frmCadastro" id="frmCadastro">
        <fieldset>
            <label>Nome</label>
            <input type="text" name="txt-nome" id="txt-nome" placeholder="Digite o nome" value="<?php print utf8_decode($cliente->nome_cliente) ?>"/>
        </fieldset>
        <fieldset>
            <label>Status</label>
            <select id="sel-status" name="sel-status">
                <?php print $status; ?>
            </select>
        </fieldset>
        <fieldset>
            <label>Cpf</label>
            <input type="text" name="txt-cpf" id="txt-cpf" placeholder="Digite o cpf" value="<?php print utf8_decode($cliente->cpf_cliente) ?>"/>
        </fieldset>
        <fieldset>
            <label>Endereço</label>
            <input type="text" name="txt-endereco" id="txt-endereco" placeholder="Digite o endereço" value="<?php print utf8_decode($cliente->endereco) ?>"/>
        </fieldset>
        <fieldset>
            <label>Complemento</label>
            <input type="text" name="txt-complemento" id="txt-complemento" placeholder="Digite o complemento" value="<?php print utf8_decode($cliente->complemento) ?>"/>
        </fieldset>
        <fieldset>
            <label>Email</label>
            <input type="text" name="txt-email" id="txt-email" placeholder="Digite o email" value="<?php print utf8_decode($cliente->email_cliente) ?>"/>
        </fieldset>
        <fieldset>
            <label>Celular</label>
            <input type="text" name="txt-celular" id="txt-celular" placeholder="Digite o celular" value="<?php print utf8_decode($cliente->celular) ?>"/>
        </fieldset>
        <fieldset>
            <label>Telefone</label>
            <input type="text" name="txt-telefone" id="txt-telefone" placeholder="Digite o telefone" value="<?php print utf8_decode($cliente->telefone) ?>"/>
        </fieldset>
        <fieldset>
            <label>Empresa</label>
            <input type="text" name="txt-empresa" id="txt-empresa" placeholder="Digite a empresa" value="<?php print utf8_decode($cliente->nome_empresa) ?>"/>
            <input type="hidden" name="txt-codempresa" id="txt-codempresa" value="<?php print $cliente->cod_empresa ?>"/>
        </fieldset>
        <fieldset>
            <label>Setor</label>
            <input type="text" name="txt-setor" id="txt-setor" placeholder="Digite o setor" value="<?php print utf8_decode($cliente->nome_setor) ?>"/>
            <input type="hidden" name="txt-codsetor" id="txt-codsetor" value="<?php print $cliente->cod_setor ?>"/>
        </fieldset>
        <fieldset>
            <label>Matrícula</label>
            <input type="text" name="txt-matricula" id="txt-matricula" placeholder="Digite a matrícula" value="<?php print utf8_decode($cliente->matricula) ?>"/>
        </fieldset>
        <fieldset>
            <label>Login</label>
            <input type="text" name="txt-login" id="txt-login" placeholder="Digite o login" value="<?php print utf8_decode($cliente->login_usuario) ?>"/>
        </fieldset>
        <fieldset>
            <label>Senha</label>
            <input type="password" name="txt-senha" id="txt-senha" placeholder="Digite a senha" value="<?php print utf8_decode($cliente->senha_usuario) ?>"/>
        </fieldset>
        <fieldset>
            <label>Observação</label>
            <textarea id="txt-observacao" name="txt-observacao"><?php print utf8_decode($cliente->obs_cliente);?></textarea>
        </fieldset>
        <fieldset>
            <input type="hidden" name="txt-codcliente" id="txt-codcliente" value="<?php print $cliente->cod_cliente ?>"/>
            <input type="hidden" name="txt-codusuario" id="txt-codusuario" value="<?php print $cliente->cod_usuario ?>"/>
            <button id="btn-salvar" name="btn-salvar">Salvar</button>
        </fieldset>
    </form>
    </div>
    <div id="editarRight">
        <h1>Outras opções</h1>
        
        <button link="<?php print base_url(); ?>cliente/visualizarconta/<?php print $cliente->cod_cliente; ?>" id="btn-visualizar-conta">Visualizar Conta</button>
        <a href="<?php print base_url(); ?>desconto/index/<?php print $cliente->cod_cliente; ?>/C" id="btn-desconto" class="btn-desconto" data-fancybox-type="iframe">Desconto em produto</a>
        <a href="<?php print base_url(); ?>credito/index/<?php print $cliente->cod_cliente; ?>/C" id="btn-credito" class="btn-credito" data-fancybox-type="iframe">Crédito</a>
        <button link="<?php print base_url(); ?>cliente/redefinirsenha/<?php print $cliente->cod_cliente; ?>" id="btn-redefinir-senha">Redefinir senha</button>
        
        <h1>Informações de conta</h1>
        
        <ul>
            <li>Última compra: <strong><?php print $cliente->ultima_compra; ?></strong></li>
            <li>Valor última compra: <strong>R$ <?php print number_format($cliente->valor_ultima_compra,2,',', '.'); ?></strong></li>
            <li>Valor da conta atual: <strong>R$ <?php print number_format($cliente->valor_conta_atual,2,',', '.'); ?></strong></li>
            <li>Último pagamento: <strong><?php print $cliente->ultimo_pagamento; ?></strong></li>
            <li>Valor do último pagamento: <strong>R$ <?php print number_format($cliente->valor_ultimo_pagamento,2,',', '.'); ?></strong></li>
        </ul>
    </div>
</div>
