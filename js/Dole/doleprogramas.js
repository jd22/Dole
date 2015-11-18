$(document).ready(function () {
    
});

var numero_proyecto = "";
var BASE_URL = location.protocol + "//" + location.hostname + '/Dole/';
//Datos para iniciar el datepicker en la fecha de hoy
var d = new Date();

Date.prototype.getWeek = function() {
    var firstOfYear = new Date(this.getFullYear(), 0, 1);
    return (Math.ceil((((this - firstOfYear ) / 86400000) +
    firstOfYear .getDay() + 1) / 7)-1);
}

Date.prototype.addMonth = function(months) {
    this.setMonth(this.getMonth() + parseInt(months));
    return this;
};
Date.prototype.addDays = function(days) {
    this.setDate(this.getDate() + parseInt(days));
    // if(this.getDate()>30 && (this.getMonth()==3 || this.getMonth()==5 || this.getMonth()==8 || this.getMonth()==10)){
    //     this.setDate(this.getDate() + parseInt(1));
    // }
    return this;
};


var fechaInicial = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();

var semanaapp = "";

var fecha_semana_siembra_general;
$("#idsemanasiembra").daterangepicker({    
    singleDatePicker: true,
    format: 'YYYY-MM-DD',
    startDate: fechaInicial,
    showWeekNumbers:true,
    locale: {
        firstDay: 1
        },
    },
    function(start, end, label) {
        var fecha = new Date(start);      
        fecha_semana_siembra_general= start;
        document.getElementById("idsemanasiembra").value= fecha.getWeek() +'-'+fecha.getFullYear();
        fecha.addDays(intervaloinicial);
        document.getElementById("idsemanaaplicacion").value= fecha.getWeek() +'-'+fecha.getFullYear();
        document.getElementById("idfechaprogramada").value=   fecha.getFullYear()+'-'+ (fecha.getMonth()+1) +'-'+fecha.getDate() ;
    }
);

var intervaloinicial = 0;
var intervaloinicial2 = 0;
var intervalo1 = "";
var intervalo2 = "";
var intervalo3 = "";
var intervalo4 = "";
var intervalo5 = "";
function idintervalo(idTabla){
    var table = document.getElementById(idTabla.toString());
    
    for (var i = 1, row; row = table.rows[i]; i++) {
        //alert(table.rows[i].cells[0].innerHTML);
        if(table.rows[i].cells[0].innerHTML=='Momento de aplicación (DDS)'){//posicionarse en la fila correcta
            intervaloinicial = table.rows[i+1].cells[1].childNodes[1].value;
            intervalo1 = intervaloinicial +','+intervaloinicial*2+','+intervaloinicial*3+','+intervaloinicial*4;
            intervalo2 = intervaloinicial*5 +','+intervaloinicial*6+','+intervaloinicial*7+','+intervaloinicial*8;
            intervalo3 = intervaloinicial*9 +','+intervaloinicial*10+','+intervaloinicial*11+','+intervaloinicial*12+','+intervaloinicial*13;
            intervalo4 = intervaloinicial*14 +','+intervaloinicial*15+','+intervaloinicial*16+','+intervaloinicial*17+','+intervaloinicial*18;
            intervalo5=intervaloinicial*18;
            table.rows[i].cells[1].childNodes[1].value = intervalo1;
            table.rows[i].cells[2].childNodes[1].value = intervalo2;
            table.rows[i].cells[3].childNodes[1].value = intervalo3;
            table.rows[i].cells[4].childNodes[1].value = intervalo4;
            break;
        }
    }
}

function idintervalo2(idTabla){
    var table = document.getElementById(idTabla.toString());
    
    for (var i = 1, row; row = table.rows[i]; i++) {
        //alert(table.rows[i].cells[0].innerHTML);
        if(table.rows[i].cells[0].innerHTML=='Momento de aplicación (DDS)'){//posicionarse en la fila correcta
            intervaloinicial = table.rows[i+1].cells[1].childNodes[1].value;
            intervalo1 = intervaloinicial +','+intervaloinicial*2+','+intervaloinicial*3+','+intervaloinicial*4;
            intervalo2 = intervaloinicial*5 +','+intervaloinicial*6+','+intervaloinicial*7+','+intervaloinicial*8;
            intervalo3 = intervaloinicial*9 +','+intervaloinicial*10+','+intervaloinicial*11+','+intervaloinicial*12+','+intervaloinicial*13;
            intervalo4 = intervaloinicial*14 +','+intervaloinicial*15+','+intervaloinicial*16+','+intervaloinicial*17+','+intervaloinicial*18;
            intervalo5=intervaloinicial*18;
            intervaloinicial2 = table.rows[i+1].cells[2].childNodes[1].value;
            intervalo5=intervalo5+parseInt(intervaloinicial2);
            table.rows[i].cells[5].childNodes[1].value = intervalo5;
            break;
        }
    }
}


var listaGeneralTratamientos=[];
var tratamiento = {
          'name': 'name',
          'activecomponent': 'active',
          'unit': 'unit'
          };

var productoSeleccionado = [];

var idtable=2;
var dosis_product=[];
var count=0;
var listaInformacionTratamientos=[];// Contendra una lista de informacion del tratamiento con su respectivo producto
var listaCedulas=[];
var listaTratamientos=[];
var n = 0;
var m = 0;


// function agregarCedulafuncion(nproyecto){
//     var numero_proyecto = nproyecto;
//     var tipo = tipoCedulaGlobal;
//     var finca = document.getElementById("idfinca");
//     var fincaid = finca.options[finca.selectedIndex].value;
//     var descripcionindex = document.getElementById("iddescripcion");
//     var idmodoaplicacionindex = document.getElementById("idmodoaplicacion");
//     var idmetodoaplicacionindex = document.getElementById("idmetodoaplicacion");

//     var id_tratamiento = idGenerakTratamiento;
//     //var numero_proyecto = document.getElementById("nnumero").value;

//     var id_finca = fincaid;
//     var descripcion_aplicacion = descripcionindex.options[descripcionindex.selectedIndex].text;

//     var semana_aplicacion = document.getElementById("idsemanaaplicacion").value;
//     if(semana_aplicacion==''){document.getElementById("idsemanaaplicacion").style.border = "thin dotted red";return;}else{document.getElementById("idsemanaaplicacion").style.border="";}
    
//     var fecha_programada = document.getElementById("idfechaprogramada").value;
//     if(fecha_programada==''){document.getElementById("idfechaprogramada").style.border = "thin dotted red";return;}else{document.getElementById("idfechaprogramada").style.border="";}
    
//     var litros = document.getElementById("idlitros").value;
//     if(litros==''){document.getElementById("idlitros").style.border = "thin dotted red";return;}else{document.getElementById("idlitros").style.border="";}
    
//     var presion = document.getElementById("idpresion").value;
//     if(presion==''){document.getElementById("idpresion").style.border = "thin dotted red";return;}else{document.getElementById("idpresion").style.border="";}
    
//     var velocidad = document.getElementById("idvelocidad").value;
//     if(velocidad==''){document.getElementById("idvelocidad").style.border = "thin dotted red";return;}else{document.getElementById("idvelocidad").style.border="";}
    
//     var rpm = document.getElementById("idr_p_m").value;
//     if(rpm==''){document.getElementById("idr_p_m").style.border = "thin dotted red";return;}else{document.getElementById("idr_p_m").style.border="";}
    
//     var marcha = document.getElementById("idmarcha").value;
//     if(marcha==''){document.getElementById("idmarcha").style.border = "thin dotted red";return;}else{document.getElementById("idmarcha").style.border="";}
    
//     var tipo_boquilla = document.getElementById("idboquilla").value;
//     if(tipo_boquilla==''){document.getElementById("idboquilla").style.border = "thin dotted red";return;}else{document.getElementById("idboquilla").style.border="";}
    
//     var cultivo = document.getElementById("idcultivonombrecientifico").value;
//     if(cultivo==''){document.getElementById("idcultivonombrecientifico").style.border = "thin dotted red";return;}else{document.getElementById("idcultivonombrecientifico").style.border="";}
    
//     var variedad = document.getElementById("idvariedadcultivo").value;
//     if(variedad==''){document.getElementById("idvariedadcultivo").style.border = "thin dotted red";return;}else{document.getElementById("idvariedadcultivo").style.border="";}
    
//     var lote = document.getElementById("idlote").value;
//     if(lote==''){document.getElementById("idlote").style.border = "thin dotted red";return;}else{document.getElementById("idlote").style.border="";}
    
//     var bloque = document.getElementById("idbloque").value;
//     if(bloque==''){document.getElementById("idbloque").style.border = "thin dotted red";return;}else{document.getElementById("idbloque").style.border="";}
    
//     var estadio = document.getElementById("idestadio").value;
//     if(estadio==''){document.getElementById("idestadio").style.border = "thin dotted red";return;}else{document.getElementById("idestadio").style.border="";}
    
//     var semana_siembra = document.getElementById("idsemanasiembra").value;
//     if(semana_siembra==''){document.getElementById("idsemanasiembra").style.border = "thin dotted red";return;}else{document.getElementById("idsemanasiembra").style.border="";}
    
//     var area_bloque = document.getElementById("idareabloque").value;
//     if(area_bloque==''){document.getElementById("idareabloque").style.border = "thin dotted red";return;}else{document.getElementById("idareabloque").style.border="";}
    
//     var area_proyecto = document.getElementById("idareaproyecto").value;
//     if(area_proyecto==''){document.getElementById("idareaproyecto").style.border = "thin dotted red";return;}else{document.getElementById("idareaproyecto").style.border="";}
    
//     var cantidad_camas = document.getElementById("idnumerocamas").value;
//     if(cantidad_camas==''){document.getElementById("idnumerocamas").style.border = "thin dotted red";return;}else{document.getElementById("idnumerocamas").style.border="";}
    
//     var ancho_camas = document.getElementById("idanchocamas").value;
//     if(ancho_camas==''){document.getElementById("idanchocamas").style.border = "thin dotted red";return;}else{document.getElementById("idanchocamas").style.border="";}
    
//     var longitud_parcelas = document.getElementById("idlongitudparcelas").value;
//     if(longitud_parcelas==''){document.getElementById("idlongitudparcelas").style.border = "thin dotted red";return;}else{document.getElementById("idlongitudparcelas").style.border="";}
    
//     var cantidad_parcelas = document.getElementById("idnumeroparcelas").value;
//     if(cantidad_parcelas==''){document.getElementById("idnumeroparcelas").style.border = "thin dotted red";return;}else{document.getElementById("idnumeroparcelas").style.border="";}
    
//     var cantidad_replicas = document.getElementById("idnumeroreplicas").value;
//     if(cantidad_replicas==''){document.getElementById("idnumeroreplicas").style.border = "thin dotted red";return;}else{document.getElementById("idnumeroreplicas").style.border="";}
    
//     var volumen_aplicacion = document.getElementById("idvolumenaplicacion").value;
//     if(volumen_aplicacion==''){document.getElementById("idvolumenaplicacion").style.border = "thin dotted red";return;}else{document.getElementById("idvolumenaplicacion").style.border="";}
    
//     var modo_aplicacion = idmodoaplicacionindex.options[idmodoaplicacionindex.selectedIndex].text;
//     var metodo_aplicacion = idmetodoaplicacionindex.options[idmetodoaplicacionindex.selectedIndex].text;
    
//     // se hace un ciclo para crear todas las cedulas

//     var lista_pca = intervalo1.split(",");
//     for (var i = lista_pca.length - 1; i >= 0; i--) {
//         alert(lista_pca[i]);
//     };

//     // Usar ajax para mandar datos a la base de datos
//     $.ajax({
//         url: BASE_URL+'Cedula/Agregar_cedula',
//         async: false,
//         type: "POST",
//         data: {_id_tratamiento:id_tratamiento,_numero_proyecto:numero_proyecto,_id_finca:id_finca,_descripcion_aplicacion:descripcion_aplicacion,
//                          _semana_aplicacion:semana_aplicacion,_fecha_programada:fecha_programada,_litros:litros,
//                          _presion:presion,_velocidad:velocidad,_rpm:rpm,_marcha:marcha,_tipo_boquilla:tipo_boquilla,_cultivo:cultivo,
//                          _variedad:variedad,_lote:lote,_bloque:bloque,_estadio:estadio,_semana_siembra:semana_siembra,_area_bloque:area_bloque,
//                          _area_proyecto:area_proyecto,_cantidad_camas:cantidad_camas,_ancho_camas:ancho_camas,
//                          _longitud_parcelas:longitud_parcelas,_cantidad_parcelas:cantidad_parcelas,_cantidad_replicas:cantidad_replicas,
//                          _volumen_aplicacion:volumen_aplicacion,_modo_aplicacion:modo_aplicacion,_metodo_aplicacion:metodo_aplicacion,_tipo:tipo},
//         dataType: 'json',
//         success: function (msg) { // success callback
//             //alert(JSON.stringify(msg));
//             alert("Nueva Cedula Agregada al Tratamiento");
//             $('#calculos').modal('hide');
//             $('#NuevaCedula').modal('hide');
//             //CargarTratamientos();
//             //listaInformacionTratamientos = [];
//             actualizarDosis(semana_aplicacion);
            
//         },
//         error: function (msg) {
//              alert(JSON.stringify(msg));
//         }
//     });

// }


var idGenerakTratamiento="";
var tipoCedulaGlobal="";
function CargarIdTratamiento(id,numerotratamiento,tipo){
    var table = document.getElementById(id.toString());
    var interFecha = "";
    for (var i = 2, row; row = table.rows[i]; i++) {
        if(table.rows[i].cells[0].innerHTML == ' Intervalo de aplicación (días)'){//posicionarse en la fila correcta
            interFecha = table.rows[i].cells[1].childNodes[1].value;
        }
    }
    if(interFecha != ""){
        $("#NuevaCedula").modal('show');
        document.getElementById("tipoCedula").innerHTML = tipo;
        document.getElementById("actualizarCedula").style.display = "none";
        document.getElementById("agregarCedula").style.display = "initial";
        tipoCedulaGlobal=tipo;
        //$('#calculos').modal('show');
        $('#NuevaCedula').modal('show');
        idGenerakTratamiento=id;
        CargarProductosDelTratamientoSinId(id);
    }
    else{
        alert("Es necesario indicar el intervalo de días!");
    }
}


function DescargarPDF(idcedula){
    $.ajax({ // ajax para consultar las cedulas del tratamiento seleccionado
        url: BASE_URL+'Cedula/generar_pdf/'+idcedula, // se manda solo con el id no ocupa mas datos
        async: false,
        type: "POST",
        dataType: 'json',
        success: function(data) {
            alert(JSON.stringify(data));
        },
        error: function(data) {
            alert(JSON.stringify(data));
        }
    });
}

// $('#idvolumenaplicacion').change(function(){
//     document.getElementById("idvolaplicacion").value = document.getElementById("idvolumenaplicacion").value;
    
// });


function crearPrograma(idTabla,nproyecto){
    var lista_de_dosis_pca = []; var lista_de_dosis_pcb = []; 
    var lista_de_dosis_pcc = []; var lista_de_dosis_pcd = []; 
    var lista_de_dosis_pcforza = []; 
    var lista_intervalos = [];
    var stringlista_intervalos = [];
    var table = document.getElementById(idTabla.toString());
    
    for (var i = 2, row; row = table.rows[i]; i++) {
        //alert(table.rows[i].cells[0].innerHTML);
        if(table.rows[i].cells[0].innerHTML == 'Volumen de aplicación (L/ha)'){//posicionarse en la fila correcta
            break;
        }
        else{
            var d1 = {
                    "id_infotratamiento":table.rows[i].cells[3].childNodes[0].id,
                    "dosis":table.rows[i].cells[3].childNodes[0].value }
            var d2 =  {
                    "id_infotratamiento":table.rows[i].cells[4].childNodes[0].id,
                    "dosis":table.rows[i].cells[4].childNodes[0].value}
            var d3 =  {
                    "id_infotratamiento":table.rows[i].cells[5].childNodes[0].id,
                    "dosis":table.rows[i].cells[5].childNodes[0].value }
            var d4 =  {
                    "id_infotratamiento":table.rows[i].cells[6].childNodes[0].id,
                    "dosis":table.rows[i].cells[6].childNodes[0].value }
            var d5 =  {
                    "id_infotratamiento":table.rows[i].cells[7].childNodes[0].id,
                    "dosis":table.rows[i].cells[7].childNodes[0].value }

            lista_de_dosis_pca.push(d1);
            lista_de_dosis_pcb.push(d2);
            lista_de_dosis_pcc.push(d3);
            lista_de_dosis_pcd.push(d4);
            lista_de_dosis_pcforza.push(d5);
        }
    }
    for (var i = 2, row; row = table.rows[i]; i++) {
        if(table.rows[i].cells[0].innerHTML == 'Momento de aplicación (DDS)'){//posicionarse en la fila correcta
            stringlista_intervalos = stringlista_intervalos+table.rows[i].cells[1].childNodes[1].value;
            stringlista_intervalos = stringlista_intervalos+','+table.rows[i].cells[2].childNodes[1].value;
            stringlista_intervalos = stringlista_intervalos+','+table.rows[i].cells[3].childNodes[1].value;
            stringlista_intervalos = stringlista_intervalos+','+table.rows[i].cells[4].childNodes[1].value;
            lista_intervalos = stringlista_intervalos.split(',');
        }
    }
    // alert(lista_intervalos);
    var numero_proyecto = nproyecto;
    var tipo = tipoCedulaGlobal;
    var finca = document.getElementById("idfinca");
    var fincaid = finca.options[finca.selectedIndex].value;
    var descripcionindex = document.getElementById("iddescripcion");
    var idmodoaplicacionindex = document.getElementById("idmodoaplicacion");
    var idmetodoaplicacionindex = document.getElementById("idmetodoaplicacion");

    var id_tratamiento = idGenerakTratamiento;
    //var numero_proyecto = document.getElementById("nnumero").value;

    var id_finca = fincaid;
    var descripcion_aplicacion = descripcionindex.options[descripcionindex.selectedIndex].text;

    var semana_aplicacion = document.getElementById("idsemanaaplicacion").value;
    if(semana_aplicacion==''){document.getElementById("idsemanaaplicacion").style.border = "thin dotted red";return;}else{document.getElementById("idsemanaaplicacion").style.border="";}
    
    var fecha_programada = document.getElementById("idfechaprogramada").value;
    if(fecha_programada==''){document.getElementById("idfechaprogramada").style.border = "thin dotted red";return;}else{document.getElementById("idfechaprogramada").style.border="";}
    
    var litros = document.getElementById("idlitros").value;
    if(litros==''){document.getElementById("idlitros").style.border = "thin dotted red";return;}else{document.getElementById("idlitros").style.border="";}
    
    var presion = document.getElementById("idpresion").value;
    if(presion==''){document.getElementById("idpresion").style.border = "thin dotted red";return;}else{document.getElementById("idpresion").style.border="";}
    
    var velocidad = document.getElementById("idvelocidad").value;
    if(velocidad==''){document.getElementById("idvelocidad").style.border = "thin dotted red";return;}else{document.getElementById("idvelocidad").style.border="";}
    
    var rpm = document.getElementById("idr_p_m").value;
    if(rpm==''){document.getElementById("idr_p_m").style.border = "thin dotted red";return;}else{document.getElementById("idr_p_m").style.border="";}
    
    var marcha = document.getElementById("idmarcha").value;
    if(marcha==''){document.getElementById("idmarcha").style.border = "thin dotted red";return;}else{document.getElementById("idmarcha").style.border="";}
    
    var tipo_boquilla = document.getElementById("idboquilla").value;
    if(tipo_boquilla==''){document.getElementById("idboquilla").style.border = "thin dotted red";return;}else{document.getElementById("idboquilla").style.border="";}
    
    var cultivo = document.getElementById("idcultivonombrecientifico").value;
    if(cultivo==''){document.getElementById("idcultivonombrecientifico").style.border = "thin dotted red";return;}else{document.getElementById("idcultivonombrecientifico").style.border="";}
    
    var variedad = document.getElementById("idvariedadcultivo").value;
    if(variedad==''){document.getElementById("idvariedadcultivo").style.border = "thin dotted red";return;}else{document.getElementById("idvariedadcultivo").style.border="";}
    
    var lote = document.getElementById("idlote").value;
    if(lote==''){document.getElementById("idlote").style.border = "thin dotted red";return;}else{document.getElementById("idlote").style.border="";}
    
    var bloque = document.getElementById("idbloque").value;
    if(bloque==''){document.getElementById("idbloque").style.border = "thin dotted red";return;}else{document.getElementById("idbloque").style.border="";}
    
    var estadio = document.getElementById("idestadio").value;
    if(estadio==''){document.getElementById("idestadio").style.border = "thin dotted red";return;}else{document.getElementById("idestadio").style.border="";}
    
    var semana_siembra = document.getElementById("idsemanasiembra").value;
    if(semana_siembra==''){document.getElementById("idsemanasiembra").style.border = "thin dotted red";return;}else{document.getElementById("idsemanasiembra").style.border="";}
    
    var area_bloque = document.getElementById("idareabloque").value;
    if(area_bloque==''){document.getElementById("idareabloque").style.border = "thin dotted red";return;}else{document.getElementById("idareabloque").style.border="";}
    
    var area_proyecto = document.getElementById("idareaproyecto").value;
    if(area_proyecto==''){document.getElementById("idareaproyecto").style.border = "thin dotted red";return;}else{document.getElementById("idareaproyecto").style.border="";}
    
    var cantidad_camas = document.getElementById("idnumerocamas").value;
    if(cantidad_camas==''){document.getElementById("idnumerocamas").style.border = "thin dotted red";return;}else{document.getElementById("idnumerocamas").style.border="";}
    
    var ancho_camas = document.getElementById("idanchocamas").value;
    if(ancho_camas==''){document.getElementById("idanchocamas").style.border = "thin dotted red";return;}else{document.getElementById("idanchocamas").style.border="";}
    
    var longitud_parcelas = document.getElementById("idlongitudparcelas").value;
    if(longitud_parcelas==''){document.getElementById("idlongitudparcelas").style.border = "thin dotted red";return;}else{document.getElementById("idlongitudparcelas").style.border="";}
    
    var cantidad_parcelas = document.getElementById("idnumeroparcelas").value;
    if(cantidad_parcelas==''){document.getElementById("idnumeroparcelas").style.border = "thin dotted red";return;}else{document.getElementById("idnumeroparcelas").style.border="";}
    
    var cantidad_replicas = document.getElementById("idnumeroreplicas").value;
    if(cantidad_replicas==''){document.getElementById("idnumeroreplicas").style.border = "thin dotted red";return;}else{document.getElementById("idnumeroreplicas").style.border="";}
    
    var volumen_aplicacion = document.getElementById("idvolumenaplicacion").value;
    if(volumen_aplicacion==''){document.getElementById("idvolumenaplicacion").style.border = "thin dotted red";return;}else{document.getElementById("idvolumenaplicacion").style.border="";}
    
    var modo_aplicacion = idmodoaplicacionindex.options[idmodoaplicacionindex.selectedIndex].text;
    var metodo_aplicacion = idmetodoaplicacionindex.options[idmetodoaplicacionindex.selectedIndex].text;
    
    // se hace un ciclo para crear todas las cedulas
    var lista_Programa = [];

    // aqui hay q modificar las fecha de las cedulas que se van a insertar en la base de datos
    var lista_pca = intervalo1.split(",");
    for (var i = 0; lista_pca.length - 1 >= i; i++) {
        var cedula= {
                    "_id_tratamiento":id_tratamiento,"_numero_proyecto":numero_proyecto,"_id_finca":id_finca,"_descripcion_aplicacion":descripcion_aplicacion,
                     "_semana_aplicacion":semana_aplicacion,"_fecha_programada":fecha_programada,"_litros":litros,
                     "_presion":presion,_velocidad:velocidad,"_rpm":rpm,_marcha:marcha,"_tipo_boquilla":tipo_boquilla,"_cultivo":cultivo,
                     "_variedad":variedad,"_lote":lote,"_bloque":bloque,"_estadio":estadio,"_semana_siembra":semana_siembra,"_area_bloque":area_bloque,
                     "_area_proyecto":area_proyecto,"_cantidad_camas":cantidad_camas,"_ancho_camas":ancho_camas,
                     "_longitud_parcelas":longitud_parcelas,"_cantidad_parcelas":cantidad_parcelas,"_cantidad_replicas":cantidad_replicas,
                     "_volumen_aplicacion":volumen_aplicacion,"_modo_aplicacion":modo_aplicacion,"_metodo_aplicacion":metodo_aplicacion,"_tipo":'PC-A',
        }
        
        if(lista_Programa.length != 0){
            var fecha_cambiante = new Date(fecha_semana_siembra_general); // fecha inicial de la semana siembre de la cedula actual
            fecha_cambiante.addDays(lista_pca[i]);
            cedula["_fecha_programada"] = fecha_cambiante.getFullYear() +'-'+(fecha_cambiante.getMonth()+1) +'-'+fecha_cambiante.getDate();
            cedula["_semana_aplicacion"] = fecha_cambiante.getWeek() +'-'+ fecha_cambiante.getFullYear();
        }
        var cedula_y_dosis = { // cedula con sus respectivas dosis
            "cedula":cedula,
            "dosis":lista_de_dosis_pca,
        }

        lista_Programa.push(cedula_y_dosis);
        // alert(JSON.stringify(lista_Programa));        
    };
    var lista_pcb = intervalo2.split(",");
    for (var i = 0; lista_pcb.length - 1 >= i; i++) {
        var cedula= {
                    "_id_tratamiento":id_tratamiento,"_numero_proyecto":numero_proyecto,"_id_finca":id_finca,"_descripcion_aplicacion":descripcion_aplicacion,
                     "_semana_aplicacion":semana_aplicacion,"_fecha_programada":fecha_programada,"_litros":litros,
                     "_presion":presion,_velocidad:velocidad,"_rpm":rpm,_marcha:marcha,"_tipo_boquilla":tipo_boquilla,"_cultivo":cultivo,
                     "_variedad":variedad,"_lote":lote,"_bloque":bloque,"_estadio":estadio,"_semana_siembra":semana_siembra,"_area_bloque":area_bloque,
                     "_area_proyecto":area_proyecto,"_cantidad_camas":cantidad_camas,"_ancho_camas":ancho_camas,
                     "_longitud_parcelas":longitud_parcelas,"_cantidad_parcelas":cantidad_parcelas,"_cantidad_replicas":cantidad_replicas,
                     "_volumen_aplicacion":volumen_aplicacion,"_modo_aplicacion":modo_aplicacion,"_metodo_aplicacion":metodo_aplicacion,"_tipo":'PC-B',
        }
        
        if(lista_Programa.length != 0){
            var fecha_cambiante = new Date(fecha_semana_siembra_general); // fecha inicial de la semana siembre de la cedula actual
            fecha_cambiante.addDays(lista_pcb[i]);
            cedula["_fecha_programada"] = fecha_cambiante.getFullYear() +'-'+(fecha_cambiante.getMonth()+1) +'-'+fecha_cambiante.getDate();
            cedula["_semana_aplicacion"] = fecha_cambiante.getWeek() +'-'+ fecha_cambiante.getFullYear();
        }
        var cedula_y_dosis = { // cedula con sus respectivas dosis
            "cedula":cedula,
            "dosis":lista_de_dosis_pcb,
        }

        lista_Programa.push(cedula_y_dosis);
        // alert(JSON.stringify(lista_Programa));        
    };
    var lista_pcc = intervalo3.split(",");
    for (var i = 0; lista_pcc.length - 1 >= i; i++) {
        var cedula= {
                    "_id_tratamiento":id_tratamiento,"_numero_proyecto":numero_proyecto,"_id_finca":id_finca,"_descripcion_aplicacion":descripcion_aplicacion,
                     "_semana_aplicacion":semana_aplicacion,"_fecha_programada":fecha_programada,"_litros":litros,
                     "_presion":presion,_velocidad:velocidad,"_rpm":rpm,_marcha:marcha,"_tipo_boquilla":tipo_boquilla,"_cultivo":cultivo,
                     "_variedad":variedad,"_lote":lote,"_bloque":bloque,"_estadio":estadio,"_semana_siembra":semana_siembra,"_area_bloque":area_bloque,
                     "_area_proyecto":area_proyecto,"_cantidad_camas":cantidad_camas,"_ancho_camas":ancho_camas,
                     "_longitud_parcelas":longitud_parcelas,"_cantidad_parcelas":cantidad_parcelas,"_cantidad_replicas":cantidad_replicas,
                     "_volumen_aplicacion":volumen_aplicacion,"_modo_aplicacion":modo_aplicacion,"_metodo_aplicacion":metodo_aplicacion,"_tipo":'PC-C',
        }
        
        if(lista_Programa.length != 0){
            var fecha_cambiante = new Date(fecha_semana_siembra_general); // fecha inicial de la semana siembre de la cedula actual
            fecha_cambiante.addDays(lista_pcc[i]);
            cedula["_fecha_programada"] = fecha_cambiante.getFullYear() +'-'+(fecha_cambiante.getMonth()+1) +'-'+fecha_cambiante.getDate();
            cedula["_semana_aplicacion"] = fecha_cambiante.getWeek() +'-'+ fecha_cambiante.getFullYear();
        }
        var cedula_y_dosis = { // cedula con sus respectivas dosis
            "cedula":cedula,
            "dosis":lista_de_dosis_pcc,
        }

        lista_Programa.push(cedula_y_dosis);
        // alert(JSON.stringify(lista_Programa));        
    };
    var ult_fecha_prog = new Date(fecha_semana_siembra_general);
    var lista_pcd = intervalo4.split(",");
    for (var i = 0; lista_pcd.length - 1 >= i; i++) {
        var cedula= {
                    "_id_tratamiento":id_tratamiento,"_numero_proyecto":numero_proyecto,"_id_finca":id_finca,"_descripcion_aplicacion":descripcion_aplicacion,
                     "_semana_aplicacion":semana_aplicacion,"_fecha_programada":fecha_programada,"_litros":litros,
                     "_presion":presion,_velocidad:velocidad,"_rpm":rpm,_marcha:marcha,"_tipo_boquilla":tipo_boquilla,"_cultivo":cultivo,
                     "_variedad":variedad,"_lote":lote,"_bloque":bloque,"_estadio":estadio,"_semana_siembra":semana_siembra,"_area_bloque":area_bloque,
                     "_area_proyecto":area_proyecto,"_cantidad_camas":cantidad_camas,"_ancho_camas":ancho_camas,
                     "_longitud_parcelas":longitud_parcelas,"_cantidad_parcelas":cantidad_parcelas,"_cantidad_replicas":cantidad_replicas,
                     "_volumen_aplicacion":volumen_aplicacion,"_modo_aplicacion":modo_aplicacion,"_metodo_aplicacion":metodo_aplicacion,"_tipo":'PC-D',
        }
        
        if(lista_Programa.length != 0){
            var fecha_cambiante = new Date(fecha_semana_siembra_general); // fecha inicial de la semana siembre de la cedula actual
            fecha_cambiante.addDays(lista_pcd[i]);
            cedula["_fecha_programada"] = fecha_cambiante.getFullYear() +'-'+(fecha_cambiante.getMonth()+1) +'-'+fecha_cambiante.getDate();
            cedula["_semana_aplicacion"] = fecha_cambiante.getWeek() +'-'+ fecha_cambiante.getFullYear();
            ult_fecha_prog  = cedula["_fecha_programada"];
        }
        var cedula_y_dosis = { // cedula con sus respectivas dosis
            "cedula":cedula,
            "dosis":lista_de_dosis_pcd,
        }
        lista_Programa.push(cedula_y_dosis);

    };
    var elintervalo = intervaloinicial;
    // Usar ajax para mandar datos a la base de datos
     $.ajax({
         url: BASE_URL+'Programa/crearPrograma',
         async: false,
         type: "POST",
         data: {_lista_Programa:lista_Programa, _elintervalo:elintervalo,_ult_fecha_prog:ult_fecha_prog},
         dataType: 'json',
         success: function (msg) { // success callback
             alert("programa Creado");
             alert(msg);
            
         },
         error: function (msg) {
              alert(JSON.stringify(msg));
         }
    });

     //Se setean los campos

    document.getElementById("idsemanaaplicacion").value="";
    document.getElementById("idfechaprogramada").value="";
    document.getElementById("idlitros").value="";
    document.getElementById("idpresion").value="";
    document.getElementById("idvelocidad").value="";
    document.getElementById("idr_p_m").value="";
    document.getElementById("idmarcha").value="";
    document.getElementById("idboquilla").value="";
    document.getElementById("idcultivonombrecientifico").value="";
    document.getElementById("idvariedadcultivo").value="";
    document.getElementById("idlote").value="";
    document.getElementById("idbloque").value="";
    document.getElementById("idestadio").value="";
    document.getElementById("idsemanasiembra").value="";
    document.getElementById("idareabloque").value="";
    document.getElementById("idareaproyecto").value="";
    document.getElementById("idnumerocamas").value="";
    document.getElementById("idanchocamas").value="";
    document.getElementById("idlongitudparcelas").value="";
    document.getElementById("idnumeroparcelas").value="";
    document.getElementById("idnumeroreplicas").value="";
    document.getElementById("idvolumenaplicacion").value="";
}

function agregarPostPrograma(idTabla,nproyecto,ultisemanaapli){
    var lista_de_dosis_pcforza = []; 
    var table = document.getElementById(idTabla.toString());
    var lista_intervalos = 0;
    var days = 0;
    for (var i = 2, row; row = table.rows[i]; i++) {
        //alert(table.rows[i].cells[0].innerHTML);
        if(table.rows[i].cells[0].innerHTML == 'Volumen de aplicación (L/ha)'){//posicionarse en la fila correcta
            break;
        }
        else{
           
            var d5 =  {
                    "id_infotratamiento":table.rows[i].cells[7].childNodes[0].id,
                    "dosis":table.rows[i].cells[7].childNodes[0].value }

            lista_de_dosis_pcforza.push(d5);
        }
    }
    for (var i = 2, row; row = table.rows[i]; i++) {
        if(table.rows[i].cells[0].innerHTML == 'Momento de aplicación (DDS)'){//posicionarse en la fila correcta
            lista_intervalos =  table.rows[i].cells[5].childNodes[1].value;
            days = table.rows[i+1].cells[2].childNodes[1].value;
        }
    }
    
    // alert(lista_intervalos);
    var numero_proyecto = nproyecto;
    var tipo = tipoCedulaGlobal;


    var infocedula = "";
    var id_tratamiento = idTabla;

    $.ajax({ // ajax para consultar las cedulas del tratamiento seleccionado
        url: BASE_URL+'Cedula/obtener_cedulas/'+id_tratamiento, // se manda solo con el id no ocupa mas datos
        async: false,
        type: "POST",
        dataType: 'json',
        success: function(data) {
            // alert(JSON.stringify(data));
                infocedula= data[0][0];
        },
        error: function(data) {
            alert('Error al cargar la cedulas del tratamiento');
            alert(JSON.stringify(data));
        }
    });

    var id_finca = 0;
    var descripcion_aplicacion = "";
    var semana_aplicacion = "";
    var fecha_programada = new Date();    
    var litros = 0;
    var presion = 0;
    var velocidad = 0;
    var rpm = 0;
    var marcha = "";
    var tipo_boquilla = "";
    var cultivo = "";
    var variedad = "";
    var lote = "";
    var bloque = 0;
    var estadio = "";
    var semana_siembra = "";
    var area_bloque = 0;
    var area_proyecto = 0;
    var cantidad_camas = 0;
    var ancho_camas = 0;
    var longitud_parcelas = 0;
    var cantidad_parcelas = 0;
    var cantidad_replicas =0;
    var volumen_aplicacion = 0;
    var modo_aplicacion = "";
    var metodo_aplicacion = "";

    $.ajax({
        url: BASE_URL+'Cedula/obtener_unacedula/'+infocedula,
        async: false,
        type: "POST",
        dataType: 'json',
        success: function (data) { // success callback
            // alert(JSON.stringify(data));
            // alert("informacion cargada de la cedula correctamente lista para editar");

            id_finca=data[0];
            descripcion_aplicacion= data[1];

            semana_aplicacion=data[2]; fecha_programada=data[3];
            litros=data[4]; presion=data[5];
            velocidad=data[6]; rpm=data[7];
            marcha=data[8]; tipo_boquilla=data[9];
            cultivo=data[10]; variedad=data[11];
            lote=data[12]; bloque=data[13];
            estadio=data[14]; semana_siembra=data[15];
            area_bloque=data[16]; area_proyecto=data[17];
            cantidad_camas=data[18]; ancho_camas=data[19];
            longitud_parcelas=data[20]; cantidad_parcelas=data[21];
            cantidad_replicas=data[22]; volumen_aplicacion=data[23];
            modo_aplicacion = data[24];
            metodo_aplicacion= data[25];
        },
        error: function (data) {
             alert(JSON.stringify(data));
        }
    });


    
    // se hace un ciclo para crear todas las cedulas
    var lista_Programa = [];

    var ult_fecha_prog = new Date();
    var cedula= {
                "_id_tratamiento":id_tratamiento,"_numero_proyecto":numero_proyecto,"_id_finca":id_finca,"_descripcion_aplicacion":descripcion_aplicacion,
                 "_semana_aplicacion":semana_aplicacion,"_fecha_programada":fecha_programada,"_litros":litros,
                 "_presion":presion,_velocidad:velocidad,"_rpm":rpm,_marcha:marcha,"_tipo_boquilla":tipo_boquilla,"_cultivo":cultivo,
                 "_variedad":variedad,"_lote":lote,"_bloque":bloque,"_estadio":estadio,"_semana_siembra":semana_siembra,"_area_bloque":area_bloque,
                 "_area_proyecto":area_proyecto,"_cantidad_camas":cantidad_camas,"_ancho_camas":ancho_camas,
                 "_longitud_parcelas":longitud_parcelas,"_cantidad_parcelas":cantidad_parcelas,"_cantidad_replicas":cantidad_replicas,
                 "_volumen_aplicacion":volumen_aplicacion,"_modo_aplicacion":modo_aplicacion,"_metodo_aplicacion":metodo_aplicacion,"_tipo":'Post-Forza',
    }



        
    var fecha_cambiante = new Date(ult_fecha_prog); // fecha inicial de la semana siembre de la cedula actual
    fecha_cambiante.addDays(days);
    cedula["_fecha_programada"] = fecha_cambiante.getFullYear() +'-'+(fecha_cambiante.getMonth()+1) +'-'+fecha_cambiante.getDate();
    cedula["_semana_aplicacion"] = fecha_cambiante.getWeek() +'-'+ fecha_cambiante.getFullYear();
    ult_fecha_prog  = cedula["_fecha_programada"];
        
    var cedula_y_dosis = { // cedula con sus respectivas dosis
        "cedula":cedula,
        "dosis":lista_de_dosis_pcforza,
    }
    lista_Programa.push(cedula_y_dosis);

    
    var elintervalo = intervaloinicial;
    // Usar ajax para mandar datos a la base de datos
     $.ajax({
         url: BASE_URL+'Programa/crearPrograma',
         async: false,
         type: "POST",
         data: {_lista_Programa:lista_Programa, _elintervalo:elintervalo,_ult_fecha_prog:ult_fecha_prog},
         dataType: 'json',
         success: function (msg) { // success callback
             alert("Post-Forza añadido");
             alert(msg);
            
         },
         error: function (msg) {
              alert(JSON.stringify(msg));
         }
    });
}

function CargarCedulasDelTratamiento(id_tratamiento,tipo) { // cargar cedula del tratamiento existente con el id del tratamiento y el tipo de cedula pca,pcb,pcc etc
    idGenerakTratamiento=id_tratamiento;
    tipoCedulaGlobal = tipo;
    //$('#tablaCedulas').DataTable().fnClearTable();
    //$('#tablaCedulas').DataTable().fnDestroy();
    var tablaCedulas = $('#tablaCedulas').DataTable({  
                        "bRetrieve": true,
                        "aoColumns" : [
                            {  "sClass": "center" },
                            { "sClass": "center"  },
                            { "sClass": "center"  },
                            { "sClass": "center"  },
                            { "sClass": "center"  }
                        ] 
                    });
    tablaCedulas.fnClearTable();
    $.ajax({ // ajax para consultar las cedulas del tratamiento seleccionado
        url: BASE_URL+'Cedula/obtener_cedulasportipo/'+id_tratamiento+'/'+tipo, // se manda solo con el id no ocupa mas datos
        async: false,
        type: "POST",
        dataType: 'json',
        success: function(data) {
            // alert(JSON.stringify(data));
            for (var i = 0; data.length-1 >= i; i++) {
                var idcedula = data[i][0];
                var descripcion = data[i][1]; 
                var semana_aplicacion = data[i][2];
                tablaCedulas.fnAddData( [
                    'Cedula '+ (i+1),
                    descripcion,
                    semana_aplicacion,
                    '<a href="#" onclick="eliminarCedula('+idcedula+')">Eliminar</a>|'+
                    '<a href="#" onclick="editarCedula('+idcedula+')"  data-toggle="tooltip" data-placement="bottom" title="Click para editar Cédula">Editar</a>',
                    '<a href="'+BASE_URL+'Cedula/generar_pdf/'+idcedula+'/'+tipo+'" data-toggle="tooltip" data-toggle="tooltip" title="Descargar Documento"><img src="'+BASE_URL+'images/pdfdocumento.png"></a>'
                ]);
            };
            document.getElementById("idtra").innerHTML= "Tipo Cedula: " +tipo;
        },
        error: function(data) {
            alert('Error al cargar la cedulas del tratamiento');
            alert(JSON.stringify(data));
        }
    });
}


var GlobalidecedulaEditar = "";
function editarCedula(idcedula){// carga los datos en el model con los datos de la cedula
    GlobalidecedulaEditar=idcedula;
    document.getElementById("actualizarCedula").style.display = "initial";
    document.getElementById("agregarCedula").style.display = "none";
    // Usar ajax para mandar datos a la base de datos
    $.ajax({
        url: BASE_URL+'Cedula/obtener_unacedula/'+idcedula,
        async: false,
        type: "POST",
        dataType: 'json',
        success: function (data) { // success callback
            // alert(JSON.stringify(data));
            // alert("informacion cargada de la cedula correctamente lista para editar");
            $('#calculos').modal('show');
            $('#NuevaCedula').modal('show');

            document.getElementById("idfinca").value=data[0];
            $("#iddescripcion option").each(function () {
                if ($(this).html() == data[1]) {
                    $(this).attr("selected", "selected");return;}
            });
            document.getElementById("idsemanaaplicacion").value=data[2];document.getElementById("idfechaprogramada").value=data[3];
            document.getElementById("idlitros").value=data[4];document.getElementById("idpresion").value=data[5];
            document.getElementById("idvelocidad").value=data[6];document.getElementById("idr_p_m").value=data[7];
            document.getElementById("idmarcha").value=data[8];document.getElementById("idboquilla").value=data[9];
            document.getElementById("idcultivonombrecientifico").value=data[10];document.getElementById("idvariedadcultivo").value=data[11];
            document.getElementById("idlote").value=data[12];document.getElementById("idbloque").value=data[13];
            document.getElementById("idestadio").value=data[14];document.getElementById("idsemanasiembra").value=data[15];
            document.getElementById("idareabloque").value=data[16];document.getElementById("idareaproyecto").value=data[17];
            document.getElementById("idnumerocamas").value=data[18];document.getElementById("idanchocamas").value=data[19];
            document.getElementById("idlongitudparcelas").value=data[20];document.getElementById("idnumeroparcelas").value=data[21];
            document.getElementById("idnumeroreplicas").value=data[22];document.getElementById("idvolumenaplicacion").value=data[23];
            $("#idmodoaplicacion option").each(function () {
                if ($(this).html() == data[24]) {
                    $(this).attr("selected", "selected");return;}
            });
            $("#idmetodoaplicacion option").each(function () {
                if ($(this).html() == data[25]) {
                    $(this).attr("selected", "selected");return;}
            });
            
            document.getElementById("idnumeroreplica").value = document.getElementById("idnumeroparcelas").value;
            document.getElementById("idvolaplicacion").value = document.getElementById("idvolumenaplicacion").value;
            //calcular();
        },
        error: function (data) {
             alert(JSON.stringify(data));
        }
    });
}

$('#actualizarCedula').click(function () {
    var finca = document.getElementById("idfinca");
    var fincaid = finca.options[finca.selectedIndex].value;
    var descripcionindex = document.getElementById("iddescripcion");
    var idmodoaplicacionindex = document.getElementById("idmodoaplicacion");
    var idmetodoaplicacionindex = document.getElementById("idmetodoaplicacion");

    var id_cedula = GlobalidecedulaEditar;
    //var numero_proyecto = document.getElementById("nnumero").value;
    var id_finca = fincaid;
    var descripcion_aplicacion = descripcionindex.options[descripcionindex.selectedIndex].text;

    var semana_aplicacion = document.getElementById("idsemanaaplicacion").value;
    if(semana_aplicacion==''){document.getElementById("idsemanaaplicacion").style.border = "thin dotted red";return;}else{document.getElementById("idsemanaaplicacion").style.border="";}
    
    var fecha_programada = document.getElementById("idfechaprogramada").value;
    if(fecha_programada==''){document.getElementById("idfechaprogramada").style.border = "thin dotted red";return;}else{document.getElementById("idfechaprogramada").style.border="";}
    
    var litros = document.getElementById("idlitros").value;
    if(litros==''){document.getElementById("idlitros").style.border = "thin dotted red";return;}else{document.getElementById("idlitros").style.border="";}
    
    var presion = document.getElementById("idpresion").value;
    if(presion==''){document.getElementById("idpresion").style.border = "thin dotted red";return;}else{document.getElementById("idpresion").style.border="";}
    
    var velocidad = document.getElementById("idvelocidad").value;
    if(velocidad==''){document.getElementById("idvelocidad").style.border = "thin dotted red";return;}else{document.getElementById("idvelocidad").style.border="";}
    
    var rpm = document.getElementById("idr_p_m").value;
    if(rpm==''){document.getElementById("idr_p_m").style.border = "thin dotted red";return;}else{document.getElementById("idr_p_m").style.border="";}
    
    var marcha = document.getElementById("idmarcha").value;
    if(marcha==''){document.getElementById("idmarcha").style.border = "thin dotted red";return;}else{document.getElementById("idmarcha").style.border="";}
    
    var tipo_boquilla = document.getElementById("idboquilla").value;
    if(tipo_boquilla==''){document.getElementById("idboquilla").style.border = "thin dotted red";return;}else{document.getElementById("idboquilla").style.border="";}
    
    var cultivo = document.getElementById("idcultivonombrecientifico").value;
    if(cultivo==''){document.getElementById("idcultivonombrecientifico").style.border = "thin dotted red";return;}else{document.getElementById("idcultivonombrecientifico").style.border="";}
    
    var variedad = document.getElementById("idvariedadcultivo").value;
    if(variedad==''){document.getElementById("idvariedadcultivo").style.border = "thin dotted red";return;}else{document.getElementById("idvariedadcultivo").style.border="";}
    
    var lote = document.getElementById("idlote").value;
    if(lote==''){document.getElementById("idlote").style.border = "thin dotted red";return;}else{document.getElementById("idlote").style.border="";}
    
    var bloque = document.getElementById("idbloque").value;
    if(bloque==''){document.getElementById("idbloque").style.border = "thin dotted red";return;}else{document.getElementById("idbloque").style.border="";}
    
    var estadio = document.getElementById("idestadio").value;
    if(estadio==''){document.getElementById("idestadio").style.border = "thin dotted red";return;}else{document.getElementById("idestadio").style.border="";}
    
    var semana_siembra = document.getElementById("idsemanasiembra").value;
    if(semana_siembra==''){document.getElementById("idsemanasiembra").style.border = "thin dotted red";return;}else{document.getElementById("idsemanasiembra").style.border="";}
    
    var area_bloque = document.getElementById("idareabloque").value;
    if(area_bloque==''){document.getElementById("idareabloque").style.border = "thin dotted red";return;}else{document.getElementById("idareabloque").style.border="";}
    
    var area_proyecto = document.getElementById("idareaproyecto").value;
    if(area_proyecto==''){document.getElementById("idareaproyecto").style.border = "thin dotted red";return;}else{document.getElementById("idareaproyecto").style.border="";}
    
    var cantidad_camas = document.getElementById("idnumerocamas").value;
    if(cantidad_camas==''){document.getElementById("idnumerocamas").style.border = "thin dotted red";return;}else{document.getElementById("idnumerocamas").style.border="";}
    
    var ancho_camas = document.getElementById("idanchocamas").value;
    if(ancho_camas==''){document.getElementById("idanchocamas").style.border = "thin dotted red";return;}else{document.getElementById("idanchocamas").style.border="";}
    
    var longitud_parcelas = document.getElementById("idlongitudparcelas").value;
    if(longitud_parcelas==''){document.getElementById("idlongitudparcelas").style.border = "thin dotted red";return;}else{document.getElementById("idlongitudparcelas").style.border="";}
    
    var cantidad_parcelas = document.getElementById("idnumeroparcelas").value;
    if(cantidad_parcelas==''){document.getElementById("idnumeroparcelas").style.border = "thin dotted red";return;}else{document.getElementById("idnumeroparcelas").style.border="";}
    
    var cantidad_replicas = document.getElementById("idnumeroreplicas").value;
    if(cantidad_replicas==''){document.getElementById("idnumeroreplicas").style.border = "thin dotted red";return;}else{document.getElementById("idnumeroreplicas").style.border="";}
    
    var volumen_aplicacion = document.getElementById("idvolumenaplicacion").value;
    if(volumen_aplicacion==''){document.getElementById("idvolumenaplicacion").style.border = "thin dotted red";return;}else{document.getElementById("idvolumenaplicacion").style.border="";}
    
    var modo_aplicacion = idmodoaplicacionindex.options[idmodoaplicacionindex.selectedIndex].text;
    var metodo_aplicacion = idmetodoaplicacionindex.options[idmetodoaplicacionindex.selectedIndex].text;
    
    // Usar ajax para mandar datos a la base de datos
    $.ajax({
        url: BASE_URL+'Cedula/Actualizar_cedula',
        async: false,
        type: "POST",
        data: {_id_cedula:id_cedula,_numero_proyecto:numero_proyecto,_id_finca:id_finca,_descripcion_aplicacion:descripcion_aplicacion,
                         _semana_aplicacion:semana_aplicacion,_fecha_programada:fecha_programada,_litros:litros,
                         _presion:presion,_velocidad:velocidad,_rpm:rpm,_marcha:marcha,_tipo_boquilla:tipo_boquilla,_cultivo:cultivo,
                         _variedad:variedad,_lote:lote,_bloque:bloque,_estadio:estadio,_semana_siembra:semana_siembra,_area_bloque:area_bloque,
                         _area_proyecto:area_proyecto,_cantidad_camas:cantidad_camas,_ancho_camas:ancho_camas,
                         _longitud_parcelas:longitud_parcelas,_cantidad_parcelas:cantidad_parcelas,_cantidad_replicas:cantidad_replicas,
                         _volumen_aplicacion:volumen_aplicacion,_modo_aplicacion:modo_aplicacion,_metodo_aplicacion:metodo_aplicacion},
        dataType: 'json',
        success: function (msg) { // success callback
            //alert(JSON.stringify(msg));
            alert("Cedula Actualizada");
            $('#calculos').modal('hide');
            $('#NuevaCedula').modal('hide');
            CargarTratamientos();
        },
        error: function (msg) {
             alert(JSON.stringify(msg));
        }
    });

});
function eliminarCedula(idcedula,id_tratamiento,numero){
    $.ajax({ // ajax para consultar las cedulas del tratamiento seleccionado
        url: BASE_URL+'Cedula/eliminar_cedula/'+idcedula, // se manda solo con el id no ocupa mas datos
        async: false,
        type: "POST",
        dataType: 'json',
        success: function(data) {
           alert("cedula eliminada");
           CargarCedulasDelTratamiento(id_tratamiento,numero);
           CargarTratamientos();
        },
        error: function(data) {
            alert('Error al eliminar la cedulas del tratamiento');
            alert(JSON.stringify(data));
        }
    });   
}


