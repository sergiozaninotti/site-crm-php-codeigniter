<!-- NAV DESKTOP -->
<nav id="nav-desk" class="navbar navbar-expand-lg position-fixed navbar-transparent desk">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <div class="logo-image">
                <img id="logo-desk" width="160px" src="" class="img-fluid">
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link " href="<?= base_url(); ?>">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url(); ?>#simule-agora-desk">Simule agora </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tudo sobre Consórcios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url(); ?>#informacoes">Vantagens</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>#informacoes">Como funciona? </a>
                        <a class="dropdown-item" href="<?= base_url(); ?>#informacoes">Perguntas frequentes</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url(); ?>#fale-conosco">Contato</a>
                </li>
                <li class="nav-item">
                    <!--<a class="nav-link" href="<?= base_url("dashboard/index"); ?>">Login</a>-->
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- NAV MOBILE -->
<nav class="navbar navbar-expand-lg position-fixed m-0 mobile">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <div class="logo-image mt-0">
                <img width="115px" src="<?= base_url('assets\img\faciliteconsorcios.png'); ?>" class="img-fluid">
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link navbar-brand mb-3" href="#">
                        <img width="100px" src="<?= base_url('assets\img\faciliteconsorcios.png'); ?>" class="img-fluid">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>">Home <ion-icon name="ios-arrow-dropright" role="img" class="md hydrated nav-icons" aria-label="arrow dropright"></ion-icon></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>#simule-agora">Simule agora <ion-icon name="ios-arrow-dropright" role="img" class="md hydrated nav-icons main-color" aria-label="arrow dropright"></ion-icon></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>#col-video">O que é consórcio <span class="badge badge-info align-top float-right">Vídeo</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>#informacoes-mobile">Vantagens <ion-icon name="ios-arrow-dropright" role="img" class="md hydrated nav-icons" aria-label="arrow dropright"></ion-icon></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>#informacoes-mobile">Como funciona? <ion-icon name="ios-arrow-dropright" role="img" class="md hydrated nav-icons" aria-label="arrow dropright"></ion-icon></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>#informacoes-mobile">Perguntas frequentes <ion-icon name="ios-arrow-dropright" role="img" class="md hydrated nav-icons" aria-label="arrow dropright"></ion-icon></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>#fale-conosco-mobile">Contato <ion-icon name="ios-arrow-dropright" role="img" class="md hydrated nav-icons" aria-label="arrow dropright"></ion-icon></a>
                </li>

            </ul>
        </div>
    </div>
</nav>
