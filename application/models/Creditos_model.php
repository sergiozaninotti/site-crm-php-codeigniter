<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Creditos_model extends CI_Model
{

    function  __construct(){
        parent::__construct();
    }

    //PEGA A CATEGORIA
    public function getAll(){
        return $this->db->get('categorias');
    }

    public function selectCategoria(){

        $options = "<option value=''>Selecione a Categoria</option>";
        $categorias = $this->getAll();

        foreach ($categorias -> result() as $categoria ) {
            $options .=  "<option value='{$categoria->nome}'>Consórcio de {$categoria->nome}</option>";   //.= incrementa o conteudo concatenando
        }

        return $options;

    }

    // PEGA OS CRÉDITOS DO DB
    public function getCategoriasByNome($categoria = null){

        return $this->db
        ->where('categoria',$categoria)
        ->get('creditos');
    }
    
    // NOME DA CATEGORIA PASSADO POR AJAX
    public function selectCreditos($nome_categoria = null){

        $categorias = $this->getCategoriasByNome($nome_categoria);

        $options = "<option value=''>Crédito Desejado</option>";
        
        foreach ($categorias -> result() as $categoria) {

            $valor_formatado = number_format($categoria->credito,2,",",".") ;

            $options .= "<option value='{$categoria->credito}'>R$$valor_formatado</option>";
        }

        return $options;
    }

}