function actualizarDosis(semana_aplicacion){
    var listadosis = [];
    var table = document.getElementById("idtablanuevosproductos");
    for (var i = 1, row; row = table.rows[i]; i++) {
        var valorDosis = table.rows[i].cells[2].childNodes[0].value;
        var id_infotratamiento = table.rows[i].cells[2].childNodes[0].id;
        var x = {
            'id_info': id_infotratamiento,
            'valordosis': valorDosis,
            'semana_aplicacion':semana_aplicacion,
        }
        listadosis.push(x);
    }
        $.ajax({ // ajax para consultar las cedulas del tratamiento seleccionado
        url: BASE_URL+'Tratamiento/actualizarDosis', // se manda solo con el id no ocupa mas datos
        async: false,
        type: "POST",
        data: {_listadosis:listadosis},
        dataType: 'json',
        success: function(data) {
           alert("dosis actualizados");
           
        },
        error: function(data) {
            alert('dosis NO actualizados');
            alert(JSON.stringify(data));
        }
    });  
}

function actualizarTablaDosis(){
    var table = document.getElementById("idtablanuevosproductos");
    for (var i = 1, row; row = table.rows[i]; i++) {
        var valorDosis = table.rows[i].cells[2].childNodes[0].value;
        var id_infotratamiento = table.rows[i].cells[2].childNodes[0].id;
        alert(valorDosis);
        var x = {
            'id_info': id_infotratamiento,
            'valordosis': valorDosis,
        }
        
    }
}

var idTratamientogeneral="";//Cuando los productos ya existen en la bd
var idtratamientoapredeterminar = "";

function CargarProductosDelTratamientoSinId(idTratamientogeneral,tipo) {
    //$('#idpredeterminadoNuevo').prop('checked', false);
    //idTratamientogeneral=idGenerakTratamiento;
    tipoCedulaGlobal = tipo;
    var TableProductos = document.getElementById("idtablanuevosproductos");
    var filas = TableProductos.rows.length;
    for (var x=filas-1; x>0; x--) {
       TableProductos.deleteRow(x);
    }
    // Ahora se debe cargar la informacion del tratamiento que involucra todos los productos y sus respectivas medidas
    $.ajax({ // ajax para consultar algunos datos del producto seleccionado
        url: BASE_URL+'Tratamiento/obtener_informaciontratamiento/'+idTratamientogeneral, // se manda solo con el id no ocupa mas datos
        async: false,
        type: "POST",
        dataType: 'json',
        success: function(data) {
            for (var i = 0; i <= data.length - 1; i++) {
                var producto = data[i][0];
                var activo = data[i][1]; // Este se saca del id del producto
                var unidad = data[i][2]; // Este se saca del id del producto
                var idProduct = data[i][3]
                var dosis = data[i][4];
                var secado = data[i][5];
                var cosecha = data[i][6];
                var pncomun = data[i][7];
                var pncientifico = data[i][8];
                var idinformaciontratamiento = data[i][9];
                var tipoCedula = data[i][11];
                //alert(tipoCedulaGlobal);
                //if(tipoCedula==tipoCedulaGlobal){// solo se muestran las cedulas pc-a
                $('#idtablanuevosproductos tr:last').after('<tr class="default">'+
                                    '<th style="font-weight: normal;">'+producto+'</th>'+
                                    '<th style="font-weight: normal;">'+activo+'</th>'+
                                    '<th style="font-weight: normal;"><input class="form-control" id="'+idinformaciontratamiento+'" value="'+dosis+'"></th>'+
                                    '<th style="font-weight: normal;">'+unidad+'</th>'+
                                '</tr>');
               //}
            };
            
            //alert(document.getElementById("idtablanuevosproductos").rows.length);
        },
        error: function(data) {
            alert(JSON.stringify(data));
        }
    });

}

var idinformaciontratamientoGeneralAeditar = "";



$('#cerrarcedula').click(function () {
    $('#calculos').modal('hide');
});

$('#idpredeterminado').click(function () {
    if ($('#idpredeterminado').is(":checked"))
    {
      alert('Se establecerá este tratamiento como predeterminado');
    }
    else{
        alert('El tratamiento no será predeterminado');
    }
});
var fila = 0;
var numerico = 0;

$('#modalAgregarProducto').click(function () { // limpiar la tabla de productos al crear el modal
    var TableProductos = document.getElementById("idproductos");
    var filas = TableProductos.rows.length;
    for (var x=filas-1; x>0; x--) {
       TableProductos.deleteRow(x);
    }
});

$('#modalAgregarProducto').click(function () { // limpiar la tabla de productos al crear el modal
    var TableProductos = document.getElementById("idproductos");
    var filas = TableProductos.rows.length;
    for (var x=filas-1; x>0; x--) {
       TableProductos.deleteRow(x);
    }
});



function cargarProducto(idProducto){
    $.ajax({
        url: BASE_URL+'Product/get_producto/'+idProducto,
        async: false,
        type: "POST",
        dataType: 'json',
        success: function (msg) { // success callback
            document.getElementById("idPro").value = msg[0];
            document.getElementById("nameproductoedit").value = msg[1];
            document.getElementById("activeproductoedit").value = msg[2];
            document.getElementById("unitproductoedit").value = msg[3];
            $('#actualizarProducto').modal('show');
        },
        error: function (msg) {
            alert(JSON.stringify(msg));
            alert("No cargado producto");
        }
    });
}

$("#actualizarP").click(function(){
    alert(document.getElementById("idPro").value);
});



function editarP(idP,n_p){
    document.getElementById("idproy").value = idP;
    document.getElementById("proyecton").value = n_p;
}


//Refrescar pagina de proyectos lista

function Close()
{
    dosis_product=[];
    ClearTable();
}
