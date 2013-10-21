<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Produto_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Produto_model extends CI_Model {

   var $cod_produto;

   public function setCod_produto($x){

       $this->cod_produto = $x;

   }

   public function getCod_produto(){

       return $this->cod_produto;

   }

   var $nome_produto;

   public function setNome_produto($x){

       $this->nome_produto = $x;

   }

   public function getNome_produto(){

       return $this->nome_produto;

   }

   var $valor_produto;

   public function setValor_produto($x){

       $this->valor_produto = $x;

   }

   public function getValor_produto(){

       return $this->valor_produto;

   }

   var $qtd_estoque;

   public function setQtd_estoque($x){

       $this->qtd_estoque = $x;

   }

   public function getQtd_estoque(){

       return $this->qtd_estoque;

   }

   var $dat_operacao_log;

   public function setDat_operacao_log($x){

       $this->dat_operacao_log = $x;

   }

   public function getDat_operacao_log(){

       return $this->dat_operacao_log;

   }

   var $cod_status_produto;

   public function setCod_status_produto($x){

       $this->cod_status_produto = $x;

   }

   public function getCod_status_produto(){

       return $this->cod_status_produto;

   }

   var $cod_usuario_log;

   public function setCod_usuario_log($x){

       $this->cod_usuario_log = $x;

   }

   public function getCod_usuario_log(){

       return $this->cod_usuario_log;

   }

   public function selectProduto($intCodproduto){

       if($intCodproduto)

           $where = 'WHERE cod_produto = $intCodproduto';

       $sql = 'SELECT * FROM produto '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateProduto($intCodproduto, $strUrl = null){

       if($intCodproduto)

           $where = 'WHERE cod_produto = $intCodproduto';

       $sql = 'UPDATE produto SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteProduto($intCodproduto, $strUrl = null){

       if($intCodproduto)

           $where = 'WHERE cod_produto = $intCodproduto';

       $sql = 'DELETE FROM produto '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        