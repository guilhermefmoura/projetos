<div id="geral">
    <div class="entry">
        <h3><?php print $titulo; ?></h3>
        <div id="accordion">
            <h3>Última compra</h3>
            <div>
                <?php if(!empty($ultima_compra)){?>
                    <ul>
                        <li>Data: <?php print $ultima_compra->data_compra; ?></li>
                        <li>Valor: R$ <?php print number_format($ultima_compra->valor_compra, 2, ',', '.'); ?></li>
                    </ul>
                    <p><strong>Detalhes da compra</strong></p>
                    <?php foreach ($detalhes_ultima_compra as $values): ?>
                    <p><?php print $values->qtd_produto; ?> - <?php print utf8_decode($values->nome_produto); ?> - Total: R$ <?php print number_format($values->valor_total, 2, ',', '.'); ?></p>
                    <?php endforeach; ?>
                <?php } else { ?>
                        <p>Não existe compra cadastrada.</p>
                <?php } ?>
            </div>
            <h3>Último pagamento</h3>
            <div>
                <?php if(!empty($ultimo_pagamento)) { ?>
                    <p>Pagamento efetuado em: <?php print $ultimo_pagamento->data_pagamento; ?></p>
                    <p>Valor pago: R$ <?php print number_format($ultimo_pagamento->val_pago, 2, ',', '.'); ?></p>
                <?php } else { ?>
                    <p>Você ainda não efetuou pagamento.</p>
                <?php }  ?>
            </div>
            <h3>Último aviso</h3>
            <div>
                <p>Nenhum aviso</p>
            </div>
        </div>
    </div>
</div>