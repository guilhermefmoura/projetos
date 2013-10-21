<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Arquivo Class
 *
 * @package		CodeIgniter
 * @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
 * @version             1.0
 */

class Arquivo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('arquivo_model', 'arq');
    }
    
    /*
     * Index para este controlador
     * 
     * Acesso para a seguinte URL
     *          http://example.com/index.php/arquivo
     *      - ou -
     *          http://example.com/index.php/arquivo/index
     *      - ou - 
     *          http://example.com/arquivo
     * 
     * Essa última opção só será possível com o arquivo .htacess
     */
    public function index(){
        
        //declaração do arrei para colunas de cada tabela
        $arrColumns = array();
        
        //retorna todas as tabelas do banco
        $table = $this->arq->getTable();
        
        //percorre todas as tabelas para montar as colunas de cada tabela
        foreach ($table as $strTable):
            
            $arrColumns[$strTable->Tables_in_guilherm_tialourdes] = $this->arq->getColumnsTable($strTable->Tables_in_guilherm_tialourdes);
            
        endforeach;
        
        //dados que serão passados para a view
        $dados = array(
            'table'    => $this->arq->getTable(),
            'columns'     => $arrColumns,
            'database'  => $this->arq->getDatabase()
        );
        
        //define qual view será chamada
        $this->template->show('arquivo_php', $dados);
        
    }
}

/* Fim do arquivo arquivo.php */
/* Local: ./aplication/controllers/arquivo.php */