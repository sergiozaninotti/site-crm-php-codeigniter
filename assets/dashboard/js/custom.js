$(document).ready(function() {

    //MASCARAS
    var behavior = function(val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {
            onKeyPress: function(val, e, field, options) {
                field.mask(behavior.apply({}, arguments), options);
            }
        };

    $('.whatsapp').mask(behavior, options);

    $("#btn_video").click(function() {

        setTimeout(function() {
            let check_val = $(".show_img_simulador").val();
            if (check_val > 0) {
                $(".show_img_simulador").attr("checked", "checked");
            }
        }, 1000);

        $(".show_img_simulador").on('click', function() {

            if ($(".show_img_simulador:checkbox:checked").length > 0) {
                $(".show_img_simulador").val(1);
                $(".show_img_simulador").attr("checked", true);
            } else {
                $(".show_img_simulador").val(0);
                $(".show_img_simulador").attr("checked", false);
            }
        })

    })


});