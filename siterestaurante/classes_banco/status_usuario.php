<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Status_usuario_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Status_usuario_model extends CI_Model {

   var $cod_status_usuario;

   public function setCod_status_usuario($x){

       $this->cod_status_usuario = $x;

   }

   public function getCod_status_usuario(){

       return $this->cod_status_usuario;

   }

   var $dsc_status_usuario;

   public function setDsc_status_usuario($x){

       $this->dsc_status_usuario = $x;

   }

   public function getDsc_status_usuario(){

       return $this->dsc_status_usuario;

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

   public function selectStatus_usuario($intCodstatus_usuario){

       if($intCodstatus_usuario)

           $where = 'WHERE cod_status_usuario = $intCodstatus_usuario';

       $sql = 'SELECT * FROM status_usuario '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateStatus_usuario($intCodstatus_usuario, $strUrl = null){

       if($intCodstatus_usuario)

           $where = 'WHERE cod_status_usuario = $intCodstatus_usuario';

       $sql = 'UPDATE status_usuario SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteStatus_usuario($intCodstatus_usuario, $strUrl = null){

       if($intCodstatus_usuario)

           $where = 'WHERE cod_status_usuario = $intCodstatus_usuario';

       $sql = 'DELETE FROM status_usuario '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        