<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view($nav);
?>

<div class="container" id="destaques">
    <div>
        <button type="button" id="btn_add_featured" class="" data-toggle="modal" data-target="#modal_featureds" ><i class="fas fa-plus"></i></button>
    </div>
    <div class="row">
        <?php foreach ($destaques_data as $destaque) : ?>

            <div class="col-sm-4 d-inline-block">
                <form method="POST" class="form_featureds mb-0">
                    <div class="card mb-3">
                        <img src="<?= ((isset($destaques_data)) ? base_url() . $destaque['product_img'] : null); ?>" class="card-img-top product_img_path" height="175px">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do produto</label>
                                <input type="text" class="form-control" name="product_name" value="<?= $destaque['product_name'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valor do crédito</label>
                                <input type="text" class="form-control moneyMask" name="product_price" value="<?= $destaque['product_price'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valor da parcela</label>
                                <input type="text" class="form-control moneyMask" name="product_parcel" value="<?= $destaque['product_parcel'] ?>" placeholder="">
                            </div>
                            <div class="form-group form-file-upload form-file-multiple">
                                <input type="file" multiple="" class="inputFileHidden btn_upload_product_img" accept="image/*">
                                <div class="input-group p-0">
                                    <input type="text" class="form-control inputFileVisible" placeholder="Imagem .jpg ou .png até 200kb">
                                    <input type="hidden" class="product_img" name="product_img" value="<?= ((isset($destaques_data)) ? base_url().$destaque['product_img'] : null) ?>" >
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-fab btn-round btn-primary">
                                            <i class="material-icons">attach_file</i>
                                        </button>
                                    </span>
                                </div>
                                <small class="form-text text-muted">Tamanho ideal da imagem: 600x600px</small>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <input type="hidden" name="product_id" value="<?= $destaque['id'] ?>">
                        <button type="submit" class="btn btn-primary submit_featureds">Alterar</button>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
//SEÇÃO DESTAQUES
$featureds = '<form method="POST" id="form_change_featureds" class="mb-0">
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

modal("modal_featureds", "Seção Destaques", $featureds);
//FIM
?>



<style>
    #destaques {
        padding: 5rem;
    }
</style>