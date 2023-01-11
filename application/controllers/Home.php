<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function  __construct(){
		parent::__construct();
	
		$this->load->model('creditos_model','creditos');
		$this->load->model('dashboard/Cms_model','cms');
		$this->load->library('session');
	}
    

	public function index()
	{
		$user_id = 1;
		$site_title = $this->cms->get_data('seo','site_title',$user_id);

		$data = array(
			'title' => $site_title->site_title,
			'nav' => 'template/navbar',
			'loader' => 'loader',
			'categorias' => $this->creditos->selectCategoria(),
			'creditos' => $this->creditos->selectCreditos(),
			'banner_data' => $this->cms->get_data_array('secao_banners','banner_id','asc'),
			'config' => $this->cms->get_data_array('seo'),
			'simulate_section' => $this->cms->get_allData('secao_simulador','user_id',$user_id),
			'featureds_data' => $this->cms->get_data_array("secao_destaques")
		);
		$this->template->show('home',$data,TRUE);
		
	}

	public function getCreditos(){

		$nome_categoria = $this->input->post('nome_categoria'); // recebe post via ajax

		//sleep(1); // FUNÇÃO PARA DELAY ANTES DE EXECUTAR A PRÓXIMA AÇÃO

		echo $this->creditos->selectCreditos($nome_categoria);

		/* QUANDO OS DADOS VEM VIA AJAX ELE VEM NO FORMATO DE TEXTO OU JSON POR ISSO O ECHO DIRETO NA FUNÇÃO QUE TRAZ OS DADOS DO MODEL */

	}

}
