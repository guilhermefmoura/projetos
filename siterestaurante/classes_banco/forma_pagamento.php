<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Forma_pagamento_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Forma_pagamento_model extends CI_Model {

   var $cod_forma_pagamento;

   public function setCod_forma_pagamento($x){

       $this->cod_forma_pagamento = $x;

   }

   public function getCod_forma_pagamento(){

       return $this->cod_forma_pagamento;

   }

   var $dsc_forma_pagamento;

   public function setDsc_forma_pagamento($x){

       $this->dsc_forma_pagamento = $x;

   }

   public function getDsc_forma_pagamento(){

       return $this->dsc_forma_pagamento;

   }

   var $cod_status_forma_pagamento;

   public function setCod_status_forma_pagamento($x){

       $this->cod_status_forma_pagamento = $x;

   }

   public function getCod_status_forma_pagamento(){

       return $this->cod_status_forma_pagamento;

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

   public function selectForma_pagamento($intCodforma_pagamento){

       if($intCodforma_pagamento)

           $where = 'WHERE cod_forma_pagamento = $intCodforma_pagamento';

       $sql = 'SELECT * FROM forma_pagamento '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateForma_pagamento($intCodforma_pagamento, $strUrl = null){

       if($intCodforma_pagamento)

           $where = 'WHERE cod_forma_pagamento = $intCodforma_pagamento';

       $sql = 'UPDATE forma_pagamento SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteForma_pagamento($intCodforma_pagamento, $strUrl = null){

       if($intCodforma_pagamento)

           $where = 'WHERE cod_forma_pagamento = $intCodforma_pagamento';

       $sql = 'DELETE FROM forma_pagamento '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        