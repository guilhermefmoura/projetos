<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Cardapio_tipo_comida_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Cardapio_tipo_comida_model extends CI_Model {

   var $cod_tipo_comida;

   public function setCod_tipo_comida($x){

       $this->cod_tipo_comida = $x;

   }

   public function getCod_tipo_comida(){

       return $this->cod_tipo_comida;

   }

   var $cod_cardapio;

   public function setCod_cardapio($x){

       $this->cod_cardapio = $x;

   }

   public function getCod_cardapio(){

       return $this->cod_cardapio;

   }

   public function selectCardapio_tipo_comida($intCodcardapio_tipo_comida){

       if($intCodcardapio_tipo_comida)

           $where = 'WHERE cod_cardapio_tipo_comida = $intCodcardapio_tipo_comida';

       $sql = 'SELECT * FROM cardapio_tipo_comida '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateCardapio_tipo_comida($intCodcardapio_tipo_comida, $strUrl = null){

       if($intCodcardapio_tipo_comida)

           $where = 'WHERE cod_cardapio_tipo_comida = $intCodcardapio_tipo_comida';

       $sql = 'UPDATE cardapio_tipo_comida SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteCardapio_tipo_comida($intCodcardapio_tipo_comida, $strUrl = null){

       if($intCodcardapio_tipo_comida)

           $where = 'WHERE cod_cardapio_tipo_comida = $intCodcardapio_tipo_comida';

       $sql = 'DELETE FROM cardapio_tipo_comida '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        