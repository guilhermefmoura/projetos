<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrarconta_model extends CI_Model {
    
    public function buscarCliente($dados){
        
        $sql = "SELECT 	cli.cod_cliente 	codcliente,
                        cli.nome_cliente	nomecliente,
                        cli.matricula		matricula,
                        emp.nome_empresa	nomeempresa,
                        ser.nome_setor		nomesetor
                FROM cliente cli
                        LEFT JOIN empresa emp ON emp.cod_empresa = cli.cod_empresa
                        LEFT JOIN setor ser		ON ser.cod_setor = cli.cod_setor
                WHERE cli.cod_status_cliente = 1 AND
                                        cli.nome_cliente LIKE _UTF8 '%$dados[NOME]%' COLLATE UTF8_UNICODE_CI
                ORDER BY 2";
        
        $query = $this->db->query($sql);
        
        return $query->result();
        
    }
    
    public function existeContaTemporaria($intCodCliente)
    {
        //recupera o codigo do usuário da sessão
        $intCodUsuario = $this->session->userdata('CODUSUARIO');
        
        $sql = "SELECT tc.cod_temp_conta codtempconta
                FROM temp_conta tc
                WHERE tc.cod_cliente = $intCodCliente AND
                      tc.cod_usuario_log = $intCodUsuario";
        
        $query = $this->db->query($sql);
        
        return $query->row();
    }

        public function gravarContaTemporaria($intCodCliente)
    {
        //recupera o codigo do usuário da sessão
        $intCodUsuario = $this->session->userdata('CODUSUARIO');
        
        $sql = "INSERT INTO temp_conta (
                        cod_cliente, 
                        cod_usuario_log, 
                        tipo_cliente
                        ) VALUES (
                        $intCodCliente,
                        $intCodUsuario,
                        'C'
                        )";
        $this->db->query($sql);
    }
    
}
