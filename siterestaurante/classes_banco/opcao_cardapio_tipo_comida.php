<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Opcao_cardapio_tipo_comida_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Opcao_cardapio_tipo_comida_model extends CI_Model {

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

   public function selectOpcao_cardapio_tipo_comida($intCodopcao_cardapio_tipo_comida){

       if($intCodopcao_cardapio_tipo_comida)

           $where = 'WHERE cod_opcao_cardapio_tipo_comida = $intCodopcao_cardapio_tipo_comida';

       $sql = 'SELECT * FROM opcao_cardapio_tipo_comida '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateOpcao_cardapio_tipo_comida($intCodopcao_cardapio_tipo_comida, $strUrl = null){

       if($intCodopcao_cardapio_tipo_comida)

           $where = 'WHERE cod_opcao_cardapio_tipo_comida = $intCodopcao_cardapio_tipo_comida';

       $sql = 'UPDATE opcao_cardapio_tipo_comida SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteOpcao_cardapio_tipo_comida($intCodopcao_cardapio_tipo_comida, $strUrl = null){

       if($intCodopcao_cardapio_tipo_comida)

           $where = 'WHERE cod_opcao_cardapio_tipo_comida = $intCodopcao_cardapio_tipo_comida';

       $sql = 'DELETE FROM opcao_cardapio_tipo_comida '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        