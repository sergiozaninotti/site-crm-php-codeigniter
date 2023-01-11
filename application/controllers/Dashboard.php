<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function  __construct()
    {

        parent::__construct();
        $this->load->library('session');
        $this->load->library("form_validation");
        $this->load->model("dashboard/Users_model", "users");
        $this->load->model('dashboard/Cms_model','cms');
    }

    public function index()
    {
        if ($this->session->userdata("user_id")) :
            $data = array(
                'title' => "Dashboard",
                'nav' => 'dashboard/template/navbar',
                "user_id" => $this->session->userdata("user_id"),
                "name" => $this->session->userdata("name"), // pega o id da sessão do usuário
                'count_leads' => $this->cms->count("leads"),
                'count_propostas' => $this->cms->count("pre_vendas")
            );

            $this->template->get("dashboard/dashboard", $data);
        else :
            $data = array(
                'title' => 'Login'
            );
            $this->template->get('dashboard/login', $data, TRUE);
        endif;
    }

    public function login()
    {
        if(!$this->input->is_ajax_request()):
            echo "Acesso não permitido!";
            exit;
        endif;

        $json = array();

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Senha', 'required|trim');

        $success = $this->form_validation->run();

        if ($success) :
            $result = $this->users->loginCheck($email); // se existir o email enviado no db

            if ($result) : // verifica a senha do email enviado

                $user_id = $result->user_id;
                $name = $result->name;
                $password_hash = $result->password_hash;

                if (password_verify($password, $password_hash)) :
                    $this->session->set_userdata("user_id", $user_id);
                    $this->session->set_userdata("name", $name);

                    $json['status'] = 1;
                    $json['url'] = base_url();
                else :
                    $json['status'] = 0;
                    $json['error_list'] = 'Usuário ou senha incorretos!';
                    $json['url'] = base_url();
                endif;

            else :
                $json['error_list'] = 'Este usuário não esta cadastrado!';
                $json['status'] = 0; // seta falso caso não retorne nenhuma linha do db
                $json['url'] = base_url();
            endif;

        else :
            $json['error_list'] = 'Ocorreu um erro com seu login!';
            $json['status'] = 0; // seta falso se não passar na verificação server side
        endif;

        echo json_encode($json);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function customizar()
    {
        if($this->session->userdata("user_id")):
            $data = array(
                'title' => 'Customizar Site',
                'nav' => 'dashboard/template/navbar',
                "name" => $this->session->userdata("name"),
                "user_id" => $this->session->userdata("user_id"),
                "banner_data" => $this->cms->get_data_array('secao_banners'),
                "simulador_data" => $this->cms->get_allData('secao_simulador', 'user_id', $this->session->userdata('user_id')),
            );
            $this->template->get('dashboard/customizar', $data, TRUE);
        else:
            redirect('home');
        endif;
       
    }

    public function configuracoes()
    {
        if($this->session->userdata("user_id")):
        $data = array(
            'title' => 'Customizar Site',
            'nav' => 'dashboard/template/navbar',
            "name" => $this->session->userdata("name"),
            "user_id" => $this->session->userdata("user_id")
        );
        $this->template->get('dashboard/configuracoes', $data, TRUE);
    else:
        redirect('home');
    endif;
    }

    public function destaques(){
        if($this->session->userdata("user_id")):
            $data = array(
                'title' => 'Destaques',
                'nav' => 'dashboard/template/navbar',
                "name" => $this->session->userdata("name"),
                "user_id" => $this->session->userdata("user_id"),
                "destaques_data" => $this->cms->get_data_array('secao_destaques')
            );
            $this->template->get('dashboard/destaques', $data, TRUE);
        else:
            redirect('home');
        endif;
    }

    
}
