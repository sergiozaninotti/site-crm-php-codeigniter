<?php
defined('BASEPATH') or exit('No direct script access allowed');

function simulador($credito, $taxa, $fr, $prazos = array(), $nome, $telefone, $email, $categoria)
{

    $taxa_total = $taxa + $fr;

    $credito_com_taxa = $credito * $taxa_total / 100 + ($credito);

    foreach ($prazos as $prazo) {

        $parcelas = number_format($credito_com_taxa / $prazo, 2, ",", ".");

        echo '
            
            <div class="card">
                <div class="card-header"><h5 class="m-0 prazo">' . $prazo . ' meses</h5></div>
                <div class="card-body">

                    <span class="badge badge-info">parcelas de:</span>
                    <h4 class="m-0 text-color text-center">R$' . $parcelas . '</h4>
                    <div class="cta-quero-este p-2 my-auto">
                        <input type="text" class="nome_simulacao" name="nome" value="' . $nome . '" hidden/>
                        <input type="text" class="telefone_simulacao" name="telefone" value="' . $telefone . '" hidden/>
                        <input type="text" class="email_simulacao" name="email" value="' . $email . '" hidden/>
                        <input type="text" class="categoria_simulacao" name="categoria" value="' . $categoria . '" hidden/>
                        <input type="text" class="credito_simulacao" name="credito" value="' . $credito . '" hidden/>
                        <input type="text" class="prazo_simulacao" name="prazo" value="' . $prazo . '" hidden/>
                        <input type="text" class="parcelas" name="parcelas" value="' . $parcelas . '" hidden/>
                        <button type="button" class="btn btn-sm bg-gradient-red gotham-bold quero_comprar">Quero este</button>
                    </div>
                </div>
            </div>
        ';
    }
}

function modal($id_modal, $title, $body)
{
    echo '
    <div class="modal ps-child fade" id="' . $id_modal . '" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">' . $title . '</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ' . $body . '
            <span class="help-block mx-auto col-sm-4 pb-4"></span>
        </div>
    </div>
</div>';
}

function checkDateFormat($date)
{
    $pattern = "/^[0-9]{2}+\/[0-9]{2}+\/[0-9]{4}$/";

    if (preg_match($pattern, $date)) :
        return true;
    else :
        return false;
    endif;
}

function whatsappReplace($number){
    $formated = preg_replace('/\(|\)| |\-/','',$number);
    return '55'.$formated;
}

function whatsappReplace55($number){
    $formated = preg_replace('/55/','',$number);
    return $formated;
}

