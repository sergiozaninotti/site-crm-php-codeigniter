<?php

$this->load->view($nav);

?>

<div class="main simulacao pt-0 pb-5 desk">
    <div class="container welcome text-center">
        <h2 class="text-center pt-3 text-white z-index10 position-relative">Bem vindo, <?= $nome; ?>!</h2>
        <h4 class="text-center text-white z-index10 position-relative">Confira nossos planos e escolha a opção que melhor se encaixa no seu bolso.</h4>
        <div class="icon-categoria z-index10 position-relative">
            <?php

            if ($categoria == "Automóveis") {
                echo '<img src="' . base_url("assets\img\icon-automoveis.png") . '" alt="">';
            }
            if ($categoria == "Imóveis") {
                echo '<img src="' . base_url("assets\img\icon-imoveis.png") . '" alt="">';
            }
            if ($categoria == "Moto") {
                echo '<img src="' . base_url("assets\img\icon-moto.png") . '" alt="">';
            }
            if ($categoria == "Serviços") {
                echo '<img src="' . base_url("assets\img\icon-servicos.png") . '" alt="">';
            }
            ?>

        </div>
        <div class="overlay"></div>
    </div>
    <div class="container pt-0 text-center">
        <div class="mt-5">
            <h3 class="text-center pt-3">
                Consórcio de <?= $categoria ?>
            </h3>
            <h3 class="text-center pb-4">Crédito: R$<?= number_format($credito, 2, ",", "."); ?></h3>
        </div>


        <?php

        if ($categoria == "Automóveis") {
            $prazos = array(24, 36, 48, 60, 70, 80);
            simulador($credito, 19, 3, $prazos, $nome, $telefone, $email, $categoria);
        }

        if ($categoria == "Imóveis") {
            $prazos = array(60, 70, 100, 120, 135, 150, 180);
            simulador($credito, 22, 2, $prazos, $nome, $telefone, $email, $categoria);
        }

        if ($categoria == "Moto") {
            $prazos = array(24, 36, 50, 60, 70);
            simulador($credito, 20, 5, $prazos, $nome, $telefone, $email, $categoria);
        }

        if ($categoria == "Serviços") {
            $prazos = array(10, 20, 30, 40);
            simulador($credito, 20, 5, $prazos, $nome, $telefone, $email, $categoria);
        }

        ?>
    </div>
</div>

<div class="main simulacao mobile pt-4 pb-5">
    <div class="container-fluid pt-5">
        <div class="container-fluid welcome">
            <h4 class="text-center pt-3 text-white position-relative">Bem vindo, <?= $nome; ?>!</h4>
            <h6 class="text-center text-white position-relative">Confira nossos planos e escolha a opção que melhor se encaixa no seu bolso.</h6>
            <div class="icon-categoria">
                <?php

                if ($categoria == "Automóveis") {
                    echo '<img src="' . base_url("assets\img\icon-automoveis.png") . '" alt="">';
                }
                if ($categoria == "Imóveis") {
                    echo '<img src="' . base_url("assets\img\icon-imoveis.png") . '" alt="">';
                }
                if ($categoria == "Moto") {
                    echo '<img src="' . base_url("assets\img\icon-moto.png") . '" alt="">';
                }
                if ($categoria == "Serviços") {
                    echo '<img src="' . base_url("assets\img\icon-servicos.png") . '" alt="">';
                }
                ?>

            </div>
        </div>

        <div class="mt-5">
            <h4 class="text-center pt-3">
                Consórcio de <?= $categoria ?>
            </h4>
            <h5 class="text-center">Crédito: R$<?= number_format($credito, 2, ",", "."); ?></h5>
        </div>


        <?php

        if ($categoria == "Automóveis") {
            $prazos = array(24, 36, 48, 60, 70, 80);
            simulador($credito, 19, 3, $prazos, $nome, $telefone, $email, $categoria);
        }

        if ($categoria == "Imóveis") {
            $prazos = array(60, 70, 100, 120, 135, 150, 180);
            simulador($credito, 22, 2, $prazos, $nome, $telefone, $email, $categoria);
        }

        if ($categoria == "Moto") {
            $prazos = array(24, 36, 50, 60, 70);
            simulador($credito, 20, 5, $prazos, $nome, $telefone, $email, $categoria);
        }

        if ($categoria == "Serviços") {
            $prazos = array(10, 20, 30, 40);
            simulador($credito, 20, 5, $prazos, $nome, $telefone, $email, $categoria);
        }

        ?>
    </div>
</div>

<div id="loader" class="loader d-none"><span class="col-lg-12"><i class="fas fa-spinner fa-spin text-white" style="font-size:40px;"></i></span></div>


<script>
    var categoria = "<?= $categoria; ?>";

    if (categoria == "Automóveis") {
        $(".welcome").addClass("bg-carro");
    }

    if (categoria == "Imóveis") {
        $(".welcome").addClass("bg-imovel");
    }
    if (categoria == "Moto") {
        $(".welcome").addClass("bg-moto");
    }
    if (categoria == "Serviços") {
        $(".welcome").addClass("bg-servicos");
    }
</script>


<style>
    .desk .card {
        width: 20%;
        display: inline-block;
        margin-right: 1rem;
    }

    .desk .welcome {
        background: #eee;
        max-width: 100%;
        padding-top: 6rem;
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 50px;
    }

    .desk .overlay {
        height: 333px;
        top: 0;
        position: absolute;
        left: 0;
        background: rgba(0, 0, 0, 0.5) !important;
        width: 100%;
        z-index: 0;
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 50px;
    }

    .desk .card .card-header h5 {
        font-size: 1.5rem;
        color: var(--text-color);
        text-transform: uppercase;
    }

    .desk .card .quero_comprar {
        font-size: 14px;
        margin: 0;
        width: 100%;
    }

    .desk .card .badge {
        font-size: 12px;
    }

    .desk .card .card-body {
        padding: 1.5rem 0 0 !important;
    }

    .desk .card .card-body h4 {
        font-size: 1.5rem;
    }

    .bg-carro {
        background: url('../assets/img/kwid.jpg')no-repeat !important;
    }

    .bg-imovel {
        background: url('../assets/img/casa.jpg')no-repeat !important;
        background-position: top center !important;
        background-size: cover !important;
    }

    .bg-moto {
        background: url('../assets/img/kawasaki.jpg')no-repeat !important;
        background-size: cover !important;
        background-position-y: -17rem !important;
    }

    .bg-servicos {
        background: url('../assets/img/viagem.jpg')no-repeat !important;
        background-size: cover !important;
        background-position-y: -13rem !important;
    }

    .loader {
        position: fixed;
        background: rgba(0, 0, 0, .75);
        height: 100vh;
        width: 100vw;
        z-index: 1000;
        left: 0;
        right: 0;
        top: 0;
        margin: auto;
        text-align: center;
        padding-top: 20%;
    }

    @media only screen and (max-width: 768px) {
        .welcome {
            background-size: cover !important;
        }

        .welcome::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 260px;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .bg-carro {
            background: url('../assets/img/kwid.jpg')no-repeat !important;
            background-position-x: -20rem !important;
            background-size: cover !important;
        }

        .bg-imovel {
            background: url('../assets/img/casa.jpg')no-repeat !important;
            background-position: top center !important;
            background-size: cover !important;
        }

        .bg-moto {
            background: url('../assets/img/kawasaki.jpg')no-repeat !important;
            background-size: cover !important;
            background-position-y: 0;
        }

        .bg-servicos {
            background: url('../assets/img/viagem.jpg')no-repeat !important;
            background-size: cover !important;
            background-position-y: 0;
        }
    }
</style>