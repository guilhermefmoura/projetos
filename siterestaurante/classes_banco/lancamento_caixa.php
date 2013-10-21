<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Lancamento_caixa_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Lancamento_caixa_model extends CI_Model {

   var $cod_lancamento;

   public function setCod_lancamento($x){

       $this->cod_lancamento = $x;

   }

   public function getCod_lancamento(){

       return $this->cod_lancamento;

   }

   var $valor_lancamento;

   public function setValor_lancamento($x){

       $this->valor_lancamento = $x;

   }

   public function getValor_lancamento(){

       return $this->valor_lancamento;

   }

   var $valor_pago;

   public function setValor_pago($x){

       $this->valor_pago = $x;

   }

   public function getValor_pago(){

       return $this->valor_pago;

   }

   var $valor_troco;

   public function setValor_troco($x){

       $this->valor_troco = $x;

   }

   public function getValor_troco(){

       return $this->valor_troco;

   }

   var $valor_desconto;

   public function setValor_desconto($x){

       $this->valor_desconto = $x;

   }

   public function getValor_desconto(){

       return $this->valor_desconto;

   }

   var $cod_forma_pagamento;

   public function setCod_forma_pagamento($x){

       $this->cod_forma_pagamento = $x;

   }

   public function getCod_forma_pagamento(){

       return $this->cod_forma_pagamento;

   }

   var $cod_usuario;

   public function setCod_usuario($x){

       $this->cod_usuario = $x;

   }

   public function getCod_usuario(){

       return $this->cod_usuario;

   }

   var $cod_lancamento_estorno;

   public function setCod_lancamento_estorno($x){

       $this->cod_lancamento_estorno = $x;

   }

   public function getCod_lancamento_estorno(){

       return $this->cod_lancamento_estorno;

   }

   var $idt_lancamento;

   public function setIdt_lancamento($x){

       $this->idt_lancamento = $x;

   }

   public function getIdt_lancamento(){

       return $this->idt_lancamento;

   }

   var $cod_caixa;

   public function setCod_caixa($x){

       $this->cod_caixa = $x;

   }

   public function getCod_caixa(){

       return $this->cod_caixa;

   }

   var $dat_operacao_log;

   public function setDat_operacao_log($x){

       $this->dat_operacao_log = $x;

   }

   public function getDat_operacao_log(){

       return $this->dat_operacao_log;

   }

   public function selectLancamento_caixa($intCodlancamento_caixa){

       if($intCodlancamento_caixa)

           $where = 'WHERE cod_lancamento_caixa = $intCodlancamento_caixa';

       $sql = 'SELECT * FROM lancamento_caixa '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateLancamento_caixa($intCodlancamento_caixa, $strUrl = null){

       if($intCodlancamento_caixa)

           $where = 'WHERE cod_lancamento_caixa = $intCodlancamento_caixa';

       $sql = 'UPDATE lancamento_caixa SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteLancamento_caixa($intCodlancamento_caixa, $strUrl = null){

       if($intCodlancamento_caixa)

           $where = 'WHERE cod_lancamento_caixa = $intCodlancamento_caixa';

       $sql = 'DELETE FROM lancamento_caixa '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        