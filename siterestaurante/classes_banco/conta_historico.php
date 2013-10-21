<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Conta_historico_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Conta_historico_model extends CI_Model {

   var $cod_conta_historico;

   public function setCod_conta_historico($x){

       $this->cod_conta_historico = $x;

   }

   public function getCod_conta_historico(){

       return $this->cod_conta_historico;

   }

   var $dat_inicio_conta;

   public function setDat_inicio_conta($x){

       $this->dat_inicio_conta = $x;

   }

   public function getDat_inicio_conta(){

       return $this->dat_inicio_conta;

   }

   var $dat_fim_conta;

   public function setDat_fim_conta($x){

       $this->dat_fim_conta = $x;

   }

   public function getDat_fim_conta(){

       return $this->dat_fim_conta;

   }

   var $dat_pagamento;

   public function setDat_pagamento($x){

       $this->dat_pagamento = $x;

   }

   public function getDat_pagamento(){

       return $this->dat_pagamento;

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

   var $valor_conta;

   public function setValor_conta($x){

       $this->valor_conta = $x;

   }

   public function getValor_conta(){

       return $this->valor_conta;

   }

   var $valor_pago;

   public function setValor_pago($x){

       $this->valor_pago = $x;

   }

   public function getValor_pago(){

       return $this->valor_pago;

   }

   var $tipo_cliente;

   public function setTipo_cliente($x){

       $this->tipo_cliente = $x;

   }

   public function getTipo_cliente(){

       return $this->tipo_cliente;

   }

   public function selectConta_historico($intCodconta_historico){

       if($intCodconta_historico)

           $where = 'WHERE cod_conta_historico = $intCodconta_historico';

       $sql = 'SELECT * FROM conta_historico '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateConta_historico($intCodconta_historico, $strUrl = null){

       if($intCodconta_historico)

           $where = 'WHERE cod_conta_historico = $intCodconta_historico';

       $sql = 'UPDATE conta_historico SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteConta_historico($intCodconta_historico, $strUrl = null){

       if($intCodconta_historico)

           $where = 'WHERE cod_conta_historico = $intCodconta_historico';

       $sql = 'DELETE FROM conta_historico '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        