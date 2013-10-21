<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Empresa_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Empresa_model extends CI_Model {

   var $cod_empresa;

   public function setCod_empresa($x){

       $this->cod_empresa = $x;

   }

   public function getCod_empresa(){

       return $this->cod_empresa;

   }

   var $nome_empresa;

   public function setNome_empresa($x){

       $this->nome_empresa = $x;

   }

   public function getNome_empresa(){

       return $this->nome_empresa;

   }

   var $cnpj;

   public function setCnpj($x){

       $this->cnpj = $x;

   }

   public function getCnpj(){

       return $this->cnpj;

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

   var $email_empresa;

   public function setEmail_empresa($x){

       $this->email_empresa = $x;

   }

   public function getEmail_empresa(){

       return $this->email_empresa;

   }

   var $contato;

   public function setContato($x){

       $this->contato = $x;

   }

   public function getContato(){

       return $this->contato;

   }

   var $telefone;

   public function setTelefone($x){

       $this->telefone = $x;

   }

   public function getTelefone(){

       return $this->telefone;

   }

   var $observacao;

   public function setObservacao($x){

       $this->observacao = $x;

   }

   public function getObservacao(){

       return $this->observacao;

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

   var $cod_status_empresa;

   public function setCod_status_empresa($x){

       $this->cod_status_empresa = $x;

   }

   public function getCod_status_empresa(){

       return $this->cod_status_empresa;

   }

   var $cod_usuario;

   public function setCod_usuario($x){

       $this->cod_usuario = $x;

   }

   public function getCod_usuario(){

       return $this->cod_usuario;

   }

   public function selectEmpresa($intCodempresa){

       if($intCodempresa)

           $where = 'WHERE cod_empresa = $intCodempresa';

       $sql = 'SELECT * FROM empresa '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateEmpresa($intCodempresa, $strUrl = null){

       if($intCodempresa)

           $where = 'WHERE cod_empresa = $intCodempresa';

       $sql = 'UPDATE empresa SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteEmpresa($intCodempresa, $strUrl = null){

       if($intCodempresa)

           $where = 'WHERE cod_empresa = $intCodempresa';

       $sql = 'DELETE FROM empresa '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        