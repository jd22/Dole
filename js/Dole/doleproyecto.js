$(document).ready(function () {

});

function editarP(idP,n_p){
    document.getElementById("idproy").value = idP;
    document.getElementById("proyecton").value = n_p;
}

function actualizar_Proyecto(){
    var numero_p = document.getElementById("proyecton").value;
    var idProy = document.getElementById("idproy").value;
    $.ajax({
        url: BASE_URL+'Proyecto/actualizar_proyecto/'+idProy+'/'+numero_p,
        async: false,
        type: "POST",
        // data: {_name: name,_active:active,_unit:unit},
        dataType: 'json',
        success: function (msg) { // success callback
            alert("Proyecto Actualizado");
            document.getElementById("proyecton").value = msg[0];
        },
        error: function (msg) {
            alert("Error al actualizar el proyecto");
        }
    });
}
//Refrescar pagina de proyectos lista
function actualizar_ListaP(){
    location.reload(true);
}

function eliminarProyecto(numero_proyecto,id_proyecto){
    $.ajax({
        url: BASE_URL+'Proyecto/eliminar_proyecto/'+numero_proyecto+'/'+id_proyecto,
        async: false,
        type: "POST",
        // data: {_name: name,_active:active,_unit:unit},
        dataType: 'json',
        success: function (msg) { // success callback
            alert("Proyecto Eliminado");
            //location.reload(true);
        },
        error: function (msg) {
            alert(JSON.stringify(msg));
        }
    });

}
