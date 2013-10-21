<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

        public function __construct() {
            parent::__construct();
            
            //verifica se existe uma sessão ativa
            if(!$this->session->userdata('CLIENTE_AUT')){
                redirect('/');
            }
            
            $this->load->model('cliente_model', 'cliente');
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
		$this->template->show('cliente');
	}
        
        public function editar(){
            
            //retorna todos os dados do cliente
            $arrCliente = $this->cliente->dadosCliente($this->uri->segment("3"));
            
            $dados = array(
                'titulo' => 'Editar Cliente',
                'cliente' => $arrCliente
            );
            
            //retorna status do cliente
            $arrStatusCliente = $this->cliente->statusCliente();
            
            $selected = '';
            $htmlStatus = '';
            
            //seleciona o status do cliente
            foreach ($arrStatusCliente as $status):
                
                if($status->cod_status_cliente == $arrCliente->cod_status_cliente){
                    $selected = 'selected';
                }  else {
                    $selected = '';
                }
                
                $htmlStatus .= '<option '.$selected.' value="'.$status->cod_status_cliente.'">'.$status->dsc_status_cliente.'</option>';
                
            endforeach;
            
            $dados['status'] = $htmlStatus;
            $this->template->show('editar_cliente', $dados);
            
        }
        
        public function novo(){
            
                $this->template->show('novo_cliente');
            
        }
        
        public function visualizarconta(){
            
            $intCodCliente = $this->uri->segment("3");
            
            $arrDadosCliente = $this->cliente->dadosCliente($intCodCliente);
            
            $dados = array(
                'titulo' => 'Visualizar Conta - '. utf8_decode($arrDadosCliente->nome_cliente),
                'conta_detalhe' => $this->cliente->detalheConta($intCodCliente),
                'soma_conta' => $this->cliente->somaConta($intCodCliente)
            );
            
            $this->template->show('visualizar_conta_cliente', $dados);
            
        }
        
        public function autocomplete(){
            
            $options = array();
            
            $texto = str_replace('%20', ' ', $this->uri->segment("3"));
            
            $arrClientes = $this->cliente->clienteAutoComplete($texto);
            
            foreach ($arrClientes as $cliente):
                $options['myData'][] = array(
                    'cod_cliente' => $cliente->CODCLIENTE.'_'.$cliente->IDTCLIENTE,
                    'nome_cliente'    => $cliente->NOMECLIENTE
                );
            endforeach;
            
            if(empty($arrClientes)){
                $options['myData'][] = array('cod_cliente' => 0, 'nome_cliente' => 'Nenhum cliente encontrado.');
            }
            print json_encode($options);
            
        }
        
        public function buscar(){
            
            $html = '';
            
            $dados = elements(array('txt-buscar'), $this->input->post());
            
            $arrClientes = $this->cliente->buscarCliente($dados['txt-buscar']);

            $html .= '<table id="table-itens">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Empresa / Setor</th>
                                <th>Login</th>
                                <th>Status</th>
                                <th>A&ccedil;&atilde;o</th>
                            </tr>
                        </thead>
                        <tbody>';

            foreach ($arrClientes as $cliente):
                
                $html .= '<tr>
                            <td><a href="cliente/editar/'.$cliente->cod_cliente.'">'.$cliente->nome_cliente.'</a></td>
                            <td>'.$cliente->nome_empresa.' / '.$cliente->nome_setor.'</td>
                            <td>'.$cliente->login_usuario.'</td>
                            <td><img alt="Cliente '.$cliente->dsc_status_cliente.'" title="Cliente '.$cliente->dsc_status_cliente.'" src="'.base_url().'images/icon-'.$cliente->cod_status_cliente.'.png"></td>
                            <td><a href="cliente/editar/'.$cliente->cod_cliente.'"><img src="'.base_url().'images/editar-usuario.png" /></a></td>
                        </tr>';
                
            endforeach;
                            
            $html .= '</tbody>
             <tfoot>
                 <tr>
                     <td colspan="5" id="paginacao"></td>
                 </tr>
             </tfoot>
         </table>';
                       
            $response['html'] = $html;
            $response['mensagem'] = 'Deu certo';
            
            print json_encode($response);
        }
        
        public function atualizar(){
            
            $dados = elements(
                    array(
                        'txt-nome',
                        'sel-status',
                        'txt-cpf',
                        'txt-endereco',
                        'txt-complemento',
                        'txt-email',
                        'txt-celular',
                        'txt-telefone',
                        'txt-codempresa',
                        'txt-codsetor',
                        'txt-matricula',
                        'txt-login',
                        'txt-senha',
                        'txt-observacao',
                        'txt-codcliente',
                        'txt-codusuario'
                        ), 
                    $this->input->post()
                    );
            
            $response = $this->cliente->update($dados);
            
            //converte o array para json
            print json_encode($response);
        }
        
        public function excluirconta(){
            
            $dados = elements(array('CODIGOCONTA'), $this->input->post());
            
            $response = $this->cliente->excluirconta($dados);
            
            //converte o array para json
            print json_encode($response);
        }
        
        public function enviaremail(){
            
            $dados = elements(array('EMAILINDIVIDUAL', 'CODCLIENTE'), $this->input->post());
            
            if($dados['EMAILINDIVIDUAL'] == 'S'){
                
                $cliente = $this->cliente->dadoscliente($dados['CODCLIENTE']);
                
                if(!empty($cliente->email_cliente)){
                    
                    //envia o email
                    $html = $this->montaHtmlConta();
                    
                    //dados para montar o html da página
                    $data = array(
                        'htmlPdf' => true,
                        'html' => $html,
                        'soma_total' => $this->cliente->somaConta('N'),
                        'cliente' => $this->cliente->dados_cliente($this->session->userdata('cod_cliente')),
                        'periodo_conta' => $this->cliente->periodoContaAtual()
                    );

                    //caminho do diretório
                    $strDir = 'arquivos/pdf/';

                    //diretório onde será salvo o PDF
                    $this->html2pdf->folder($strDir);

                    //define o nome do arquivo
                    $strArquivo = date('Hi') . '_' . $this->session->userdata('cod_cliente');

                    //determina o nome do arquivo
                    $this->html2pdf->filename($strArquivo.'.pdf');

                    //determina o papel
                    $this->html2pdf->paper('a4', 'portrait');

                    //Load html view que irá montar o html para geração do pdf
                    $this->html2pdf->html($this->load->view('imprimir_conta', $data, true));
                    
                    if($path = $this->html2pdf->create('save')) {
                        
                        //envia o pdf por email
                        //DE:
                        $this->email->from('no-replay@tialourdes.com.br', 'Restaurante Tia Lourdes');
                        //PARA:
                        $this->email->to($cliente->email_cliente); 
                        //ASSUNTO:
                        $this->email->subject('Conta - Restaurante Tia Lourdes');

                        //MENSAGEM:
                        $html = '
                            <p>Olá, '.$cliente->nome_cliente.',</p>
                            <p>Segue anexo sua conta do Restaurante Tia Lourdes</p>
                            <p>Qualquer dúvida entre em contato no telefone (31) 3491-9501</p>
                                ';
                        $this->email->message($html);   

                        //ANEXO
                        $this->email->attach($path);

                        //ENVIA
                        if($this->email->send()){

                            $response = array('mensagem' => 'Email enviado para '.$cliente->email_cliente.'!');

                        }  else {
                            $response = array('mensagem' => 'Erro ao enviar email!');
                        }
                        
                    }  else {
                        $response = array('mensagem' => 'Erro ao gerar arquivo. Email não enviado!');
                    }

                }else {
                    
                    $response = array('mensagem' => 'O cliente n&atilde;o possui email cadastrado!');
                    
                }
            }
            
            //converte o array para json
            print json_encode($response);
            
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */