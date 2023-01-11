<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view($nav);

$optional = $simulate_section->status;
($optional == 1)? $optional = '' : $optional = 'd-none';

?>

<!-- <div class="pre-loader desk">
    <h1 class="ml12">Bem vindo ao Facilite Consórcios!</h1>
</div> -->

<!-- <div id="preloader_mobile" class="pre-loader2 d-none">
    <div class="logo-image mt-0 wow fadeIn">
        <img width="220px" src="<?= base_url('assets\img\faciliteconsorcios.png'); ?>" class="img-fluid">
    </div>
    <h1 class="ml12_mobile">Bem vindo!</h1>
</div> -->

<div class="page-header desk" data-parallax="true">
    <div class="slider">
        <div class="slider slider1" style="background: url(<?=$banner_data[0]['banner_img'] ?>)">
            <div class="container d-block">
                <div class="col-lg-8 box-title">
                    <h1 class="bebas-bold text-white m-0"><?= $banner_data[0]['banner_title']; ?></h1>
                    <h3 class="bebas-bold text-white m-0">À PARTIR DE:</h3>
                    <h2 class="bebas-bold text-white m-0"><?= $banner_data[0]['banner_product_price'] ?> <br>
                        <p>mensais</p>
                    </h2>
                    <h2 class="bebas-bold text-white m-0">em até <?= $banner_data[0]['banner_product_time'] ?> meses</h2>
                </div>
                <h2 class="hashtag"><?=$banner_data[0]['banner_hashtag']?></h2>
            </div>
        </div>
        <div class="slider slider2" style="background: url(<?=$banner_data[1]['banner_img'] ?>)">
            <div class="container d-block">
                <div class="col-lg-8 box-title">
                    <h1 class="bebas-bold text-white m-0"><?= $banner_data[1]['banner_title']; ?></h1>
                    <h3 class="bebas-bold text-white m-0">À PARTIR DE:</h3>
                    <h2 class="bebas-bold text-white m-0"><?= $banner_data[1]['banner_product_price'] ?> <br>
                        <p>mensais</p>
                    </h2>
                    <h2 class="bebas-bold text-white m-0">em até <?= $banner_data[1]['banner_product_time'] ?> meses</h2>
                </div>
                <h2 class="hashtag"><?=$banner_data[0]['banner_hashtag']?></h2>
            </div>
        </div>
        <div class="slider slider3" style="background: url(<?=$banner_data[2]['banner_img'] ?>)">
            <div class="container d-block">
                <div class="col-lg-12 box-title text-right">
                    <h1 class="bebas-bold text-white m-0"><?= $banner_data[2]['banner_title']; ?></h1>
                    <h3 class="bebas-bold text-white m-0">À PARTIR DE:</h3>
                    <h2 class="bebas-bold text-white m-0"><?= $banner_data[2]['banner_product_price'] ?> <br>
                        <p>mensais</p>
                    </h2>
                    <h2 class="bebas-bold text-white m-0">em até <?= $banner_data[2]['banner_product_time'] ?> meses</h2>
                </div>
                <h2 class="hashtag"><?=$banner_data[0]['banner_hashtag']?></h2>
            </div>
        </div>
        <div class="slider slider4" style="background: url(<?=$banner_data[3]['banner_img'] ?>)">
            <div class="container d-block">
                <div class="col-lg-8 box-title">
                    <h1 class="bebas-bold text-white m-0"><?= $banner_data[3]['banner_title']; ?></h1>
                    <h3 class="bebas-bold text-white m-0">À PARTIR DE:</h3>
                    <h2 class="bebas-bold text-white m-0"><?= $banner_data[3]['banner_product_price'] ?> <br>
                        <p>mensais</p>
                    </h2>
                    <h2 class="bebas-bold text-white m-0">em até <?= $banner_data[3]['banner_product_time'] ?> meses</h2>
                </div>
                <h2 class="hashtag"><?=$banner_data[0]['banner_hashtag']?></h2>
            </div>
        </div>
    </div>
</div>

<div class="main desk">

    <div class="col-sm-1 whatsapp w2">
        <a href="https://api.whatsapp.com/send?phone=<?= $simulate_section->whatsapp ?>&text=Ol%C3%A1!%20Gostaria%20de%20saber%20mais%20informa%C3%A7%C3%B5es%20sobre%20o%20cons%C3%B3rcio">
            <img src="<?= base_url('assets/img/whatsapp.png'); ?>" alt="">
        </a>
    </div>

    <div class="container-fluid" id="simule-agora-desk">
        <div class="col-lg-6 d-inline-block">
            <h2 class="text-center line-height1"><?= $simulate_section->video_title ?></h2>
            <div class="w-100 pt-4">
                <input type="hidden" id="video_src" value="<?= $simulate_section->video_url ?>"/>
                <iframe width="100%" height="300px" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <img class="compra-compartilhada <?= $optional ?>" src="<?= (isset($simulate_section)? $simulate_section->video_img : null); ?>" alt="">
        </div>

        <div class="col-lg-5 align-top d-inline-block float-right">
            <h2 class="title text-center main-color line-height1"><?= $simulate_section->simulate_title ?></h2>
            <!-- FORMULARIO DE SIMULAÇÃO-->
            <form action="" method="post" id="form_simule_desk">
                <div class="card ">
                    <div class="card-body card-simule-agora pt-5">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="material-icons font-28px">face</i></div>
                            </div>
                            <input type="text" name="nome" class="form-control w-75" placeholder="Qual seu nome?">
                        </div>

                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <ion-icon class="font-28px" name="logo-whatsapp"></ion-icon>
                                    </div>
                                </div>
                                <input type="text" name="whatsapp" class="form-control w-75 telefone" placeholder="Seu whatsapp">
                            </div>
                        </div>
                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons font-28px">email</i></div>
                                </div>
                                <input type="text" name="email" class="form-control w-75" placeholder="Seu e-mail">
                            </div>
                        </div>
                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <ion-icon class="font-28px" name="radio-button-on"></ion-icon>
                                    </div>
                                </div>
                                <select class="form-control selectpicker w-75" name="categoria" id="categoria-desk" data-style="btn btn-link">
                                    <?= $categorias; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="material-icons font-28px">attach_money</i>
                                    </div>
                                </div>
                                <select class="form-control selectpicker w-75" name="credito" id="credito-desk" data-style="btn btn-link">
                                    <option value="" selected disabled>Selecione o crédito desejado</option>
                                </select>
                            </div>
                        </div>

                        <input type="text" class="g-recaptcha-response" name="g-recaptcha-response" hidden>
                        <button type="submit" class="btn btn-block bg-gradient-red mt-4">Simular</button>
                    </div>
                </div>

            </form>
            <!-- -->
        </div>

    </div>
    <div class="container-fluid" id="mais-vendidos">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 110" enable-background="new 0 0 1920 110" xml:space="preserve" style="
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
">
            <g>
                <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#fff" points="0,0 960,110 1920,0 		" style="
    width: 100% !important;
    position: absolute;
"></polygon>
            </g>
        </svg>
        <h2 class="text-center mb-3 pt-4 gotham-bold">CONSÓRCIOS MAIS VENDIDOS</h2>

        <div id="maisvendidos" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#maisvendidos" data-slide-to="0" class="active"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?php foreach ($featureds_data as $featureds) :?>
                    <div class="col-sm-4 d-inline-block">
                        <div class="card mb-3">
                            <img class="card-img-top" src="<?= base_url().$featureds['product_img']; ?>" alt="Card image cap">
                            <div class="card-body  text-center">
                                <h3 class="card-title"><?= $featureds['product_name'] ?> <br> <small>crédito de: <?= $featureds['product_price'] ?></small></h3>
                                <span class="badge badge-info mb-2">a partir de:</span>
                                <p class="card-text"><?= $featureds['product_parcel'] ?> <br><small class="mensais">mensais</small></p>
                            </div>
                            <a href="#simule-agora-desk"><button class="btn btn-block bg-gradient-red m-0 btn-main">simule agora</button></a>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <a class="carousel-control-prev" href="#maisvendidos" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#maisvendidos" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <div class="container" id="informacoes">
        <h2 class="text-center pb-4 pt-5">TUDO SOBRE CONSÓRCIO</h2>
        <div class="card card-nav-tabs">
            <div class="card-header bg-gradient-red">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#como-funciona" data-toggle="tab">
                                    <i class="material-icons">face</i> Como funciona
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#vantagens" data-toggle="tab">
                                    <i class="material-icons">chat</i> Vantagens
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#perguntas-frequentes" data-toggle="tab">
                                    <i class="material-icons">build</i> Perguntas frequentes
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="tab-content text-center">
                    <div class="tab-pane active" id="como-funciona">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="col-sm-4 d-inline-block align-top pt-4">
                                    <img src="<?= base_url('assets/img/escolhaseuplano.png'); ?>" alt="">
                                    <h4 class="pt-2">Escolha o plano ideal</h4>
                                    <p>Faça uma simulação e escolha o plano qual se encaixa melhor em suas necessidades. Selecione o bem que deseja, valor do crédito e o valor da parcela desejada. O consórcio é um autofinanciamento em grupo e não possuí juros.</p>
                                </div>
                                <div class="col-sm-4 d-inline-block align-top pt-4">
                                    <img src="<?= base_url('assets/img/lance.png'); ?>" alt="">
                                    <h4 class="pt-2">Sorteio e Lance</h4>
                                    <p>Uma vez ao mês é feito o sorteio durante a assembleia, o sorteado tem direito a receber o crédito contratado. Outra forma de você ser contemplado é pelo lance, ou seja, você tem a oportunidade de oferecer todo mês um adiantamento de parcelas.</p>
                                </div>
                                <div class="col-sm-4 d-inline-block align-top pt-4">
                                    <img src="<?= base_url('assets/img/contemplacao.png'); ?>" alt="">
                                    <h4 class="pt-2">Contemplação</h4>
                                    <p>Em algum dos sorteios você será contemplado, mesmo que não tenha realizado lances, receberá o crédito contratado. Os participantes contemplados deverão continuar pagando as parcelas conforme o plano adquirido.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="vantagens">
                        <div class="col-sm-5 d-inline-block align-top pl-0 pt-5">
                            <div class="mb-5 mb-lg-0">
                                <div class="">
                                    <h4 class="card-title text-uppercase text-left">Prazos Estendidos</h4>
                                    <hr>
                                    <ul class="fa-ul text-left">
                                        <li><span class="fa-li">
                                                <ion-icon name="checkbox-outline" class="check-icons"></ion-icon>
                                            </span><strong>Até 40 parcelas para serviços</strong></li>
                                        <li><span class="fa-li">
                                                <ion-icon name="checkbox-outline" class="check-icons"></ion-icon>
                                            </span>70 parcelas para motos</li>
                                        <li><span class="fa-li">
                                                <ion-icon name="checkbox-outline" class="check-icons"></ion-icon>
                                            </span>80 parcelas para automóveis</li>
                                        <li><span class="fa-li">
                                                <ion-icon name="checkbox-outline" class="check-icons"></ion-icon>
                                            </span>180 parcelas para imóveis</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 d-inline-block align-top pt-5">
                            <div class="mb-5 mb-lg-0">
                                <div class="">
                                    <h4 class="card-title text-uppercase text-left">Parcelas Flexíveis</h4>
                                    <hr>
                                    <h6>Escolha o valor da parcela que cabe no seu bolso.</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 d-inline-block pt-4">
                            <div class="mb-5 mb-lg-0">
                                <div class="">
                                    <h4 class="card-title text-uppercase text-left">Economia</h4>
                                    <hr>
                                    <h6>Consórcio não possuí juros, apenas taxa administrativa onde sua economia pode chegar até 60% em relação a financiamentos tradicionais.</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 d-inline-block align-top pt-4">
                            <div class="mb-5 mb-lg-0">
                                <div class="">
                                    <h4 class="card-title text-uppercase text-left">Poupança forçada</h4>
                                    <hr>
                                    <h6>Um consórcio pode ser adquirido com a inteção de ser uma poupança forçada, seu crédito tem uma valorização anual pelo índice do produto escolhido.</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="perguntas-frequentes">

                        <div id="accordion">
                            <div class="card">
                                <div class="" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            O que é um consórcio?
                                        </button>
                                    </h5>
                                    <ion-icon name="ios-arrow-down" class="icons-arrow"></ion-icon>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        Consórcio é a união de pessoas físicas e/ou jurídicas em grupo, com prazo de duração e número de cotas previamente determinados, com a finalidade de propiciar a seus integrantes, a aquisição de bens ou serviços, por meio de autofinanciamento. </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Quais são os documentos que preciso para contratar?
                                        </button>
                                    </h5>
                                    <ion-icon name="ios-arrow-down" class="icons-arrow"></ion-icon>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        É muito simples, apenas RG, CPF e efetuar o pagamento da primeira parcela para aderir ao grupo. </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Consórcio possuí algum reajuste?
                                        </button>
                                    </h5>
                                    <ion-icon name="ios-arrow-down" class="icons-arrow"></ion-icon>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        O sorteio é realizado uma vez por mês de acordo com a data de assembleia do seu grupo, você pode acompanhar a assembleia online no site da administradora. </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="" id="headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="headingFour">
                                            Consórcio tem juros?
                                        </button>
                                    </h5>
                                    <ion-icon name="ios-arrow-down" class="icons-arrow"></ion-icon>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                    <div class="card-body">
                                        Consórcio não possuí juros, e sim, uma taxa administrativa que já esta inclusa na parcela.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="" id="headingFive">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="headingFive">
                                            Depois de contemplado, tenho prazo para utilizar minha carta de crédito?
                                        </button>
                                    </h5>
                                    <ion-icon name="ios-arrow-down" class="icons-arrow"></ion-icon>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                    <div class="card-body">
                                        Você não tem prazo para utilizar seu crédito contemplado, pois ele fica aplicado no tesouro direto(renda fixa) e quando você decidir utilizar, receberá os rendimentos da aplicação. </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="" id="headingSix">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="headingSix">
                                            Posso utilizar meu FGTS no consórcio?
                                        </button>
                                    </h5>
                                    <ion-icon name="ios-arrow-down" class="icons-arrow"></ion-icon>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="collapseSix" data-parent="#accordion">
                                    <div class="card-body">
                                        Você pode utilizar seu FGTS para planos de imóveis, podendo ofertar como lance ou quitar parcelas a cada 24 meses. </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="" id="headingSeven">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="headingSix">
                                            Quanto tempo demora para ser contemplado?
                                        </button>
                                    </h5>
                                    <ion-icon name="ios-arrow-down" class="icons-arrow"></ion-icon>
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="collapseSeven" data-parent="#accordion">
                                    <div class="card-body">
                                        A contemplação pode acontecer a partir da primeira assembleia de participação. É importante manter as parcelas em dia para aumentar as chances, pois quem está com pagamento(s) pendente(s) não concorre ao sorteio nem participa do lance.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5" id="fale-conosco">

        <div class="col-lg-6 d-inline-block">
            <h3 class="text-center m-0">Fale conosco</h3>
            <form action="" method="post" id="form_contato_desk">
                <div class="position-relative">
                    <div class=" card-simule-agora">
                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">face</i></div>
                                </div>
                                <input type="text" name="nome" class="form-control w-75" placeholder="Qual seu nome?">
                            </div>
                        </div>
                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <ion-icon class="font-24px" name="logo-whatsapp"></ion-icon>
                                    </div>
                                </div>
                                <input type="text" name="whatsapp" class="form-control telefone w-75" placeholder="Seu whatsapp">
                            </div>
                        </div>
                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">email</i></div>
                                </div>
                                <input type="text" name="email" class="form-control w-75" placeholder="Seu e-mail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <ion-icon name="ios-send" class="font-24px"></ion-icon>
                                    </div>
                                </div>
                                <textarea type="text" name="mensagem" class="form-control w-75" rows="4" placeholder="Escreva sua mensagem"></textarea>
                            </div>
                        </div>

                    </div>
                    <input type="text" class="g-recaptcha-response" name="g-recaptcha-response" hidden>
                    <button type="submit" class="btn btn btn-block bg-gradient-red m-0">Enviar</button>
                </div>
            </form>
        </div>

        <div class="col-lg-5 d-inline-block align-top">
            <div class="mapouter mb-5">
                <h3 class="text-center mb-4 mt-0">Onde estamos</h3>
                <div class="gmap_canvas"><iframe width="100%" height="250px" id="gmap_canvas" src="https://maps.google.com/maps?q=rua%202300%20450&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.emojilib.com"></a></div>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 250px;
                        width: 100%;
                    }

                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 250px;
                        width: 100%;
                    }
                </style>
            </div>
            <div class="col-sm-12 p-0 pt-3 pt-5 text-center">
                <h5>Curta nossas redes sociais</h5>
                <div>
                    <a href=""><img width="24px" class="mr-1" src="<?= base_url('assets/img/Instagram.png'); ?>" alt=""></a>
                    <a href=""><img width="24px" class="mr-1" src="<?= base_url('assets/img/Facebook.png'); ?>" alt=""></a>
                    <a href=""><img width="24px" src="<?= base_url('assets/img/Linkedin.png'); ?>" alt=""></a>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- 
MOBILE 
****************************************************************************-->
<div class="page-header header-filter mobile" data-parallax="true">
    <div class="container">
        <div class="row">
            <div class="slider">
                <div class="slider slider1">
                    <div class="col-lg-12">
                        <h1 class="line-height1">Seu carro novo<br> em até <p>80</p><label>x</label></h1>
                        <div class="col-md-12 subtitle p-0">
                            <h3>Parcelas a partir de <br> R$ <p>429</p> por mês <br>
                                <small class="text-white">ACEITAMOS SEU USADO COMO LANCE</small>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="slider slider2">
                    <div class="col-lg-12 text-center">
                        <h2 class="line-height1">Conquiste sua <p>casa própria</p>
                        </h2>
                        <div class="col-md-12 subtitle">
                            <h2 class="prazos">180</h2>
                            <h3>meses para pagar sem juros!</h3>
                            <h5>UTILIZE SEU FGTS COMO LANCE</h5>
                        </div>
                    </div>
                </div>
                <div class="slider slider3">
                    <div class="col-lg-12 text-center">
                        <h2 class="line-height1">Compre a moto <p>dos seus sonhos</p>
                        </h2>
                        <div class="col-md-12 subtitle">
                            <h2 class="prazos">70</h2>
                            <h3>meses para pagar</h3>
                            <h5>MOTO NOVA OU SEMINOVA</h5>
                        </div>
                    </div>
                </div>
                <div class="slider slider4">
                    <div class="col-lg-12 text-center">
                        <h2 class="line-height1">Planeje aquela <p>viagem inesquecível</p>
                        </h2>
                        <div class="col-md-12 subtitle">
                            <h3>Pague em até <br>
                                <p>40</p> meses <br>

                            </h3>
                        </div>
                        <p class="texto-bottom">FESTA DE CASAMENTO, CIRURGIA ESTÉTICA, FACULDADE E MAIS...</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-1 whatsapp">
        <a href="https://api.whatsapp.com/send?phone=5547996392333&text=Ol%C3%A1!%20Gostaria%20de%20saber%20mais%20informa%C3%A7%C3%B5es%20sobre%20o%20cons%C3%B3rcio">
            <img src="<?= base_url('assets/img/whatsapp.png'); ?>" alt="">
        </a>
    </div>
</div>
<div class="main main-raised mobile">
    <div class="simule-agora bg-gradient-red text-white">
        <ion-icon name="calculator" class="icon-simule-agora"></ion-icon>Faça uma simulação
    </div>
    <div class="container" id="simule-agora">
        <div class="section text-center pb-4">
            <h4 class="title m-0 font-24px">Simule sem compromisso :)</h4>
            <!-- FORMULARIO DE SIMULAÇÃO-->
            <form action="" method="post" id="form_simule_mobile">
                <div class="card ">
                    <div class="card-body card-simule-agora">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="material-icons">face</i></div>
                            </div>
                            <input type="text" name="nome" class="form-control w-75" placeholder="Qual seu nome?">
                        </div>

                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <ion-icon class="font-24px" name="logo-whatsapp"></ion-icon>
                                    </div>
                                </div>
                                <input type="text" name="whatsapp" class="form-control telefone w-75" placeholder="Seu whatsapp">
                            </div>
                        </div>
                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">email</i></div>
                                </div>
                                <input type="text" name="email" class="form-control w-75" placeholder="Seu e-mail">
                            </div>
                        </div>
                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <ion-icon class="font-24px" name="radio-button-on"></ion-icon>
                                    </div>
                                </div>
                                <select class="form-control selectpicker w-75" name="categoria" id="categoria-mobile" data-style="btn btn-link">
                                    <?= $categorias; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="material-icons">attach_money</i>
                                    </div>
                                </div>
                                <select class="form-control selectpicker w-75" name="credito" id="credito-mobile" data-style="btn btn-link">
                                    <option value="" selected disabled>Selecione o crédito desejado</option>
                                </select>
                            </div>
                        </div>

                        <input type="text" class="g-recaptcha-response" name="g-recaptcha-response" hidden>
                        <button type="submit" class="btn btn-block bg-gradient-red mt-4">Simular</button>
                    </div>
                </div>

            </form>
            <!-- -->
            <div class="col-md-12" id="col-video">
                <h4 class="p-2">Assita o vídeo e saiba o que é um consórcio</h4>
                <div class="w-100">
                    <!--<iframe width="100%" height="100%" src="https://www.youtube.com/embed/pqESvP4qycA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    --></div>
                <div class="col-md-8 mt-5 <?= $optional ?>">
                    <img width="100%" src="<?= base_url('assets/img/consorcio-compra-compartilhada.png'); ?>" alt="">
                </div>

            </div>

        </div>
    </div>

    <div class="container maisVendidosMobile">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 110" enable-background="new 0 0 1920 110" xml:space="preserve" style="
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
">
            <g>
                <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#fff" points="0,0 960,110 1920,0 		" style="
    width: 100% !important;
    position: absolute;
"></polygon>
            </g>
        </svg>
        <h4 class="text-center mb-3 pt-4 gotham-bold">CONSÓRCIOS MAIS VENDIDOS</h4>

        <div id="carouselCarros" class="carousel slide mb-5" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#carouselCarros" data-slide-to="0" class="active"></li>
                <li data-target="#carouselCarros" data-slide-to="1"></li>
                <li data-target="#carouselCarros" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card mb-3">
                        <img class="card-img-top fitKwid" src="<?= base_url('assets/img/kwid.jpg'); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title text-center">Renault Kwid 0km <br> <small>crédito de: R$33.990,00</small></h4>
                            <p class="card-text">R$429,00<small class="mensais">mensais</small></p>
                        </div>
                        <button class="btn btn-block bg-gradient-red m-0">simule agora</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card mb-3">
                        <img class="card-img-top" src="<?= base_url('assets/img/fordka.jpg'); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title text-center">Ford KA 0km <br> <small>Crédito de: R$45.590,00</small></h4>
                            <p class="card-text">R$560,00<small class="mensais">mensais</small></p>
                        </div>
                        <button class="btn btn-block bg-gradient-red m-0">simule agora</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card mb-3">
                        <img class="card-img-top fitToro" src="<?= base_url('assets/img/toro.jpg'); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title text-center">Fiat Toro 0km <br> <small>crédito de: R$76.990,00</small></h4>
                            <p class="card-text">R$1.050,00<small class="mensais">mensais</small></p>
                        </div>
                        <button class="btn btn-block bg-gradient-red m-0">simule agora</button>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselCarros" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselCarros" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div id="carouselImóveis" class="carousel slide">

            <ol class="carousel-indicators">
                <li data-target="#carouselImóveis" data-slide-to="0" class="active"></li>
                <li data-target="#carouselImóveis" data-slide-to="1"></li>
                <li data-target="#carouselImóveis" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card mb-3">
                        <img class="card-img-top" src="<?= base_url('assets/img/casa01.jpg'); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title text-center">Casa Própria <br> <small>Crédito de: R$100.000,00</small></h4>
                            <p class="card-text">R$379,00<small class="mensais">mensais</small></p>
                        </div>
                        <button class="btn btn-block bg-gradient-red m-0">simule agora</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card mb-3">
                        <img class="card-img-top" src="<?= base_url('assets/img/casa02.jpg'); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title text-center">Casa Conforto <br> <small>Crédito de: R$200.000,00</small></h4>
                            <p class="card-text">R$990,00 <small class="mensais">mensais</small></p>
                        </div>
                        <button class="btn btn-block bg-gradient-red m-0">simule agora</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card mb-3">
                        <img class="card-img-top" src="<?= base_url('assets/img/casa03.jpg'); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title text-center">Casa Luxo <br> <small>Crédito de: R$450.000,00</small></h4>
                            <p class="card-text">R$2.500,00<small class="mensais">mensais</small></p>
                        </div>
                        <button class="btn btn-block bg-gradient-red m-0">simule agora</button>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselImóveis" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselImóveis" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 110" enable-background="new 0 0 1920 110" xml:space="preserve" style="
    width: 100%;
    position: absolute;
    left: 0;
    bottom: 0;
    transform: rotate(180deg);
">
            <g>
                <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#fff" points="0,0 960,110 1920,0 		" style="
    width: 100% !important;
    position: absolute;
"></polygon>
            </g>
        </svg>
    </div>

    <div class="container text-center" id="informacoes-mobile">
        <div id="accordion" role="tablist">
            <div class="card card-collapse">
                <div class="accordion-header" role="tab" id="headingOneMoMobile">
                    <h5>
                        <a data-toggle="collapse" href="#collapseOneMobile" aria-expanded="true" aria-controls="collapseOne">
                            Vantagens
                            <i class="material-icons">keyboard_arrow_down</i>
                        </a>
                    </h5>
                </div>

                <div id="collapseOneMobile" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <h4>Prazos Estendidos</h4>
                        <p>Até 40 parcelas para serviços; 70 parcelas para motos; 80 parcelas para automóveis; e 180 parcelas para imóveis.</p>
                        <h4 class="pt-2">Parcelas Flexíveis</h4>
                        <p>Escolha o valor da parcela que cabe no seu bolso.</p>
                        <h4 class="pt-2">Economia</h4>
                        <p>Consórcio não possuí juros, apenas taxa administrativa onde sua economia pode chegar até 60% em relação a financiamentos tradicionais.</p>
                        <h4 class="pt-2">Poupança forçada</h4>
                        <p>Um consórcio pode ser adquirido com a inteção de ser uma poupança forçada, seu crédito tem uma valorização anual pelo índice do produto escolhido.</p>
                        <h4 class="pt-2">Lance Embutido</h4>
                        <p>Não tem dinheiro para dar um lance? Não tem problema! Com o lance embutido você utiliza uma parte do próprio crédito para aumentarem suas chances de ser contemplado rapidamente.</p>
                    </div>
                </div>
            </div>
            <div class="card card-collapse">
                <div class="accordion-header" role="tab" id="headingTwoMobile">
                    <h5>
                        <a class="collapsed" data-toggle="collapse" href="#collapseTwoMobile" aria-expanded="false" aria-controls="collapseTwo">
                            Como funciona?
                            <i class="material-icons">keyboard_arrow_down</i>
                        </a>
                    </h5>
                </div>
                <div id="collapseTwoMobile" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body p-0">
                        <div class="col-sm-12 p-3 pt-4">
                            <img src="<?= base_url('assets/img/escolhaseuplano.png'); ?>" alt="">
                            <h4 class="pt-2">Escolha o plano ideal</h4>
                            <p>Faça uma simulação e escolha o plano qual se encaixa melhor em suas necessidades. Selecione o bem que deseja, valor do crédito e o valor da parcela desejada. O consórcio é um autofinanciamento em grupo e não possuí juros.</p>
                        </div>
                        <div class="col-sm-12 p-3 mt-3">
                            <img src="<?= base_url('assets/img/lance.png'); ?>" alt="">
                            <h4 class="pt-2">Sorteio e Lance</h4>
                            <p>Uma vez ao mês é feito o sorteio durante a assembleia, o sorteado tem direito a receber o crédito contratado. Outra forma de você ser contemplado é pelo lance, ou seja, você tem a oportunidade de oferecer todo mês um adiantamento de parcelas.</p>
                        </div>
                        <div class="col-sm-12 p-3 mt-3">
                            <img src="<?= base_url('assets/img/contemplacao.png'); ?>" alt="">
                            <h4 class="pt-2">Contemplação</h4>
                            <p>Em algum dos sorteios você será contemplado, mesmo que não tenha realizado lances, receberá o crédito contratado. Os participantes contemplados deverão continuar pagando as parcelas conforme o plano adquirido.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-collapse">
                <div class="accordion-header" role="tab" id="headingThreeMobile">
                    <h5>
                        <a class="collapsed" data-toggle="collapse" href="#collapseThreeMobile" aria-expanded="false" aria-controls="collapseThree">
                            Perguntas Frequentes
                            <i class="material-icons">keyboard_arrow_down</i>
                        </a>
                    </h5>
                </div>
                <div id="collapseThreeMobile" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body p-2 pt-4">
                        <h4 class="pt-2">O que é um consórcio?</h4>
                        <p>Consórcio é a união de pessoas físicas e/ou jurídicas em grupo, com prazo de duração e número de cotas previamente determinados, com a finalidade de propiciar a seus integrantes, a aquisição de bens ou serviços, por meio de autofinanciamento.</p>
                        <h4 class="pt-2">Quais são os documentos que preciso para contratar?</h4>
                        <p>É muito simples, apenas RG, CPF e efetuar o pagamento da primeira parcela para aderir ao grupo.</p>
                        <h4 class="pt-2">Consórcio possuí algum reajuste?</h4>
                        <p>O sorteio é realizado uma vez por mês de acordo com a data de assembleia do seu grupo, você pode acompanhar a assembleia online no site da administradora.</p>
                        <h4 class="pt-2">Consórcio tem juros?</h4>
                        <p>Consórcio não possuí juros, e sim, uma taxa administrativa que já esta inclusa na parcela.</p>
                        <h4 class="pt-2">Depois de contemplado, tenho prazo para utilizar minha carta de crédito?</h4>
                        <p>Você não tem prazo para utilizar seu crédito contemplado, pois ele fica aplicado no tesouro direto(renda fixa) e quando você decidir utilizar, receberá os rendimentos da aplicação.</p>
                        <h4 class="pt-2">Posso utilizar meu FGTS no consórcio?</h4>
                        <p>Você pode utilizar seu FGTS para planos de imóveis, podendo ofertar como lance ou quitar parcelas a cada 24 meses.</p>
                        <h4 class="pt-2">Quanto tempo demora para ser contemplado?</h4>
                        <p>A contemplação pode acontecer a partir da primeira assembleia de participação. É importante manter as parcelas em dia para aumentar as chances, pois quem está com pagamento(s) pendente(s) não concorre ao sorteio nem participa do lance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5" id="fale-conosco-mobile">
        <h3 class="text-center">Fale conosco</h3>
        <div class="col-sm-12 mt-4 text-center p-0">
            <div>
                <h5>
                    <ion-icon class="font-24px align-middle pr-2" name="logo-whatsapp"></ion-icon><a href="tel: +55-47-99678-0989"></a>(47)9.9978-0989
                </h5>
            </div>
            <div>
                <h5><i class="material-icons pr-2 align-middle">email</i>contato@stechz.com.br</h5>
            </div>

            <form action="" method="post" id="form_contato_mobile">
                <div class="position-relative">
                    <div class="">
                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">face</i></div>
                                </div>
                                <input type="text" name="nome" class="form-control w-75" placeholder="Qual seu nome?">
                            </div>
                        </div>
                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <ion-icon class="font-24px" name="logo-whatsapp"></ion-icon>
                                    </div>
                                </div>
                                <input type="text" name="whatsapp" class="form-control telefone w-75" placeholder="Seu whatsapp">
                            </div>
                        </div>
                        <div class="form-group bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">email</i></div>
                                </div>
                                <input type="text" name="email" class="form-control w-75" placeholder="Seu e-mail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <ion-icon name="ios-send" class="font-24px"></ion-icon>
                                    </div>
                                </div>
                                <textarea type="text" name="mensagem" class="form-control w-75" rows="4" placeholder="Escreva sua mensagem"></textarea>
                            </div>
                        </div>

                    </div>
                    <input type="text" class="g-recaptcha-response" name="g-recaptcha-response" hidden>
                    <button type="submit" class="btn btn btn-block bg-gradient-red m-0">Enviar</button>

                </div>
            </form>
            <div class="col-sm-12 p-0 pt-3">
                <div class="mapouter mb-5">
                    <h4 class="text-center">Onde estamos</h4>
                    <div class="gmap_canvas"><iframe width="100%" height="250px" id="gmap_canvas" src="https://maps.google.com/maps?q=rua%202300%20450&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.emojilib.com"></a></div>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 250px;
                            width: 100%;
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 250px;
                            width: 100%;
                        }
                    </style>
                </div>
            </div>

            <div class="col-sm-12 p-0 pt-3 pb-5">
                <h5>Curta nossas redes sociais</h5>
                <div>
                    <a href=""><img width="24px" class="mr-1" src="<?= base_url('assets/img/Instagram.png'); ?>" alt=""></a>
                    <a href=""><img width="24px" class="mr-1" src="<?= base_url('assets/img/Facebook.png'); ?>" alt=""></a>
                    <a href=""><img width="24px" src="<?= base_url('assets/img/Linkedin.png'); ?>" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view($loader); ?>

<script>
if (window.screen.width > 768) {
    $(".mobile").hide();

    var textWrapper = document.querySelector('.ml12');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({ loop: true })
        .add({
            targets: '.ml12 .letter',
            translateX: [40, 0],
            translateZ: 0,
            opacity: [0, 1],
            easing: "easeOutExpo",
            duration: 1200,
            delay: (el, i) => 500 + 30 * i
        }).add({
            targets: '.ml12 .letter',
            translateX: [0, -30],
            opacity: [1, 0],
            easing: "easeInExpo",
            duration: 1100,
            delay: (el, i) => 100 + 30 * i
        });

    setTimeout(function() {
        $(".pre-loader").hide();
    }, 3000);

    setTimeout(function() {

        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 1500,
            fade: true,
            cssEase: 'linear',
            mobileFirst: true,
            autoplay: true,
            pauseOnHover: true,
            prevArrow: '<a class="a-slider i1"><ion-icon name="ios-arrow-back" class="icon-slider"></ion-icon></a>',
            nextArrow: '<a class="a-slider i2"><ion-icon name="ios-arrow-forward" class="icon-slider"></ion-icon></a>',
            initialSlide: 0
        });

    }, 4000);

}else{
    $("#preloader_mobile").removeClass("d-none");

    var textWrapper = document.querySelector('.ml12_mobile');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({ loop: true })
        .add({
            targets: '.ml12_mobile .letter',
            translateX: [40, 0],
            translateZ: 0,
            opacity: [0, 1],
            easing: "easeOutExpo",
            duration: 1200,
            delay: (el, i) => 500 + 30 * i
        }).add({
            targets: '.ml12_mobile .letter',
            translateX: [0, -30],
            opacity: [1, 0],
            easing: "easeInExpo",
            duration: 1100,
            delay: (el, i) => 100 + 30 * i
        });

    setTimeout(function() {
        $("#preloader_mobile").hide();
    }, 3000);
}
</script>