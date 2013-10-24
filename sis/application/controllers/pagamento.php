<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagamento extends CI_Controller {

        public function __construct() {
            parent::__construct();
            
            //verifica se existe uma sessão ativa
            if(!$this->session->userdata('CLIENTE_AUT')){
                redirect('/');
            }
            
            $this->load->model('pagamento_model', 'pagamento');
            
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
            //parametros
            $intCodCliente = $this->uri->segment('3');
            $chTpoCliente = $this->uri->segment('4');
            
            //recupera os dados para pagamento
            $arrDados = $this->pagamento->buscarDadosPagamento($intCodCliente, $chTpoCliente);
            
            $dados = array (
                'conta' => $arrDados
            );
            
            $this->template->show('pagamento', $dados);
	}
        
        public function conta()
        {
            $bolComprovante = false;
            
            //dados recebidos no post
            $dados = elements(array('txt-fechar-conta', 'txt-pagamento-conta', 'txt-valor-pago', 'ch-registra-credito', 'ch-envia-comprovante', 'codcliente', 'tipocliente'), $this->input->post());
        
            //envia email de comprovante
            if($dados['ch-envia-comprovante']=== 'S'){
                $bolComprovante = true;
            }
            
            //formata a data
            $strDate = $this->pagamento->date_format($dados['txt-fechar-conta']);
        
            //recupera valor da conta
            $objDadosConta = $this->pagamento->buscarDadosPagamento($dados['codcliente'], $dados['tipocliente'], "'$strDate'");
        
            //calcular troco
            $strTroco = str_replace(',', '.', $dados['txt-valor-pago']) - str_replace(',', '.', $objDadosConta->val_conta);
            $strTroco = number_format($strTroco, 2, '.', ',');
            
            //verifica se terá troco
            if($strTroco > 0){

                //verifica se registra crédito
                if($dados['ch-registra-credito'] == 'S'){

                    //registra o valor de troco como crédito para o cliente
                    $response['mensagem'] = 'Vai registrar '. $strTroco. ' como credito na conta';

                }
                else
                {
                    $response['mensagem'] = 'Nao registrar '. $strTroco. ' como troco';
                }

            }
            else
            {
                //verifica se registra débito na conta ou somente baixa
                if($strTroco === '0.00'){

                    //executa a baixa na conta do cliente
                    $response['mensagem'] = 'Vai registrar baixa pois nao tem troco '. $strTroco. '.';
                }
                else 
                {
                    //executa a baixa e grava saldo devedor na conta do cliente
                    $response['mensagem'] = 'Vai registrar baixa e gravar saldo devedor '. $strTroco. ' como troco';

                }
            }

            //envia email
            if($bolComprovante)
            {
                
                $response['mensagem'] = $response['mensagem'] . ' e vai mandar email';

            }
            
            
            
            //converte o array para json
            print json_encode($response);
            
            
        }
        
        public function calcular(){
            
            $dados = elements(array('DATACONTA', 'TPOCLIENTE', 'CODCLIENTE'), $this->input->post());
            
            $response = $this->pagamento->calcular($dados);
            
            //converte o array para json
            print json_encode($response);
            
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */