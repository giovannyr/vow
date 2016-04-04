var dv = {};

function cargarData() {
    $.ajax({
        url: "../controllers/ctrl_votos.php",
        type: "post",
        data: {action: "consultar"}
    }).success(function (response) {
        //console.log(response);
        response = JSON.parse(response);
        //console.log(response);
        setCandidatos(response);
    });
}

function setCandidatos(datos) {
    var temp = _.template($("#tmp_planchas").html());
    $("#planchas").html(temp({datos: datos}));

    //eventos
    $('#planchas img[data-role="select"]').click(function () {
        var id = $(this).data('id');
        $('.marca').css('display', 'none');
        $('div[data-id="' + id + '"]').css('display', '');
        dv.id = id;
    });

    $('#btnVotar').click(function () {
        registar();
    });
}

function registar() {
    if (_.size(dv) > 0 && _.size(dv) < 2) {
        var dv2 = dv;
        dv = {};
        $('#btnVotar').prop("disabled", true)
        $.ajax({
            url: "../controllers/ctrl_votos.php",
            type: "post",
            data: {action: "registrar", data: dv2}
        }).success(function (response) {
            //console.log(response);
            response = JSON.parse(response);
            location.href = response;
        });
    } else {
        alert("Elija un candidato");
    }
}


cargarData();