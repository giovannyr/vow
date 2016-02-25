function enviar(data){
    $.ajax({
        url: "../controllers/ctrl_login.php",
        method: "post",
        data: data
    }).success(function(resp){ console.log(resp);
        resp = JSON.parse(resp);
        if( resp['au'] ){
            window.location = resp['msg'];
        }else{
            alert(resp['msg']);
        }
    });
}



$("#frmLogin").submit(function(e){
    e.preventDefault();
    var data = $(this).serializeForm();
    enviar(data);
});
