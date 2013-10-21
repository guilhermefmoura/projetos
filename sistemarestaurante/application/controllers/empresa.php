<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa extends CI_Controller {

        public function __construct() {
            parent::__construct();
            
            //verifica se existe uma sessão ativa
            if(!$this->session->userdata('CLIENTE_AUT')){
                redirect('/');
            }
        }

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
		$this->template->show('empresa');
	}
        
        public function editar(){
            
                $this->template->show('editar_empresa');
            
        }
        
        public function nova(){
            
                $this->template->show('nova_empresa');
            
        }
        
        public function visualizarconta(){
            
            $this->template->show('visualizar_conta_empresa');
            
        }
        
        public function funcionariosempresa(){
            $this->template->show('visualizar_funcionario_empresa');
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */