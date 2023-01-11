<?php $this->load->view($nav); ?>

<div class="content" id="overview">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 d-inline-block">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">language</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">Seo do Site</h4>
                        <button class="btn btn-primary btn-block" id="btn_seo_config" data-toggle="modal" data-target="#modal_seo_config">Configurar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//ALTERAR SEO DO SITE -- NÃO TROCAR AS CLASSES, POIS ESTÃO SÃO UTILIZADAS PELO CONTROLLER E UTILS.JS
$seo_config = '<form method="POST" id="seo_config" class="mb-0">
    <div class="modal-body">
        <div class="form-group">
            <label>Título do Site</label>
            <input type="text" class="form-control site_title" name="site_title" placeholder="ex: Consórcio é mais barato | FaciliteConsórcios" value="">
            <small class="form-text text-muted">O título do site aparece na aba do navegador</small>
        </div>
        <div class="form-group">
            <label>Título SEO</label>
            <input type="text" class="form-control seo_site_title" name="seo_site_title" placeholder="Título que aparece no google" value="" maxlength="60">
            <small class="form-text text-muted">Até 60 caracteres</small>
        </div>
        <div class="form-group">
            <label>Descrição do Site</label>
            <input type="text" class="form-control site_description" name="site_description" placeholder="Descrição que aparece no google" value="" maxlength="155">
            <small class="form-text text-muted">Até 155 caracteres</small>
        </div>
        <div class="form-group pt-2 pb-2">
            <label>Cor Navegação</label>
            <input type="text" class="form-control nav_color jscolor" id="nav_color" name="nav_color" placeholder="" value="" maxlength="7">
            <small class="form-text text-muted">Cor da barra de navegação mobile</small>
        </div>
        <div class="form-group form-file-upload form-file-multiple">
        <img src="" class="seo_img_path" id="seo_img_path" alt="" width="100%" height="250px">
            <input type="file" multiple="" id="btn_upload_seo_img" class="inputFileHidden" accept="image/*">
            <div class="input-group">
                <input type="text" class="form-control inputFileVisible" placeholder="Imagem .jpg ou .png até 500kb">
                <input id="seo_img" name="seo_img" value="" hidden>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-fab btn-round btn-primary">
                        <i class="material-icons">attach_file</i>
                    </button>
                </span>
            </div>
            <small class="form-text text-muted">Tamanho ideal da imagem: 1200x600px</small>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="modal-footer pb-0">
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
    </div>
</form>';

modal("modal_seo_config", "Configurar SEO", $seo_config);

?>