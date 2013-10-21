<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arquivo_model extends CI_Model {
    
    public function getTable(){
        
        $sql = 'show tables';
        
        $query = $this->db->query($sql);
        
        return $query->result();
    }
    
    
    public function getColumnsTable($strTable = null){
        
        $sql = 'show columns from '.$strTable;
        
        $query = $this->db->query($sql);
        
        return $query->result();
    }
    
    public function getDatabase(){
        
        $sql = 'select database() as data from dual';
        
        $query = $this->db->query($sql);
        
        return $query->row();
    }
}
