<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Grupo_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Grupo_model extends CI_Model {

   var $cod_grupo;

   public function setCod_grupo($x){

       $this->cod_grupo = $x;

   }

   public function getCod_grupo(){

       return $this->cod_grupo;

   }

   var $nome_grupo;

   public function setNome_grupo($x){

       $this->nome_grupo = $x;

   }

   public function getNome_grupo(){

       return $this->nome_grupo;

   }

   var $cod_status_grupo;

   public function setCod_status_grupo($x){

       $this->cod_status_grupo = $x;

   }

   public function getCod_status_grupo(){

       return $this->cod_status_grupo;

   }

   var $idt_adm;

   public function setIdt_adm($x){

       $this->idt_adm = $x;

   }

   public function getIdt_adm(){

       return $this->idt_adm;

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

   public function selectGrupo($intCodgrupo){

       if($intCodgrupo)

           $where = 'WHERE cod_grupo = $intCodgrupo';

       $sql = 'SELECT * FROM grupo '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateGrupo($intCodgrupo, $strUrl = null){

       if($intCodgrupo)

           $where = 'WHERE cod_grupo = $intCodgrupo';

       $sql = 'UPDATE grupo SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteGrupo($intCodgrupo, $strUrl = null){

       if($intCodgrupo)

           $where = 'WHERE cod_grupo = $intCodgrupo';

       $sql = 'DELETE FROM grupo '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        