<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Pedido_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Pedido_model extends CI_Model {

   var $cod_pedido;

   public function setCod_pedido($x){

       $this->cod_pedido = $x;

   }

   public function getCod_pedido(){

       return $this->cod_pedido;

   }

   var $data_operacao_log;

   public function setData_operacao_log($x){

       $this->data_operacao_log = $x;

   }

   public function getData_operacao_log(){

       return $this->data_operacao_log;

   }

   var $cod_cliente;

   public function setCod_cliente($x){

       $this->cod_cliente = $x;

   }

   public function getCod_cliente(){

       return $this->cod_cliente;

   }

   var $cod_tipo_marmitex;

   public function setCod_tipo_marmitex($x){

       $this->cod_tipo_marmitex = $x;

   }

   public function getCod_tipo_marmitex(){

       return $this->cod_tipo_marmitex;

   }

   var $quantidade;

   public function setQuantidade($x){

       $this->quantidade = $x;

   }

   public function getQuantidade(){

       return $this->quantidade;

   }

   public function selectPedido($intCodpedido){

       if($intCodpedido)

           $where = 'WHERE cod_pedido = $intCodpedido';

       $sql = 'SELECT * FROM pedido '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updatePedido($intCodpedido, $strUrl = null){

       if($intCodpedido)

           $where = 'WHERE cod_pedido = $intCodpedido';

       $sql = 'UPDATE pedido SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deletePedido($intCodpedido, $strUrl = null){

       if($intCodpedido)

           $where = 'WHERE cod_pedido = $intCodpedido';

       $sql = 'DELETE FROM pedido '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        