<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_model extends CI_Model {
    
    public function clienteAutoComplete($strNomeCliente){
        
        //query
        $sql = "SELECT cod_cliente CODCLIENTE,
                        nome_cliente NOMECLIENTE,
                        'C' IDTCLIENTE
                  FROM cliente 
                  where cod_status_cliente = 1    
                  and nome_cliente like _utf8 '%$strNomeCliente%' COLLATE utf8_unicode_ci

                  union

                  SELECT cod_empresa CODCLIENTE,
                      nome_empresa NOMECLIENTE,
                      'E' IDTCLIENTE
                  FROM empresa 
                  where cod_status_empresa = 1 
                  and nome_empresa like _utf8 '%$strNomeCliente%' COLLATE utf8_unicode_ci

                  order by 2
                  limit 10";
        
        $query = $this->db->query($sql);
        
       return $query->result();
        
    }
    
    public function buscarCliente($strPesquisa){
        
        $sql = "SELECT *
                FROM cliente cli
                        INNER JOIN usuario usu ON usu.cod_usuario = cli.cod_usuario
                        INNER JOIN status_cliente scl ON scl.cod_status_cliente = cli.cod_status_cliente
                        LEFT JOIN empresa emp ON emp.cod_empresa = cli.cod_empresa
                        LEFT JOIN setor seo ON seo.cod_setor = cli.cod_setor
                WHERE cli.nome_cliente LIKE _utf8 '%$strPesquisa%' COLLATE utf8_unicode_ci
                ORDER BY cli.nome_cliente";
        
        $query = $this->db->query($sql);
        
       return $query->result();
    }
    
    public function dadosCliente($intCodCliente){
        
        $sql = "SELECT cli.cod_cliente,
			cli.nome_cliente,
			cli.endereco,
			cli.complemento,
			cli.celular,
			cli.telefone,
			cli.cpf_cliente,
			cli.email_cliente,
			cli.obs_cliente,
			cli.cod_status_cliente,
			cli.cod_usuario,
			cli.cod_empresa,
			cli.cod_setor,
			cli.matricula,
			usu.login_usuario,
			usu.senha_usuario,
			scl.dsc_status_cliente,
			emp.nome_empresa,
			seo.nome_setor,
			(SELECT date_format(Max(cta.dat_compra), '%d/%m/%Y')
                            FROM conta cta
                            WHERE cta.cod_cliente = cli.cod_cliente and
                                                    cta.tipo_cliente = 'C' and
                                                    cta.idt_pagamento = 'N') ultima_compra,
			(SELECT cta.valor_compra
                            FROM conta cta
                            WHERE cta.cod_cliente = cli.cod_cliente and
                                                    cta.tipo_cliente = 'C' and
                                                    cta.idt_pagamento = 'N' and
                                                    cta.dat_compra = (SELECT Max(cta.dat_compra)
                                                                        FROM conta cta
                                                                        WHERE cta.cod_cliente = cli.cod_cliente and
                                                                                                cta.tipo_cliente = 'C' and
                                                                                                cta.idt_pagamento = 'N')) valor_ultima_compra,
                        (SELECT date_format(max(cta.dat_pagamento), '%d/%m/%Y')
                            FROM conta cta
                            WHERE cta.cod_cliente = cli.cod_cliente and
                                                    cta.tipo_cliente = 'C' and
                                                    cta.idt_pagamento = 'S' and
                                                    cta.dat_pagamento = (SELECT Max(cta.dat_pagamento)
                                                                            FROM conta cta
                                                                            WHERE cta.cod_cliente = cli.cod_cliente and
                                                                                                    cta.tipo_cliente = 'C' and
                                                                                                    cta.idt_pagamento = 'S')) ultimo_pagamento,
			(SELECT sum(cta.valor_compra)
                            FROM conta cta
                            WHERE cta.cod_cliente = cli.cod_cliente and
                                                    cta.tipo_cliente = 'C' and
                                                    cta.idt_pagamento = 'S' and
                                                    cta.dat_pagamento = (SELECT Max(cta.dat_pagamento)
                                                                            FROM conta cta
                                                                            WHERE cta.cod_cliente = cli.cod_cliente and
                                                                                                    cta.tipo_cliente = 'C' and
                                                                                                    cta.idt_pagamento = 'S')) valor_ultimo_pagamento,
			(SELECT sum(cta.valor_compra)
                            FROM conta cta
                            WHERE cta.cod_cliente = cli.cod_cliente and
                                                    cta.tipo_cliente = 'C' and
                                                    cta.idt_pagamento = 'N') valor_conta_atual
			
                FROM cliente cli
                        INNER JOIN usuario usu ON usu.cod_usuario = cli.cod_usuario
                        INNER JOIN status_cliente scl ON scl.cod_status_cliente = cli.cod_status_cliente
                        LEFT JOIN empresa emp ON emp.cod_empresa = cli.cod_empresa
                        LEFT JOIN setor seo ON seo.cod_setor = cli.cod_setor
                WHERE cli.cod_cliente = $intCodCliente";
        
        $query = $this->db->query($sql);
        
       return $query->row();
        
    }
    
    public function statusCliente(){
        
        $sql = "SELECT * FROM status_cliente";
        
        $query = $this->db->query($sql);
        
        return $query->result();
    }
    
    public function update($dados){
        
        $strSenha = '';
        
        //verifica se o nome foi preenchido
        if(empty($dados['txt-nome'])){
            $response = array(
                'erro' => 'true',
                'mensagem' => 'Preencha o nome corretamente'
            );
            
            return $response;
            exit;
        }
        
        //verifica se a senha foi alterada
        $sql = "SELECT 1
                FROM cliente cli,
                     usuario usu
                WHERE cli.cod_cliente = ".$dados['txt-codcliente']." AND
                      cli.cod_usuario = usu.cod_usuario AND
                      usu.senha_usuario = '".$dados['txt-senha']."'";
        $query = $this->db->query($sql);
        
        //define se a senha será ou não atualizada
        $bolSenha = false;
        if($query->num_rows() == 0){
            $bolSenha = true;
            $strSenha = "senha_usuario = md5('".$dados['txt-senha']."'),";
        }
        
        //verifica se existe outro usuário com o mesmo login caso foi alterado
        $sql = "SELECT 1
                FROM usuario usu
                WHERE usu.cod_usuario <> (SELECT cli.cod_usuario FROM cliente cli WHERE cli.cod_cliente = ".$dados['txt-codcliente'].") AND
                      usu.login_usuario = TRIM('".$dados['txt-login']."')";
        $query = $this->db->query($sql);
        
        //define se o login será ou não atualizado
        $bolLogin = false;
        
        if(empty($dados['txt-login'])){
            $response = array(
                'erro' => 'true',
                'mensagem' => 'Preencha o login!'
            );
            
            return $response;
            exit;
        }else if($query->num_rows() == 0){
            $bolLogin = true;
        }else{
            $response = array(
                'erro' => 'true',
                'mensagem' => 'J&aacute; existe um cliente cadastrado com o login '.$dados['txt-login'].'. Escolha outro login!'
            );
            
            return $response;
            exit;
        }
        
        if($bolLogin == true){
            
            $this->db->trans_start();
            
            //atualiza usuário do cliente
            $sql = "UPDATE usuario SET
                            nome_usuario = '".$dados['txt-nome']."',
                            cod_status_usuario = ".$dados['sel-status'].",
                            login_usuario = '".$dados['txt-login']."',
                            ".$strSenha."
                            dat_operacao_log = SYSDATE()
                    WHERE cod_usuario = ".$dados['txt-codusuario'];
            
            $this->db->query($sql);
            
            //atualiza cliente
            $sql = "UPDATE cliente SET
                            nome_cliente = '".$dados['txt-nome']."',
                            endereco = '".$dados['txt-endereco']."',
                            complemento = '".$dados['txt-complemento']."',
                            celular = '".$dados['txt-celular']."',
                            telefone = '".$dados['txt-telefone']."',
                            cpf_cliente = '".$dados['txt-cpf']."',
                            email_cliente = '".$dados['txt-email']."',
                            obs_cliente = '".$dados['txt-observacao']."',
                            cod_status_cliente = '".$dados['sel-status']."',
                            cod_empresa = '".$dados['txt-codempresa']."',
                            cod_setor = '".$dados['txt-codsetor']."',
                            matricula = '".$dados['txt-matricula']."'
                    WHERE cod_cliente = ".$dados['txt-codcliente']."";
            
            $this->db->query($sql);
            
            $this->db->trans_complete();
            
            $response = array(
                'erro' => '',
                'mensagem' => 'Atualizado com sucesso!'
            );
            
            return $response;
        }
    }
    
    public function detalheConta($intCodCliente){
        
        $sql = "select  pro.cod_produto,
                        pro.nome_produto,
                        cta.cod_conta,
                        date_format(cta.dat_compra, '%d/%m/%Y') dat_compra,
                        cta.cod_cliente,
                        REPLACE(cta.valor_compra, '.', ',') valor_compra,
                        ict.cod_item_conta,
                        ict.qtd_produto,
                        REPLACE(ict.valor_unitario, '.', ',') valor_unitario,
                        REPLACE(ict.valor_desconto, '.', ',') valor_desconto,
                        REPLACE(ict.valor_total, '.', ',') valor_total
                from    conta cta,
                        item_conta ict,
                        produto pro
                where   cta.cod_cliente = $intCodCliente AND
			cta.tipo_cliente = 'C' AND
			cta.idt_pagamento = 'N' AND
			cta.cod_conta = ict.cod_conta AND
			ict.cod_produto = pro.cod_produto
                ORDER BY cta.dat_compra ASC";
        
        $query = $this->db->query($sql);
        
        return $query->result();
        
    }
    
    public function somaConta($intCodCliente, $chIdtPagamento = 'N'){
        
        $sql = "SELECT  REPLACE(FORMAT(SUM(cta.valor_compra),2), '.', ',') valor_geral
                FROM    conta cta
                WHERE   cta.cod_cliente = $intCodCliente AND
                        cta.tipo_cliente = 'C' AND
                        cta.idt_pagamento = '$chIdtPagamento'";
        
        $query = $this->db->query($sql);
        
        return $query->row();
        
    }
    
    public function excluirconta($dados){
        
        $bolCaixa = false;
        $bolPagamento = false;
        
        //verifica se é uma conta com origem no caixa
        $sql = "SELECT 1
                FROM conta cta
                WHERE cta.cod_conta = ".$dados['CODIGOCONTA']." AND
                 cta.cod_lancamento IS NOT NULL";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() == 1){
            $bolCaixa = true;
            
            $response = array(
                'erro' => 'true',
                'mensagem' => 'Essa conta foi lançada pelo caixa. Para excluir, faça o estorno no caixa!'
            );
            
            return $response;
            exit;
        }
        
        //verifica se a conta é destino devedor de pagamento
        //verifica se é uma conta com origem no caixa
        $sql = "SELECT 1
                FROM conta cta
                WHERE cta.cod_conta = ".$dados['CODIGOCONTA']." AND
                 cta.cod_conta_historico IS NOT NULL";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() == 1){
            
            $bolPagamento = true;
        
            $response = array(
                'erro' => 'true',
                'mensagem' => 'Essa conta foi registrada através de um pagamento. Para excluir, estorne o pagamento!'
            );
            
            return $response;
            exit;
        }
        
        if(!$bolCaixa && !$bolPagamento){
            
            $this->db->trans_start();
            //exclui itens da conta
            $sql = "DELETE FROM item_conta
                    WHERE cod_conta = ".$dados['CODIGOCONTA'];
            
            $this->db->query($sql);
            
            //exclui conta
            $sql = "DELETE FROM conta
                    WHERE cod_conta = ".$dados['CODIGOCONTA'];
            
            $this->db->query($sql);
            
            $this->db->trans_complete();
            
            $response = array(
                'erro' => '',
                'mensagem' => 'Exclu&iacute;do com sucesso!'
            );
            
            return $response;
        }
    }
    
    //período da conta em aberto do cliente
    public function periodoContaAtual($intCodCliente){
        
        $sql = "SELECT (SELECT DATE_FORMAT(MIN(dat_compra), '%d/%m/%Y')
                FROM conta
                WHERE cod_cliente = $intCodCliente AND
                          tipo_cliente = 'C' AND 
                          idt_pagamento = 'N') dat_inicio, (SELECT DATE_FORMAT(MAX(dat_compra), '%d/%m/%Y') 
                FROM conta
                WHERE cod_cliente = $intCodCliente AND
                          tipo_cliente = 'C' AND 
                          idt_pagamento = 'N') dat_fim FROM DUAL";
        
         $query = $this->db->query($sql);
        
        return $query->row();
        
    }
}
