<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setor extends CI_Controller {

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
		$this->template->show('setor');
	}
        
        public function editar()
	{
		$this->template->show('editar_setor');
	}
        
        public function novo()
	{
		$this->template->show('novo_setor');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */