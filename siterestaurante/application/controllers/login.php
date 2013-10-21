<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
                $data = array(
                    'titulo' => 'Acesso Área do cliente',
                    'mensagem' => '',
                );
		$this->template->show('login', $data);
	}
        
        public function entrar(){
            
            //define os campos e as condições de validação
            $this->form_validation->set_rules('txt-login', 'LOGIN', 'trim|required');
            $this->form_validation->set_rules('txt-senha', 'SENHA', 'trim|required');
            
            //verifica se os campos passaram na validação
            if($this->form_validation->run() == TRUE){
                //resgata os campos enviados por post
                $dados = elements(array('txt-login', 'txt-senha'), $this->input->post());
                //criptograva a senha em md5
                $dados['txt-senha'] = md5($dados['txt-senha']);
                //inicia o model
                $this->load->model('login_model', 'login');
                $retorno = $this->login->login($dados);

                //verifica se ocorreu algum erro para entrar
                if($retorno == 'duplicado'){
                    
                    $dados = array(
                        'mensagem'  => 'Erro ao efetuar login. Entre em contato com o Administrador.',
                        'titulo'    => 'Erro Login',
                    );
                    
                    $this->template->show('login', $dados);
                    
                }else {
                    $dados = array(
                        'mensagem'  => 'Login ou senha inválido',
                        'titulo'    => 'Login',
                    );
                    
                    $this->template->show('login', $dados);
                }
            }
            
        }
        
        public function sair(){
            
            $this->session->sess_destroy();
            
            redirect('login');
            
        }
}

/* End of file index.php */
/* Location: ./application/controllers/paginainicial.php */