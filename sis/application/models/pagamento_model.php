<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagamento_model extends CI_Model {
    
    public function gravarPagamento($dados){        
        
        
    }
    
    public function buscarDadosPagamento($intCodCliente, $chTpoCliente, $strDate = 'SYSDATE()'){
        
        $sql = "SELECT 	cli.cod_cliente cod_cliente,
                        cli.nome_cliente nome_cliente,
                        (SELECT REPLACE(FORMAT(sum(ct.valor_compra), 2), '.', ',')
                            FROM conta ct
                            WHERE   ct.cod_cliente = cli.cod_cliente AND
                                    ct.tipo_cliente = '$chTpoCliente' AND
                                    ct.idt_pagamento = 'N' AND
                                    ct.dat_compra <= $strDate) val_conta,
                        (SELECT MAX(ct.dat_compra)
                            FROM conta ct
                            WHERE   ct.cod_cliente = cli.cod_cliente AND 
                                    ct.tipo_cliente = '$chTpoCliente' AND 
                                    ct.idt_pagamento = 'N' AND 
                                    ct.dat_compra <= $strDate) dat_maximo,
                        (SELECT MIN(ct.dat_compra)
                            FROM conta ct
                            WHERE   ct.cod_cliente = cli.cod_cliente AND 
                                    ct.tipo_cliente = '$chTpoCliente' AND 
                                    ct.idt_pagamento = 'N' AND 
                                    ct.dat_compra <= $strDate) dat_minimo
                FROM 	cliente cli
                WHERE cli.cod_cliente = $intCodCliente AND
                                        'C' = '$chTpoCliente'

                UNION ALL

                SELECT 	emp.cod_empresa cod_cliente,
                        emp.nome_empresa nome_cliente,
                        (SELECT REPLACE(FORMAT(sum(ct.valor_compra), 2), '.', ',')
                            FROM conta ct
                            WHERE   ct.cod_cliente = emp.cod_empresa AND
                                    ct.tipo_cliente = '$chTpoCliente' AND
                                    ct.idt_pagamento = 'N' AND
                                    ct.dat_compra <= $strDate) val_conta,
                        (SELECT MAX(ct.dat_compra)
                            FROM conta ct
                            WHERE   ct.cod_cliente = emp.cod_empresa AND 
                                    ct.tipo_cliente = '$chTpoCliente' AND 
                                    ct.idt_pagamento = 'N' AND 
                                    ct.dat_compra <= $strDate) dat_maximo,
                        (SELECT MIN(ct.dat_compra)
                            FROM conta ct
                            WHERE   ct.cod_cliente = emp.cod_empresa AND 
                                    ct.tipo_cliente = '$chTpoCliente' AND 
                                    ct.idt_pagamento = 'N' AND 
                                    ct.dat_compra <= $strDate) dat_minimo
                FROM 	empresa emp
                WHERE emp.cod_empresa = $intCodCliente AND
                      'E' = '$chTpoCliente'";

        $query = $this->db->query($sql);
        
        return $query->row();
        
    }
    
    public function calcular($dados){
        
        $strData = $this->date_format($dados['DATACONTA']);
        
        return $this->buscarDadosPagamento($dados['CODCLIENTE'], $dados['TPOCLIENTE'], "'$strData'");
        
    }
    
    public function date_format($strData){
        
        $arrDate = array();
        
        $arrDate = explode('/', $strData);
        
        $strData = $arrDate[2].'-'.$arrDate[1].'-'.$arrDate[0];
        
        return $strData;
    }
    
    public function gravarPagamentoComCredito($dados, $objDadosConta, $strTroco)
    {
        
        $this->db->trans_start();
        
        //grava conta histórico
        $this->gravaHistorico($dados, $objDadosConta);
        
        //atualiza todas as contas pagas
        
        
        //registra crédito na conta do cliente
        
        $this->db->trans_complete();
        
    }
    
    public function gravaHistorico($dados, $objDadosConta)
    {   
        //usuário log
        $intCodUsuario = $this->session->userdata('CODUSUARIO');
        
        //query insert
        $sql = "INSERT INTO conta_historico (
                        dat_inicio_conta,
                        dat_fim_conta,
                        dat_pagamento,
                        dat_operacao_log,
                        cod_usuario_log,
                        cod_cliente,
                        valor_conta,
                        valor_pago,
                        tipo_cliente
                    ) VALUES (
                        '$objDadosConta->dat_minimo',
                        '$objDadosConta->dat_maximo',
                        sysdate(),
                        sysdate(),
                        $intCodUsuario,
                        $dados[codcliente],
                        '$objDadosConta->val_conta',
                        '$dados[txt_valor_pago]',
                        '$dados[tipocliente]'
                    )";
        
        print $sql;
        exit;
    }
}
