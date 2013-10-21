<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Temp_lancamento_caixa_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Temp_lancamento_caixa_model extends CI_Model {

   var $cod_temp_lancamento;

   public function setCod_temp_lancamento($x){

       $this->cod_temp_lancamento = $x;

   }

   public function getCod_temp_lancamento(){

       return $this->cod_temp_lancamento;

   }

   var $valor_lancamento;

   public function setValor_lancamento($x){

       $this->valor_lancamento = $x;

   }

   public function getValor_lancamento(){

       return $this->valor_lancamento;

   }

   var $cod_usuario;

   public function setCod_usuario($x){

       $this->cod_usuario = $x;

   }

   public function getCod_usuario(){

       return $this->cod_usuario;

   }

   var $cod_caixa;

   public function setCod_caixa($x){

       $this->cod_caixa = $x;

   }

   public function getCod_caixa(){

       return $this->cod_caixa;

   }

   public function selectTemp_lancamento_caixa($intCodtemp_lancamento_caixa){

       if($intCodtemp_lancamento_caixa)

           $where = 'WHERE cod_temp_lancamento_caixa = $intCodtemp_lancamento_caixa';

       $sql = 'SELECT * FROM temp_lancamento_caixa '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateTemp_lancamento_caixa($intCodtemp_lancamento_caixa, $strUrl = null){

       if($intCodtemp_lancamento_caixa)

           $where = 'WHERE cod_temp_lancamento_caixa = $intCodtemp_lancamento_caixa';

       $sql = 'UPDATE temp_lancamento_caixa SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteTemp_lancamento_caixa($intCodtemp_lancamento_caixa, $strUrl = null){

       if($intCodtemp_lancamento_caixa)

           $where = 'WHERE cod_temp_lancamento_caixa = $intCodtemp_lancamento_caixa';

       $sql = 'DELETE FROM temp_lancamento_caixa '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        