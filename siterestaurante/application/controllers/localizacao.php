<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Localizacao extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
    }

    public function index(){
        
        $dados = array (
            'titulo' => 'Localização',
            'mensagem' => 'Prezado cliente, essa página está em construção!',
        );
        
        $this->template->show('localizacao', $dados);
        
    }
    
}
