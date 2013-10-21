<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Tipo_marmitex_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Tipo_marmitex_model extends CI_Model {

   var $cod_tipo_marmitex;

   public function setCod_tipo_marmitex($x){

       $this->cod_tipo_marmitex = $x;

   }

   public function getCod_tipo_marmitex(){

       return $this->cod_tipo_marmitex;

   }

   var $descricao_tipo;

   public function setDescricao_tipo($x){

       $this->descricao_tipo = $x;

   }

   public function getDescricao_tipo(){

       return $this->descricao_tipo;

   }

   var $cod_usuario_log;

   public function setCod_usuario_log($x){

       $this->cod_usuario_log = $x;

   }

   public function getCod_usuario_log(){

       return $this->cod_usuario_log;

   }

   var $data_operacao_log;

   public function setData_operacao_log($x){

       $this->data_operacao_log = $x;

   }

   public function getData_operacao_log(){

       return $this->data_operacao_log;

   }

   public function selectTipo_marmitex($intCodtipo_marmitex){

       if($intCodtipo_marmitex)

           $where = 'WHERE cod_tipo_marmitex = $intCodtipo_marmitex';

       $sql = 'SELECT * FROM tipo_marmitex '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateTipo_marmitex($intCodtipo_marmitex, $strUrl = null){

       if($intCodtipo_marmitex)

           $where = 'WHERE cod_tipo_marmitex = $intCodtipo_marmitex';

       $sql = 'UPDATE tipo_marmitex SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteTipo_marmitex($intCodtipo_marmitex, $strUrl = null){

       if($intCodtipo_marmitex)

           $where = 'WHERE cod_tipo_marmitex = $intCodtipo_marmitex';

       $sql = 'DELETE FROM tipo_marmitex '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        