<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_model extends CI_Model {
    
    //exibe os dados pessoais do cliente
    public function dados_cliente($codigo){
        
        $sql = "SELECT cli.*,
                    emp.cod_empresa,
                emp.nome_empresa,
                    se.cod_setor,
                se.nome_setor
            FROM cliente cli
                    LEFT JOIN empresa emp ON emp.cod_empresa = cli.cod_empresa
                    LEFT JOIN setor se ON se.cod_setor = cli.cod_setor
            WHERE cli.cod_cliente = ? ";
        
        $query = $this->db->query($sql, array($this->session->userdata('cod_cliente')));
        
        return $query->row();
    }
    
    //atualiza alguns dados do cliente
    public function update($dados){
        
        $this->db->where('cod_cliente', $dados['cod_cliente']);
        $this->db->update('cliente', $dados);
        $this->session->set_flashdata('atualizado', 'Atualizado com sucesso!');
        
        redirect('areacliente/meusdados');
        
    }
    
    //período da conta em aberto do cliente
    public function periodoContaAtual(){
        
        $sql = "SELECT (SELECT MIN(dat_compra) 
                FROM conta
                WHERE cod_cliente = ? AND
                          tipo_cliente = 'C' AND 
                          idt_pagamento = 'N') dat_inicio, (SELECT MAX(dat_compra) 
                FROM conta
                WHERE cod_cliente = ? AND
                          tipo_cliente = 'C' AND 
                          idt_pagamento = 'N') dat_fim FROM DUAL";
        
         $query = $this->db->query($sql, array($this->session->userdata('cod_cliente'), $this->session->userdata('cod_cliente')));
        
        return $query->row();
        
    }

    //registro de contas em aberto do cliente
    public function contaAtual($maximo = 0, $inicio = 0){
        $limit = '';
        if($maximo != 0){
            $limit = 'LIMIT '.$inicio.', '.$maximo;
        }
        $sql = "SELECT ct.cod_conta,
				ct.dat_compra,
				ct.valor_compra,
				ic.qtd_produto,
				ic.valor_desconto,
				ic.valor_unitario,
				ic.valor_total,
                                ic.cod_item_conta,
				pr.nome_produto
                        FROM conta ct,
                                item_conta ic,
                                produto pr
                        WHERE ct.cod_cliente = ?
                                AND ct.tipo_cliente = 'C'
                                AND ct.idt_pagamento = 'N'
                          AND ic.cod_conta = ct.cod_conta 
                          AND pr.cod_produto = ic.cod_produto
                ORDER BY ct.dat_compra
                $limit";
        $query = $this->db->query($sql, array($this->session->userdata('cod_cliente')));
        
        return $query->result();
        
        //return $this->db->get_where('conta', array('cod_cliente' => $this->session->userdata('cod_cliente'), 'tipo_cliente' => 'C', 'idt_pagamento' => 'N'));
        
    }
    
    //registro de contas em aberto do cliente
    public function countContas(){
        
        $sql = "SELECT * 
                FROM conta
                WHERE cod_cliente = ? AND
                      tipo_cliente = 'C' AND 
                      idt_pagamento = 'N'
                ORDER BY dat_compra";
        $query = $this->db->query($sql, array($this->session->userdata('cod_cliente')));
        
        return $query->num_rows();
        
        //return $this->db->get_where('conta', array('cod_cliente' => $this->session->userdata('cod_cliente'), 'tipo_cliente' => 'C', 'idt_pagamento' => 'N'));
        
    }
    
    //total da conta do cliente
    public function somaConta($indPago){
        $sql = "SELECT SUM(valor_compra) as val_compra
                FROM conta
                WHERE cod_cliente = ? AND
                      tipo_cliente = 'C' AND 
                      idt_pagamento = ? ";
        
        $query = $this->db->query($sql, array($this->session->userdata('cod_cliente'), $indPago));
        
        return $query->row();
        
        //$this->db->select_sum('valor_compra');
        //$qr = $this->db->get_where('conta', array('cod_cliente' => $this->session->userdata('cod_cliente'), 'tipo_cliente' => 'C', 'idt_pagamento' => 'N'));
        
        //return $soma = $qr->result();
        
        
    }
    
    //detalhamento por item da conta
    public function detalhesContaAtual($codConta){
        
        $sql = "SELECT *
                FROM item_conta itc
                    INNER JOIN produto pro ON pro.cod_produto = itc.cod_produto
                WHERE itc.cod_conta = ?";
        
        $query = $this->db->query($sql, array($codConta));
        
        return $query->result();
        
        //$this->db->select('*');
        //$this->db->from('item_conta');
        //$this->db->join('produto', 'produto.cod_produto = item_conta.cod_produto');
        //$this->db->where('item_conta.cod_conta', $codConta);
        //return $this->db->get();
    }

    //ultima atualização na conta do cliente
    public function ultimaAtualizacao(){
        $this->db->select_max('dat_operacao_log');
        $qr = $this->db->get_where('conta', array('cod_cliente' => $this->session->userdata('cod_cliente'), 'tipo_cliente' => 'C', 'idt_pagamento' => 'N'));
        
        return $data = $qr->result();
        
        
    }
    
    //ultima compra realizada pelo cliente
    public function ultimaCompra(){
        
        $sql = "SELECT date_format(cta.dat_compra, '%d/%m/%Y') as data_compra,
                        cta.valor_compra
                 FROM conta cta
                 WHERE cta.cod_cliente = ? AND
                                 cta.tipo_cliente = 'C'
                 ORDER BY cta.dat_compra DESC
                 LIMIT 1";
        $query = $this->db->query($sql, array($this->session->userdata('cod_cliente')));
        
        return $query->row();
        
    }
    
    public function getDetalhesUltimaCompra(){
        
        $sql = "SELECT date_format(cta.dat_compra, '%d/%m/%Y') as data_compra,
                        cta.valor_compra,
                        cta.idt_pagamento,
                        ico.qtd_produto,
                        ico.valor_unitario,
                        ico.valor_total,
                        ico.valor_desconto,
                        pro.nome_produto
                 FROM conta cta
                         INNER JOIN item_conta ico ON ico.cod_conta = cta.cod_conta
                         INNER JOIN produto pro ON pro.cod_produto = ico.cod_produto
                 WHERE cta.cod_conta = (SELECT MAX(ct.cod_conta) FROM conta ct WHERE ct.cod_cliente = ? AND
                                 ct.tipo_cliente = 'C')";
        $query = $this->db->query($sql, array($this->session->userdata('cod_cliente')));
        
        return $query->result();
    }

        //ultimo pagamento realizado pelo cliente
    public function ultimoPagamento(){
        
        $sql = "SELECT SUM(cta.valor_compra) as val_pago, DATE_FORMAT(cta.dat_pagamento, '%d/%m/%Y') as data_pagamento
                    FROM conta cta
                    WHERE cta.cod_cliente = ? AND
                                    cta.tipo_cliente = 'C' AND
                                    cta.idt_pagamento = 'S'
                    GROUP BY DATE_FORMAT(cta.dat_pagamento, '%d/%m/%Y')
                    ORDER BY cta.dat_pagamento DESC
                    LIMIT 1";
        $query = $this->db->query($sql, array($this->session->userdata('cod_cliente')));
        
        return $query->row();
        
    }
    
    public function countPagamento(){
        
        $sql = "SELECT ct.dat_inicio_conta, ct.dat_fim_conta, ct.dat_pagamento, ct.valor_conta, ct.valor_pago
                    FROM conta_historico ct
                WHERE ct.cod_cliente = ? AND
                    ct.tipo_cliente = 'C'";
        
        $query = $this->db->query($sql, array($this->session->userdata('cod_cliente')));
        
        return $query->num_rows();
    }
    
}

