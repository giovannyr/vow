var total_votos = 0;

function obtenerTotalRegistros(){
    $.ajax({
        url: "../controllers/ctrl_reportes.php",
        type: "post",
        data: {action:"total"}
    }).success(function(resp){
        total_votos = resp;
        presentarCantidades();
    });
}

function presentarCantidades(){
    $("#totalVotos").text(total_votos);
}

function consultar(){
    $.ajax({
        url: "../controllers/ctrl_reportes.php",
        type: "post",
        data: {action:"reporte"}
    }).success(function(resp){
        resp = JSON.parse(resp);
        presentar(resp);
    });
}

function presentar(data){
    var temp = _.template($('#tmp_informe').html());
    $('#informe').html(temp({datos : data}));
}

function generarExcel(){
    $.ajax({
        url: "../controllers/ctrl_reportes.php",
        type: "post",
        data: {action:"reporteExcel"}
    }).success(function(resp){
        location.href = resp;
    });
}


$("#btn-gExcel").click(generarExcel);


obtenerTotalRegistros();
consultar();
