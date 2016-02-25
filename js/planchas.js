function cargarData(){
    $.ajax({
       url: "../controllers/ctrl_candidatos.php",
       type: "post",
       data: {action: "consultar"}
    }).success(function(response){
        console.log(response);
        response = JSON.parse(response);
        console.log(response);
        setCandidatos(response);
    });
}

function setCandidatos(datos){
    var temp = _.template($("#tmp_planchas").html());
    $("#planchas").html(temp({datos : datos}));
}

function marcar(id){
    $(id).css('display', '');
}

function desmarcar(id){
    $(id).css('display', 'none');
}


// events
$('#p1').click(function(){
    marcar('#mp1');
    desmarcar('#mp2');
    desmarcar('#mvb');
});

$('#p2').click(function(){
    marcar('#mp2');
    desmarcar('#mp1');
    desmarcar('#mvb');
});

$('#ivblanco').click(function(){
    marcar('#mvb');
    desmarcar('#mp1');
    desmarcar('#mp2');
});



cargarData();