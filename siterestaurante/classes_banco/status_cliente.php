<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Status_cliente_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Status_cliente_model extends CI_Model {

   var $cod_status_cliente;

   public function setCod_status_cliente($x){

       $this->cod_status_cliente = $x;

   }

   public function getCod_status_cliente(){

       return $this->cod_status_cliente;

   }

   var $dsc_status_cliente;

   public function setDsc_status_cliente($x){

       $this->dsc_status_cliente = $x;

   }

   public function getDsc_status_cliente(){

       return $this->dsc_status_cliente;

   }

   var $dat_operacao_log;

   public function setDat_operacao_log($x){

       $this->dat_operacao_log = $x;

   }

   public function getDat_operacao_log(){

       return $this->dat_operacao_log;

   }

   var $cod_usuario_log;

   public function setCod_usuario_log($x){

       $this->cod_usuario_log = $x;

   }

   public function getCod_usuario_log(){

       return $this->cod_usuario_log;

   }

   public function selectStatus_cliente($intCodstatus_cliente){

       if($intCodstatus_cliente)

           $where = 'WHERE cod_status_cliente = $intCodstatus_cliente';

       $sql = 'SELECT * FROM status_cliente '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateStatus_cliente($intCodstatus_cliente, $strUrl = null){

       if($intCodstatus_cliente)

           $where = 'WHERE cod_status_cliente = $intCodstatus_cliente';

       $sql = 'UPDATE status_cliente SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteStatus_cliente($intCodstatus_cliente, $strUrl = null){

       if($intCodstatus_cliente)

           $where = 'WHERE cod_status_cliente = $intCodstatus_cliente';

       $sql = 'DELETE FROM status_cliente '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        