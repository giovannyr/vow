function enviar(data){
    $.ajax({
        url: "../controllers/ctrl_votacion.php",
        type: "post",
        data: data
    }).success(function(resp){  
        resp = JSON.parse(resp);
        if( resp['estado'] ){
            location.href = resp['msg'];
        }else{
            mostrarMensaje(resp['msg']);
        }
    });
}

function mostrarMensaje(msg){
    $('#alert_user').css('display', '');
    $('#msgtu').text(msg);
    $('#doc').focus();
}


$('#form-docu').submit(function(e){
    e.preventDefault();
    data = $(this).serializeForm();
    enviar(data);
});
