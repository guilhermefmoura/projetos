<div id="context">
    <h1>Novo Produto</h1>
    
    <form class="frmCadastro" id="frmCadastro">
        <fieldset>
            <label>Nome</label>
            <input type="text" name="txt-nome" id="txt-nome" placeholder="Digite o nome do produto"/>
        </fieldset>
        <fieldset>
            <label>Status</label>
            <select id="sel-status" name="sel-status">
                <option value="0">Selecione</option>
                <option value="1">Ativo</option>
            </select>
        </fieldset>
        <fieldset>
            <label>Valor</label>
            <input type="text" name="txt-valor" id="txt-valor" placeholder="Digite o valor do produto"/>
        </fieldset>
        <fieldset>
            <label>Estoque</label>
            <input type="text" name="txt-quantidade-estoque" id="txt-quantidade-estoque" placeholder="Digite a quantidade em estoque"/>
        </fieldset>
        <fieldset>
            <button id="btn-salvar" name="btn-salvar">Salvar</button>
        </fieldset>
    </form>
</div>