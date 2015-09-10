function sendAjaxSerialize( formName ) {
    
    var form = $( "form[name="+formName+"]" ),
        dados = form.serialize(),
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
            $( ".img-load").css('display','none');
        }
    });
}

$(function(){
 
});