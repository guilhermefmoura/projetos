<?php 
    if($htmlPdf)
    {
?>

<table width="100%" border="0" style="font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">
    <tr>
        <td height="50" width="20%"><img src="images/logo-geral.png" alt="imgLogo"/></td>
        <td align="center"><h2>Relação de débitos</h2></td>
        <td valign="top" align="right" width="20%">
            <span style="font-size: 8pt;">
                <strong>Gerado em:</strong> <?php print date('d/m/Y') ?>
            </span>
        </td>
    </tr>
</table>
<br />
<br />
<table width="100%" border="0" style="font-family: Arial, Helvetica, sans-serif; font-size: 10pt; margin-bottom: 3px;">
    <tr>
        <td><strong>Cliente: </strong> <?php print utf8_decode($cliente->nome_cliente);?></td>
    </tr>
    <tr>
        <td><strong>Empresa: </strong> <?php print utf8_decode($cliente->nome_empresa);?></td>
    </tr>
    <tr>
        <td><strong>Setor: </strong> <?php print utf8_decode($cliente->nome_setor);?></td>
    </tr>
    <tr>
        <td><strong>Período da conta: </strong> <?php print date('d/m/Y', strtotime($periodo_conta->dat_inicio));?> à <?php print date('d/m/Y', strtotime($periodo_conta->dat_fim));?></td>
    </tr>
    <tr>
        <td><strong>Soma Geral: </strong> R$ <?php print number_format($soma_total->val_compra, 2, ',', '.'); ?></td>
    </tr>
</table>

<?php
    print $html;
    }else {
        print '<iframe src="' . $path . '" width="770" height="520" noresize="noresize"></iframe>'; 
    }
?>