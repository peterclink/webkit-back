$(function() {

    $('#side-menu').metisMenu();
    //Loads the correct sidebar on window load,
    //collapses the sidebar on window resize.
    $(window).bind("load resize", function() {
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    });

    /** Definindo min-height do elemento #page-wrapper conforme resolução **/
    var altura = $(window).height();
    var alturaNav = $(".navbar").height();
    $("#page-wrapper").css("min-height",(altura-alturaNav));

    /** Ativar tooltips **/
    $('[data-toggle="tooltip"]').tooltip();

    /** DataTable page Editar usuários **/
    if ( $("#listar-usuarios,#listar-produtos").length > 0 ) {
        $('#listar-usuarios,#listar-produtos').dataTable({
            columnDefs: [
              { targets: 'no-sort', orderable: false }
            ]
        });
    }

});

function removerUsuario(url,id,nome) {

    $.ajax({
        type: "post",
        url: url,
        data: {
            id: id,
            nome: nome
        },                 
        success: function(result){
            $("#rt-removerUsuario").html(result);
        },
        beforeSend: function(){
            $( ".img-load").show();
        },
        complete: function(){
            $( ".img-load").hide();
        }
    });
}


var ajaxTimeOut = 500,
    homePage = '/MyFrameWork/Banners',
    afterLoginPage = '/MyFrameWork/Admin',
    beforeLoginPage = '/MyFrameWork/Usuario/Entrar';


jQuery.fn.sendAjaxSerialize = function (event) {

    var form = $(this).closest('form');
    var dados = form.serialize(),
        method = form.attr('method'),
        action = form.attr('action'),
        target = form.attr('target');

    $.ajax({
        type: method,
        url: action,
        data: dados,                 
        success: function(result){
            $(target).html(result);
        },
        beforeSend: function(){
            $( ".img-load").css('display','block');
        },
        complete: function(msg){
            window.setTimeout(function() {
                window.location.href = afterLoginPage;
            }, ajaxTimeOut);
        }
    });
};