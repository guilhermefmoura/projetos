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
            /*==============================================================*
             * declaração do indicador para envio de comprovante por email
             *==============================================================*/
            $bolComprovante = false;
            
            /*==============================================================*
             * recupera os dados passados por post
             *==============================================================*/
            $dados = elements(array('txt_fechar_conta', 'txt_pagamento_conta', 'txt_valor_pago', 'ch_registra_credito', 'ch_envia_comprovante', 'codcliente', 'tipocliente'), $this->input->post());

            /*==============================================================*
             * verifica se deverá enviar comprovante
             *==============================================================*/
            if($dados['ch_envia_comprovante']=== 'S'){
                $bolComprovante = true;
            }
            
            /*==============================================================*
             * formata a data de fechamento da conta para ser usada na query
             *==============================================================*/
            $strDate = $this->pagamento->date_format($dados['txt_fechar_conta']);
        
            /*==============================================================*
             * recupera as informações da conta de acordo com os dados passados
             *==============================================================*/
            $objDadosConta = $this->pagamento->buscarDadosPagamento($dados['codcliente'], $dados['tipocliente'], "'$strDate'");
        
            /*==============================================================*
             * calcula e formata o troco
             *==============================================================*/
            $strTroco = str_replace(',', '.', $dados['txt_valor_pago']) - str_replace(',', '.', $objDadosConta->val_conta);
            $strTroco = number_format($strTroco, 2, '.', ',');
            
            /*==============================================================*
             * verifica através do valor de troco a ação que será feita
             *==============================================================*/
            if($strTroco > 0){

                /*===========================================================*
                 * Se terá troco verifica se o troco deverá ser cadastrado 
                 * como crédito na conta do cliente
                 *===========================================================*/
                if($dados['ch_registra_credito'] == 'S'){
                    
                    /*=================================================*
                     * converte e formata o troco para cadastro
                     *=================================================*/
                    $strTroco = number_format($strTroco * (-1),2, '.', ',');
                    
                    /*===================================================*
                     * grava o pagamento e registra o crédito
                     *===================================================*/
                    $this->pagamento->gravarPagamentoComCredito($dados, $objDadosConta, $strTroco);
                    
                    $response->mensagem = 'Pagamento registrado com sucesso! Credito registrado na conta!';

                }
                else
                {
                    /*=========================================================*
                     * grava pagamento sem registrar crédito
                     *=========================================================*/
                     $this->pagamento->gravarPagamentoSemCredito($dados, $objDadosConta);
                    
                     $response->mensagem = 'Pagamento registrado com sucesso!';
                }

            }
            else
            {
                if($strTroco === '0.00'){

                    /*=============================================*
                    * grava pagamento
                    *=============================================*/
                    $this->pagamento->gravarPagamentoSemCredito($dados, $objDadosConta);
                    
                    $response->mensagem = 'Pagamento registrado com sucesso!';
                }
                else 
                {
                    /*=================================================*
                     * converte e formata o saldo devedor para cadastro
                     *=================================================*/
                    $strSaldoDevedor = number_format($strTroco * (-1),2, '.', ',');
                    
                    /*===================================================*
                     * grava o pagamento e registra o crédito
                     *===================================================*/
                    $this->pagamento->gravarPagamentoComSaldoDevedor($dados, $objDadosConta, $strSaldoDevedor);
                    
                    $response->mensagem = 'Pagamento registrado com sucesso! Saldo devedor registrado na conta!';

                }
            }

            
            if($bolComprovante)
            {
                
                //adicionar o código para enviar email com o comprovante

            }
            
            $response->codcliente = $dados['codcliente'];
            
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