<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Item_menu_grupo_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Item_menu_grupo_model extends CI_Model {

   var $cod_item_menu_grupo;

   public function setCod_item_menu_grupo($x){

       $this->cod_item_menu_grupo = $x;

   }

   public function getCod_item_menu_grupo(){

       return $this->cod_item_menu_grupo;

   }

   var $cod_item_menu;

   public function setCod_item_menu($x){

       $this->cod_item_menu = $x;

   }

   public function getCod_item_menu(){

       return $this->cod_item_menu;

   }

   var $cod_grupo;

   public function setCod_grupo($x){

       $this->cod_grupo = $x;

   }

   public function getCod_grupo(){

       return $this->cod_grupo;

   }

   public function selectItem_menu_grupo($intCoditem_menu_grupo){

       if($intCoditem_menu_grupo)

           $where = 'WHERE cod_item_menu_grupo = $intCoditem_menu_grupo';

       $sql = 'SELECT * FROM item_menu_grupo '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateItem_menu_grupo($intCoditem_menu_grupo, $strUrl = null){

       if($intCoditem_menu_grupo)

           $where = 'WHERE cod_item_menu_grupo = $intCoditem_menu_grupo';

       $sql = 'UPDATE item_menu_grupo SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteItem_menu_grupo($intCoditem_menu_grupo, $strUrl = null){

       if($intCoditem_menu_grupo)

           $where = 'WHERE cod_item_menu_grupo = $intCoditem_menu_grupo';

       $sql = 'DELETE FROM item_menu_grupo '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        