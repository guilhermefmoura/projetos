<?php

$strHtml = '';
foreach ($table as $nome):
    //define o topo do arquivo
    $strHtml .= "<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n\n";
    
    //coloca a primeira letra maiúscula
    $strClasse = ucfirst($nome->Tables_in_guilherm_tialourdes);
    
    //comentário da classe
    $strHtml .= "/**\n";
    $strHtml .= "* CodeIgniter ".$strClasse."_model Class\n";
    $strHtml .= "*\n";
    $strHtml .= "* @package		CodeIgniter\n";
    $strHtml .= "* @author		Guilherme de Freitas <guilhermefmoura@gmail.com>\n";
    $strHtml .= "* @version             1.0\n";
    $strHtml .= "*/\n\n";
    
    //iniciando a classe
    $strHtml .= "class ".$strClasse."_model extends CI_Model {\n\n";
    
        //tratando os metodos e variávies da classe
        foreach($columns[$nome->Tables_in_guilherm_tialourdes] as $a):
            
            //criando variável
            $strHtml .= "   var $".$a->Field.";\n\n";
            
            //colocando a primeira letra maiúscula
            $strCampo = ucfirst($a->Field);
            
            //criando metodo set
            $strHtml .= "   public function set".$strCampo."(\$x){\n\n";
            $strHtml .= "       \$this->".$a->Field." = \$x;\n\n";
            $strHtml .= "   }\n\n";
            
            //criando metodo get
            $strHtml .= "   public function get".$strCampo."(){\n\n";
            $strHtml .= "       return \$this->".$a->Field.";\n\n";
            $strHtml .= "   }\n\n";
            
        endforeach;
        
            //criando metodo select para a classe
            $strHtml .= "   public function select".$strClasse."(\$intCod$nome->Tables_in_guilherm_tialourdes){\n\n";
            $strHtml .= "       if(\$intCod$nome->Tables_in_guilherm_tialourdes)\n\n";
            $strHtml .= "           \$where = 'WHERE cod_$nome->Tables_in_guilherm_tialourdes = \$intCod$nome->Tables_in_guilherm_tialourdes';\n\n";
            $strHtml .= "       \$sql = 'SELECT * FROM $nome->Tables_in_guilherm_tialourdes '. \$where;\n\n";
            $strHtml .= "       \$query = \$this->db->query(\$sql);\n\n";
            $strHtml .= "       return \$query->result();\n\n";
            $strHtml .= "   }\n\n";
            
            //criando metodo update para a classe
            $strHtml .= "   public function update".$strClasse."(\$intCod$nome->Tables_in_guilherm_tialourdes, \$strUrl = null){\n\n";
            $strHtml .= "       if(\$intCod$nome->Tables_in_guilherm_tialourdes)\n\n";
            $strHtml .= "           \$where = 'WHERE cod_$nome->Tables_in_guilherm_tialourdes = \$intCod$nome->Tables_in_guilherm_tialourdes';\n\n";
            $strHtml .= "       \$sql = 'UPDATE $nome->Tables_in_guilherm_tialourdes SET CAMPOS '. \$where;\n\n";
            $strHtml .= "       \$this->db->query(\$sql);\n\n";
            $strHtml .= "       \$this->session->set_flashdata('retorno', 'Atualizado com sucesso!');\n\n";
            $strHtml .= "       redirect(\$strUrl);\n\n";
            $strHtml .= "   }\n\n";
            
            //criando metodo delete para a classe
            $strHtml .= "   public function delete".$strClasse."(\$intCod$nome->Tables_in_guilherm_tialourdes, \$strUrl = null){\n\n";
            $strHtml .= "       if(\$intCod$nome->Tables_in_guilherm_tialourdes)\n\n";
            $strHtml .= "           \$where = 'WHERE cod_$nome->Tables_in_guilherm_tialourdes = \$intCod$nome->Tables_in_guilherm_tialourdes';\n\n";
            $strHtml .= "       \$sql = 'DELETE FROM $nome->Tables_in_guilherm_tialourdes '. \$where;\n\n";
            $strHtml .= "       \$this->db->query(\$sql);\n\n";
            $strHtml .= "       \$this->session->set_flashdata('retorno', 'Atualizado com sucesso!');\n\n";
            $strHtml .= "       redirect(\$strUrl);\n\n";
            $strHtml .= "   }\n\n";
    $strHtml .= "}
        ";
    
    //nome e local onde o arquivo será salvo
    $fileProducao = "classes_banco/$nome->Tables_in_guilherm_tialourdes.php";
        
    //criando e abrindo o arquivo
    $fh = fopen($fileProducao, 'w') or die("can't open file");
    //conteúdo do arquivo
    $stringData = $strHtml;
    //adicionando conteúdo no arquivo
    fwrite($fh, $stringData);
    //fechando o arquivo
    fclose($fh);
    
    //limpando conteúdo para o próximo arquivo
    $strHtml = '';
    
    //verificando se o arquivo realmente foi criado
    if(file_exists($fileProducao)){
        print 'Arquivo '.$fileProducao.' criado com sucesso. <br />';
    }  else {
        print 'Erro ao criar arquivo '.$fileProducao.'. <br />';
    }
endforeach;
?>
