<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Grupo_usuario_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Grupo_usuario_model extends CI_Model {

   var $cod_grupo_usuario;

   public function setCod_grupo_usuario($x){

       $this->cod_grupo_usuario = $x;

   }

   public function getCod_grupo_usuario(){

       return $this->cod_grupo_usuario;

   }

   var $cod_grupo;

   public function setCod_grupo($x){

       $this->cod_grupo = $x;

   }

   public function getCod_grupo(){

       return $this->cod_grupo;

   }

   var $cod_usuario;

   public function setCod_usuario($x){

       $this->cod_usuario = $x;

   }

   public function getCod_usuario(){

       return $this->cod_usuario;

   }

   public function selectGrupo_usuario($intCodgrupo_usuario){

       if($intCodgrupo_usuario)

           $where = 'WHERE cod_grupo_usuario = $intCodgrupo_usuario';

       $sql = 'SELECT * FROM grupo_usuario '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateGrupo_usuario($intCodgrupo_usuario, $strUrl = null){

       if($intCodgrupo_usuario)

           $where = 'WHERE cod_grupo_usuario = $intCodgrupo_usuario';

       $sql = 'UPDATE grupo_usuario SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteGrupo_usuario($intCodgrupo_usuario, $strUrl = null){

       if($intCodgrupo_usuario)

           $where = 'WHERE cod_grupo_usuario = $intCodgrupo_usuario';

       $sql = 'DELETE FROM grupo_usuario '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        