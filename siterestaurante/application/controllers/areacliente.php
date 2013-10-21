<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Areacliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        //verifica se existe uma sessão ativa
        if(!$this->session->userdata('CLIENTE_AUT')){
            redirect('login');
        }
        
        $this->load->model('cliente_model', 'cliente');
    }

    public function index(){
        
        $dados = array(
            'titulo'    => 'Área do Cliente',
            'ultima_compra'     => $this->cliente->ultimaCompra(),
            'detalhes_ultima_compra' => $this->cliente->getDetalhesUltimaCompra(),
            'ultimo_pagamento' => $this->cliente->ultimoPagamento()
        );
        
        $this->template->show('home_cliente', $dados);
        
    }
    
    private function montaHtmlConta($accordion = false){
        
        /*INÍCIO EXIBE CONTA */
        //retorna os dados da conta atual do cliente
        $conta_atual = $this->cliente->contaAtual();
        
        $html = '';
        //percorre todos os registros da conta atual
        foreach ($conta_atual as $conta):
            
            /*INÍCIO EXIBE DETALHES CONTA */
            
            //retorna os itens de detalhes de cada conta
            $detalhes_conta_atual = $this->cliente->detalhesContaAtual($conta->cod_conta);
            
            $html_detalhe = '';
                
            $html_detalhe .= '<table width="100%" style="font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">
                                <tr>
                                    <td><strong>Produto</strong></td>
                                    <td><strong>Quantidade</strong></td>
                                    <td><strong>Valor Unitário</strong></td>
                                    <td><strong>Valor Desconto</strong></td>
                                    <td><strong>Valor Total</strong></td>
                                </tr>';
            //percorre todos os registros dos itens da conta
            foreach ($detalhes_conta_atual as $detalhes):
                $html_detalhe .= '<tr>
                                    <td>'.utf8_decode($detalhes->nome_produto).'</td>
                                    <td>'.$detalhes->qtd_produto.'</td>
                                    <td>'.number_format($detalhes->valor_unitario, 2, ',', '.').'</td>
                                    <td>'.number_format($detalhes->valor_desconto, 2, ',', '.').'</td>
                                    <td>'.number_format($detalhes->valor_total, 2, ',', '.').'</td>
                                 </tr>';
            endforeach;
            
            $html_detalhe .= '</table>';
            
            /*FIM EXIBE DETALHES CONTA */
            
            if($accordion){
                //gera o html de retorno para exibir na view
                $html .= '<h3>'.date('d/m/Y', strtotime($conta->dat_compra)).' - R$ '. number_format($conta->valor_compra, 2, ',', '.') .'</h3><div>'.$html_detalhe.'</div>';
            } else {
                $html .= '<table width="100%" style="font-family: Arial, Helvetica, sans-serif; font-size: 10pt; border: solid 1px; margin-bottom: 3px;">
                            <tr>
                                <td style="text-align: center; font-weight: bold;">Detalhes do dia '.date('d/m/Y', strtotime($conta->dat_compra)).'</td>
                            </tr>
                            <tr>
                                <td>'.$html_detalhe.'</td>
                            </tr>
                            <tr>
                                <td style="text-align: right;"><strong>Valor Total: </strong> R$ '.number_format($conta->valor_compra, 2, ',', '.').'</td>
                            </tr>
                          </table>';
            }
        endforeach;
        
        /* FIM INÍCIO EXIBE CONTA */
        
        return $html;
        
    }

    public function minhaconta(){
        
//        $html = $this->montaHtmlConta(true);
//        
//        $dados = array(
//            'titulo'    => 'Minha Conta',
//            'atual' => $html,
//            'soma' =>  $this->cliente->somaConta('N'),
//            'atualizado' => $this->cliente->ultimaAtualizacao()
//        );
        
        /*inicio nova forma*/
        
        $config['base_url'] = base_url('areacliente/minhaconta');
        $config['total_rows'] = $this->cliente->countContas();
        $config['uri_segment'] = 3;
        $config['per_page'] = 30;
        $config['first_link'] = 'Primeiro';
        $config['full_tag_open'] = '<ul id="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['last_link'] = 'Último';
        $config['next_link'] = 'Próximo';
        $config['prev_link'] = 'Anterior';
        $config['first_tag_open'] = '<li class="bt-pagination">';
        $config['last_tag_open']  = '<li class="bt-pagination">';
        $config['next_tag_open']  = '<li class="bt-pagination">';
        $config['prev_tag_open']  = '<li class="bt-pagination">';
        $config['cur_tag_open'] = '<li><strong>';
        $config['num_tag_open'] = '<li class="bt-pagination">';
                
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close']  = '</li>';
        $config['next_tag_close']  = '</li>';
        $config['prev_tag_close']  = '</li>';
        $config['cur_tag_close']  = '</strong></li>';
        $config['num_tag_close']  = '</li>';
                
        
        $maximo = $config['per_page'];
        $inicio = (!$this->uri->segment("4")) ? 0 : $this->uri->segment("4");
        
        $this->pagination->initialize($config);
        
        $dados["paginacao"] = $this->pagination->create_links();
        $dados["contas"] = $this->cliente->contaAtual($maximo, $inicio);
        $dados["titulo"] = 'Minha Conta';
        $dados["soma"] = $this->cliente->somaConta('N');
        $dados["atualizado"] = $this->cliente->ultimaAtualizacao();
        
        $this->template->show('minha_conta', $dados);
        /*fim nova forma*/
        
        //$this->template->show('minha_conta', $dados);
        
    }
    
    public function avisos(){
        
        $dados = array(
            'titulo'    => 'Avisos'
        );
        
        $this->template->show('avisos', $dados);
        
    }
    
    public function meusdados(){
        
        $dados = array(
            'titulo'    => 'Meus Dados',
            'cliente' => $this->cliente->dados_cliente($this->session->userdata('cod_cliente')),
        );
        
        $this->template->show('meus_dados', $dados);
        
    }
    
    public function imprimir(){
        
        $html = $this->montaHtmlConta();
        
        $data = array(
            'htmlPdf' => true,
            'html' => $html,
            'soma_total' => $this->cliente->somaConta('N'),
            'cliente' => $this->cliente->dados_cliente($this->session->userdata('cod_cliente')),
            'periodo_conta' => $this->cliente->periodoContaAtual()
        );
        
        //dir 
        $strDir = 'arquivos/pdf/';
        
        //diretório onde será salvo o PDF
        $this->html2pdf->folder('arquivos/pdf/');
        
        //define o nome do arquivo
        $strArquivo = date('Hi') . '_' . $this->session->userdata('cod_cliente');
        
        //determina o nome do arquivo
        $this->html2pdf->filename($strArquivo.'.pdf');

        //determina o papel
        $this->html2pdf->paper('a4', 'portrait');
        
        //Load html view
        $this->html2pdf->html($this->load->view('imprimir_conta', $data, true));

        if($path = $this->html2pdf->create('save')) {
            
            
            if($this->uri->segment(3) == 'email'){
                
                //envia o pdf por email
                //DE:
                $this->email->from('no-replay@tialourdes.com.br', 'Restaurante Tia Lourdes');
                //PARA:
                $this->email->to($this->session->userdata('email_cliente')); 
                //ASSUNTO:
                $this->email->subject('Conta - Restaurante Tia Lourdes');
                
                //MENSAGEM:
                $html = '
                    <p>Olá, '.$this->session->userdata('nome_cliente').',</p>
                    <p>Segue anexo sua conta do Restaurante Tia Lourdes</p>
                    <p>Qualquer dúvida entre em contato no telefone (31) 3491-9501</p>
                        ';
                $this->email->message($html);   

                //ANEXO
                $this->email->attach($path);

                //ENVIA
                if($this->email->send()){
                    
                    print 'Email enviado com sucesso!';
                    
                }  else {
                    print 'Erro ao enviar email.';
                }
                
            }else {
                //gera o pdf e exibe no dialog
                $dados = array(
                    'path' => base_url() . $strDir . $strArquivo . '.pdf',
                    'htmlPdf' => false
                    );
                //PDF was successfully saved or downloaded
                $this->load->view('imprimir_conta', $dados);
            }
        }
    }
    
    public function contaspagas(){
        
        $config['base_url'] = base_url('areacliente/contaspagas');
        $config['total_rows'] = $this->cliente->countPagamento();
        $config['uri_segment'] = 3;
        $config['per_page'] = 20;
        $config['first_link'] = 'Primeiro';
        $config['full_tag_open'] = '<ul id="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['last_link'] = 'Último';
        $config['next_link'] = 'Próximo';
        $config['prev_link'] = 'Anterior';
        $config['first_tag_open'] = '<li class="bt-pagination">';
        $config['last_tag_open']  = '<li class="bt-pagination">';
        $config['next_tag_open']  = '<li class="bt-pagination">';
        $config['prev_tag_open']  = '<li class="bt-pagination">';
        $config['cur_tag_open'] = '<li><strong>';
        $config['num_tag_open'] = '<li class="bt-pagination">';
                
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close']  = '</li>';
        $config['next_tag_close']  = '</li>';
        $config['prev_tag_close']  = '</li>';
        $config['cur_tag_close']  = '</strong></li>';
        $config['num_tag_close']  = '</li>';
                
        
        $maximo = $config['per_page'];
        $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
        
        $this->pagination->initialize($config);
        
        //$dados["paginacao"] = $this->pagination->create_links();
        //$dados["contas"] = $this->cliente->contaAtual($maximo, $inicio);
        //$dados["titulo"] = 'Minha Conta';
        //$dados["soma"] = $this->cliente->somaConta('N');
        //$dados["atualizado"] = $this->cliente->ultimaAtualizacao();
        
        $dados = array(
            'paginacao' => $this->pagination->create_links(),
            'titulo' => 'Histórico de pagamentos',
        );
        $this->template->show('contas_pagas', $dados);
        
    }
    
}