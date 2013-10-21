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
             
             if($ct->cod_item_conta != $coditemconta){
                 $coditemconta = $ct->cod_item_conta;
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
print $paginacao;
?>
