<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Itens_pedido_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Itens_pedido_model extends CI_Model {

   var $cod_item;

   public function setCod_item($x){

       $this->cod_item = $x;

   }

   public function getCod_item(){

       return $this->cod_item;

   }

   var $cod_pedido;

   public function setCod_pedido($x){

       $this->cod_pedido = $x;

   }

   public function getCod_pedido(){

       return $this->cod_pedido;

   }

   var $cod_tipo_comida;

   public function setCod_tipo_comida($x){

       $this->cod_tipo_comida = $x;

   }

   public function getCod_tipo_comida(){

       return $this->cod_tipo_comida;

   }

   public function selectItens_pedido($intCoditens_pedido){

       if($intCoditens_pedido)

           $where = 'WHERE cod_itens_pedido = $intCoditens_pedido';

       $sql = 'SELECT * FROM itens_pedido '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateItens_pedido($intCoditens_pedido, $strUrl = null){

       if($intCoditens_pedido)

           $where = 'WHERE cod_itens_pedido = $intCoditens_pedido';

       $sql = 'UPDATE itens_pedido SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteItens_pedido($intCoditens_pedido, $strUrl = null){

       if($intCoditens_pedido)

           $where = 'WHERE cod_itens_pedido = $intCoditens_pedido';

       $sql = 'DELETE FROM itens_pedido '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        