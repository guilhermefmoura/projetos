<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Status_caixa_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Status_caixa_model extends CI_Model {

   var $cod_status_caixa;

   public function setCod_status_caixa($x){

       $this->cod_status_caixa = $x;

   }

   public function getCod_status_caixa(){

       return $this->cod_status_caixa;

   }

   var $dsc_status_caixa;

   public function setDsc_status_caixa($x){

       $this->dsc_status_caixa = $x;

   }

   public function getDsc_status_caixa(){

       return $this->dsc_status_caixa;

   }

   var $cod_usuario_log;

   public function setCod_usuario_log($x){

       $this->cod_usuario_log = $x;

   }

   public function getCod_usuario_log(){

       return $this->cod_usuario_log;

   }

   var $dat_operacao_log;

   public function setDat_operacao_log($x){

       $this->dat_operacao_log = $x;

   }

   public function getDat_operacao_log(){

       return $this->dat_operacao_log;

   }

   public function selectStatus_caixa($intCodstatus_caixa){

       if($intCodstatus_caixa)

           $where = 'WHERE cod_status_caixa = $intCodstatus_caixa';

       $sql = 'SELECT * FROM status_caixa '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateStatus_caixa($intCodstatus_caixa, $strUrl = null){

       if($intCodstatus_caixa)

           $where = 'WHERE cod_status_caixa = $intCodstatus_caixa';

       $sql = 'UPDATE status_caixa SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteStatus_caixa($intCodstatus_caixa, $strUrl = null){

       if($intCodstatus_caixa)

           $where = 'WHERE cod_status_caixa = $intCodstatus_caixa';

       $sql = 'DELETE FROM status_caixa '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        