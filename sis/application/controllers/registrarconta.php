<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrarconta extends CI_Controller {

        public function __construct() {
            parent::__construct();
            
            //verifica se existe uma sess�o ativa
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
		$this->template->show('registrar_conta');
	}
        
        public function adicionar()
	{
		$this->template->show('registrar_conta_adicionar');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */