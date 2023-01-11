<nav class="navbar navbar-expand-lg position-fixed desk">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <div class="logo-image">
                <img id="" width="160px" src="<?= base_url('/assets/img/faciliteconsorcios.png'); ?>" class="img-fluid">
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

<div class="container-fluid bg-white" id="container_proposta">
    <div class="container">
        <h2 class="m-0">Dados Pessoais</h2>
        <hr>
    </div>

    <div class="container">
        <form method="post" id="form_proposal">
            <div class="col-md-6 d-inline-block align-top">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome Completo</label>
                    <input type="text" name="nome" value="<?= $nome ?>" class="form-control" placeholder="Insira seu nome completo">
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 pl-0">
                        <label for="">CPF</label>
                        <input type="text" name="cpf" class="form-control cpf" id="cpf" placeholder="Informe seu CPF">
                    </div>
                    <div class="form-group col-sm-6 pl-0">
                        <label for="">RG</label>
                        <input type="num" name="rg" class="form-control" id="" placeholder="Somente números">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-6 pl-0">
                        <label for="">Data de Nascimento</label>
                        <input type="text" name="nascimento" class="form-control date" id="" placeholder="Informe sua data de nascimento">
                    </div>
                    <div class="form-group col-sm-6 pl-0">
                        <label for="">Telefone</label>
                        <input type="text" name="telefone" class="form-control telefone" value="<?= $telefone; ?>" placeholder="Informe seu Telefone">
                    </div>
                </div>
                <div class="form-group pl-0">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" name="email" class="form-control" value="<?= $email; ?>" placeholder="Informe seu e-mail para contato">
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-3 pl-0">
                        <label for="">CEP</label>
                        <input type="text" name="cep" class="form-control" id="cep" placeholder="Digite seu CEP" size="8" maxlength="8">
                    </div>
                    <div class="form-group col-sm-6 pl-0">
                        <label for="">Endereço</label>
                        <input type="text" name="endereco" class="form-control" id="rua" placeholder="">
                    </div>
                    <div class="form-group col-sm-3 pl-0">
                        <label for="">Nº</label>
                        <input type="num" name="numero" class="form-control address_wait" id="numero" placeholder="Insira o número" disabled>
                    </div>
                    <small class="text-center">Digite o CEP e pressione TAB para preenchimento automático</small>
                </div>
                <div class="form-row pt-2">
                    <div class="form-group col-sm-6 pl-0">
                        <label for="">Bairro</label>
                        <input type="text" name="bairro" class="form-control address_wait" id="bairro" placeholder="" disabled>
                    </div>
                    <div class="form-group col-sm-4 pl-0">
                        <label for="">Cidade</label>
                        <input type="text" name="cidade" class="form-control address_wait" id="cidade" placeholder="" disabled>
                    </div>
                    <div class="form-group col-sm-2 pl-0">
                        <label for="">UF</label>
                        <input type="text" name="uf" class="form-control address_wait" id="uf" placeholder="" maxlength="2" disabled>
                    </div>
                </div>
                <button type="submit" id="submit_pre_venda" class="btn btn-block btn-lg bg-gradient-red">Continuar</button>
            </div>
            <div class="col-md-4 d-inline-block align-top float-right shadow p-2">
                <h4 class="plan_details">DETALHES DO PLANO</h4>
                <div class="col-sm-12 border-bottom">
                    <div class="col-sm-4 d-inline-block">
                        <h5 for="">Categoria:</label></h5>
                    </div>
                    <div class="col-sm-7 d-inline-block"><input type="text" name="categoria" class="form-control plan_info" id="" value="<?= $categoria; ?>" placeholder="" disabled></div>
                </div>
                <div class="col-sm-12 border-bottom">
                    <div class="col-sm-4 d-inline-block">
                        <h5 for="">Crédito:</label></h5>
                    </div>
                    <div class="col-sm-7 d-inline-block"><input type="text" name="credito" class="form-control plan_info" id="" value="R$<?= number_format($credito, 2, ".", ","); ?>" placeholder="" disabled></div>
                </div>
                <div class="col-sm-12 border-bottom">
                    <div class="col-sm-4 d-inline-block">
                        <h5 for="">Prazo:</label></h5>
                    </div>
                    <div class="col-sm-7 d-inline-block"><input type="text" name="prazo" class="form-control plan_info" id="" value="<?= $prazo; ?>meses" placeholder="" disabled></div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4 d-inline-block">
                        <h5 for="">Parcelas:</label></h5>
                    </div>
                    <div class="col-sm-7 d-inline-block"><input type="text" name="parcelas" class="form-control plan_info" id="" value="R$<?= $parcelas; ?>" placeholder="" disabled></div>
                </div>
            </div>
            <input type="text" class="g-recaptcha-response" name="g-recaptcha-response" hidden>
        </form>
    </div>
</div>

</div>

<div id="loader" class="loader d-none"><span class="col-lg-12"><i class="fas fa-spinner fa-spin text-white" style="font-size:40px;"></i></span></div>

<style>
    h5 {
        font-size: 1rem;
    }

    #container_proposta {
        padding-top: 8rem;
        padding-bottom: 2rem;
    }

    .plan_details {
        padding-left: 30px;
    }

    .border-bottom {
        border-bottom: 1px solid #cacaca;
    }

    .plan_info {
        font-size: 1rem;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--main-color);
        font-family: 'gotham-book';
        background: transparent !important;
        text-align: right;
    }

    .bmd-form-group .bmd-label-static {
        font-size: 1rem;
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

    @media (min-width: 576px) {
        .col-sm-6 {
            flex: 0 0 50%;
            max-width: 49%;
        }
    }
</style>