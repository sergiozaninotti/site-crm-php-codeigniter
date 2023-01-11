<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view($nav);
?>

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
                        <h4 class="card-title text-center">Banners</h4>
                        <button class="btn btn-primary btn-block" id="btn_banner" data-toggle="modal" data-target="#modal_change_banner">Alterar</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 d-inline-block">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">language</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">Vídeo/Imagem</h4>
                        <button class="btn btn-primary btn-block" id="btn_video" data-toggle="modal" data-target="#modal_change_video">Alterar</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 d-inline-block">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">language</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">Título e Whatsapp</h4>
                        <button class="btn btn-primary btn-block" id="" data-toggle="modal" data-target="#modal_change_title_simulador">Alterar</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 d-inline-block">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">language</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">Seção Destaques</h4>
                        <button class="btn btn-primary btn-block" id="" data-toggle="modal" data-target="#modal_featureds">Alterar</button>
                    </div>
                    <a href="<?= base_url('dashboard/destaques') ?>" class="text-center">Ver Destaques</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

//ALTERAR BANNERS - BANNER 01
$change_banner = '<form method="POST" id="form_change_banner" class="mb-0">
    <div class="modal-body">
        <div class="form-group">
            <label>Produto Principal</label>
            <input type="text" class="form-control banner_title" name="banner_title" placeholder="ex: Consórcio de Auto ou Automóveis" value="' . ((isset($banner_data[0])) ? $banner_data[0]['banner_title'] : $banner_data = null) . '">
            <small class="form-text text-muted">Descreva o produto principal do 1º banner</small>
        </div>
        <div class="form-group">
            <label>Valor inicial do produto</label>
            <input type="text" class="form-control moneyMask banner_product_price" name="banner_product_price" placeholder="R$ 379,00" value="' . ((isset($banner_data[0])) ? $banner_data[0]['banner_product_price'] : $banner_data = null) . '">
        </div>
        <div class="form-group">
            <label>Prazo máximo</label>
            <input type="number" class="form-control banner_product_time" name="banner_product_time" placeholder="ex: 80" value="' . ((isset($banner_data[0])) ? $banner_data[0]['banner_product_time'] : $banner_data = null) . '">
            <small class="form-text text-muted">Informe o prazo condizente com o valor</small>    
        </div>
        <div class="form-group">
        <label>Hashtag</label>
        <input type="text" class="form-control banner_hashtag" name="banner_hashtag" placeholder="#consórcioémaisbarato" value="' . ((isset($banner_data[0])) ? $banner_data[0]['banner_hashtag'] : $banner_data = null) . '">
        <small class="form-text text-muted">Caso não queira a hashtag, basta deixar em branco este campo</small>    
    </div>
        <div class="form-group form-file-upload form-file-multiple">
        <img src="' . ((isset($banner_data[0])) ? base_url() . $banner_data[0]['banner_img'] : $banner_data = null) . '" class="banner_img_path" id="banner_img_path" alt="" width="100%" height="250px">
            <input type="file" multiple="" id="btn_upload_banner_img" class="inputFileHidden" accept="image/*">
            <div class="input-group">
                <input type="text" class="form-control inputFileVisible" placeholder="Imagem .jpg ou .png até 500kb">
                <input id="banner_img" name="banner_img" value="' . ((isset($banner_data[0])) ? $banner_data[0]['banner_img'] : $banner_data = null) . '" hidden>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-fab btn-round btn-primary">
                        <i class="material-icons">attach_file</i>
                    </button>
                </span>
            </div>
            <small class="form-text text-muted">Tamanho ideal da imagem: 1920x1080px</small>
            <span class="help-block"></span>
        </div>
        <div class="col-12 form-group p-0"><label class="text-dark">Clique para alterar os próximos Banners</label></div>
        <div class="container p-0">
        <div class="col-3 d-inline-block p-0">
            <button type="button" class="btn btn-sm btn-warning" id="change_banner2" data-toggle="modal" data-target="#modal_change_banner2">2º Banner</button>
        </div>
        <div class="col-3 d-inline-block p-0">
            <button type="button" class="btn btn-sm btn-warning" id="change_banner3" data-toggle="modal" data-target="#modal_change_banner3">3º Banner</button>
        </div>
        <div class="col-3 d-inline-block p-0">
            <button type="button" class="btn btn-sm btn-warning" id="change_banner4" data-toggle="modal" data-target="#modal_change_banner4">4º Banner</button>
        </div>
        </div>
    </div>
    <div class="modal-footer pb-0">
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
    </div>
    <input type="text" name="banner_id" value="1" hidden/>
</form>';

modal("modal_change_banner", "Alterar 1º Banner", $change_banner);

//FIM

//ALTERAR BANNERS - BANNER 02
$change_banner2 = '<form method="POST" id="form_change_banner2" class="mb-0">
    <div class="modal-body">
        <div class="form-group">
            <label>Produto Principal</label>
            <input type="text" class="form-control banner_title" name="banner_title" placeholder="ex: Consórcio de Auto ou Automóveis" value="' . ((isset($banner_data[1])) ? $banner_data[1]['banner_title'] : $banner_data = null) . '">
            <small class="form-text text-muted">Descreva o produto principal do 1º banner</small>
        </div>
        <div class="form-group">
            <label>Valor inicial do produto</label>
            <input type="text" class="form-control moneyMask banner_product_price" name="banner_product_price" placeholder="R$ 379,00" value="' . ((isset($banner_data[1])) ? $banner_data[1]['banner_product_price'] : $banner_data = null) . '">
        </div>
        <div class="form-group">
            <label>Prazo máximo</label>
            <input type="number" class="form-control banner_product_time" name="banner_product_time" placeholder="ex: 80" value="' . ((isset($banner_data[1])) ? $banner_data[1]['banner_product_time'] : $banner_data = null) . '">
            <small class="form-text text-muted">Informe o prazo condizente com o valor</small>    
        </div>
        <div class="form-group form-file-upload form-file-multiple">
        <img src="' . ((isset($banner_data[1])) ? base_url() . $banner_data[1]['banner_img'] : $banner_data = null) . '" class="banner_img_path" id="banner_img_path2" alt="" width="100%" height="250px">
            <input type="file" multiple="" id="btn_upload_banner_img2" class="inputFileHidden" accept="image/*">
            <div class="input-group">
                <input type="text" class="form-control inputFileVisible" placeholder="Imagem .jpg ou .png até 500kb">
                <input id="banner_img2" name="banner_img" value="' . ((isset($banner_data[1])) ? $banner_data[1]['banner_img'] : $banner_data = null) . '" hidden>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-fab btn-round btn-primary">
                        <i class="material-icons">attach_file</i>
                    </button>
                </span>
            </div>
            <small class="form-text text-muted">Tamanho ideal da imagem: 1920x1080px</small>
            <span class="help-block"></span>
        </div>
    </div>
    
    <div class="modal-footer pb-0">
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
    </div>
    <input type="text" name="banner_id" value="2" hidden/>
</form>';

modal("modal_change_banner2", "Alterar 2º Banner", $change_banner2);

//FIM

//ALTERAR BANNERS - BANNER 03
$change_banner3 = '<form method="POST" id="form_change_banner3" class="mb-0">
    <div class="modal-body">
        <div class="form-group">
            <label>Produto Principal</label>
            <input type="text" class="form-control banner_title" name="banner_title" placeholder="ex: Consórcio de Auto ou Automóveis" value="' . ((isset($banner_data[2])) ? $banner_data[2]['banner_title'] : $banner_data = null) . '">
            <small class="form-text text-muted">Descreva o produto principal do 1º banner</small>
        </div>
        <div class="form-group">
            <label>Valor inicial do produto</label>
            <input type="text" class="form-control moneyMask banner_product_price" name="banner_product_price" placeholder="R$ 379,00" value="' . ((isset($banner_data[2])) ? $banner_data[2]['banner_product_price'] : $banner_data = null) . '">
        </div>
        <div class="form-group">
            <label>Prazo máximo</label>
            <input type="number" class="form-control banner_product_time" name="banner_product_time" placeholder="ex: 80" value="' . ((isset($banner_data[2])) ? $banner_data[2]['banner_product_time'] : $banner_data = null) . '">
            <small class="form-text text-muted">Informe o prazo condizente com o valor</small>    
        </div>
        <div class="form-group form-file-upload form-file-multiple">
        <img src="' . ((isset($banner_data[2])) ? base_url() . $banner_data[2]['banner_img'] : $banner_data = null) . '" class="banner_img_path" id="banner_img_path3" alt="" width="100%" height="250px">
            <input type="file" multiple="" id="btn_upload_banner_img3" class="inputFileHidden" accept="image/*">
            <div class="input-group">
                <input type="text" class="form-control inputFileVisible" placeholder="Imagem .jpg ou .png até 500kb">
                <input id="banner_img3" name="banner_img" value="' . ((isset($banner_data[2])) ? $banner_data[2]['banner_img'] : $banner_data = null) . '" hidden>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-fab btn-round btn-primary">
                        <i class="material-icons">attach_file</i>
                    </button>
                </span>
            </div>
            <small class="form-text text-muted">Tamanho ideal da imagem: 1920x1080px</small>
            <span class="help-block"></span>
        </div>
    </div>
    
    <div class="modal-footer pb-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
    </div>
    <input type="text" name="banner_id" value="3" hidden/>
</form>';

modal("modal_change_banner3", "Alterar 3º Banner", $change_banner3);

//FIM

