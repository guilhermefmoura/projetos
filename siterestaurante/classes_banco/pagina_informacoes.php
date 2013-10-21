<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Pagina_informacoes_model Class
*
* @package		CodeIgniter
* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>
* @version             1.0
*/

class Pagina_informacoes_model extends CI_Model {

   var $cod_paginas;

   public function setCod_paginas($x){

       $this->cod_paginas = $x;

   }

   public function getCod_paginas(){

       return $this->cod_paginas;

   }

   var $titulo_pagina;

   public function setTitulo_pagina($x){

       $this->titulo_pagina = $x;

   }

   public function getTitulo_pagina(){

       return $this->titulo_pagina;

   }

   var $conteudo_principal;

   public function setConteudo_principal($x){

       $this->conteudo_principal = $x;

   }

   public function getConteudo_principal(){

       return $this->conteudo_principal;

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

   var $ind_ativo;

   public function setInd_ativo($x){

       $this->ind_ativo = $x;

   }

   public function getInd_ativo(){

       return $this->ind_ativo;

   }

   public function selectPagina_informacoes($intCodpagina_informacoes){

       if($intCodpagina_informacoes)

           $where = 'WHERE cod_pagina_informacoes = $intCodpagina_informacoes';

       $sql = 'SELECT * FROM pagina_informacoes '. $where;

       $query = $this->db->query($sql);

       return $query->result();

   }

   public function updatePagina_informacoes($intCodpagina_informacoes, $strUrl = null){

       if($intCodpagina_informacoes)

           $where = 'WHERE cod_pagina_informacoes = $intCodpagina_informacoes';

       $sql = 'UPDATE pagina_informacoes SET CAMPOS '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

   public function deletePagina_informacoes($intCodpagina_informacoes, $strUrl = null){

       if($intCodpagina_informacoes)

           $where = 'WHERE cod_pagina_informacoes = $intCodpagina_informacoes';

       $sql = 'DELETE FROM pagina_informacoes '. $where;

       $this->db->query($sql);

       $this->session->set_flashdata('retorno', 'Atualizado com sucesso!');

       redirect($strUrl);

   }

}
        