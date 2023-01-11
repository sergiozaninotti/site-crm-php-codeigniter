<section id="login_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <form class="form-signin text-center" id="login_form" method="post">
                    <h1 class="h3 mb-3 font-weight-normal">E-mail</h1>
                    <input type="text" name="email" id="email" class="form-control" placeholder="E-mail" autofocus>
                    <label for="inputPassword" class="sr-only">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Senha">

                    <div class="form-check mb-3 mt-3 float-right">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">Lembrar senha
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>


                    <button class="btn btn-lg btn-danger btn-block" type="submit" id="btn_login">Entrar<div id="loader" class="lds-css ng-scope d-none"><div class="lds-rolling"><div></div></div></button>
                    <div id="error_block">
                        <span class="help-block"></span>
                    </div>

                </form>
                <!--<a href="<?= base_url('dashboard/register'); ?>" class="btn btn-lg btn-primary btn-block" id="btn_register">Cadastre-se</a>-->
            </div>
        </div>
    </div>
</section>