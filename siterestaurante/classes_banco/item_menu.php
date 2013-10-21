<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Item_menu_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Item_menu_model extends CI_Model {

   var $cod_item_menu;

   public function setCod_item_menu($x){

       $this->cod_item_menu = $x;

   }

   public function getCod_item_menu(){

       return $this->cod_item_menu;

   }

   var $dsc_item_menu;

   public function setDsc_item_menu($x){

       $this->dsc_item_menu = $x;

   }

   public function getDsc_item_menu(){

       return $this->dsc_item_menu;

   }

   var $cod_menu_pai;

   public function setCod_menu_pai($x){

       $this->cod_menu_pai = $x;

   }

   public function getCod_menu_pai(){

       return $this->cod_menu_pai;

   }

   var $url_menu;

   public function setUrl_menu($x){

       $this->url_menu = $x;

   }

   public function getUrl_menu(){

       return $this->url_menu;

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

   var $ordem_menu;

   public function setOrdem_menu($x){

       $this->ordem_menu = $x;

   }

   public function getOrdem_menu(){

       return $this->ordem_menu;

   }

   public function selectItem_menu($intCoditem_menu){

       if($intCoditem_menu)

           $where = 'WHERE cod_item_menu = $intCoditem_menu';

       $sql = 'SELECT * FROM item_menu '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updateItem_menu($intCoditem_menu, $strUrl = null){

       if($intCoditem_menu)

           $where = 'WHERE cod_item_menu = $intCoditem_menu';

       $sql = 'UPDATE item_menu SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deleteItem_menu($intCoditem_menu, $strUrl = null){

       if($intCoditem_menu)

           $where = 'WHERE cod_item_menu = $intCoditem_menu';

       $sql = 'DELETE FROM item_menu '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        