/** Begin Plugins **/
(function( $ ) {

    /** Jquery Form Validate **/
    $.validator.setDefaults({
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
    jQuery.extend(jQuery.validator.messages, {
        required: "Esse campo é obrigatório.",
        remote: "Por favor, corrija este campo.",
        email: "Por favor insira um endereço de e-mail válido.",
        url: "Digite uma URL válida.",
        date: "Por favor, insira uma data válida.",
        dateISO: "Por favor, insira uma data válida (ISO).",
        number: "Por favor insira um número válido.",
        digits: "Digite apenas dígitos.",
        creditcard: "Por favor insira um número de cartão de crédito válido.",
        equalTo: "Por favor, insira o mesmo valor novamente.",
        accept: "Por favor preencha com uma extensão válida.",
        maxlength: jQuery.validator.format("Por favor, não digite mais do que {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, insira pelo menos {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor insira um valor entre {0} e {1} caracteres."),
        range: jQuery.validator.format("Por favor insira um valor entre {0} e {1}."),
        max: jQuery.validator.format("Por favor insira um valor inferior ou igual a {0}."),
        min: jQuery.validator.format("Por favor insira um valor maior ou igual a {0}.")
    });

/******************************************** Form Cadastrar Usuario *********************************************/
var form_CadastrarUsuario = $('#CadastrarUsuario, #EditarUsuario');
form_CadastrarUsuario.validate({
    rules: {
        nome: {
            minlength: 5,
            maxlength: 15,
            required: true
        },
        email: {
            required: true,
            email: true
        },
        login: {
            minlength: 5,
            required: true
        },
        senha: {
            minlength: 5,
            required: true
        },
        resenha: {
            minlength: 5,
            required: true
        },
        perfil: {
            required: true
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
    submitHandler: function( form ){
        
        var dados = form_CadastrarUsuario.serialize(),
            method = form_CadastrarUsuario.attr('method'),
            action = form_CadastrarUsuario.attr('action'),
            target = form_CadastrarUsuario.attr('target');

        $.ajax({
            type: method,
            url: action,
            data: dados,
            success: function(result){
                $(target).html(result);
            },
            beforeSend: function(){
                $( ".img-load").show();
            },
            complete: function(msg){
                $( ".img-load").hide();
            }
        });

        return false;
    }
});
/******************************************** /Form Cadastrar Usuario ********************************************/

/******************************************** Form Cadastrar Produto *********************************************/
var formCadastrarProduto = $('#formCadastrarProduto');
formCadastrarProduto.validate({
    rules: {
        nome: {
            minlength: 5,
            required: true
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
    submitHandler: function( form ){
        
        var dados = formCadastrarProduto.serialize(),
            method = formCadastrarProduto.attr('method'),
            action = formCadastrarProduto.attr('action'),
            target = formCadastrarProduto.attr('target');

        $.ajax({
            type: method,
            url: action,
            data: dados,
            success: function(result){
                $(target).html(result);
            },
            beforeSend: function(){
                $( ".img-load").show();
            },
            complete: function(msg){
                $( ".img-load").hide();
            }
        });

        return false;
    }
});
/******************************************** /Form Cadastrar Produto ********************************************/
})( jQuery );

/** End Plugins **/