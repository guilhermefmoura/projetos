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
        
        /*===========================================================*
         * Todo pagamento é registrado em um histórico de pagamentos *
         *===========================================================*/
            $intCodContaHistorico = $this->gravaHistorico($dados, $objDadosConta);
        
        /*===========================================================*
         * Atualiza as contas com indicador de pagamento             *   
         *===========================================================*/
            $this->updateContaPaga($intCodContaHistorico->CODCONTAHISTORICO, $dados);
        
        /*===========================================================*
         * Cadastra o crédito na conta do cliente
         *===========================================================*/
            $this->insertCredito($dados, $strTroco, $intCodContaHistorico->CODCONTAHISTORICO);
        
        $this->db->trans_complete();
        
    }
    
    public function gravarPagamentoSemCredito($dados, $objDadosConta)
    {
        
        $this->db->trans_start();
        
        /*===========================================================*
         * Todo pagamento é registrado em um histórico de pagamentos *
         *===========================================================*/
            $intCodContaHistorico = $this->gravaHistorico($dados, $objDadosConta);
        
        /*===========================================================*
         * Atualiza as contas com indicador de pagamento             *   
         *===========================================================*/
            $this->updateContaPaga($intCodContaHistorico->CODCONTAHISTORICO, $dados);
        
        
        $this->db->trans_complete();
        
    }
    
    public function gravarPagamentoComSaldoDevedor($dados, $objDadosConta, $strTroco)
    {
        
        $this->db->trans_start();
        
        /*===========================================================*
         * Todo pagamento é registrado em um histórico de pagamentos *
         *===========================================================*/
            $intCodContaHistorico = $this->gravaHistorico($dados, $objDadosConta);
        
        /*===========================================================*
         * Atualiza as contas com indicador de pagamento             *   
         *===========================================================*/
            $this->updateContaPaga($intCodContaHistorico->CODCONTAHISTORICO, $dados);
        
        /*===========================================================*
         * Cadastra o crédito na conta do cliente
         *===========================================================*/
            $this->insertSaldoDevedor($dados, $strTroco, $intCodContaHistorico->CODCONTAHISTORICO);
        
        $this->db->trans_complete();
        
    }
    
    public function gravaHistorico($dados, $objDadosConta)
    {   
        //usuário log
        $intCodUsuario = $this->session->userdata('CODUSUARIO');
        $strValorPago = str_replace(',', '.', $dados['txt_valor_pago']);
        $strValorConta = str_replace(',', '.', $objDadosConta->val_conta);
        
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
                    '$strValorConta',
                    '$strValorPago',
                    '$dados[tipocliente]'
                )";
        
        
        $this->db->query($sql);
        
        //recupera o código da conta histórico cadastrada
        $sql = "SELECT MAX(cod_conta_historico) CODCONTAHISTORICO 
                    FROM conta_historico 
                WHERE cod_cliente = $dados[codcliente] AND 
                      tipo_cliente = '$dados[tipocliente]' AND
                      cod_usuario_log = $intCodUsuario";
        
        $query = $this->db->query($sql);
        
        return $query->row();
        
    }
    
    public function updateContaPaga($intCodContaHistorico, $arrConta)
    {
        $strData = $this->date_format($arrConta['txt_fechar_conta']);
        $strDataPagamento = $this->date_format($arrConta['txt_pagamento_conta']);
        
        $sql = "UPDATE conta
                    SET idt_pagamento = 'S',
                        cod_conta_historico = $intCodContaHistorico,
                        dat_pagamento = $strDataPagamento
                WHERE cod_cliente = $arrConta[codcliente] AND 
                        tipo_cliente = '$arrConta[tipocliente]' AND 
                        idt_pagamento = 'N' AND
                        dat_compra <= '$strData'";
        
        $this->db->query($sql);
        
    }
    
    public function insertCredito($dados, $strTroco, $intCodContaHistorico)
    {
        
        //grava conta
        $intCodConta = $this->gravarConta($dados, $strTroco, $intCodContaHistorico);
        
        //gravar item de crédito na conta
        $this->insertItemConta($strTroco, $intCodConta->CODCONTA, 2);
        
    }
    
    public function insertSaldoDevedor($dados, $strTroco, $intCodContaHistorico)
    {
        
        //grava conta
        $intCodConta = $this->gravarConta($dados, $strTroco, $intCodContaHistorico);
        
        //gravar item de crédito na conta
        $this->insertItemConta($strTroco, $intCodConta->CODCONTA, 1);
        
    }
    
    public function gravarConta($dados, $strTroco, $intCodContaHistorico)
    {
        $intCodUsuario = $this->session->userdata('CODUSUARIO');
        $strDataPagamento = $this->date_format($dados['txt_fechar_conta']);
        
        /*=====================================================*
         * Insere os dados na conta do cliente
         *=====================================================*/
        $sql = "INSERT INTO conta (
                        cod_conta_historico, 
                        dat_compra, 
                        cod_cliente, 
                        valor_compra, 
                        cod_usuario_log, 
                        dat_operacao_log, 
                        tipo_cliente
                    ) VALUES (
                        $intCodContaHistorico,
                        '$strDataPagamento',
                        $dados[codcliente],
                        $strTroco,
                        $intCodUsuario,
                        sysdate(),
                        '$dados[tipocliente]'
                    )";
        
        $this->db->query($sql);
        
        /*======================================================*
         * Resgata o código da conta cadastrada
         *======================================================*/
        $sql = "SELECT MAX(cod_conta) CODCONTA
                    FROM conta ct
                WHERE   ct.cod_cliente = $dados[codcliente] AND
                        ct.tipo_cliente = '$dados[tipocliente]' AND
                        ct.cod_usuario_log = $intCodUsuario";
        
        $query = $this->db->query($sql);
        
        return $query->row();
    }
    
    public function insertItemConta($strTroco, $intCodConta, $intCodProduto)
    {
        $intCodUsuario = $this->session->userdata('CODUSUARIO');
        
        $sql = "INSERT INTO item_conta (
                    cod_produto,
                    valor_unitario,
                    valor_total,
                    valor_desconto,
                    qtd_produto,
                    cod_usuario_log,
                    dat_operacao_log,
                    cod_conta) VALUES (
                    $intCodProduto,
                    '$strTroco',
                    '$strTroco',
                    '0.00',
                    1,
                    $intCodUsuario,
                    SYSDATE(),
                    $intCodConta
                    )";
        $this->db->query($sql);
    }
}
