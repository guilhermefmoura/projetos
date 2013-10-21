<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Tipo_comida_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Tipo_comida_model extends CI_Model {

   var $cod_tipo_comida;

   public function setCod_tipo_comida($x){

       $this->cod_tipo_comida = $x;

   }

   public function getCod_tipo_comida(){

       return $this->cod_tipo_comida;

   }

   var $descricao_tipo;

   public function setDescricao_tipo($x){

       $this->descricao_tipo = $x;

   }

   public function getDescricao_tipo(){

       return $this->descricao_tipo;

   }

   var $idt_carne;

   public function setIdt_carne($x){

       $this->idt_carne = $x;

   }

   public function getIdt_carne(){

       return $this->idt_carne;

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

   public function selectTipo_comida($intCodtipo_comida){

       if($intCodtipo_comida)

           $where = 'WHERE cod_tipo_comida = $intCodtipo_comida';

       $sql = 'SELECT * FROM tipo_comida '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateTipo_comida($intCodtipo_comida, $strUrl = null){

       if($intCodtipo_comida)

           $where = 'WHERE cod_tipo_comida = $intCodtipo_comida';

       $sql = 'UPDATE tipo_comida SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteTipo_comida($intCodtipo_comida, $strUrl = null){

       if($intCodtipo_comida)

           $where = 'WHERE cod_tipo_comida = $intCodtipo_comida';

       $sql = 'DELETE FROM tipo_comida '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        