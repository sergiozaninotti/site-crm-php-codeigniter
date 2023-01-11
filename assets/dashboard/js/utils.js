const BASE_URL = "http://localhost/mdv/";

function loader(message = "") {
    return message + '<i class="fas fa-spinner fa-spin float-right" style="font-size:20px;"></i>';
}

function cleanModal() {
    $(".help-block").empty();
    $('#modal').modal('hide')
    $("#modal").find("form")[0].reset();
}

$(".moneyMask").maskMoney({
    prefix: "R$",
    decimal: ",",
    thousands: "."
});

$(function() {
    var url = window.location.href;

    if (url.indexOf("customizar") > 0) {
        $("li").removeClass("active");
        $("#customizar-link").addClass("active");
    }
    if (url.indexOf("configuracoes") > 0) {
        $("li").removeClass("active");
        $("#configuracoes-link").addClass("active");
    }
})

/* UPLOAD DE IMAGEM PARA BANNERS */

$("#btn_upload_banner_img").change(function() {

    uploadImg($(this), $("#banner_img_path"), $("#banner_img")); // a função criada no utils para mostrar a imagem, vai receber
    // o 1P que é o msm botão qnd mudar o estado, 2P, recebe o caminho da imagem ou seja a tag img, e 3P pega o input da img

});

$("#btn_upload_banner_img2").change(function() {

    uploadImg($(this), $("#banner_img_path2"), $("#banner_img2")); // a função criada no utils para mostrar a imagem, vai receber
    // o 1P que é o msm botão qnd mudar o estado, 2P, recebe o caminho da imagem ou seja a tag img, e 3P pega o input da img

});

$("#btn_upload_banner_img3").change(function() {

    uploadImg($(this), $("#banner_img_path3"), $("#banner_img3")); // a função criada no utils para mostrar a imagem, vai receber
    // o 1P que é o msm botão qnd mudar o estado, 2P, recebe o caminho da imagem ou seja a tag img, e 3P pega o input da img

});

$("#btn_upload_banner_img4").change(function() {

    uploadImg($(this), $("#banner_img_path4"), $("#banner_img4")); // a função criada no utils para mostrar a imagem, vai receber
    // o 1P que é o msm botão qnd mudar o estado, 2P, recebe o caminho da imagem ou seja a tag img, e 3P pega o input da img

});

/* FIM */


/* UPLOAD DE IMAGEM PARA SEO */

$("#btn_upload_seo_img").change(function() {

    uploadImg($(this), $("#seo_img_path"), $("#seo_img")); // a função criada no utils para mostrar a imagem, vai receber
    // o 1P que é o msm botão qnd mudar o estado, 2P, recebe o caminho da imagem ou seja a tag img, e 3P pega o input da img

});

/* FIM */

/* UPLOAD DE IMAGEM NA SEÇÃO SIMULADOR */

$("#btn_upload_video_img").change(function() {

    uploadImg($(this), $("#video_img_path"), $("#video_img")); // a função criada no utils para mostrar a imagem, vai receber
    // o 1P que é o msm botão qnd mudar o estado, 2P, recebe o caminho da imagem ou seja a tag img, e 3P pega o input da img

});

/* FIM */

/* UPLOAD DE IMAGEM NA SEÇÃO DESTAQUES */

$(".btn_upload_product_img").change(function() {

    form = $(this).closest('form');

    btn = form.find(".btn_upload_product_img");
    img_src = form.find(".product_img_path");
    img_val = form.find(".product_img");

    uploadImg($(btn), $(img_src), $(img_val)); // a função criada no utils para mostrar a imagem, vai receber
    // o 1P que é o msm botão qnd mudar o estado, 2P, recebe o caminho da imagem ou seja a tag img, e 3P pega o input da img

});

/* FIM */

function uploadImg(btn, img, input_path) {

    src_before = img.attr("src"); // pega o caminho da imagem do upload e armazena na variavel, pois se der algum erro ja tem o caminho armazenado
    img_file = btn[0].files[0]; // pega os arquivos que vem do input file no parametro e 1P variavel recebida de parametro, 2P comando para pegar os arquivos na posição[0]
    form_data = new FormData(); // função que cria um novo formulario
    form_data.append("image_file", img_file); // pega o formulario e adiciona o campo que vem do controller Dashboard linha 102, que faz o upload via php da imagem

    $.ajax({
        url: BASE_URL + "cms/upload_image", // pega a url + o controller com a função de upload
        dataType: "json", // define o tipo de dado a ser recebido 
        cache: false, // não salva em cache a imagem
        contentType: false,
        processData: false,
        data: form_data,
        type: "POST", // recebe este formulario acima que é só para enviar a imagem via post
        beforeSend: function() {

        },
        success: function(response) {

            if (response["status"]) { // se a resposta deste formulário for true, ele armazena no array status a resposta
                img.attr("src", response["img_path"]); // pega o src da img, e a resposta do caminho da imagem
                input_path.val(response["img_path"]); // pega o parametro input_path que vem da view, pega o caminho
                // e salva la na view de professores ou usuarios
            } else {

                img.attr("src", src_before); // se der erro, ele pega o src da img anterior
                //console.log(response.responseText); // e mostra a msg de error pelo array['error] mostrado no controller
                //sempre colocar o sibling para pegar input que esteja na mesma div, ou parent para subir uma div

            }
        },
        error: function() {
            img.attr("src", src_before); // se der qualquer error generico, ele carrega a primeira imagem feita o upload
        }
    })

}

// Função que faz um get no db e coloca os dados no value do input na view utilizada no arquivo ajaxcalls
function getData(btn, url, img_class, img_path) {

    $(btn).click(function() {

        $.ajax({
            type: "POST",
            url: BASE_URL + url,
            dataType: "json",
            success: function(data) {
                $.each(data['input'], function(id, value) {
                    $("." + id).val(value);
                });
                $(img_class).attr("src", data['img'][img_path]);
            }
        });

    })
}