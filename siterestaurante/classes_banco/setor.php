<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Setor_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Setor_model extends CI_Model {

   var $cod_setor;

   public function setCod_setor($x){

       $this->cod_setor = $x;

   }

   public function getCod_setor(){

       return $this->cod_setor;

   }

   var $nome_setor;

   public function setNome_setor($x){

       $this->nome_setor = $x;

   }

   public function getNome_setor(){

       return $this->nome_setor;

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

   public function selectSetor($intCodsetor){

       if($intCodsetor)

           $where = 'WHERE cod_setor = $intCodsetor';

       $sql = 'SELECT * FROM setor '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateSetor($intCodsetor, $strUrl = null){

       if($intCodsetor)

           $where = 'WHERE cod_setor = $intCodsetor';

       $sql = 'UPDATE setor SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteSetor($intCodsetor, $strUrl = null){

       if($intCodsetor)

           $where = 'WHERE cod_setor = $intCodsetor';

       $sql = 'DELETE FROM setor '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        