<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Localizacao extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
    }

    public function index(){
        
        $dados = array (
            'titulo' => 'Localiza��o',
            'mensagem' => 'Prezado cliente, essa p�gina est� em constru��o!',
        );
        
        $this->template->show('localizacao', $dados);
        
    }
    
}
