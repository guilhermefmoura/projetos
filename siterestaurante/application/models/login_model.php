<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
    
    public function login($dados){
        
        //query
        $sql = "SELECT *
                FROM cliente cli
                        INNER JOIN usuario usu ON usu.cod_usuario = cli.cod_usuario
                        INNER JOIN grupo_usuario gus ON gus.cod_usuario = cli.cod_usuario
                WHERE usu.login_usuario = ? AND 
                          usu.senha_usuario = ?";
        
        $query = $this->db->query($sql, array($dados['txt-login'], $dados['txt-senha']));
        
        //verifica se retornou apenas uma linha
        if($query->num_rows() == 1){
            
            $dados = $query->row();
            
            if($dados->cod_grupo == 2){
                //se cliente
                
                //insere os dados na sessão
                $this->session->set_userdata('CLIENTE_AUT', TRUE);
                $this->session->set_userdata($dados);

                redirect('areacliente');
            }
            
            else if($dados->cod_grupo == 3) {
                //se operador
                //insere os dados na sessão
                $this->session->set_userdata('OPERADORAUTENTICADO', TRUE);
                $this->session->set_userdata($dados);

                redirect('operador');
                
            } 
            
            else if($dados->cod_grupo == 1){
                //se administrador
                //insere os dados na sessão
                $this->session->set_userdata('ADMINISTRADORAUTENTICADO', TRUE);
                $this->session->set_userdata($dados);

                redirect('administrador');
            } 
            
            else {    
                //erro ao identificar grupo
                
            }
        
            print $retorno->nome_cliente;
        } 
        
        else if ($query->num_rows() == 0){
            
            return 'invalido';
            
        }else if ($query->num_rows() > 1){
            
            return 'duplicado';
        }
        
        
    }
    /*
    public function login($dados){
        
        /*INICIO VALIDA SENHA */
    /*
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('login_usuario', $dados['txt-login']);
        $this->db->where('senha_usuario', $dados['txt-senha']);
        
        //retorna a quantidade encontrata
        $dadosUsuario = $this->db->get()->result();
        
        if(count($dadosUsuario) == 1){
            
            //guarda o cod_usuario
            foreach ($dadosUsuario as $us):
                $u = array('cod_usuario' => $us->cod_usuario);
            endforeach;
            
            //guarda os dados do cliente
            $query = $this->db->get_where('cliente', array('cod_usuario' => $u['cod_usuario']));
            $info = $query->result();
            foreach ($info as $data):
                //dados que serão gravados na sessão    
                $dados = array(
                    'cod_cliente' => $data->cod_cliente,
                    'nome_cliente' => $data->nome_cliente,
                    'endereco' => $data->endereco,
                    'celular' => $data->celular,
                    'cpf' => $data->cpf_cliente,
                    'email' => $data->email_cliente,
                    'cod_empresa' => $data->cod_empresa,
                    'cod_setor' => $data->cod_setor,
                    'cod_usuario' => $data->cod_usuario,
                    'matricula' => $data->matricula,
                );
            endforeach;
            
            //insere os dados na sessão
            $this->session->set_userdata('autenticado', TRUE);
            $this->session->set_userdata($dados);

            redirect('areacliente');
            
        }else if (count($dadosUsuario) > 1){
            return 'duplicado';
        } else {
            return 'invalido';
        }
        
    }
     * 
     */
    
}
