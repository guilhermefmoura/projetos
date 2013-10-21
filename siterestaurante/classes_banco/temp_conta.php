<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Temp_conta_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Temp_conta_model extends CI_Model {

   var $cod_temp_conta;

   public function setCod_temp_conta($x){

       $this->cod_temp_conta = $x;

   }

   public function getCod_temp_conta(){

       return $this->cod_temp_conta;

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

   var $tipo_cliente;

   public function setTipo_cliente($x){

       $this->tipo_cliente = $x;

   }

   public function getTipo_cliente(){

       return $this->tipo_cliente;

   }

   public function selectTemp_conta($intCodtemp_conta){

       if($intCodtemp_conta)

           $where = 'WHERE cod_temp_conta = $intCodtemp_conta';

       $sql = 'SELECT * FROM temp_conta '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateTemp_conta($intCodtemp_conta, $strUrl = null){

       if($intCodtemp_conta)

           $where = 'WHERE cod_temp_conta = $intCodtemp_conta';

       $sql = 'UPDATE temp_conta SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteTemp_conta($intCodtemp_conta, $strUrl = null){

       if($intCodtemp_conta)

           $where = 'WHERE cod_temp_conta = $intCodtemp_conta';

       $sql = 'DELETE FROM temp_conta '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        