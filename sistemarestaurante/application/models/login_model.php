<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
    
    public function login($dados){
        
        //query
        $sql = "SELECT usu.cod_usuario AS CODUSUARIO,
			 usu.nome_usuario AS NOMEUSUARIO,
			 usu.login_usuario AS LOGINUSUARIO,
			 usu.senha_usuario AS SENHAUSUARIO,
			 sta.dsc_status_usuario AS DSCSTATUSUSUARIO,
			 sta.cod_status_usuario AS CODSTATUSUSUARIO,
			 grp.nome_grupo AS NOMEGRUPO
                FROM usuario usu,
                                 grupo_usuario gru,
                                 grupo grp,
                                 status_usuario sta
                WHERE usu.cod_usuario = gru.cod_usuario AND
                                        gru.cod_grupo = grp.cod_grupo AND
                                        usu.cod_status_usuario = sta.cod_status_usuario AND
                                        grp.cod_status_grupo = 1 AND
                                        usu.cod_status_usuario = 1 AND
                                        usu.login_usuario = ? AND
                                        usu.senha_usuario = ?";
        
        $query = $this->db->query($sql, array($dados['txt-usuario'], $dados['txt-senha']));
        
        //verifica se retornou apenas uma linha
        if($query->num_rows() == 1){
            
            $dados = $query->row();

            //grava acesso
            $this->registraAcesso();
            
            //insere os dados na sessão
            $this->session->set_userdata('CLIENTE_AUT', TRUE);
            $this->session->set_userdata($dados);

            $retorno['link'] = 'painel';

            return $retorno;
       } 
        
        else if ($query->num_rows() == 0){
            
            $retorno['erro'] = 'invalido';
            return $retorno;
            
        }else if ($query->num_rows() > 1){
            $retorno = array();
            $retorno['erro'] = 'duplicado';
            return $retorno;
        }
        
        
    }
    
    public function registraAcesso(){
        
    }
    
}
