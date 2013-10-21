<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Status_produto_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Status_produto_model extends CI_Model {

   var $cod_status_produto;

   public function setCod_status_produto($x){

       $this->cod_status_produto = $x;

   }

   public function getCod_status_produto(){

       return $this->cod_status_produto;

   }

   var $dsc_status_produto;

   public function setDsc_status_produto($x){

       $this->dsc_status_produto = $x;

   }

   public function getDsc_status_produto(){

       return $this->dsc_status_produto;

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

   public function selectStatus_produto($intCodstatus_produto){

       if($intCodstatus_produto)

           $where = 'WHERE cod_status_produto = $intCodstatus_produto';

       $sql = 'SELECT * FROM status_produto '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateStatus_produto($intCodstatus_produto, $strUrl = null){

       if($intCodstatus_produto)

           $where = 'WHERE cod_status_produto = $intCodstatus_produto';

       $sql = 'UPDATE status_produto SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteStatus_produto($intCodstatus_produto, $strUrl = null){

       if($intCodstatus_produto)

           $where = 'WHERE cod_status_produto = $intCodstatus_produto';

       $sql = 'DELETE FROM status_produto '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        