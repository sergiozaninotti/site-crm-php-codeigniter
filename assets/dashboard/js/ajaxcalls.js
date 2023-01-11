$(function() {

    $("#login_form").find("#email").focus();

    $("#login_form").validate({
        rules: {
            email: {
                required: true,
                nowhitespace: true,
                email: true
            },
            password: {
                required: true,
                nowhitespace: true,
                minlength: 8,
            }
        },
        messages: {
            email: {
                required: "Por favor, digite corretamente seu email!",
                nowhitespace: "Espaços em branco não são permitidos!",
                email: "E-mail inválido!"
            },
            password: {
                required: "Por favor, digite sua senha corretamente",
                nowhitespace: "Espaços em branco não são permitidos!",
                minlength: "A senha deve conter pelo menos 8 dígitos!"
            }
        },

        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "login",
                dataType: "json",
                data: $("#login_form").serialize(),
                beforeSend: function() {
                    $("#loader").removeClass("d-none");
                    $("#btn_login").text("");
                    $("#btn_login").html(loader("Acessando... "));
                },
                success: function(data) {
                    if (data['status'] == 1) {
                        window.location.href = data['url'] + "dashboard";
                    } else {
                        swal('Oops!', data['error_list'], 'error');
                        $("#btn_login").html("Entrar");
                    }
                }
            });
            return false;
        }

    });
})

$.validator.addMethod('filesize', function(value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'Tamanho máximo do arquivo é de: 500kb! {0}');

$(function() {
    //ALTERA O NOME DO SITE
    $("#seo_config").validate({
        rules: {
            site_title: {
                required: true,
                minlength: 20,
                maxlength: 45
            },
            seo_site_title: {
                required: true,
                minlength: 20,
                maxlength: 60
            },
            site_description: {
                required: true,
                minlength: 75,
                maxlength: 155
            },
            nav_color: {
                required: true
            },
            seo_img: {
                required: true,
                filesize: 500,
                extension: 'jpg,jpeg,png'
            }
        },
        messages: {
            site_title: {
                required: "Por favor, insira o título do site!",
                minlength: "O título deverá conter pelo menos 20 caracteres!",
                maxlength: "O título deverá conter no máximo 45 caracteres!"
            },
            seo_site_title: {
                required: "Por favor, insira o título do site para seo google!",
                minlength: 'O título deverá conter pelo menos 20 caracteres!',
                maxlength: 'O título deverá conter no máximo 60 caracteres!'
            },
            site_description: {
                required: 'Por favor, insira a descrição do site!',
                minlength: 'A descrição deverá conter pelo menos 75 caracteres!',
                maxlength: 'A descrição deverá conter no máximo 155 caracteres!'
            },
            nav_color: {
                required: 'Por favor, selecione uma cor!'
            },
            seo_img: {
                required: 'Por favor, insira uma imagem!',
                filesize: 'Tamanho máximo do arquivo é de 500kb',
                extension: 'São permitidos apenas arquivos jpg,jpeg,png'
            }
        },

        submitHandler: function(form) {
            $.ajax({
                url: BASE_URL + "cms/seo_config",
                type: "POST",
                dataType: "json",
                data: $("#seo_config").serialize(),
                beforeSend: function() {
                    $(".modal-footer").hide();
                    $(".help-block").html(loader("Alterando..."));
                },
                success: function(data) {
                    if (data['status'] == 1) {
                        swal("Sucesso", "Título do site alterado com sucesso!", "success");
                        $("#modal_seo_config").modal("hide");
                        $(".modal-footer").show();
                        cleanModal();

                    } else {
                        swal("Erro", "Ocorreu um erro ao alterar o título, por favor, tente novamente!", "error");
                        $(".modal-footer").show();
                        $(".help-block").empty();
                    }
                },
                error: function(data) {
                    swal("Erro", "Ocorreu um erro inesperado, por favor, tente novamente!", "error");
                    $(".modal-footer").show();
                    $(".help-block").empty();
                }

            });
            return false;
        }
    });

});

//Chama a função get e mostra o título do site na view
getData("#btn_seo_config", "cms/get_data_seo", ".seo_img_path", "seo_img");

/*********************ALTERA BANNERS ****************/

$(function() {
    //ALTERA O NOME DO SITE
    $("#form_change_banner").validate({
        rules: {
            banner_title: {
                required: true,
                minlength: 10,
                maxlength: 25
            },
            banner_product_price: {
                required: true,
            },
            banner_product_time: {
                required: true,
            },
            banner_img: {
                required: true,
                extension: "jpg,jpeg,png",
                filesize: 500,
            },
            banner_hashtag: {
                maxlength: 30
            }
        },
        messages: {
            banner_title: {
                required: "Por favor, insira nome do produto!",
                minlength: "O nome deverá conter pelo menos 10 caracteres!",
                maxlength: "O nome deverá conter no máximo 25 caracteres!"
            },
            banner_product_price: {
                required: "Por favor, insira o valor do produto!",
            },
            banner_product_time: {
                required: "Por favor, insira o prazo do produto!",
            },
            banner_img: {
                required: "Por favor, insira a imagem do banner!",
                extension: "Apenas arquivos .jpg, .jpeg e .png são aceitos!",
                filesize: "Tamanho máximo do arquivo é de 500kb!"
            },
            banner_hashtag: {
                maxlength: "A hashtag deverá conter no máximo 30 caracteres!"
            }
        },

        submitHandler: function(form) {
            $.ajax({
                url: BASE_URL + "cms/changeBanner",
                type: "POST",
                cache: false,
                dataType: "json",
                data: $("#form_change_banner").serialize(),
                beforeSend: function() {
                    $(".modal-footer").hide();
                    $(".help-block").html(loader("Alterando..."));
                },
                success: function(data) {
                    if (data['status'] == 1) {
                        swal("Sucesso", "Banner do site alterado com sucesso!", "success");
                        $(".modal-footer").show();
                        $(".help-block").empty();
                        $("#modal_change_banner").modal('hide');

                    } else {
                        $("#banner_img_path").attr("src", "");
                        swal("Erro", "Ocorreu um erro ao alterar o banner do site, por favor, tente novamente!", "error");
                        $(".modal-footer").show();
                        $(".help-block").empty();
                    }
                },
                error: function(response) {
                    console.log(response.responseText);
                    $("#banner_img_path").attr("src", "");
                    swal("Erro", "Ocorreu um erro inesperado, por favor, tente novamente!", "error");
                    $(".modal-footer").show();
                    $(".help-block").empty();
                }

            });
            return false;
        }
    });

});

//Chama a função get e mostra as informações de planos do banner na view, puxa a função do utils.js
/* getData("#btn_banner", "cms/getBanner"); */



$("#change_banner2").click(function() {

    $("#modal_change_banner").modal('hide');

    $("#modal_change_banner").on("hidden.bs.modal", function() {
        $("#form_change_banner2")[0].reset();
    });

    $(function() {
        //ALTERA O NOME DO SITE
        $("#form_change_banner2").validate({
            rules: {
                banner_title: {
                    required: true,
                    minlength: 10,
                    maxlength: 25
                },
                banner_product_price: {
                    required: true,
                },
                banner_product_time: {
                    required: true,
                },
                banner_img: {
                    required: true,
                    extension: "jpg,jpeg,png"
                }
            },
            messages: {
                banner_title: {
                    required: "Por favor, insira nome do produto!",
                    minlength: "O nome deverá conter pelo menos 10 caracteres!",
                    maxlength: "O nome deverá conter no máximo 25 caracteres!"
                },
                banner_product_price: {
                    required: "Por favor, insira o valor do produto!",
                },
                banner_product_time: {
                    required: "Por favor, insira o prazo do produto!",
                },
                banner_img: {
                    required: "Por favor, insira a imagem do banner!",
                    extension: "Apenas arquivos .jpg, .jpeg e .png são aceitos!"
                }
            },

            submitHandler: function(form) {
                $.ajax({
                    url: BASE_URL + "cms/changeBanner",
                    type: "POST",
                    dataType: "json",
                    data: $("#form_change_banner2").serialize(),
                    beforeSend: function() {
                        $(".modal-footer").hide();
                        $(".help-block").html(loader("Alterando..."));
                    },
                    success: function(data) {
                        if (data['status'] == 1) {
                            swal("Sucesso", "Banner do site alterado com sucesso!", "success");
                            $(".modal-footer").show();
                            $(".help-block").empty();
                            $("#modal_change_banner2").modal('hide');
                        } else {
                            swal("Erro", "Ocorreu um erro ao alterar o banner do site, por favor, tente novamente!", "error");
                            $(".modal-footer").show();
                            $(".help-block").empty();
                        }
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        swal("Erro", "Ocorreu um erro inesperado, por favor, tente novamente!", "error");
                        $(".modal-footer").show();
                        $(".help-block").empty();
                    }

                });
                return false;
            }
        });

    });

});


$("#change_banner3").click(function() {

    $("#modal_change_banner").modal('hide');
    $("#modal_change_banner2").modal('hide');


    $("#modal_change_banner3").on("hidden.bs.modal", function() {
        $("#form_change_banner3")[0].reset();
    });

    $(function() {
        //ALTERA O NOME DO SITE
        $("#form_change_banner3").validate({
            rules: {
                banner_title: {
                    required: true,
                    minlength: 10,
                    maxlength: 25
                },
                banner_product_price: {
                    required: true,
                },
                banner_product_time: {
                    required: true,
                },
                banner_img: {
                    required: true,
                    extension: "jpg|jpeg|png"
                }
            },
            messages: {
                banner_title: {
                    required: "Por favor, insira nome do produto!",
                    minlength: "O nome deverá conter pelo menos 10 caracteres!",
                    maxlength: "O nome deverá conter no máximo 25 caracteres!"
                },
                banner_product_price: {
                    required: "Por favor, insira o valor do produto!",
                },
                banner_product_time: {
                    required: "Por favor, insira o prazo do produto!",
                },
                banner_img: {
                    required: "Por favor, insira a imagem do banner!",
                    extension: "Apenas arquivos .jpg, .jpeg e .png são aceitos!"
                }
            },

            submitHandler: function(form) {
                $.ajax({
                    url: BASE_URL + "cms/changeBanner",
                    type: "POST",
                    dataType: "json",
                    data: $("#form_change_banner3").serialize(),
                    beforeSend: function() {
                        $(".modal-footer").hide();
                        $(".help-block").html(loader("Alterando..."));
                    },
                    success: function(data) {
                        if (data['status'] == 1) {
                            swal("Sucesso", "Banner do site alterado com sucesso!", "success");
                            $(".modal-footer").show();
                            $(".help-block").empty();
                            $("#modal_change_banner3").modal('hide');



                        } else {
                            swal("Erro", "Ocorreu um erro ao alterar o banner do site, por favor, tente novamente!", "error");
                            $(".modal-footer").show();
                            $(".help-block").empty();
                        }
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        /*  swal("Erro", "Ocorreu um erro inesperado, por favor, tente novamente!", "error");
                         $(".modal-footer").show();
                         $(".help-block").empty(); */
                    }

                });
                return false;
            }
        });

    });

});

$("#change_banner4").click(function() {
    $("#modal_change_banner").modal('hide');
    $("#modal_change_banner2").modal('hide');
    $("#modal_change_banner3").modal('hide');


    $("#modal_change_banner3").on("hidden.bs.modal", function() {
        $("#form_change_banner3")[0].reset();
    });

    $(function() {
        //ALTERA O NOME DO SITE
        $("#form_change_banner4").validate({
            rules: {
                banner_title: {
                    required: true,
                    minlength: 10,
                    maxlength: 25
                },
                banner_product_price: {
                    required: true,
                },
                banner_product_time: {
                    required: true,
                },
                banner_img: {
                    required: true,
                    extension: "jpg,jpeg,png",
                    filesize: 500,
                }
            },
            messages: {
                banner_title: {
                    required: "Por favor, insira nome do produto!",
                    minlength: "O nome deverá conter pelo menos 10 caracteres!",
                    maxlength: "O nome deverá conter no máximo 25 caracteres!"
                },
                banner_product_price: {
                    required: "Por favor, insira o valor do produto!",
                },
                banner_product_time: {
                    required: "Por favor, insira o prazo do produto!",
                },
                banner_img: {
                    required: "Por favor, insira a imagem do banner!",
                    extension: "Apenas arquivos .jpg, .jpeg e .png são aceitos!",
                    filesize: "Tamanho máximo do arquivo: 500kb!"
                }
            },

            submitHandler: function(form) {
                $.ajax({
                    url: BASE_URL + "cms/changeBanner",
                    type: "POST",
                    dataType: "json",
                    data: $("#form_change_banner4").serialize(),
                    beforeSend: function() {
                        $(".modal-footer").hide();
                        $(".help-block").html(loader("Alterando..."));
                    },
                    success: function(data) {
                        if (data['status'] == 1) {
                            swal("Sucesso", "Banner do site alterado com sucesso!", "success");
                            $(".modal-footer").show();
                            $(".help-block").empty();
                            $("#modal_change_banner4").modal('hide');
                        } else {
                            swal("Erro", "Ocorreu um erro ao alterar o banner do site, por favor, tente novamente!", "error");
                            $(".modal-footer").show();
                            $(".help-block").empty();
                        }
                    },
                    error: function(response) {
                        swal("Erro", "Ocorreu um erro inesperado, por favor, tente novamente!", "error");
                        $(".modal-footer").show();
                        $(".help-block").empty();
                    }

                });
                return false;
            }
        });

    });

});


$(function() {
    //ALTERA O NOME DO SITE
    $("#form_change_video").validate({
        rules: {
            video_title: {
                required: true,
                minlength: 10,
                maxlength: 45
            },
            url_video: {
                required: true,
                url: true
            },
            any_img: {
                required: true,
            },
        },
        messages: {
            video_title: {
                required: "Por favor, insira o título do vídeo!",
                minlength: "O título deverá conter pelo menos 10 caracteres!",
                maxlength: "O título deverá conter no máximo 45 caracteres!"
            },
            url_video: {
                required: "Por favor, insira a url do vídeo!",
                url: 'Esta url não é válida!',
            },
            any_img: {
                required: 'Por favor, insira a imagem desejada!',
            },
        },

        submitHandler: function(form) {
            $.ajax({
                url: BASE_URL + "cms/video_config",
                type: "POST",
                dataType: "json",
                data: $("#form_change_video").serialize(),
                beforeSend: function() {
                    $(".modal-footer").hide();
                    //$(".help-block").html(loader("Alterando..."));
                },
                success: function(data) {
                    if (data['status'] == 1) {
                        swal("Sucesso", "Informações do vídeo alteradas com sucesso!", "success");
                        $("#modal_change_video").modal("hide");
                        $(".modal-footer").show();
                        cleanModal();

                    } else {
                        swal("Erro", "Ocorreu um erro ao alterar as informações do vídeo!", "error");
                        $(".modal-footer").show();
                        $(".help-block").empty();
                    }
                },
                error: function(response) {
                    console.log(response.responseText);
                    //swal("Erro", "Ocorreu um erro inesperado, por favor, tente novamente!", "error");
                    $(".modal-footer").show();
                    $(".help-block").empty();
                }

            });
            return false;
        }
    });

});

$(function() {
    //ALTERA O NOME DO SITE
    $("#form_change_titulo_simulador").validate({
        rules: {
            simulador_title: {
                required: true,
                minlength: 15,
                maxlength: 25
            },
            whatsapp_number: {
                required: true,
                minlength: 15
            }
        },
        messages: {
            simulador_title: {
                required: "Por favor, insira o título do simulador!",
                minlength: "O título deverá conter pelo menos 15 caracteres!",
                maxlength: "O título deverá conter no máximo 25 caracteres!"
            },
            whatsapp_number: {
                required: "Por favor, insira o número do whatsapp!",
                minlength: 'Por favor, insira o número corretamente!',
            }
        },

        submitHandler: function(form) {
            $.ajax({
                url: BASE_URL + "cms/simulador_title",
                type: "POST",
                dataType: "json",
                data: $(form).serialize(),
                beforeSend: function() {
                    $(".modal-footer").hide();
                    $(".help-block").html(loader("Alterando..."));
                },
                success: function(data) {
                    if (data['status'] == 1) {
                        swal("Sucesso", "As informações foram alteradas com sucesso!", "success");
                        $("#modal_change_title_simulador").modal("hide");
                        $(".modal-footer").show();
                        cleanModal();

                    } else {
                        swal("Erro", "Ocorreu um erro ao alterar as informações!", "error");
                        $(".modal-footer").show();
                        $(".help-block").empty();
                    }
                },
                error: function(response) {
                    //console.log(response.responseText);
                    swal("Erro", "Ocorreu um erro inesperado, por favor, tente novamente!", "error");
                    $(".modal-footer").show();
                    $(".help-block").empty();
                }

            });
            return false;
        }
    });

});

$(function() {
    //ALTERA O NOME DO SITE

    $(".form_featureds").each(function() {
        $(this).validate({
            rules: {
                product_name: {
                    required: true,
                    minlength: 10,
                    maxlength: 20
                },
                product_price: {
                    required: true,
                },
                product_parcel: {
                    required: true,
                },
                product_img: {
                    required: true,
                }
            },
            messages: {
                product_name: {
                    required: "Por favor, insira o título do produto!",
                    minlength: "O título deverá conter pelo menos 10 caracteres!",
                    maxlength: "O título deverá conter no máximo 20 caracteres!"
                },
                product_price: {
                    required: "Por favor, insira o crédito do produto!",
                },
                product_parcel: {
                    required: "Por favor, insira a parcela do produto!",
                },
                product_img: {
                    required: "Por favor, insira a imagem do produto!",
                }
            },

            submitHandler: function(form) {
                $.ajax({
                    url: BASE_URL + "cms/featureds",
                    type: "POST",
                    dataType: "json",
                    data: $(form).serialize(),
                    beforeSend: function() {
                        $('.submit_featureds').html(loader("Alterando..."));
                    },
                    success: function(data) {
                        if (data['status'] == 1) {
                            swal("Sucesso", "As informações foram alteradas com sucesso!", "success");
                            $('.submit_featureds').empty();
                            $('.submit_featureds').html('Alterar');
                        } else {
                            swal("Erro", data['msg'], "error");
                            $(".help-block").empty();
                        }
                    },
                    error: function(response) {
                        swal("Erro", "Ocorreu um erro inesperado, por favor, tente novamente!", "error");
                        $(".help-block").empty();
                    }

                });
                return false;
            }
        });
    })



});