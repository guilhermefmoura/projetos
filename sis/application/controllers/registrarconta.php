<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrarconta extends CI_Controller {

        public function __construct() {
            parent::__construct();
            
            //verifica se existe uma sessão ativa
            if(!$this->session->userdata('CLIENTE_AUT')){
                redirect('/');
            }
            
            $this->load->model('registrarconta_model', 'registrar');
            $this->load->model('cliente_model', 'cliente');
        }

	public function index()
	{
		$this->template->show('registrar_conta');
	}
        
        public function adicionar()
	{
                $intCodCliente = $this->uri->segment("3");
                
                //verificar se já existe uma conta temporária
                $intCodTempConta = $this->registrar->existeContaTemporaria($intCodCliente);
                
                if(empty($intCodTempConta->codtempconta)){
                    //gravar na tabela temporária uma conta
                    $this->registrar->gravarContaTemporaria($intCodCliente);
                    
                    //verificar se já existe uma conta temporária
                    $intCodTempConta = $this->registrar->existeContaTemporaria($intCodCliente);
                    
                }                
                
                //busca dados do cliente
                $arrCliente = $this->cliente->dadosCliente($intCodCliente);
                
                $dados = array('codtempconta' => $intCodTempConta->codtempconta, 'cliente' => $arrCliente);
                
		$this->template->show('registrar_conta_adicionar', $dados);
	}
        
        public function buscarclientes()
        {
            $dados = elements(array('NOME'), $this->input->post());
            
            $arrClientes = $this->registrar->buscarCliente($dados);
            
            $html_cliente = '';
            $html = '';
            
            $html .= '
                    <table  id="tblbuscarcliente">
                        <thead>
                            <tr>
                                <th>Nome do cliente</th>
                                <th>Matr&iacute;cula</th>
                                <th>Empresa</th>
                                <th>Setor</th>
                            </tr>
                        </thead>
                        <tbody>
                ';
            
            foreach ($arrClientes as $cliente):
                
                $html_cliente .= "
                    <tr>
                        <td><a href='".base_url()."registrarconta/adicionar/$cliente->codcliente'>$cliente->nomecliente</a></td>
                        <td><a href='".base_url()."registrarconta/adicionar/$cliente->codcliente'>$cliente->matricula</a></td>
                        <td><a href='".base_url()."registrarconta/adicionar/$cliente->codcliente'>$cliente->nomeempresa</a></td>
                        <td><a href='".base_url()."registrarconta/adicionar/$cliente->codcliente'>$cliente->nomesetor</a></td>
                    </tr>
                    ";
                
            endforeach;
            
            if(empty($html_cliente)){
                $html_cliente = "
                    <tr>
                        <td colspan='4' style='text-align:center;'>Nenhum cliente encontrado com o nome <strong>$dados[NOME]</strong>.</td>
                    </tr>
                    ";
            }
            
            $html .= $html_cliente;
            
            $html .= "</tbody>
                </table>";
            
            $response->HTML = $html;
            
            print json_encode($response);
            
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */