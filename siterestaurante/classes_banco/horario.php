<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Horario_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Horario_model extends CI_Model {

   var $cod_horario;

   public function setCod_horario($x){

       $this->cod_horario = $x;

   }

   public function getCod_horario(){

       return $this->cod_horario;

   }

   var $horario_inicio;

   public function setHorario_inicio($x){

       $this->horario_inicio = $x;

   }

   public function getHorario_inicio(){

       return $this->horario_inicio;

   }

   var $horario_termino;

   public function setHorario_termino($x){

       $this->horario_termino = $x;

   }

   public function getHorario_termino(){

       return $this->horario_termino;

   }

   var $cod_usuario_log;

   public function setCod_usuario_log($x){

       $this->cod_usuario_log = $x;

   }

   public function getCod_usuario_log(){

       return $this->cod_usuario_log;

   }

   var $data_operacao_log;

   public function setData_operacao_log($x){

       $this->data_operacao_log = $x;

   }

   public function getData_operacao_log(){

       return $this->data_operacao_log;

   }

   public function selectHorario($intCodhorario){

       if($intCodhorario)

           $where = 'WHERE cod_horario = $intCodhorario';

       $sql = 'SELECT * FROM horario '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateHorario($intCodhorario, $strUrl = null){

       if($intCodhorario)

           $where = 'WHERE cod_horario = $intCodhorario';

       $sql = 'UPDATE horario SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteHorario($intCodhorario, $strUrl = null){

       if($intCodhorario)

           $where = 'WHERE cod_horario = $intCodhorario';

       $sql = 'DELETE FROM horario '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        