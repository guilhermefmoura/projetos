<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Temp_itens_lancamento_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Temp_itens_lancamento_model extends CI_Model {

   var $cod_temp_itens_lancamento;

   public function setCod_temp_itens_lancamento($x){

       $this->cod_temp_itens_lancamento = $x;

   }

   public function getCod_temp_itens_lancamento(){

       return $this->cod_temp_itens_lancamento;

   }

   var $cod_lancamento;

   public function setCod_lancamento($x){

       $this->cod_lancamento = $x;

   }

   public function getCod_lancamento(){

       return $this->cod_lancamento;

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

   var $valor_desconto;

   public function setValor_desconto($x){

       $this->valor_desconto = $x;

   }

   public function getValor_desconto(){

       return $this->valor_desconto;

   }

   var $valor_total;

   public function setValor_total($x){

       $this->valor_total = $x;

   }

   public function getValor_total(){

       return $this->valor_total;

   }

   public function selectTemp_itens_lancamento($intCodtemp_itens_lancamento){

       if($intCodtemp_itens_lancamento)

           $where = 'WHERE cod_temp_itens_lancamento = $intCodtemp_itens_lancamento';

       $sql = 'SELECT * FROM temp_itens_lancamento '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateTemp_itens_lancamento($intCodtemp_itens_lancamento, $strUrl = null){

       if($intCodtemp_itens_lancamento)

           $where = 'WHERE cod_temp_itens_lancamento = $intCodtemp_itens_lancamento';

       $sql = 'UPDATE temp_itens_lancamento SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteTemp_itens_lancamento($intCodtemp_itens_lancamento, $strUrl = null){

       if($intCodtemp_itens_lancamento)

           $where = 'WHERE cod_temp_itens_lancamento = $intCodtemp_itens_lancamento';

       $sql = 'DELETE FROM temp_itens_lancamento '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        