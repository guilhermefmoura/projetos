<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        //carrega a biblioteca que envia o email
        $this->load->library('email');
        //carrega o model de contato    
        $this->load->model('contato_model', 'contato');
    }

    public function index(){
        
        $dados = array(
            'titulo'    => 'Contato'
        );
        
        $this->template->show('contato', $dados);
        
    }
    
    public function enviar(){
        
        //VALIDAÇÃO DO FORMULÁRIO
        $this->form_validation->set_rules('txt_nome', 'NOME', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('txt_assunto', 'ASSUNTO', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('txt_email', 'EMAIL', 'trim|required|valid_email');
        $this->form_validation->set_rules('txt_mensagem', 'MENSAGEM', 'required|min_length[4]');
        
        //SE VALIDAÇÃO PASSAR
        if($this->form_validation->run() == TRUE){
            
            //carregando os dados enviados por post
            $dados = elements(
                    array('txt_nome', 'txt_assunto', 'txt_email', 'txt_mensagem'), $this->input->post());
            
        
            //limpa todas as variáveis
            $this->email->clear();
            
            //dados para envio
            $this->email->from('no-reply@tialourdes.com.br', 'Restaurante Tia Lourdes');
            $this->email->reply_to('no-reply@tialourdes.com.br', 'Restaurante Tia Lourdes - Não responder');
            $this->email->to($dados['txt_email']);

            $this->email->subject('Restaurante Tia Lourdes - Contato');
            
            $msg = '
                    Nome: '.$dados['txt_nome'].' <br />
                    Assunto: '.$dados['txt_assunto'].' <br />
                    Email: '.$dados['txt_email'].' /n/n
                    Mensagem: '.$dados['txt_mensagem'].' <br />
                ';
            $this->email->message($msg);

            
            if(! $this->email->send()){

                //grava registro no banco
                $dados['mensagem_error'] = $this->email->print_debugger();
                $this->contato->gravaContato($dados);

                //Direciona para uma página de erro
                $this->session->set_flashdata('enviado', $this->email->print_debugger());
                redirect('contato');

            }else 
            {
                //grava registro no banco
                $dados['mensagem_error'] = $this->email->print_debugger();
                $this->contato->gravaContato($dados);

                //Direciona para a página principal de contato
                $this->session->set_flashdata('enviado', 'Enviado com sucesso!');
                redirect('contato');
            }
            
        } else {
            
                $dados = array(
                    'titulo'    => 'Contato - Preencha os dados corretamente!'
                );
                $this->template->show('contato', $dados);   
        }
        
    }
    
}
