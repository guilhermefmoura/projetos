<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaginaInicial extends CI_Controller {

	public function index()
	{
                $data = array(
                    'titulo' => 'Página Inicial',
                );
		$this->template->show('paginainicial', $data);
	}
}

/* End of file index.php */
/* Location: ./application/controllers/paginainicial.php */