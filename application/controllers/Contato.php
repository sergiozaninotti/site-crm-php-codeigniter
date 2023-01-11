<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contato extends CI_Controller
{

    function  __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function send()
    {

        if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
            exit("Acesso não permitido!");
        }

        $this->load->library('phpmailer_lib');

        $mail = $this->phpmailer_lib->load();

        //SITE KEY : 6Ld0Ab0UAAAAANWgIgarI_r_eojwuEqlqnOQxuEa
        //SECRET KEY : 6Ld0Ab0UAAAAAHUOHyiqAai2eiOTsEvTB3hKvycF

        $secret_key = "6Ld0Ab0UAAAAAHUOHyiqAai2eiOTsEvTB3hKvycF";

        $contato = $this->input->post();

        $nome = $contato['nome'];
        $email = $contato['email'];
        $whatsapp = $contato['whatsapp'];
        $conteudo = $contato['mensagem'];

        $mensagem = "Mensagem via site: <br> Nome: $nome, <br>E-mail: $email, <br> Whatsapp: $whatsapp,<br> Mensagem: $conteudo";


        // Valido se a ação do usuário foi correta junto ao google
        $answer =
            json_decode(
                file_get_contents(
                    'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key .
                        '&response=' . $_POST['g-recaptcha-response']
                )
            );

        $this->form_validation->set_rules('nome', 'Nome', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'required|trim|min_length[11]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'required|min_length[20]');

        $success = $this->form_validation->run();

        if ($success) {

            if ($answer->success) {

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

                //Recipients
                $mail->setFrom('naoresponda@stechz.com.br', 'Máquina de Vendas');
                $mail->addAddress('sergiozaninotti@gmail.com', 'Sergio');     // E-MAIL DO ADM DE QUEM RECEBE O CONTATO

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Contato pelo Site';
                $mail->Body    = $mensagem;
                $mail->AltBody = $mensagem;

                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo '<script>swal("Sucesso", "E-mail enviado com sucesso! Em breve entraremos em contato com você.", "success");</script>';
                }
            } else {
                echo "Você é um robo!";
                redirect('home');
            }
        } else {
            echo '<script>swal("Erro", "Ocorreu um erro ao enviar sua mensagem! Por favor, tente novamente.", "error");</script>';
        }
    }
}
