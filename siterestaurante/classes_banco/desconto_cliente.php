<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Desconto_cliente_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Desconto_cliente_model extends CI_Model {

   var $cod_desconto_cliente;

   public function setCod_desconto_cliente($x){

       $this->cod_desconto_cliente = $x;

   }

   public function getCod_desconto_cliente(){

       return $this->cod_desconto_cliente;

   }

   var $cod_produto;

   public function setCod_produto($x){

       $this->cod_produto = $x;

   }

   public function getCod_produto(){

       return $this->cod_produto;

   }

   var $val_desconto;

   public function setVal_desconto($x){

       $this->val_desconto = $x;

   }

   public function getVal_desconto(){

       return $this->val_desconto;

   }

   var $cod_cliente;

   public function setCod_cliente($x){

       $this->cod_cliente = $x;

   }

   public function getCod_cliente(){

       return $this->cod_cliente;

   }

   var $tipo_cliente;

   public function setTipo_cliente($x){

       $this->tipo_cliente = $x;

   }

   public function getTipo_cliente(){

       return $this->tipo_cliente;

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

   public function selectDesconto_cliente($intCoddesconto_cliente){

       if($intCoddesconto_cliente)

           $where = 'WHERE cod_desconto_cliente = $intCoddesconto_cliente';

       $sql = 'SELECT * FROM desconto_cliente '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateDesconto_cliente($intCoddesconto_cliente, $strUrl = null){

       if($intCoddesconto_cliente)

           $where = 'WHERE cod_desconto_cliente = $intCoddesconto_cliente';

       $sql = 'UPDATE desconto_cliente SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteDesconto_cliente($intCoddesconto_cliente, $strUrl = null){

       if($intCoddesconto_cliente)

           $where = 'WHERE cod_desconto_cliente = $intCoddesconto_cliente';

       $sql = 'DELETE FROM desconto_cliente '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        