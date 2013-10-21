<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Conta_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Conta_model extends CI_Model {

   var $cod_conta;

   public function setCod_conta($x){

       $this->cod_conta = $x;

   }

   public function getCod_conta(){

       return $this->cod_conta;

   }

   var $dat_compra;

   public function setDat_compra($x){

       $this->dat_compra = $x;

   }

   public function getDat_compra(){

       return $this->dat_compra;

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

   var $cod_cliente;

   public function setCod_cliente($x){

       $this->cod_cliente = $x;

   }

   public function getCod_cliente(){

       return $this->cod_cliente;

   }

   var $chave;

   public function setChave($x){

       $this->chave = $x;

   }

   public function getChave(){

       return $this->chave;

   }

   var $valor_compra;

   public function setValor_compra($x){

       $this->valor_compra = $x;

   }

   public function getValor_compra(){

       return $this->valor_compra;

   }

   var $tipo_cliente;

   public function setTipo_cliente($x){

       $this->tipo_cliente = $x;

   }

   public function getTipo_cliente(){

       return $this->tipo_cliente;

   }

   var $idt_pagamento;

   public function setIdt_pagamento($x){

       $this->idt_pagamento = $x;

   }

   public function getIdt_pagamento(){

       return $this->idt_pagamento;

   }

   var $cod_conta_historico;

   public function setCod_conta_historico($x){

       $this->cod_conta_historico = $x;

   }

   public function getCod_conta_historico(){

       return $this->cod_conta_historico;

   }

   var $dat_pagamento;

   public function setDat_pagamento($x){

       $this->dat_pagamento = $x;

   }

   public function getDat_pagamento(){

       return $this->dat_pagamento;

   }

   var $idt_lancamento;

   public function setIdt_lancamento($x){

       $this->idt_lancamento = $x;

   }

   public function getIdt_lancamento(){

       return $this->idt_lancamento;

   }

   var $cod_lancamento;

   public function setCod_lancamento($x){

       $this->cod_lancamento = $x;

   }

   public function getCod_lancamento(){

       return $this->cod_lancamento;

   }

   public function selectConta($intCodconta){

       if($intCodconta)

           $where = 'WHERE cod_conta = $intCodconta';

       $sql = 'SELECT * FROM conta '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateConta($intCodconta, $strUrl = null){

       if($intCodconta)

           $where = 'WHERE cod_conta = $intCodconta';

       $sql = 'UPDATE conta SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteConta($intCodconta, $strUrl = null){

       if($intCodconta)

           $where = 'WHERE cod_conta = $intCodconta';

       $sql = 'DELETE FROM conta '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        