const BASE_URL = 'https://mdv.stechz.com.br';

if (window.screen.width > 768) {
    $(".mobile").hide();

    setTimeout(function() {

        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 1500,
            fade: true,
            cssEase: 'linear',
            mobileFirst: true,
            autoplay: true,
            pauseOnHover: true,
            prevArrow: '<a class="a-slider i1"><ion-icon name="ios-arrow-back" class="icon-slider"></ion-icon></a>',
            nextArrow: '<a class="a-slider i2"><ion-icon name="ios-arrow-forward" class="icon-slider"></ion-icon></a>',
            initialSlide: 0
        });

    }, 4000);

} else { // CÓDIGO MOBILE
    $(".desk").hide();

    setTimeout(function() {

        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 1500,
            fade: true,
            cssEase: 'linear',
            mobileFirst: true,
            autoplay: true,
            pauseOnHover: true,
            prevArrow: '<a class="a-slider i1"><ion-icon name="ios-arrow-back" class="icon-slider"></ion-icon></a>',
            nextArrow: '<a class="a-slider i2"><ion-icon name="ios-arrow-forward" class="icon-slider"></ion-icon></a>',
            initialSlide: 0
        });

    }, 4000);

}

$(".whatsapp").hide();

$(document).ready(function() {

    $(".nav-link").click(function() {
        $("html").removeClass("nav-open");
        $(".navbar-toggler").removeClass("toggled");
    });

    new WOW().init();

    $("#logo-desk").attr("src", BASE_URL + "/assets/img/faciliteconsorcios_white.png");

    $(function() {
        $(window).scroll(function() {

            if ($(this).scrollTop() > 100) {
                $(".whatsapp").show();
                $("#nav-desk").removeClass("navbar-transparent");
                $("#logo-desk").attr("src", BASE_URL + "/assets/img/faciliteconsorcios.png");
            } else {
                $(".whatsapp").hide();
                $("#nav-desk").addClass("navbar-transparent");
                $("#logo-desk").attr("src", BASE_URL + "/assets/img/faciliteconsorcios_white.png");
            }
        });
    });

    $(".carousel").swipe({

        swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

            if (direction == 'left') $(this).carousel('next');
            if (direction == 'right') $(this).carousel('prev');

        },
        allowPageScroll: "vertical"

    });

    //MASCARAS
    var behavior = function(val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {
            onKeyPress: function(val, e, field, options) {
                field.mask(behavior.apply({}, arguments), options);
            }
        };

    $('.telefone').mask(behavior, options);
    $('.date').mask('00/00/0000');
    $('.cpf').mask('000.000.000-00', { reverse: true });
    $('.money').mask('000.000.000.000.000,00', { reverse: true });

    grecaptcha.ready(function() {
        grecaptcha.execute('6Ld0Ab0UAAAAANWgIgarI_r_eojwuEqlqnOQxuEa', { action: 'homepage' }).then(function(token) {
            $(".g-recaptcha-response").val(token);
        });
    });

    //FORMULARIO SIMULAÇÃO DESKTOP
    $(function() {
        $("#form_simule_desk").validate({
            rules: {
                nome: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                whatsapp: {
                    required: true,
                    minlength: 11,
                },
                categoria: {
                    required: true,
                },
                credito: {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
                nome: {
                    required: "Por favor, informe seu nome!",
                },
                email: {
                    required: "Por favor, informe seu e-mail!",
                    email: "Por favor, insira um e-mail válido!",
                },
                whatsapp: {
                    required: "Por favor, informe seu Whatsapp!",
                    minlength: "Insira seu número corretamente!"
                },
                categoria: {
                    required: "Por favor, selecione uma opção!"
                },
                credito: {
                    required: "Por favor, selecione um crédito de interesse!"
                }
            },

            submitHandler: function(form) {

                $.ajax({
                    url: 'simulacao/send',
                    type: 'POST',
                    dataType: "json",
                    cache: false,
                    data: $("#form_simule_desk").serialize(),
                    beforeSend: function() {
                        $(".robot").removeClass("d-none");
                    },
                    success: function(data) {
                        if (data['status'] == 1) {
                            window.location.href = data['url'] + "simulacao/consorcio";

                        } else {
                            $(".robot").addClass("d-none");
                            swal("Erro", "Ocorreu um erro com sua simulação, por favor, tente novamente!", "error");
                            setTimeout(function() {
                                window.location.href = data['url'];
                            }, 5000);
                        }

                    },
                    error: function() {
                        alert("deu erro");
                    }
                });
                return false;
            }
        });
    });

    var url = window.location.href;

    if (url.indexOf('consorcio') > 0) {
        setTimeout(function() {
            $.ajax({
                url: 'http://localhost/mdv/simulacao/emailNovoLead'
            });
            return false;
        }, 1000);

    }



    $("#submit_pre_venda").click(function() {
        var cpf = $("#cpf").val();
        if (cpf) {
            setTimeout(function() {
                $.ajax({
                    url: 'http://localhost/mdv/simulacao/emailNovaProposta'
                });
                return false;
            }, 1000);
        }
    })




    //SELECT DINAMICO PARA SIMULAÇÃO DE CRÉDITOS

    $("#categoria-desk").change(function() {

        $("#credito-desk").attr("disabled", "disabled");
        $("#credito-desk").html('<option>Carregando...</option>');

        var nome_categoria = $(this).val();

        //CHAMADA AJAX RESUMIDA
        $.post('home/getCreditos', {
                nome_categoria: nome_categoria
            },
            function(data) { //RETORNO - CALLBACK
                $("#credito-desk").html(data);
                $("#credito-desk").removeAttr("disabled");

            }); // função jquery post via ajax passa 3 parametros, 1º endereço da função, 2º parametros enviados, 3º função de callback que será executada
    });

    //FORMULARIO SIMULAÇÃO MOBILE
    $(function() {
        $("#form_simule_mobile").validate({
            rules: {
                nome: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                whatsapp: {
                    required: true,
                    minlength: 11,
                },
                categoria: {
                    required: true,
                },
                credito: {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
                nome: {
                    required: "Por favor, informe seu nome!",
                },
                email: {
                    required: "Por favor, informe seu e-mail!",
                    email: "Por favor, insira um e-mail válido!",
                },
                whatsapp: {
                    required: "Por favor, informe seu Whatsapp!",
                    minlength: "Insira seu número corretamente!"
                },
                categoria: {
                    required: "Por favor, selecione uma opção!"
                },
                credito: {
                    required: "Por favor, selecione um crédito de interesse!"
                }
            },

            submitHandler: function(form) {

                $.ajax({
                    url: 'simulacao/send',
                    type: 'POST',
                    dataType: "json",
                    data: $("#form_simule_mobile").serialize(),
                    beforeSend: function() {
                        $(".robot").removeClass("d-none");
                    },
                    success: function(data) {
                        if (data['status'] == 1) {
                            window.location.href = data['url'] + "simulacao/consorcio";
                            $.ajax({
                                url: 'simulacao/emailNovoLead',
                                type: 'POST',
                                success: function() {
                                    console.log("");
                                }
                            });
                        } else {
                            $(".robot").addClass("d-none");
                            swal("Erro", "Ocorreu um erro com sua simulação, por favor, tente novamente!", "error");
                            setTimeout(function() {
                                window.location.href = data['url'];
                            }, 5000);
                        }

                    }
                });
                return false;
            }
        });
    });


    //SELECT DINAMICO PARA SIMULAÇÃO DE CRÉDITOS

    $("#categoria-mobile").change(function() {

        $("#credito-mobile").attr("disabled", "disabled");
        $("#credito-mobile").html('<option>Carregando...</option>');

        var nome_categoria = $(this).val();

        //CHAMADA AJAX RESUMIDA
        $.post('home/getCreditos', {
                nome_categoria: nome_categoria
            },
            function(data) { //RETORNO - CALLBACK
                $("#credito-mobile").html(data);
                $("#credito-mobile").removeAttr("disabled");

            }); // função jquery post via ajax passa 3 parametros, 1º url, 2º parametros enviados, 3º função de callback que será executada
    });

    //QUANDO O USUÁRIO CLICAR EM QUERO ESTE EXECUTA A FUNÇÃO
    $(".quero_comprar").click(function() {

        var div = $(this).closest('div');
        var prazo = (div.find(".prazo_simulacao").val());
        var parcelas = (div.find(".parcelas").val());

        $.ajax({
            url: 'queroComprar',
            type: 'POST',
            dataType: "json",
            data: { prazo: prazo, parcelas: parcelas },
            beforeSend: function() {
                $("#loader").removeClass("d-none");
            },
            success: function(data) {
                if (data['status'] == 1) {
                    $("#loader").addClass("d-none");
                    window.location.href = data['url'];
                } else {
                    swal("Error", "Ocorreu um erro inesperado com sua simulação, por favor, tente novamente! ", "error");
                    //setTimeout(function() {
                    //  window.location.href = data['url'];
                    //}, 5000);
                }
            }
        });
        return false;
    });


    //FORMULARIO DE CONTATO
    $(function() {
        $("#form_contato_desk").validate({
            rules: {
                nome: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                whatsapp: {
                    required: true,
                    minlength: 11,
                },
                mensagem: {
                    required: true,
                    minlength: 20
                },
            },
            messages: {
                nome: {
                    required: "Por favor, informe seu nome!",
                },
                email: {
                    required: "Por favor, informe seu e-mail!",
                    email: "Por favor, insira um e-mail válido!",
                },
                whatsapp: {
                    required: "Por favor, informe seu Whatsapp!",
                    minlength: "Insira seu número corretamente!"
                },
                mensagem: {
                    required: "Por favor, digite sua mensagem!",
                    minlength: "Por favor, digite corretamente sua mensagem!"
                },
            },

            submitHandler: function(form) {
                $.ajax({
                    url: 'contato/send',
                    type: 'POST',
                    data: $("#form_contato_desk").serialize(),
                    beforeSend: function() {
                        $(".robot").removeClass("d-none");
                    },
                    success: function(data) {
                        $(".robot").addClass("d-none");
                        swal("Sucesso", "E-mail enviado com sucesso! Em breve entraremos em contato com você.", "success");
                        $("form").trigger("reset");
                    }
                });

                return false;
            }
        });
    });

    $(function() {
        $("#form_contato_mobile").validate({
            rules: {
                nome: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                whatsapp: {
                    required: true,
                    minlength: 11,
                },
                mensagem: {
                    required: true,
                    minlength: 20,
                },
            },
            messages: {
                nome: {
                    required: "Por favor, informe seu nome!",
                },
                email: {
                    required: "Por favor, informe seu e-mail!",
                    email: "Por favor, insira um e-mail válido!",
                },
                whatsapp: {
                    required: "Por favor, informe seu Whatsapp!",
                    minlength: "Insira seu número corretamente!"
                },
                mensagem: {
                    required: "Por favor, digite sua mensagem!",
                    minlength: "Por favor, digite corretamente sua mensagem!"
                },
            },

            submitHandler: function(form) {
                $.ajax({
                    url: 'contato/send',
                    type: 'POST',
                    data: $("#form_contato_mobile").serialize(),
                    beforeSend: function() {
                        $(".robot").removeClass("d-none");
                    },
                    success: function(data) {
                        $(".robot").addClass("d-none");
                        swal("Sucesso", "E-mail enviado com sucesso! Em breve entraremos em contato com você.", "success");
                        $("form").trigger("reset");
                    }
                });

                return false;
            }
        });
    });


    $(function() {
        $("#form_proposal").validate({
            rules: {
                nome: {
                    required: true,
                },
                cpf: {
                    required: true,
                },
                rg: {
                    required: true,
                },
                nascimento: {
                    required: true,
                },
                telefone: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                cep: {
                    required: true
                },
                endereco: {
                    required: true,
                },
                numero: {
                    required: true
                },
                bairro: {
                    required: true,
                },
                cidade: {
                    required: true
                },
                uf: {
                    required: true
                },
                categoria: {
                    required: true,
                },
                credito: {
                    required: true,
                },
                prazo: {
                    required: true
                },
                parcelas: {
                    required: true
                }
            },
            messages: {
                nome: {
                    required: "Por favor, informe seu nome!",
                },
                cpf: {
                    required: "Por favor, informe seu CPF!"
                },
                rg: {
                    required: "Por favor, informe seu RG!",
                },
                nascimento: {
                    required: "Por favor, informe sua data de nascimento!"
                },
                email: {
                    required: "Por favor, informe seu e-mail!",
                    email: "Por favor, insira um e-mail válido!",
                },
                cep: {
                    required: "Por favor, insira seu CEP!"
                },
                endereco: {
                    required: "Por favor, complete seu endereço!",
                },
                numero: {
                    required: "Por favor, informe o número da sua residência!"
                },
                bairro: {
                    required: "Por favor, informe seu bairro!",
                },
                cidade: {
                    required: "Por favor, informe sua cidade!"
                },
                uf: {
                    required: "Por favor, informe seu estado!"
                },
                categoria: {
                    required: "Este campo é obrigatório!",
                },
                credito: {
                    required: "Este campo é obrigatório!",
                },
                prazo: {
                    required: "Este campo é obrigatório!"
                },
                parcelas: {
                    required: "Este campo é obrigatório!"
                }
            },

            submitHandler: function(form) {

                $.ajax({
                    url: 'finalizarProposta',
                    type: 'POST',
                    dataType: "json",
                    data: $("#form_proposal").serialize(),
                    beforeSend: function() {
                        $("#loader").removeClass("d-none");
                    },
                    success: function(data) {
                        if (data['status'] == 1) {
                            $("#loader").addClass("d-none");
                            swal("Sucesso", "Recebemos seu pré contrato! Em até 30min nossa equipe entrará em contato com você para finalizar sua contratação.", "success");
                            setTimeout(function() {
                                window.location.href = data['url'];
                            }, 7000);
                        } else {
                            $(".robot").addClass("d-none");
                            swal("Erro", "Ocorreu um erro com sua simulação, por favor, tente novamente!", "error");

                        }
                    },
                    error: function() {
                        $("#loader").addClass("d-none");
                        swal("Erro", "Ocorreu um erro inesperado! Por favor, tente novamente.", "error");
                    }
                });
                return false;
            }
        });
    });

    if (url.indexOf("simulacao/consorcio")) {
        $(".footer").hide();
    }

    $(".footer").show();


    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("Localizando...");
                $("#bairro").val("Localizando...");
                $("#cidade").val("Localizando...");
                $("#uf").val("Localizando...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#rua").click();
                        $(".address_wait").removeAttr("disabled");
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

});