//ALTERAR BANNERS - BANNER 04
$change_banner4 = '<form method="POST" id="form_change_banner4" class="mb-0">
    <div class="modal-body">
        <div class="form-group">
            <label>Produto Principal</label>
            <input type="text" class="form-control banner_title" name="banner_title" placeholder="ex: Consórcio de Auto ou Automóveis" value="' . ((isset($banner_data[3])) ? $banner_data[3]['banner_title'] : $banner_data = null) . '">
            <small class="form-text text-muted">Descreva o produto principal do 1º banner</small>
        </div>
        <div class="form-group">
            <label>Valor inicial do produto</label>
            <input type="text" class="form-control moneyMask banner_product_price" name="banner_product_price" placeholder="R$ 379,00" value="' . ((isset($banner_data[3])) ? $banner_data[3]['banner_product_price'] : $banner_data = null) . '">
        </div>
        <div class="form-group">
            <label>Prazo máximo</label>
            <input type="number" class="form-control banner_product_time" name="banner_product_time" placeholder="ex: 80" value="' . ((isset($banner_data[3])) ? $banner_data[3]['banner_product_time'] : $banner_data = null) . '">
            <small class="form-text text-muted">Informe o prazo condizente com o valor</small>    
        </div>
        <div class="form-group form-file-upload form-file-multiple">
        <img src="' . ((isset($banner_data[3])) ? base_url() . $banner_data[3]['banner_img'] : $banner_data = null) . '" class="banner_img_path" id="banner_img_path4" alt="" width="100%" height="250px">
            <input type="file" multiple="" id="btn_upload_banner_img4" class="inputFileHidden" accept="image/*">
            <div class="input-group">
                <input type="text" class="form-control inputFileVisible" placeholder="Imagem .jpg ou .png até 500kb">
                <input id="banner_img4" name="banner_img" value="' . ((isset($banner_data[3])) ? $banner_data[3]['banner_img'] : $banner_data = null) . '" hidden>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-fab btn-round btn-primary">
                        <i class="material-icons">attach_file</i>
                    </button>
                </span>
            </div>
            <small class="form-text text-muted">Tamanho ideal da imagem: 1920x1080px</small>
            <span class="help-block"></span>
        </div>
    </div>
    
    <div class="modal-footer pb-0">
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
    </div>
    <input type="hidden" name="banner_id" value="4"/>
</form>';

modal("modal_change_banner4", "Alterar 4º Banner", $change_banner4);

//FIM

//ALTERAR SEÇÃO SIMULADOR
$change_video = '<form method="POST" id="form_change_video" class="mb-0">
    <div class="modal-body">
        <div class="form-group">
            <label>Titulo do Vídeo</label>
            <input type="text" class="form-control video_title" name="video_title" placeholder="ex: Assista o vídeo e saiba o que é um consórcio" value="' . ((isset($simulador_data)) ? $simulador_data->video_title : null) . '">
            <small class="form-text text-muted">Título acima do vídeo</small>
        </div>
        <div class="form-group">
            <label>Url Vídeo</label>
            <input type="text" class="form-control video_url" name="video_url" placeholder="ex: https://www.youtube.com/embed/pqESvP4qycA" value="' . ((isset($simulador_data)) ? $simulador_data->video_url : null) . '">
        </div>
        <div class="form-group form-file-upload form-file-multiple">
        <img src="' . ((isset($simulador_data)) ? base_url() . $simulador_data->video_img : null) . '" class="video_img_path" id="video_img_path" alt="" width="100%" height="250px">
            <input type="file" multiple="" id="btn_upload_video_img" class="inputFileHidden" accept="image/*">
            <div class="input-group">
                <input type="text" class="form-control inputFileVisible" placeholder="Imagem .jpg ou .png até 500kb">
                <input type="hidden" id="video_img" name="video_img" value="' . ((isset($simulador_data)) ? $simulador_data->video_img : null) . '">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-fab btn-round btn-primary">
                        <i class="material-icons">attach_file</i>
                    </button>
                </span>
            </div>
            <small class="form-text text-muted">Imagem para chamar atenção do cliente(opcional)</small>
            <span class="help-block"></span>
        </div>
        <div class="form-check pt-2">
                <label class="form-check-label">
                    <input class="form-check-input show_img_simulador" type="checkbox" name="status" value="' . ((isset($simulador_data)) ? $simulador_data->status : null) . '">
                    Mostrar Imagem
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div> 
    </div>
    
    <div class="modal-footer pb-0">
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
    </div>
</form>';

modal("modal_change_video", "Alterar informações de Vídeo", $change_video);

//FIM

//ALTERAR SEÇÃO SIMULADOR - TÍTULO SIMULE E WHATS
$change_titulo_simulador = '<form method="POST" id="form_change_titulo_simulador" class="mb-0">
    <div class="modal-body">
        <div class="form-group">
            <label>Titulo do Simulador</label>
            <input type="text" class="form-control simulador_title" name="simulador_title" placeholder="ex: Simule sem compromisso" value="' . ((isset($simulador_data)) ? $simulador_data->simulate_title : null) . '">
            <small class="form-text text-muted">Título acima do simulador</small>
        </div>
        <div class="form-group">
            <label>Whatsapp</label>
            <input type="text" class="form-control whatsapp" name="whatsapp_number" placeholder="ex: 47996392333" value="' . ((isset($simulador_data)) ? whatsappReplace55($simulador_data->whatsapp)  : null) . '">
                <small class="form-text text-muted">Whatsapp para contato de clientes</small>
        </div>
    <div class="modal-footer pb-0">
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
    </div>
    </div>
</form>';

modal("modal_change_title_simulador", "Título e Whatsapp do Simulador", $change_titulo_simulador);

//FIM



?>