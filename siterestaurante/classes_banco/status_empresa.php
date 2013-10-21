<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Status_empresa_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Status_empresa_model extends CI_Model {

   var $cod_status_empresa;

   public function setCod_status_empresa($x){

       $this->cod_status_empresa = $x;

   }

   public function getCod_status_empresa(){

       return $this->cod_status_empresa;

   }

   var $dsc_status_empresa;

   public function setDsc_status_empresa($x){

       $this->dsc_status_empresa = $x;

   }

   public function getDsc_status_empresa(){

       return $this->dsc_status_empresa;

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

   public function selectStatus_empresa($intCodstatus_empresa){

       if($intCodstatus_empresa)

           $where = 'WHERE cod_status_empresa = $intCodstatus_empresa';

       $sql = 'SELECT * FROM status_empresa '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateStatus_empresa($intCodstatus_empresa, $strUrl = null){

       if($intCodstatus_empresa)

           $where = 'WHERE cod_status_empresa = $intCodstatus_empresa';

       $sql = 'UPDATE status_empresa SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteStatus_empresa($intCodstatus_empresa, $strUrl = null){

       if($intCodstatus_empresa)

           $where = 'WHERE cod_status_empresa = $intCodstatus_empresa';

       $sql = 'DELETE FROM status_empresa '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        