<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Caixa_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Caixa_model extends CI_Model {

   var $cod_caixa;

   public function setCod_caixa($x){

       $this->cod_caixa = $x;

   }

   public function getCod_caixa(){

       return $this->cod_caixa;

   }

   var $num_caixa;

   public function setNum_caixa($x){

       $this->num_caixa = $x;

   }

   public function getNum_caixa(){

       return $this->num_caixa;

   }

   var $cod_usuario;

   public function setCod_usuario($x){

       $this->cod_usuario = $x;

   }

   public function getCod_usuario(){

       return $this->cod_usuario;

   }

   var $cod_status_caixa;

   public function setCod_status_caixa($x){

       $this->cod_status_caixa = $x;

   }

   public function getCod_status_caixa(){

       return $this->cod_status_caixa;

   }

   var $dat_abertura;

   public function setDat_abertura($x){

       $this->dat_abertura = $x;

   }

   public function getDat_abertura(){

       return $this->dat_abertura;

   }

   var $dat_fechamento;

   public function setDat_fechamento($x){

       $this->dat_fechamento = $x;

   }

   public function getDat_fechamento(){

       return $this->dat_fechamento;

   }

   var $valor_abertura;

   public function setValor_abertura($x){

       $this->valor_abertura = $x;

   }

   public function getValor_abertura(){

       return $this->valor_abertura;

   }

   var $valor_fechamento;

   public function setValor_fechamento($x){

       $this->valor_fechamento = $x;

   }

   public function getValor_fechamento(){

       return $this->valor_fechamento;

   }

   public function selectCaixa($intCodcaixa){

       if($intCodcaixa)

           $where = 'WHERE cod_caixa = $intCodcaixa';

       $sql = 'SELECT * FROM caixa '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateCaixa($intCodcaixa, $strUrl = null){

       if($intCodcaixa)

           $where = 'WHERE cod_caixa = $intCodcaixa';

       $sql = 'UPDATE caixa SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteCaixa($intCodcaixa, $strUrl = null){

       if($intCodcaixa)

           $where = 'WHERE cod_caixa = $intCodcaixa';

       $sql = 'DELETE FROM caixa '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        