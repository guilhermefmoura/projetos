<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Status_grupo_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Status_grupo_model extends CI_Model {

   var $cod_status_grupo;

   public function setCod_status_grupo($x){

       $this->cod_status_grupo = $x;

   }

   public function getCod_status_grupo(){

       return $this->cod_status_grupo;

   }

   var $dsc_status_grupo;

   public function setDsc_status_grupo($x){

       $this->dsc_status_grupo = $x;

   }

   public function getDsc_status_grupo(){

       return $this->dsc_status_grupo;

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

   public function selectStatus_grupo($intCodstatus_grupo){

       if($intCodstatus_grupo)

           $where = 'WHERE cod_status_grupo = $intCodstatus_grupo';

       $sql = 'SELECT * FROM status_grupo '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateStatus_grupo($intCodstatus_grupo, $strUrl = null){

       if($intCodstatus_grupo)

           $where = 'WHERE cod_status_grupo = $intCodstatus_grupo';

       $sql = 'UPDATE status_grupo SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteStatus_grupo($intCodstatus_grupo, $strUrl = null){

       if($intCodstatus_grupo)

           $where = 'WHERE cod_status_grupo = $intCodstatus_grupo';

       $sql = 'DELETE FROM status_grupo '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        