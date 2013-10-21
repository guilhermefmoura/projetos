<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Cliente_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Cliente_model extends CI_Model {

   var $cod_cliente;

   public function setCod_cliente($x){

       $this->cod_cliente = $x;

   }

   public function getCod_cliente(){

       return $this->cod_cliente;

   }

   var $nome_cliente;

   public function setNome_cliente($x){

       $this->nome_cliente = $x;

   }

   public function getNome_cliente(){

       return $this->nome_cliente;

   }

   var $endereco;

   public function setEndereco($x){

       $this->endereco = $x;

   }

   public function getEndereco(){

       return $this->endereco;

   }

   var $complemento;

   public function setComplemento($x){

       $this->complemento = $x;

   }

   public function getComplemento(){

       return $this->complemento;

   }

   var $celular;

   public function setCelular($x){

       $this->celular = $x;

   }

   public function getCelular(){

       return $this->celular;

   }

   var $telefone;

   public function setTelefone($x){

       $this->telefone = $x;

   }

   public function getTelefone(){

       return $this->telefone;

   }

   var $dat_operacao_log;

   public function setDat_operacao_log($x){

       $this->dat_operacao_log = $x;

   }

   public function getDat_operacao_log(){

       return $this->dat_operacao_log;

   }

   var $cpf_cliente;

   public function setCpf_cliente($x){

       $this->cpf_cliente = $x;

   }

   public function getCpf_cliente(){

       return $this->cpf_cliente;

   }

   var $email_cliente;

   public function setEmail_cliente($x){

       $this->email_cliente = $x;

   }

   public function getEmail_cliente(){

       return $this->email_cliente;

   }

   var $obs_cliente;

   public function setObs_cliente($x){

       $this->obs_cliente = $x;

   }

   public function getObs_cliente(){

       return $this->obs_cliente;

   }

   var $cod_status_cliente;

   public function setCod_status_cliente($x){

       $this->cod_status_cliente = $x;

   }

   public function getCod_status_cliente(){

       return $this->cod_status_cliente;

   }

   var $cod_usuario_log;

   public function setCod_usuario_log($x){

       $this->cod_usuario_log = $x;

   }

   public function getCod_usuario_log(){

       return $this->cod_usuario_log;

   }

   var $cod_usuario;

   public function setCod_usuario($x){

       $this->cod_usuario = $x;

   }

   public function getCod_usuario(){

       return $this->cod_usuario;

   }

   var $cod_empresa;

   public function setCod_empresa($x){

       $this->cod_empresa = $x;

   }

   public function getCod_empresa(){

       return $this->cod_empresa;

   }

   var $cod_setor;

   public function setCod_setor($x){

       $this->cod_setor = $x;

   }

   public function getCod_setor(){

       return $this->cod_setor;

   }

   var $matricula;

   public function setMatricula($x){

       $this->matricula = $x;

   }

   public function getMatricula(){

       return $this->matricula;

   }

   var $idt_pagamento_empresa;

   public function setIdt_pagamento_empresa($x){

       $this->idt_pagamento_empresa = $x;

   }

   public function getIdt_pagamento_empresa(){

       return $this->idt_pagamento_empresa;

   }

   public function selectCliente($intCodcliente){

       if($intCodcliente)

           $where = 'WHERE cod_cliente = $intCodcliente';

       $sql = 'SELECT * FROM cliente '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateCliente($intCodcliente, $strUrl = null){

       if($intCodcliente)

           $where = 'WHERE cod_cliente = $intCodcliente';

       $sql = 'UPDATE cliente SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteCliente($intCodcliente, $strUrl = null){

       if($intCodcliente)

           $where = 'WHERE cod_cliente = $intCodcliente';

       $sql = 'DELETE FROM cliente '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        