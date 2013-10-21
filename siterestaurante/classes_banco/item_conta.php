<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Item_conta_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Item_conta_model extends CI_Model {

   var $cod_item_conta;

   public function setCod_item_conta($x){

       $this->cod_item_conta = $x;

   }

   public function getCod_item_conta(){

       return $this->cod_item_conta;

   }

   var $cod_conta;

   public function setCod_conta($x){

       $this->cod_conta = $x;

   }

   public function getCod_conta(){

       return $this->cod_conta;

   }

   var $cod_produto;

   public function setCod_produto($x){

       $this->cod_produto = $x;

   }

   public function getCod_produto(){

       return $this->cod_produto;

   }

   var $qtd_produto;

   public function setQtd_produto($x){

       $this->qtd_produto = $x;

   }

   public function getQtd_produto(){

       return $this->qtd_produto;

   }

   var $valor_unitario;

   public function setValor_unitario($x){

       $this->valor_unitario = $x;

   }

   public function getValor_unitario(){

       return $this->valor_unitario;

   }

   var $valor_total;

   public function setValor_total($x){

       $this->valor_total = $x;

   }

   public function getValor_total(){

       return $this->valor_total;

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

   var $valor_desconto;

   public function setValor_desconto($x){

       $this->valor_desconto = $x;

   }

   public function getValor_desconto(){

       return $this->valor_desconto;

   }

   public function selectItem_conta($intCoditem_conta){

       if($intCoditem_conta)

           $where = 'WHERE cod_item_conta = $intCoditem_conta';

       $sql = 'SELECT * FROM item_conta '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateItem_conta($intCoditem_conta, $strUrl = null){

       if($intCoditem_conta)

           $where = 'WHERE cod_item_conta = $intCoditem_conta';

       $sql = 'UPDATE item_conta SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteItem_conta($intCoditem_conta, $strUrl = null){

       if($intCoditem_conta)

           $where = 'WHERE cod_item_conta = $intCoditem_conta';

       $sql = 'DELETE FROM item_conta '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        