<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Status_forma_pagamento_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Status_forma_pagamento_model extends CI_Model {

   var $cod_status_forma_pagamento;

   public function setCod_status_forma_pagamento($x){

       $this->cod_status_forma_pagamento = $x;

   }

   public function getCod_status_forma_pagamento(){

       return $this->cod_status_forma_pagamento;

   }

   var $dsc_status_forma_pagamento;

   public function setDsc_status_forma_pagamento($x){

       $this->dsc_status_forma_pagamento = $x;

   }

   public function getDsc_status_forma_pagamento(){

       return $this->dsc_status_forma_pagamento;

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

   public function selectStatus_forma_pagamento($intCodstatus_forma_pagamento){

       if($intCodstatus_forma_pagamento)

           $where = 'WHERE cod_status_forma_pagamento = $intCodstatus_forma_pagamento';

       $sql = 'SELECT * FROM status_forma_pagamento '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateStatus_forma_pagamento($intCodstatus_forma_pagamento, $strUrl = null){

       if($intCodstatus_forma_pagamento)

           $where = 'WHERE cod_status_forma_pagamento = $intCodstatus_forma_pagamento';

       $sql = 'UPDATE status_forma_pagamento SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteStatus_forma_pagamento($intCodstatus_forma_pagamento, $strUrl = null){

       if($intCodstatus_forma_pagamento)

           $where = 'WHERE cod_status_forma_pagamento = $intCodstatus_forma_pagamento';

       $sql = 'DELETE FROM status_forma_pagamento '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        