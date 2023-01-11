<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simulacao extends CI_Controller
{

    function  __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('phpmailer_lib');
        $this->load->library('form_validation');
    }

    function send()
    {

        if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
            exit("Acesso não permitido!");
        }

        $mail = $this->phpmailer_lib->load();

        //SITE KEY : 6Ld0Ab0UAAAAANWgIgarI_r_eojwuEqlqnOQxuEa
        //SECRET KEY : 6Ld0Ab0UAAAAAHUOHyiqAai2eiOTsEvTB3hKvycF

        $secret_key = "6Ld0Ab0UAAAAAHUOHyiqAai2eiOTsEvTB3hKvycF";

        $contato = $this->input->post(); // recebe todos os dados via ajax neste array

        $nome = $contato['nome'];
        $email = $contato['email'];
        $whatsapp = $contato['whatsapp'];
        $categoria = $contato['categoria'];
        $credito = $contato['credito'];

        // Valido se a ação do usuário foi correta junto ao google
        $answer =
            json_decode(
                file_get_contents(
                    'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key .
                        '&response=' . $_POST['g-recaptcha-response']
                )
            );

        $this->form_validation->set_rules('nome', 'Nome', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'required|trim|min_length[11]');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('credito', 'Crédito', 'required|trim|min_length[4]');

        $success = $this->form_validation->run();

        if ($success) {

            if ($answer->success) {

                $this->session->set_userdata('nome', $nome);
                $this->session->set_userdata('email', $email);
                $this->session->set_userdata('telefone', $whatsapp);
                $this->session->set_userdata('credito', $credito);
                $this->session->set_userdata('categoria', $categoria);

                $loop = $this->react_lib->load();

                $loop->addTimer(0, function () use ($loop) {

                    $this->load->model("dashboard/Cms_model", "cms");
                    $data_cadastro = new DateTime('-1 hour', new DateTimeZone('America/Sao_paulo'));

                    $contato = $this->input->post(); // recebe todos os dados via ajax neste array

                    $nome = $contato['nome'];
                    $email = $contato['email'];
                    $whatsapp = $contato['whatsapp'];
                    $categoria = $contato['categoria'];
                    $credito = $contato['credito'];

                    $query = $this->cms->get_anyData('leads', 'telefone', 'telefone', $whatsapp);

                    $data = array(
                        'nome' => $nome,
                        'telefone' => $whatsapp,
                        'email' => $email,
                        'credito' => $credito,
                        'categoria' => $categoria,
                        'data_cadastro' => $data_cadastro->format('Y-m-d H:i'),
                        'status' => 'novo_lead'
                    );

                    if ($query == "") :
                        $this->cms->insert("leads", $data);
                    else :
                        unset($data['id']);
                        $data['status'] = "simulou_novamente";
                        $this->cms->updateAny("leads", "telefone", $whatsapp, $data);
                    endif;
                });

                $loop->run();
                $loop->stop();

                $json = array(
                    'status' => 1,
                    'url' => base_url()
                );
            } else {
                $json = array(
                    'status' => 0,
                    'url' => base_url()
                );
            }
        } else {
            $json = array(
                'status' => 0,
                'url' => base_url()
            );
        }

        echo json_encode($json);
    }

    public function emailNovoLead()
    {
        if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
            exit("Acesso não permitido!");
        }

        $nome = $this->session->userdata('nome');
        $email = $this->session->userdata('email');
        $whatsapp = $this->session->userdata('telefone');
        $credito = $this->session->userdata('credito');
        $categoria = $this->session->userdata('categoria');

        if ($nome) :

            $mail = $this->phpmailer_lib->load();

            $simulacao = "Simulação via site: <br> Nome: $nome, <br>E-mail: $email, <br> Whatsapp: $whatsapp,<br> Interesse: $categoria <br>Crédito: R$ $credito";

            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.zoho.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'naoresponda@stechz.com.br';                     // SMTP username
            $mail->Password   = '';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;
            $mail->CharSet = "UTF-8";                                // TCP port to connect to

            //Email para admin
            $mail->setFrom('naoresponda@stechz.com.br', 'Máquina de Vendas');
            $mail->addAddress('sergiozaninotti@gmail.com', 'Sergio');     // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Nova simulação de: ' . $nome;
            $mail->Body    = $simulacao;
            $mail->AltBody = $simulacao;

            $mail->send();
        endif;
    }

    public function queroComprar()
    {

        if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
            exit("Acesso não permitido!");
        }
        // RECEBE OS DADOS DE PRAZO E PARCELA VIA AJAX NO CUSTOM.JS LINHA 316

        $prazo = $this->input->post('prazo');
        $parcelas = $this->input->post('parcelas');
        $this->form_validation->set_rules('prazo', 'Prazo', 'required|trim');
        $this->form_validation->set_rules('parcelas', 'Parcelas', 'required|trim');

        $success = $this->form_validation->run();

        if ($success) {

            $prazo = $this->session->set_userdata("prazo", $prazo);
            $parcelas = $this->session->set_userdata("parcelas", $parcelas);

            $json = array(
                'status' => 1,
                'url' => base_url("simulacao/proposta")
            );
        } else {
            $json['status'] = 0;
            $json['url'] =  base_url();
        }

        echo json_encode($json);
    }

    /* public function queroComprar()
    {

        if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
            exit("Acesso não permitido!");
        }

        $mail = $this->phpmailer_lib->load();

        //SITE KEY : 6LcFo7oUAAAAAGSi87uBXzYFUFdiEimm_m4LR8yR
        //SECRET KEY : 6LcFo7oUAAAAALKuYRbBSAWQ0NYf6A1WLan-5NDS

        $secret_key = "6LcFo7oUAAAAALKuYRbBSAWQ0NYf6A1WLan-5NDS";

        $nome = $this->input->post('nome');
        $telefone = $this->input->post('telefone');
        $email = $this->input->post('email');
        $categoria = $this->input->post('categoria');
        $credito = $this->input->post('credito');
        $prazo = $this->input->post('prazo');

        $creditoFormatado = number_format($credito, 2, ",", ".");

        $this->form_validation->set_rules('nome', 'Nome', 'required|trim');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required|trim');
        $this->form_validation->set_rules('credito', 'Crédito', 'required|trim');
        $this->form_validation->set_rules('prazo', 'Prazo', 'required|trim');

        $success = $this->form_validation->run();

        if ($success) {

            $quero_comprar = "Olá! Meu nome é $nome, tenho interesse em comprar um consórcio de $categoria no valor de: R$$creditoFormatado e prazo de: $prazo meses, pode entrar em contato comigo pelo telefone $telefone, ou pelo e-mail: $email. <br> Obrigado!";

            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.zoho.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'naoresponda@stechz.com.br';                     // SMTP username
            $mail->Password   = '';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;
            $mail->CharSet = "UTF-8";                                // TCP port to connect to

            //Email para admin
            $mail->setFrom('naoresponda@stechz.com.br', 'Máquina de Vendas');
            $mail->addAddress('sergiozaninotti@gmail.com', 'Sergio');     // EMAIL DO ADMIN DA EMPRESA


            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Quero comprar um consórcio de ' . $categoria;
            $mail->Body    = $quero_comprar;
            $mail->AltBody = $quero_comprar;

            $mail->send();

            //Email para usuario
            $mail->ClearAllRecipients();

            $data = array(
                'nome' => $nome
            );

            $template = $this->load->view('template/emails/template1.php', $data, TRUE);

            $mail->Body    = $template;
            $mail->AltBody = $template;
            $mail->Subject = $nome . ' - Recebemos sua solicitação de compra ';
            $mail->setFrom('naoresponda@stechz.com.br', 'FaciliteConsórcios');
            $mail->addAddress($email, 'FaciliteConsórcios'); // EMAIL DO CLIENTE INTERESSADO

            $mail->send();

            $json = array(
                'status' => 1,
                'url' => base_url()
            );
        } else {
            $json['status'] = 0;
        }

        echo json_encode($json);
    }*/

    public function consorcio()
    {
        if ($this->session->userdata('nome')) {
            $data = array(
                'titulo' => 'Simulação do seu consórcio',
                'nav' => 'template/navbar',
                'loader' => 'loader',
                'nome' => $this->session->userdata('nome'),
                'telefone' => $this->session->userdata('telefone'),
                'email' => $this->session->userdata('email'),
                'credito' => $this->session->userdata('credito'),
                'categoria' => $this->session->userdata('categoria'),
            );

            $this->template->show('simulacao', $data, TRUE);
        } else {
            redirect('home');
        }
    }

    public function proposta()
    {
        if ($this->session->userdata('nome')) :
            $data = array(
                'title' => 'Proposta para contratação',
                'nav' => 'template/navbar',
                'nome' => $this->session->userdata('nome'),
                'telefone' => $this->session->userdata('telefone'),
                'email' => $this->session->userdata('email'),
                'credito' => $this->session->userdata('credito'),
                'prazo' => $this->session->userdata('prazo'),
                'categoria' => $this->session->userdata('categoria'),
                'parcelas' => $this->session->userdata('parcelas')
            );
            $this->template->show('proposta', $data, TRUE);
        else :
            redirect('home');
        endif;
    }

    public function finalizarProposta()
    {

        if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
            exit("Acesso não permitido!");
        }

        $this->load->helper('funcoes');

        //SITE KEY : 6Ld0Ab0UAAAAANWgIgarI_r_eojwuEqlqnOQxuEa
        //SECRET KEY : 6Ld0Ab0UAAAAAHUOHyiqAai2eiOTsEvTB3hKvycF

        $secret_key = "6Ld0Ab0UAAAAAHUOHyiqAai2eiOTsEvTB3hKvycF";

        $answer =
            json_decode(
                file_get_contents(
                    'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key .
                        '&response=' . $_POST['g-recaptcha-response']
                )
            );


        $this->form_validation->set_rules('nome', 'Nome', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|trim|min_length[11]');
        $this->form_validation->set_rules('rg', 'RG', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('nascimento', 'Nascimento', 'checkDateFormat'); // FUNÇÃO DE VERIFICAÇÃO NO HELPER VER POSSÍVEL ERRO
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|trim|min_length[11]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('cep', 'Cep', 'required');
        $this->form_validation->set_rules('endereco', 'Endereço', 'required');
        $this->form_validation->set_rules('numero', 'Número', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('uf', 'UF', 'required|trim|min_length[2]');

        $success = $this->form_validation->run();

        if ($success) {

            if ($answer->success) {

                $this->load->model('dashboard/Cms_model', 'cms');

                $data_cadastro = new DateTime('-1 hour', new DateTimeZone('America/Sao_paulo'));

                $nome = $this->input->post("nome");
                $cpf = $this->input->post("cpf");
                $rg = $this->input->post("rg");
                $nascimento = $this->input->post("nascimento");
                $telefone = $this->input->post("telefone");
                $email = $this->input->post("email");
                $cep = $this->input->post("cep");
                $endereco = $this->input->post("endereco");
                $numero = $this->input->post("numero");
                $bairro = $this->input->post("bairro");
                $cidade = $this->input->post("cidade");
                $uf = $this->input->post("uf");

                $data = array(
                    'nome' => $nome,
                    'cpf' => $cpf,
                    'rg' => $rg,
                    'nascimento' => $nascimento,
                    'telefone' => $telefone,
                    'email' => $email,
                    'cep' => $cep,
                    'endereco' => $endereco,
                    'numero' => $numero,
                    'bairro' => $bairro,
                    'cidade' => $cidade,
                    'uf' => $uf,
                    'credito' => $this->session->userdata('credito'),
                    'prazo' => $this->session->userdata('prazo'),
                    'categoria' => $this->session->userdata('categoria'),
                    'parcelas' => $this->session->userdata('parcelas'),
                    'data_cadastro' => $data_cadastro->format('Y-m-d H:i')
                );

                $this->cms->insert("pre_vendas", $data);

                //SETA A SESSÃO DO USUÁRIO APÓS O CADASTRO DE INTERESSE NA PROPOSTA
                $cpf = $this->session->set_userdata('cpf', $cpf);
                $rg = $this->session->set_userdata('rg', $rg);
                $nascimento = $this->session->set_userdata('nascimento', $nascimento);
                $cep = $this->session->set_userdata('cep', $cep);
                $endereco = $this->session->set_userdata('endereco', $endereco);
                $numero = $this->session->set_userdata('numero', $numero);
                $bairro = $this->session->set_userdata('bairro', $bairro);
                $cidade = $this->session->set_userdata('cidade', $cidade);
                $uf = $this->session->set_userdata('uf', $uf);

                sleep(1);

                $json = array(
                    'status' => 1,
                    'url' => base_url()
                );
            } else {
                $json = array(
                    'status' => 0,
                    'url' => base_url()
                ); // verifica o captcha
            }
        } else {
            $json = array(
                'status' => 0,
                'url' => base_url()
            ); // verifica a validação

        }


        echo json_encode($json);
    }

    public function emailNovaProposta()
    {
        if (!($this->input->is_ajax_request())) {
            redirect('home');
        }

        $mail = $this->phpmailer_lib->load();
        $data_cadastro = new DateTime('-1 hour', new DateTimeZone('America/Sao_paulo'));

        if (!(empty($this->session->userdata('cpf')))) :

            $data = array(
                'nome' => $this->session->userdata('nome'),
                'cpf' => $this->session->userdata('cpf'),
                'rg' => $this->session->userdata('rg'),
                'nascimento' => $this->session->userdata('nascimento'),
                'telefone' => $this->session->userdata('telefone'),
                'email' => $this->session->userdata('email'),
                'cep' => $this->session->userdata('cep'),
                'endereco' => $this->session->userdata('endereco'),
                'numero' => $this->session->userdata('numero'),
                'bairro' => $this->session->userdata('bairro'),
                'cidade' => $this->session->userdata('cidade'),
                'uf' => $this->session->userdata('uf'),
                'credito' => $this->session->userdata('credito'),
                'prazo' => $this->session->userdata('prazo'),
                'categoria' => $this->session->userdata('categoria'),
                'parcelas' => $this->session->userdata('parcelas'),
                'data_cadastro' => $data_cadastro->format('Y-m-d H:i')
            );


            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.zoho.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'naoresponda@stechz.com.br';                     // SMTP username
            $mail->Password   = '';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;
            $mail->CharSet = "UTF-8";                                // TCP port to connect to

            //Email para admin
            $mail->setFrom('naoresponda@stechz.com.br', 'FaciliteConsórcios');
            $mail->addAddress('sergiozaninotti@gmail.com', 'Sergio');     // Add a recipient

            $pre_contrato = $this->load->view("template/emails/pre_contrato_usuario.php", $data, TRUE);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Contratação de plano de Consórcio';
            $mail->Body    = $pre_contrato;
            $mail->AltBody = $pre_contrato;

            $mail->send();

            // Email para o ADMIN
            $mail->ClearAllRecipients();

            $mail->setFrom('naoresponda@stechz.com.br', 'Máquina de Vendas');
            $mail->addAddress('sergiozaninotti@gmail.com', 'Sergio');     // Add a recipient

            $pre_contrato = $this->load->view("template/emails/pre_contrato_admin.php", $data, TRUE);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Nova venda pelo site!';
            $mail->Body    = $pre_contrato;
            $mail->AltBody = $pre_contrato;

            $mail->send();
        endif;
    }
}
