var dv = {};

function cargarData() {
    $.ajax({
        url: "../controllers/ctrl_votos.php",
        type: "post",
        data: {action: "consultar"}
    }).success(function (response) {
        console.log(response);
        response = JSON.parse(response);
        console.log(response);
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
        $.ajax({
            url: "../controllers/ctrl_votos.php",
            type: "post",
            data: {action: "registrar", data: dv}
        }).success(function (response) {
            console.log(response);
            response = JSON.parse(response);
            location.href = response;
        });
    } else {
        alert("haga su eleccion");
    }
}



/*
 function marcar(id) {
 $(id).css('display', '');
 }
 
 function desmarcar(id) {
 $(id).css('display', 'none');
 }
 
 
 // events
 $('#p1').click(function () {
 marcar('#mp1');
 desmarcar('#mp2');
 desmarcar('#mvb');
 });
 
 $('#p2').click(function () {
 marcar('#mp2');
 desmarcar('#mp1');
 desmarcar('#mvb');
 });
 
 $('#ivblanco').click(function () {
 marcar('#mvb');
 desmarcar('#mp1');
 desmarcar('#mp2');
 });
 */



cargarData();