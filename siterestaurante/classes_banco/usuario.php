<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Usuario_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Usuario_model extends CI_Model {

   var $cod_usuario;

   public function setCod_usuario($x){

       $this->cod_usuario = $x;

   }

   public function getCod_usuario(){

       return $this->cod_usuario;

   }

   var $nome_usuario;

   public function setNome_usuario($x){

       $this->nome_usuario = $x;

   }

   public function getNome_usuario(){

       return $this->nome_usuario;

   }

   var $login_usuario;

   public function setLogin_usuario($x){

       $this->login_usuario = $x;

   }

   public function getLogin_usuario(){

       return $this->login_usuario;

   }

   var $senha_usuario;

   public function setSenha_usuario($x){

       $this->senha_usuario = $x;

   }

   public function getSenha_usuario(){

       return $this->senha_usuario;

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

   var $cod_status_usuario;

   public function setCod_status_usuario($x){

       $this->cod_status_usuario = $x;

   }

   public function getCod_status_usuario(){

       return $this->cod_status_usuario;

   }

   public function selectUsuario($intCodusuario){

       if($intCodusuario)

           $where = 'WHERE cod_usuario = $intCodusuario';

       $sql = 'SELECT * FROM usuario '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateUsuario($intCodusuario, $strUrl = null){

       if($intCodusuario)

           $where = 'WHERE cod_usuario = $intCodusuario';

       $sql = 'UPDATE usuario SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteUsuario($intCodusuario, $strUrl = null){

       if($intCodusuario)

           $where = 'WHERE cod_usuario = $intCodusuario';

       $sql = 'DELETE FROM usuario '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        