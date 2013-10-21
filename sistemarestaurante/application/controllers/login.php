<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
	}
        
        public function entrar(){
            
            //define os campos e as condições de validação
            $this->form_validation->set_rules('txt-usuario', 'USUÁRIO', 'trim|required');
            $this->form_validation->set_rules('txt-senha', 'SENHA', 'trim|required');
            
            $return = array();
            
            //verifica se os campos passaram na validação
            if($this->form_validation->run() == TRUE){
                //resgata os campos enviados por post
                $dados = elements(array('txt-usuario', 'txt-senha'), $this->input->post());
                //criptograva a senha em md5
                $dados['txt-senha'] = md5($dados['txt-senha']);
                
                //inicia o model
                $this->load->model('login_model', 'login');
                $retorno = $this->login->login($dados);

                //verifica se ocorreu algum erro para entrar
                if(!empty($retorno['erro'])){
                    if($retorno['erro'] == 'duplicado'){
                        $return['mensagem'] = 'Erro ao efetuar login. Entre em contato com o Administrador.';
                        $return['erro'] = 'TRUE';
                    }else {
                        $return['mensagem'] = 'Login ou senha inválido';
                        $return['erro'] = 'TRUE';
                    }
                }
            }
            
            if(!empty($retorno['link'])){
                $return['link'] = $retorno['link'];
            }
            
            //converte os campos para caracteres html
            foreach ($return as $key => $value) {
                $return[$key] = htmlentities($value);
            }
                
            //converte o array para json
            print json_encode($return);
        }
        
        public function sair(){
            
            $this->session->sess_destroy();
            
            redirect('/');
            
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */