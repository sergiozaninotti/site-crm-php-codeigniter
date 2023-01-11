<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cms extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library("form_validation");
        $this->load->model("dashboard/Cms_model", "cms");
    }

    public function seo_config()
    {

        if (!$this->input->is_ajax_request()) {
            echo "Acesso não permitido!";
            exit;
        }

        $user_id = $this->session->userdata("user_id");

        $json = array();

        $this->form_validation->set_rules('site_title', 'Título', 'required');
        $this->form_validation->set_rules('seo_site_title', 'Título Seo', 'required');
        $this->form_validation->set_rules('site_description', 'Descricao', 'required');
        $this->form_validation->set_rules('nav_color', 'Cor Navegação', 'required');
        $this->form_validation->set_rules('seo_img', 'Imagem', 'required|strip_image_tags');

        $success = $this->form_validation->run();

        if ($success) :

            $query = $this->cms->get_data("seo", "user_id", $user_id);

            $img = $this->cms->get_allData("seo", "user_id", $user_id);

            $data = array(
                'user_id' => $user_id,
                'site_title' => $this->input->post("site_title"),
                'seo_site_title' => $this->input->post("seo_site_title"),
                'site_description' => $this->input->post("site_description"),
                'nav_color' => $this->input->post("nav_color"),
                'seo_img' => $this->input->post("seo_img"),
            );

            if ($img->seo_img != $this->input->post("seo_img")) :

                $file_name = basename($data["seo_img"]); // função basename pega o nome da imagem, então usa a função com a img passada pelo input
                $old_path = getcwd() . "/tmp/" . $file_name; // função getcwd pega o caminho da img até o system, e concatena com a pasta e o nome da imagem
                $new_path = getcwd() . "/assets/dashboard/img_uploads/" . $file_name;
                rename($old_path, $new_path); // move a imagem da pasta temporária para a pasta correta

                $data["seo_img"] = "assets/dashboard/img_uploads/" . $file_name;
            else :
                $data["seo_img"] = $this->input->post("seo_img");
            endif;

            if (empty($query)) :
                $this->cms->insert("seo", $data);
                $json['status'] = 1;
            else :
                $data['user_id'] = $user_id;
                $this->cms->update("seo", $user_id, $data);
                $json['status'] = 1;
            endif;

        else :
            $json['status'] = 0;
        endif;

        echo json_encode($json);
    }

    public function get_data_seo()
    {

        $user_id = $this->session->userdata("user_id");

        $json = array();
        $json['status'] = 1;
        $json['input'] = array();

        $data = $this->cms->get_allData("seo", "user_id", $user_id);

        $json['input']['site_title'] = $data->site_title;
        $json['input']['seo_site_title'] = $data->seo_site_title;
        $json['input']['site_description'] = $data->site_description;
        $json['input']['nav_color'] = $data->nav_color;
        $json['img']['seo_img'] = base_url() . $data->seo_img;

        echo json_encode($json);
    }

    public function upload_image()
    {
         if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
        }

        $config['upload_path'] = "./tmp/"; // carrega uma library de upload, onde recebe a pasta qual vai receber os uploads
        $config['allowed_types'] = "png|jpg|jpeg"; // define quais arquivos são permitidos fazer upload
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        $json = array();
        $json['status'] = 1;

        if (!$this->upload->do_upload("image_file")) { // verifica se ocorreu algum erro com o upload do arquivo
            $json['status'] = 0; // se ocorreu erro, seta o status como 0
            $json['error'] = $this->upload->display_errors("", ""); // armazena a msg de error da propria função da library upload no array json
        } else {
            if ($this->upload->data()["file_size"] <= 500) { // $this->upload->data() pega dados do item do upload, neste caso em json vendo se é menor que 1mb
                $file_name = $this->upload->data()["file_name"]; // se ok, pega o nome da imagem em json e atribui para a variavel
                $json["img_path"] = base_url() . "tmp/" . $file_name; // se ok, pega o caminho da imagem e atribui para o array json	
            } else {
                $json['status'] = 0; // se ocorreu erro, seta o status como 0
                $json['error'] = "Arquivo não pode ser maior que 500kb";
            }
        }

        echo json_encode($json);
    }

    public function changeBanner()
    {

        $user_id = $this->session->userdata("user_id");

        $json = array();

        $banner_title =  $this->input->post('banner_title');
        $banner_product_price = $this->input->post('banner_product_price');
        $banner_product_time = $this->input->post('banner_product_time');

        $this->form_validation->set_rules('banner_title', 'Nome do produto', 'required');
        $this->form_validation->set_rules('banner_product_price', 'Valor do produto', 'required');
        $this->form_validation->set_rules('banner_product_time', 'Prazo do produto', 'required');
        $this->form_validation->set_rules('banner_hashtag', 'Hashtag', 'trim');

        $success = $this->form_validation->run();

        $banner_data = $this->cms->get_allData("secao_banners", "banner_id", $this->input->post("banner_id"));

        if ($success) :

            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'banner_id' => $this->input->post("banner_id"),
                'banner_title' => $this->input->post("banner_title"),
                'banner_product_price' => $this->input->post("banner_product_price"),
                'banner_product_time' => $this->input->post("banner_product_time"),
                'banner_img' => $this->input->post("banner_img"),
                'banner_hashtag' => $this->input->post("banner_hashtag")
            );

            if (empty($banner_data)) :

                $file_name = basename($data["banner_img"]); // função basename pega o nome da imagem, então usa a função com a img passada pelo input
                $old_path = getcwd() . "/tmp/" . $file_name; // função getcwd pega o caminho da img até o system, e concatena com a pasta e o nome da imagem
                $new_path = getcwd() . "/assets/dashboard/img_uploads/" . $file_name;
                rename($old_path, $new_path); // move a imagem da pasta temporária para a pasta correta

                $data["banner_img"] = "assets/dashboard/img_uploads/" . $file_name;

            elseif ($banner_data->banner_img != $this->input->post("banner_img")) :

                $file_name = basename($data["banner_img"]); // função basename pega o nome da imagem, então usa a função com a img passada pelo input
                $old_path = getcwd() . "/tmp/" . $file_name; // função getcwd pega o caminho da img até o system, e concatena com a pasta e o nome da imagem
                $new_path = getcwd() . "/assets/dashboard/img_uploads/" . $file_name;
                rename($old_path, $new_path); // move a imagem da pasta temporária para a pasta correta

                $data["banner_img"] = "assets/dashboard/img_uploads/" . $file_name;
            endif;
            //$data["banner_img"] = $this->input->post("banner_img");

            if (empty($banner_data)) :

                $this->cms->insert('secao_banners', $data);
                $json['status'] = 1;

            elseif (!(empty($banner_data)) && $banner_data->banner_id != $this->input->post("banner_id")) :
                $this->cms->insert('secao_banners', $data);
                $json['status'] = 1;
            else :
                unset($data['user_id']);
                unset($data['banner_id']);
                $this->cms->updateAny("secao_banners", "banner_id", $banner_data->banner_id, $data);
                $json['status'] = 1;
            endif;

        else :
            $json['status'] = 0;
        endif;

        echo json_encode($json);
    }

    /* public function getBanner()
    {

        $user_id = $this->session->userdata("user_id");

        $json = array();
        $json['status'] = 1;
        $json['input'] = array();

        $data = $this->cms->get_allData('secao_banners', 'user_id', $user_id);

        $json['input']['banner_title'] = $data->banner_title;
        $json['input']['banner_product_price'] = $data->banner_product_price;
        $json['input']['banner_product_time'] = $data->banner_product_time;
        $json['img']['banner_img_path'] = base_url() . $data->banner_img;

        echo json_encode($json);
    } */

    public function video_config()
    {

        $user_id = $this->session->userdata("user_id");

        $json = array();

        $this->form_validation->set_rules('video_title', 'Vídeo', 'required');
        $this->form_validation->set_rules('video_url', 'Url', 'required|valid_url');
        $this->form_validation->set_rules('video_img', 'Imagem', 'required');
        $this->form_validation->set_rules('status', 'Mostrar', 'trim|max_length[1]');

        $success = $this->form_validation->run();

        if ($success) :

            $video_title =  $this->input->post('video_title');
            $video_url = $this->input->post('video_url');
            $video_img = $this->input->post('video_img');
            $status = $this->input->post('status');

            $data = array(
                'user_id' => $this->session->userdata("user_id"),
                'video_title' => $video_title,
                'video_url' => $video_url,
                'video_img' => $video_img,
                'status' => $status,
            );

            $video_data = $this->cms->get_allData("secao_simulador", "user_id", $user_id);

            if (empty($video_data)) :

                $file_name = basename($data["video_img"]); // função basename pega o nome da imagem, então usa a função com a img passada pelo input
                $old_path = getcwd() . "/tmp/" . $file_name; // função getcwd pega o caminho da img até o system, e concatena com a pasta e o nome da imagem
                $new_path = getcwd() . "/assets/dashboard/img_uploads/" . $file_name;
                rename($old_path, $new_path); // move a imagem da pasta temporária para a pasta correta

                $data["video_img"] = "assets/dashboard/img_uploads/" . $file_name;

            elseif ($video_data->video_img != $this->input->post("video_img")) :

                $file_name = basename($data["video_img"]); // função basename pega o nome da imagem, então usa a função com a img passada pelo input
                $old_path = getcwd() . "/tmp/" . $file_name; // função getcwd pega o caminho da img até o system, e concatena com a pasta e o nome da imagem
                $new_path = getcwd() . "/assets/dashboard/img_uploads/" . $file_name;
                rename($old_path, $new_path); // move a imagem da pasta temporária para a pasta correta

                $data["video_img"] = "assets/dashboard/img_uploads/" . $file_name;

            endif;

            $query = $this->cms->get_allData('secao_simulador', 'user_id', $user_id);

            if (empty($video_data)) :
                $this->cms->insert('secao_simulador', $data);
                $json['status'] = 1;
            else :
                $this->cms->update('secao_simulador', $user_id, $data);
                $json['status'] = 1;
            endif;
        else :
            $json['status'] = 0;
        endif;

        echo json_encode($json);
    }

    public function simulador_title(){

        $user_id = $this->session->userdata("user_id");

        $json = array();

        $this->form_validation->set_rules('simulador_title', 'Título Simulador', 'required');
        $this->form_validation->set_rules('whatsapp_number', 'Whatsapp', 'required|trim|min_length[11]');

        $success = $this->form_validation->run();

        if ($success) :

            $whatsapp = $this->input->post('whatsapp_number');

            $data = array(
                'simulate_title' => $this->input->post('simulador_title'),
                'whatsapp' => whatsappReplace($whatsapp)
            );
            
            $query = $this->cms->get_allData('secao_simulador', 'user_id', $user_id);

            if(empty($query)):
                $this->cms->insert('secao_simulador',$data);
                $json['status'] = 1;
            else:
                $this->cms->update('secao_simulador',$user_id,$data);
                $json['status'] = 1;
            endif;

        else:
            $json['status'] = 0;
        endif;

        echo json_encode($json);
    }

    public function featureds()
    {
        $user_id = $this->session->userdata("user_id");

        $json = array();

        $this->form_validation->set_rules('product_name', 'Nome', 'required');
        $this->form_validation->set_rules('product_price', 'Preço', 'required');
        $this->form_validation->set_rules('product_parcel', 'Parcela', 'required');
        $this->form_validation->set_rules('product_img', 'Imagem', 'required');

        $success = $this->form_validation->run();

        if ($success) :

            //$product_id = $this->input->post('product_id');
            $product_name =  $this->input->post('product_name');
            $product_price = $this->input->post('product_price');
            $product_parcel = $this->input->post('product_parcel');
            $product_img = $this->input->post('product_img');
            $product_id = $this->input->post('product_id');

            $data = array(
                //'id' => $product_id,
                'user_id' => $this->session->userdata("user_id"),
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_parcel' => $product_parcel,
                'product_img' => $product_img,
            );

            $featureds_data = $this->cms->get_allData("secao_destaques", "user_id", $user_id);

            if (empty($featureds_data)) :

                $file_name = basename($data["product_img"]); // função basename pega o nome da imagem, então usa a função com a img passada pelo input
                $old_path = getcwd() . "/tmp/" . $file_name; // função getcwd pega o caminho da img até o system, e concatena com a pasta e o nome da imagem
                $new_path = getcwd() . "/assets/dashboard/img_uploads/" . $file_name;
                rename($old_path, $new_path); // move a imagem da pasta temporária para a pasta correta

                $data["product_img"] = "assets/dashboard/img_uploads/" . $file_name;

            elseif ($featureds_data->product_img != $data["product_img"]) :

                $file_name = basename($data["product_img"]); // função basename pega o nome da imagem, então usa a função com a img passada pelo input
                $old_path = getcwd() . "/tmp/" . $file_name; // função getcwd pega o caminho da img até o system, e concatena com a pasta e o nome da imagem
                $new_path = getcwd() . "/assets/dashboard/img_uploads/" . $file_name;
                rename($old_path, $new_path); // move a imagem da pasta temporária para a pasta correta

                $data["product_img"] = "assets/dashboard/img_uploads/" . $file_name;
            else:
                $data["product_img"] = $product_img;
            endif;

            if (empty($featureds_data)) :
                $last_id = $this->cms->insert('secao_destaques', $data);
                $json['status'] = 1;

                #VERIFICAR ERRO, ESTÁ CADASTRANDO MAS RETORNANDO ERRO NO JSON

            elseif (!empty($featureds_data->id)) :
                
                $this->cms->updateAny('secao_destaques', 'id',$product_id, $data);
                $json['status'] = 1;
            else :
                $last_id = $this->cms->insert('secao_destaques', $data);
                $json['status'] = 1;
            endif;
        else :
            $json['status'] = 0;
            $json['msg'] = 'erro na validação';
        endif;

        echo json_encode($json);
    }
}
