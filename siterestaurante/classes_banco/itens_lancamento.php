<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Itens_lancamento_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Itens_lancamento_model extends CI_Model {

   var $cod_itens_lancamento;

   public function setCod_itens_lancamento($x){

       $this->cod_itens_lancamento = $x;

   }

   public function getCod_itens_lancamento(){

       return $this->cod_itens_lancamento;

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

   public function selectItens_lancamento($intCoditens_lancamento){

       if($intCoditens_lancamento)

           $where = 'WHERE cod_itens_lancamento = $intCoditens_lancamento';

       $sql = 'SELECT * FROM itens_lancamento '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateItens_lancamento($intCoditens_lancamento, $strUrl = null){

       if($intCoditens_lancamento)

           $where = 'WHERE cod_itens_lancamento = $intCoditens_lancamento';

       $sql = 'UPDATE itens_lancamento SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteItens_lancamento($intCoditens_lancamento, $strUrl = null){

       if($intCoditens_lancamento)

           $where = 'WHERE cod_itens_lancamento = $intCoditens_lancamento';

       $sql = 'DELETE FROM itens_lancamento '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        