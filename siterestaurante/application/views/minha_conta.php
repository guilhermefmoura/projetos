<style type="text/css">
    .divPaginacao {
        margin-top: 10px;
        text-align: right;
    }
    ul#pagination {
        padding:0px;
	margin:0px;
	list-style:none;
    }
    
    ul#pagination li.bt-pagination a {
        color: #333;
	text-decoration: none;
    }
    
    ul#pagination li {
        padding: 2px 10px;
        display: inline;
	/* visual do link */
	color: #333;
	margin: 0px;
    }
    
    ul#pagination li.bt-pagination:hover {
        background-color:#D6D6D6;
	color: #6D6D6D;
	border-bottom:3px solid #EA0000;
    }
    
</style>
<div id="geral">
    <div class="entry">
        <h3><?php print $titulo; ?></h3>
        
        <div id="left">
            <ul>
                <li><?php print anchor('areacliente/minhaconta/atual', '&raquo; Conta Atual'); ?></li>
                <li><?php print anchor('areacliente/minhaconta/historico', '&raquo; Histórico'); ?></li>
            </ul>
        </div>
        <div id="right">
            <div id="dialog"></div>
            <?php if($this->uri->segment(3) == 'atual' || $this->uri->segment(3) == null){ ?>
            <h2><strong>Conta Atual</strong></h2>
            <style type="text/css">
                .opbotoes li {
                    float: left;
                    position: relative;
                    top: 10px;
                }
                .opbotoes {
                    list-style: none;
                }
            </style>
                <ul class="opbotoes">
                    <li>
                        <?php print anchor('areacliente/imprimir', 'Visualizar para impressão', array('id' => 'btnImprimirContaAtual', 'class' => 'various', 'data-fancybox-type' => 'iframe')); ?>
                    </li>
                    <li>
                        <?php print anchor('areacliente/imprimir/email', 'Enviar por email', array('id' => 'btnEnviarPorEmail', 'class' => 'btnEnviarPorEmail fancybox.ajax')); ?>
                    </li>
                </ul>
            <br /><br /><br />
            <div id="accordion">
               <?php 
                $codconta = '';
$html = '';
$coditemconta = '';

foreach ($contas as $ct):
    
    if($ct->cod_conta != $codconta){
         $codconta = $ct->cod_conta;
         $html .= '<h3>'.date('d/m/Y', strtotime($ct->dat_compra)).' - R$ '. number_format($ct->valor_compra, 2, ',', '.') .'</h3>';
         $html .= '<div>';
         
         $html .= '<table width="100%" style="font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">
                                <tr>
                                    <td><strong>Produto</strong></td>
                                    <td><strong>Quantidade</strong></td>
                                    <td><strong>Valor Unitário</strong></td>
                                    <td><strong>Valor Desconto</strong></td>
                                    <td><strong>Valor Total</strong></td>
                                </tr>';
         
         foreach ($contas as $ict):
             
             if($ict->cod_item_conta != $coditemconta && $codconta == $ict->cod_conta){
                 $coditemconta = $ict->cod_item_conta;
                 $html .= '<tr>
                                    <td>'.utf8_decode($ict->nome_produto).'</td>
                                    <td>'.$ict->qtd_produto.'</td>
                                    <td>'.number_format($ict->valor_unitario, 2, ',', '.').'</td>
                                    <td>'.number_format($ict->valor_desconto, 2, ',', '.').'</td>
                                    <td>'.number_format($ict->valor_total, 2, ',', '.').'</td>
                                 </tr>';
             }
         endforeach;
         
         $html .= '</table>';
         
         $html .= '</div>';
    }
    
endforeach;

print $html;
               ?>
                
            </div>
            <div class="divPaginacao">
                <?php print $paginacao; ?>
            </div>
            
            <br /><h2>Total da conta: R$ <?php print number_format($soma->val_compra, 2, ',', '.');?></h2>
                <?php foreach ($atualizado as $datAtualizacao):?>
                    <p><strong>Atualizado em: </strong><?php print date('d/m/Y H:i', strtotime($datAtualizacao->dat_operacao_log))?>h.</p>       
                <?php endforeach; ?>
            <?php } ?>
                    
                    
            <?php    if($this->uri->segment(3) == 'historico'){ ?>
                    <h2><strong>Histórico</strong></h2>
                    <p>Em breve estará disponível</p>
                <?php } ?>
        </div>
    </div>
</div>