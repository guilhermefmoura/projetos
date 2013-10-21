<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Email_enviado_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Email_enviado_model extends CI_Model {

   var $cod_email_enviado;

   public function setCod_email_enviado($x){

       $this->cod_email_enviado = $x;

   }

   public function getCod_email_enviado(){

       return $this->cod_email_enviado;

   }

   var $cod_cliente;

   public function setCod_cliente($x){

       $this->cod_cliente = $x;

   }

   public function getCod_cliente(){

       return $this->cod_cliente;

   }

   var $tipo_cliente;

   public function setTipo_cliente($x){

       $this->tipo_cliente = $x;

   }

   public function getTipo_cliente(){

       return $this->tipo_cliente;

   }

   var $tipo_email;

   public function setTipo_email($x){

       $this->tipo_email = $x;

   }

   public function getTipo_email(){

       return $this->tipo_email;

   }

   var $url_arquivo;

   public function setUrl_arquivo($x){

       $this->url_arquivo = $x;

   }

   public function getUrl_arquivo(){

       return $this->url_arquivo;

   }

   var $dat_operacao_log;

   public function setDat_operacao_log($x){

       $this->dat_operacao_log = $x;

   }

   public function getDat_operacao_log(){

       return $this->dat_operacao_log;

   }

   var $idt_envio;

   public function setIdt_envio($x){

       $this->idt_envio = $x;

   }

   public function getIdt_envio(){

       return $this->idt_envio;

   }

   public function selectEmail_enviado($intCodemail_enviado){

       if($intCodemail_enviado)

           $where = 'WHERE cod_email_enviado = $intCodemail_enviado';

       $sql = 'SELECT * FROM email_enviado '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateEmail_enviado($intCodemail_enviado, $strUrl = null){

       if($intCodemail_enviado)

           $where = 'WHERE cod_email_enviado = $intCodemail_enviado';

       $sql = 'UPDATE email_enviado SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteEmail_enviado($intCodemail_enviado, $strUrl = null){

       if($intCodemail_enviado)

           $where = 'WHERE cod_email_enviado = $intCodemail_enviado';

       $sql = 'DELETE FROM email_enviado '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        