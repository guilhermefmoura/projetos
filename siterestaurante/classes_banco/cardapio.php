<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Cardapio_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Cardapio_model extends CI_Model {

   var $cod_cardapio;

   public function setCod_cardapio($x){

       $this->cod_cardapio = $x;

   }

   public function getCod_cardapio(){

       return $this->cod_cardapio;

   }

   var $descricao_cardapio;

   public function setDescricao_cardapio($x){

       $this->descricao_cardapio = $x;

   }

   public function getDescricao_cardapio(){

       return $this->descricao_cardapio;

   }

   var $observacao_cardapio;

   public function setObservacao_cardapio($x){

       $this->observacao_cardapio = $x;

   }

   public function getObservacao_cardapio(){

       return $this->observacao_cardapio;

   }

   var $status_cardapio;

   public function setStatus_cardapio($x){

       $this->status_cardapio = $x;

   }

   public function getStatus_cardapio(){

       return $this->status_cardapio;

   }

   var $cod_usuario_log;

   public function setCod_usuario_log($x){

       $this->cod_usuario_log = $x;

   }

   public function getCod_usuario_log(){

       return $this->cod_usuario_log;

   }

   var $dat_cardapio;

   public function setDat_cardapio($x){

       $this->dat_cardapio = $x;

   }

   public function getDat_cardapio(){

       return $this->dat_cardapio;

   }

   var $dat_operacao_log;

   public function setDat_operacao_log($x){

       $this->dat_operacao_log = $x;

   }

   public function getDat_operacao_log(){

       return $this->dat_operacao_log;

   }

   public function selectCardapio($intCodcardapio){

       if($intCodcardapio)

           $where = 'WHERE cod_cardapio = $intCodcardapio';

       $sql = 'SELECT * FROM cardapio '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateCardapio($intCodcardapio, $strUrl = null){

       if($intCodcardapio)

           $where = 'WHERE cod_cardapio = $intCodcardapio';

       $sql = 'UPDATE cardapio SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteCardapio($intCodcardapio, $strUrl = null){

       if($intCodcardapio)

           $where = 'WHERE cod_cardapio = $intCodcardapio';

       $sql = 'DELETE FROM cardapio '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        