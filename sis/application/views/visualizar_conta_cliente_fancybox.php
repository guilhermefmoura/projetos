<link rel="stylesheet" href="<?php print css_default(); ?>" type="text/css" media="screen" />        
<link rel="stylesheet" href="<?php print css_jquery_ui(); ?>" type="text/css" media="screen" />
<div id="context">
    <h1><?php print $titulo; ?></h1>
    <div id="accordion">
        <?php 
            $codconta = '';
            $coditemconta = '';
            foreach ($conta_detalhe as $conta):
                
                if($conta->cod_conta != $codconta){
                    
                    $codconta = $conta->cod_conta;
                    
                    print '<h3>'.$conta->dat_compra.' - R$ '.$conta->valor_compra.' <img class="conta" codconta="'.$conta->cod_conta.'" src="'.base_url().'images/btn-excluir.png" align="right"/></h3>';
                    
                    print '<div>
                                <table class="table-itens">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Valor unitário</th>
                                            <th>Valor desconto</th>
                                            <th>Valor Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                    
                    foreach ($conta_detalhe as $containfo):
                        
                        if($containfo->cod_item_conta != $coditemconta && $codconta == $containfo->cod_conta){
                            
                            $coditemconta = $containfo->cod_item_conta;
                            
                            print '<tr>
                                        <td>'.utf8_decode($containfo->nome_produto).'</td>
                                        <td>'.$containfo->qtd_produto.'</td>
                                        <td>R$ '.$containfo->valor_unitario.'</td>
                                        <td>R$ '.$containfo->valor_desconto.'</td>
                                        <td>R$ '.$containfo->valor_total.'</td>
                                    </tr>';
                        }
                        
                    endforeach;
                    
                    print '</tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="footer-conta">Total R$ '.$conta->valor_compra.'</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>';
                }
            endforeach;
        ?>
    </div>
    <div id="footer-totalgeral">
        <p>Total Geral R$ <?php print $soma_conta->valor_geral;?></p>
    </div>
</div>
<script src="<?php print js_jquery(); ?>" type="text/javascript"></script>
<script src="<?php print js_jquery_ui(); ?>" type="text/javascript"></script>
<script src="<?php print js_action(); ?>" type="text/javascript"></script>
<script src="<?php print js_action_controller($this->router->fetch_class()); ?>" type="text/javascript"></script>