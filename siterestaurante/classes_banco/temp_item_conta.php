<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Temp_item_conta_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Temp_item_conta_model extends CI_Model {

   var $cod_temp_item_conta;

   public function setCod_temp_item_conta($x){

       $this->cod_temp_item_conta = $x;

   }

   public function getCod_temp_item_conta(){

       return $this->cod_temp_item_conta;

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

   var $chave;

   public function setChave($x){

       $this->chave = $x;

   }

   public function getChave(){

       return $this->chave;

   }

   var $dat_operacao_log;

   public function setDat_operacao_log($x){

       $this->dat_operacao_log = $x;

   }

   public function getDat_operacao_log(){

       return $this->dat_operacao_log;

   }

   var $cod_temp_conta;

   public function setCod_temp_conta($x){

       $this->cod_temp_conta = $x;

   }

   public function getCod_temp_conta(){

       return $this->cod_temp_conta;

   }

   var $valor_desconto;

   public function setValor_desconto($x){

       $this->valor_desconto = $x;

   }

   public function getValor_desconto(){

       return $this->valor_desconto;

   }

   public function selectTemp_item_conta($intCodtemp_item_conta){

       if($intCodtemp_item_conta)

           $where = 'WHERE cod_temp_item_conta = $intCodtemp_item_conta';

       $sql = 'SELECT * FROM temp_item_conta '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateTemp_item_conta($intCodtemp_item_conta, $strUrl = null){

       if($intCodtemp_item_conta)

           $where = 'WHERE cod_temp_item_conta = $intCodtemp_item_conta';

       $sql = 'UPDATE temp_item_conta SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteTemp_item_conta($intCodtemp_item_conta, $strUrl = null){

       if($intCodtemp_item_conta)

           $where = 'WHERE cod_temp_item_conta = $intCodtemp_item_conta';

       $sql = 'DELETE FROM temp_item_conta '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        