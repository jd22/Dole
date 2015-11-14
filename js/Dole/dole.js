$(document).ready(function () {
    var numeroProyecto = document.getElementById("nnumero").value;


    if(numeroProyecto!=""){
        document.getElementById("nnumero").disabled = "true";
        document.getElementById("infoTratamientos").style.display = "initial";
        var numeroProyecto = document.getElementById("nnumero").value;
        // var tablaTratamientos = $('#Trataments').DataTable({  
        //                 "aoColumns" : [
        //                     {  },
        //                     {  },
        //                     { "sClass": "center" },
        //                 ]  
        //             });
        var tablaTratamientos = $('#Trataments').DataTable({  
                        "bRetrieve": true,
                        "aoColumns" : [
                            { "sClass": "center" },
                            { "sClass": "center"  },
                            { "sClass": "center"  },
                            { "sClass": "center"  },
                        ] 
                    });
        //tablaTratamientos.fnClearTable();
        $.ajax({
            url: BASE_URL+'Proyecto/CargarTratamientos/'+numeroProyecto,
            async: false,
            type: "POST",
            // data: {_numeroProyecto: numeroProyecto},
            dataType: 'json',
            success: function (msg) { // success callback
                document.getElementById("numProyecto").innerHTML="Proyecto Nº: "+numeroProyecto;
                for (var i = 0; msg.length-1 >= i; i++) {
                    tablaTratamientos.fnAddData([
                        '<a style="font-size:12px;color:#282892;" href="#"" onclick="CargarProductosDelTratamiento('+(msg[i][0])+')" data-toggle="modal" data-target="#listanuevosProductos"  data-toggle="tooltip" data-placement="bottom" title="Click para ver Detalles">'+'Tratamiento '+(i+1)+'</a>',
                        '<a style="font-size:12px;" href="#" onclick="CargarCedulasDelTratamiento('+(msg[i][0])+','+(i+1)+')" data-toggle="modal" data-target="#listaCedulas  "data-toggle="tooltip" data-placement="bottom" title="Click para ver la lista de cedulas">'+(msg[i][1])+' Cedulas de Aplicacion</a>',
                        //'<a style="font-size:12px; float:right; color:#1A8C1A" href="#" onclick="CargarIdTratamiento('+(msg[i][0])+','+i+')" data-toggle="modal">Agregar Cedula</a>',
                        '<a style="color:green;font-size:12px;" href="#" onclick="mostrarImagen('+(msg[i][0])+')" data-toggle="modal" data-target="#agregaImagen"  data-toggle="tooltip" data-placement="bottom" title="Click para ver Detalles">Agregar Mapa</a>',
                        '<a style="color:red;font-size:12px;" href="#" onclick="eliminarTodoTratamiento('+(msg[i][0])+')">Eliminar</a>',
                    ]);
                    // $('#Trataments tr:last').after('<tr class="default">'+
                    //                                     '<th style="font-weight: normal;">'+'<a href="" data-toggle="modal" data-target="#listanuevosProductos" onclick="CargarProductosDelTratamiento('+(msg[i][0])+')" data-toggle="tooltip" data-placement="bottom" title="Click para ver Detalles">'+'Tratamiento '+(i+1)+'</a>'+'</th>'+
                    //                                     '<th style="font-weight: normal;">'+'<a href="" onclick="CargarCedulasDelTratamiento('+(msg[i][0])+')" data-toggle="modal" data-target="#listaCedulas  "data-toggle="tooltip" data-placement="bottom" title="Click para ver la lista de cedulas">'+(msg[i][1])+' Cedulas de Aplicacion</a>'+
                    //                                     '<a href="" style="color:green;float: right;" onclick="CargarIdTratamiento('+(msg[i][0])+','+i+')" data-toggle="modal">Agregar Cedula</a>'+
                    //                                     '<th style="font-weight: normal;text-align: center;">'
                    //                                     +'<a style="color:red" data-toggle="modal" onclick="eliminarTratamiento(this,'+(msg[i][0])+')">Eliminar</a>'
                    //                                     +'</th>'+
                    //                                 '</tr>');
                };
            },
            error: function (msg) {
                alert("Error al Cargar informacion de tratamientos inicio pagina");
            }
        });
        
    }
});

var BASE_URL = location.protocol + "//" + location.hostname + '/Dole/';
//Datos para iniciar el datepicker en la fecha de hoy
var d = new Date();
var fechaInicial = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
$('#idfechaprogramada').daterangepicker({
    singleDatePicker: true,
    format: 'YYYY-MM-DD',
    startDate: fechaInicial
});

function mostrarImagen(idTrata){
    document.getElementById("idTrata").value  = idTrata;    
}

function guardaImagen() {
    alert(document.getElementById("idTrata"));
    alert(document.getElementById("filena"));
}




$('#idfechaprogramada').change(function () {
  //do something, like clearing an input
  alert();
});

function eliminarTodoTratamiento(idtratamiento){
    $.ajax({
        url: BASE_URL+'Tratamiento/eliminar_todoeltratamiento/'+idtratamiento,
        async: false,
        type: "POST",
        dataType: 'json',
        success: function (msg) { // success callback
            //alert(JSON.stringify(msg));
            CargarTratamientos();
        },
        error: function (msg) {
             alert("error al eliminar eliminarTodoTratamiento.stringify(msg)");
        }
    });

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



$('#agregarCedula').click(function () {
    var finca = document.getElementById("idfinca");
    var fincaid = finca.options[finca.selectedIndex].value;
    var descripcionindex = document.getElementById("iddescripcion");
    var idmodoaplicacionindex = document.getElementById("idmodoaplicacion");
    var idmetodoaplicacionindex = document.getElementById("idmetodoaplicacion");

    var id_tratamiento = idGenerakTratamiento;
    var numero_proyecto = document.getElementById("nnumero").value;
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
        url: BASE_URL+'Cedula/Agregar_cedula',
        async: false,
        type: "POST",
        data: {_id_tratamiento:id_tratamiento,_numero_proyecto:numero_proyecto,_id_finca:id_finca,_descripcion_aplicacion:descripcion_aplicacion,
                         _semana_aplicacion:semana_aplicacion,_fecha_programada:fecha_programada,_litros:litros,
                         _presion:presion,_velocidad:velocidad,_rpm:rpm,_marcha:marcha,_tipo_boquilla:tipo_boquilla,_cultivo:cultivo,
                         _variedad:variedad,_lote:lote,_bloque:bloque,_estadio:estadio,_semana_siembra:semana_siembra,_area_bloque:area_bloque,
                         _area_proyecto:area_proyecto,_cantidad_camas:cantidad_camas,_ancho_camas:ancho_camas,
                         _longitud_parcelas:longitud_parcelas,_cantidad_parcelas:cantidad_parcelas,_cantidad_replicas:cantidad_replicas,
                         _volumen_aplicacion:volumen_aplicacion,_modo_aplicacion:modo_aplicacion,_metodo_aplicacion:metodo_aplicacion},
        dataType: 'json',
        success: function (msg) { // success callback
            //alert(JSON.stringify(msg));
            alert("Nueva Cedula Agregada al Tratamiento");
            $('#calculos').modal('hide');
            $('#NuevaCedula').modal('hide');
            CargarTratamientos();
            listaInformacionTratamientos = [];
            
        },
        error: function (msg) {
             alert(JSON.stringify(msg));
        }
    });

});



$('#crearTratamiento').click(function () {
    var predeterminado = 0;//Quiere deceir que el tratamiento no es predeterminado
    if ($('#idpredeterminado').is(":checked"))
    {
        predeterminado = 1;
    }
    $('#Trataments').DataTable().fnDestroy();
    var tablaTratamientos = $('#Trataments').DataTable({  
                        "aoColumns" : [
                            {  },
                            {  },
                            { "sClass": "center" },
                            { "sClass": "center" },
                        ] 
                    });
    tablaTratamientos.fnClearTable();
    var numeroProyecto = document.getElementById("nnumero").value;
    var _url = BASE_URL+'Proyecto/CrearTratamiento';
    $.ajax({
        url: _url,
        async: true,
        type: "POST",
        data: {_numeroProyecto: numeroProyecto,_linfoTratamientos:listaInformacionTratamientos,_predeterminado:predeterminado},
        dataType: 'json',
        success: function (msg) { // success callback
            alert(JSON.stringify(msg));
            CargarTratamientos();
            listaInformacionTratamientos = [];
            
        },
        error: function (msg) {
            alert("Error al Crear tratamiento informacion");
        }
    });
});



var idGenerakTratamiento="";
function CargarIdTratamiento(id,numerotratamiento){
    document.getElementById("actualizarCedula").style.display = "none";
    document.getElementById("agregarCedula").style.display = "initial";
    $('#calculos').modal('show');
    $('#NuevaCedula').modal('show');
    idGenerakTratamiento=id;
}

function CargarTratamientos() { // Esto es para la parte visual de la tabla principal tratamientos
    //$('#Trataments').DataTable().fnDestroy();
    // var tablaTratamientos = $('#Trataments').DataTable({                          
    //                     "aoColumns" : [
    //                         {  },
    //                         {  },
    //                         { "sClass": "center" },
    //                     ] 
    //                 });
    // tablaTratamientos.fnClearTable();

    var tablaTratamientos = $('#Trataments').DataTable({  
                        "bRetrieve": true,
                        "aoColumns" : [
                            {  "sClass": "center" },
                            { "sClass": "center"  },
                            { "sClass": "center"  },
                            { "sClass": "center"  },
                        ] 
                    });
    tablaTratamientos.fnClearTable();
    var numeroProyecto = document.getElementById("nnumero").value;
    $.ajax({
        url: BASE_URL+'Proyecto/CargarTratamientos/'+numeroProyecto,
        async: false,
        type: "POST",
        // data: {_numeroProyecto: numeroProyecto},
        dataType: 'json',
        success: function (msg) { // success callback
            document.getElementById("numProyecto").innerHTML="Proyecto Nº: "+numeroProyecto;
            for (var i = 0; msg.length-1 >= i; i++) {
                tablaTratamientos.fnAddData([
                        '<a style="font-size:12px;color:#282892;" href="#" onclick="CargarProductosDelTratamiento('+(msg[i][0])+')" data-toggle="modal" data-target="#listanuevosProductos"  data-toggle="tooltip" data-placement="bottom" title="Click para ver Detalles">'+'Tratamiento '+(i+1)+'</a>',
                        '<a style="font-size:12px;" href="#" onclick="CargarCedulasDelTratamiento('+(msg[i][0])+','+(i+1)+')" data-toggle="modal" data-target="#listaCedulas  "data-toggle="tooltip" data-placement="bottom" title="Click para ver la lista de cedulas">'+(msg[i][1])+' Cedulas de Aplicacion</a>',
                        //'<a style="font-size:12px; float:right; color:#1A8C1A" href="#" onclick="CargarIdTratamiento('+(msg[i][0])+','+i+')" data-toggle="modal">Agregar Cedula</a>',
                        '<a style="color:green;font-size:12px;" href="#" onclick="mostrarImagen('+(msg[i][0])+')" data-toggle="modal" data-target="#agregaImagen"  data-toggle="tooltip" data-placement="bottom" title="Click para ver Detalles">Agregar Mapa</a>',
                        '<a style="color:red;font-size:12px;" href="#" onclick="eliminarTodoTratamiento('+(msg[i][0])+')">Eliminar</a>',
                    ]);
            };
        },
        error: function (msg) {
            alert(JSON.stringify(msg));
            alert("Error al Cargar informacion de tratamientos desde la funcion");
        }
    });
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

function CargarCedulasDelTratamiento(id_tratamiento,numero) { // cargar cedula del tratamiento existente con el id del tratamiento
    
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
        url: BASE_URL+'Cedula/obtener_cedulas/'+id_tratamiento, // se manda solo con el id no ocupa mas datos
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
                    '<a href="'+BASE_URL+'Cedula/generar_pdf/'+idcedula+'/'+numero+'" data-toggle="tooltip" data-toggle="tooltip" title="Descargar Documento"><img src="'+BASE_URL+'images/pdfdocumento.png"></a>'
                ]);
            };
            document.getElementById("idtra").innerHTML= "Tratamiento: " +numero;
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
            calcular();
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
    var numero_proyecto = document.getElementById("nnumero").value;
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

var idTratamientogeneral=""
;//Cuando los productos ya existen en la bd

var idtratamientoapredeterminar = "";

function CargarProductosDelTratamiento(id_tratamiento) {
    $('#idpredeterminadoNuevo').prop('checked', false);
    idTratamientogeneral=id_tratamiento;
    var TableProductos = document.getElementById("idtablanuevosproductos");
    var filas = TableProductos.rows.length;
    for (var x=filas-1; x>0; x--) {
       TableProductos.deleteRow(x);
    }
    idtratamientoapredeterminar=id_tratamiento;
    // Ahora se debe cargar la informacion del tratamiento que involucra todos los productos y sus respectivas medidas
    $.ajax({ // ajax para consultar algunos datos del producto seleccionado
        url: BASE_URL+'Tratamiento/obtener_informaciontratamiento/'+id_tratamiento, // se manda solo con el id no ocupa mas datos
        async: false,
        type: "POST",
        dataType: 'json',
        success: function(data) {
            for (var i = 0; i <= data.length - 1; i++) {
                if (data[i][10]==1){ // checar si es prederterminado o no el tratamiento
                     $('#idpredeterminadoNuevo').prop('checked', true);
                }
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
                //alert(tipoCedula);
               //if(tipoCedula == 'GENERAL'){// solo se muestran las cedulas pc-a
                    $('#idtablanuevosproductos tr:last').after('<tr class="default" id="'+idinformaciontratamiento+'">'+
                                    '<th style="font-weight: normal;">'+producto+'</th>'+
                                    '<th style="font-weight: normal;">'+activo+'</th>'+
                                    //'<th style="font-weight: normal;">'+dosis+'</th>'+
                                    '<th style="font-weight: normal;">'+unidad+'</th>'+
                                    '<th style="font-weight: normal;">'+secado+'</th>'+
                                    '<th style="font-weight: normal;">'+cosecha+'</th>'+
                                    '<th style="font-weight: normal;text-align: center;">'
                                    +'<a href="#" data-toggle="modal" onclick="eliminarProductoGuardado('+idinformaciontratamiento+','+id_tratamiento+')">Eliminar</a>'+'|'
                                    +'<a href="#" data-toggle="modal" data-target="#EditProductNuevo" onclick="editarProductoGuardado('+idinformaciontratamiento+','+id_tratamiento+','+idProduct+')">Editar</a>'
                                    +'</th>'+
                                '</tr>');
                //}
            };
        },
        error: function(data) {
            alert(JSON.stringify(data));
        }
    });

}
var idinformaciontratamientoGeneralAeditar = "";
function editarProductoGuardado(idinformaciontratamiento,id_tratamiento,idProduct)// Esto solo carga la informacion del producto
{
    document.getElementById('editselectproducts').value = idProduct; // poner el dropdown en el produc seleccionado
     $.ajax({ // ajax para consultar algunos datos del producto seleccionado
        url: BASE_URL+'Tratamiento/obtener_uninformaciontratamiento/'+idinformaciontratamiento, // se manda solo con el id no ocupa mas datos
        async: false,
        type: "POST",
        dataType: 'json',
        success: function(data) {
            for (var i = 0; i <= data.length - 1; i++) {
                var producto = data[i][0];
                var activo = data[i][1]; // Este se saca del id del producto
                var unidad = data[i][2]; // Este se saca del id del producto
                var idProduct = data[i][3];
                var dosis = data[i][4];
                var secado = data[i][5];
                var cosecha = data[i][6];
                var pncomun = data[i][7];
                var pncientifico = data[i][8];
                var idinformaciontratamiento = data[i][9];
                document.getElementById('editiddosis').value = dosis;
                document.getElementById('editidnombrecomun').value = pncomun;
                document.getElementById('editidnombrecientifico').value = pncientifico;
                document.getElementById('editidsecado').value = secado;
                document.getElementById('editidcosecha').value = cosecha;
                idinformaciontratamientoGeneralAeditar=idinformaciontratamiento;
            };
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error no carga editarProductoGuardado');
        }
    });
}


function eliminarProductoGuardado(idinformaciontratamiento,id_tratamiento)
{
    var _url = BASE_URL+'Tratamiento/eliminar_informaciontratamiento';
    $.ajax({
        url: _url,
        async: false,
        type: "POST",
        data: {_idinformaciontratamiento:idinformaciontratamiento,_id_tratamiento:id_tratamiento},
        dataType: 'json',
        success: function (msg) { // success callback
            CargarProductosDelTratamiento(id_tratamiento);
            CargarTratamientos();
        },
        error: function (msg) {
            alert("Error al eliminar el producto del tratamiento");
        }
    });
    
}


$('#idpredeterminadoNuevo').click(function () {
    if ($('#idpredeterminadoNuevo').is(":checked"))
    {
        $.ajax({ 
            url: BASE_URL+'Tratamiento/set_predeterminado/'+idtratamientoapredeterminar+'/'+'1', // id del tratamiento a despredeterminar
            async: false,
            type: "POST",
            dataType: 'json',
            success: function(data) {
                alert('Predeterminado');
            },
            error: function(data) {
                alert(JSON.stringify(data));
                }
        });
    }
    else{
        $.ajax({ 
            url: BASE_URL+'Tratamiento/set_predeterminado/'+idtratamientoapredeterminar+'/'+'0', // id del tratamiento a predeterminar
            async: false,
            type: "POST",
            dataType: 'json',
            success: function(data) {
                alert('Despredeterminado');
            },
            error: function(data) {
                alert(JSON.stringify(data));
            }
        });
        
    }
});

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
$('#agregarProducto').click(function () {
    
    var producto = document.getElementById("selectproducts");
    var productoid = producto.options[producto.selectedIndex].value;
    var productoselect = producto.options[producto.selectedIndex].text;
    var dosis = document.getElementById("iddosis").value;
    var ncomun = document.getElementById("idnombrecomun").value;
    var ncientifico = document.getElementById("idnombrecientifico").value;
    var secado = document.getElementById("idsecado").value;
    var cosecha = document.getElementById("idcosecha").value;
    var activo = ""; // Este se saca del id del producto
    var unidad = ""; // Este se saca del id del producto

    document.getElementById("iddosis").value = "";
    document.getElementById("idnombrecomun").value = "";
    document.getElementById("idnombrecientifico").value = "";
    document.getElementById("idsecado").value = "";
    document.getElementById("idcosecha").value = "";
    if(secado!="" && cosecha!=""){
        numerico = numerico+1;
        var infotratamiento = {// Contiene la estructura de la tabla de la la base de datos para mejor y mas facil manejo
              'numerico':numerico,
              'id_tratamiento': '',
              'id_producto': productoid,
              'dosis': dosis,
              'plaga_nombre_comun':ncomun,
              'plaga_nombre_cientifico':ncientifico,
              'secado':secado,
              'cosecha':cosecha,
              'tipoCedula':'GENERAL'
              };
        listaInformacionTratamientos.push(infotratamiento);
       
        
        $.ajax({ // ajax para consultar algunos datos del producto seleccionado
            url: BASE_URL+'Product/product/'+productoid, // se manda solo con el id no ocupa mas datos
            async: false,
            type: "POST",
            dataType: 'json',
            success: function(data) {
                if (data!=false) 
                {
                    activo = data[0][0];
                    unidad = data[0][1];
                    $('#idproductos tr:last').after('<tr class="default" id="'+numerico+'">'+
                                        '<th style="font-weight: normal;">'+productoselect+'</th>'+
                                        '<th style="font-weight: normal;">'+activo+'</th>'+
                                        // '<th style="font-weight: normal;">'+dosis+'</th>'+
                                        '<th style="font-weight: normal;">'+unidad+'</th>'+
                                        '<th style="font-weight: normal;">'+secado+'</th>'+
                                        '<th style="font-weight: normal;">'+cosecha+'</th>'+
                                        '<th style="font-weight: normal;">'
                                        +'<a href="#" data-toggle="modal"  onclick="eliminarProductoTemporal('+numerico+')">Eliminar</a>'
                                        +'</th>'+
                                    '</tr>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        });
        fila++;
    }
    else{
        alert('CAmpos obligatorios están vacíos');
    }
});

$('#modalAgregarProducto').click(function () { // limpiar la tabla de productos al crear el modal
    var TableProductos = document.getElementById("idproductos");
    var filas = TableProductos.rows.length;
    for (var x=filas-1; x>0; x--) {
       TableProductos.deleteRow(x);
    }
});

//Agregar un producto a un tratamiento existente
$('#agregarProductoNuevo').click(function () {
    //idTratamientogeneral
    
    var TableProductos = document.getElementById("idtablanuevosproductos");
    var filas = TableProductos.rows.length;
    for (var x=filas-1; x>0; x--) {
       TableProductos.deleteRow(x);
    }
    var producto = document.getElementById("selectproductsnuevo");
    var idTratamientogeneralaux = idTratamientogeneral;
    var productoid = producto.options[producto.selectedIndex].value;

    var dosis = document.getElementById("iddosisnuevo").value;
    var ncomun = document.getElementById("idnombrecomunnuevo").value;
    var ncientifico = document.getElementById("idnombrecientificonuevo").value;
    var secado = document.getElementById("idsecadonuevo").value;
    var cosecha = document.getElementById("idcosechanuevo").value;
    var tipoCedula = 'GENERAL';
    $.ajax({ // ajax para consultar algunos datos del producto seleccionado
        url: BASE_URL+'Proyecto/AgregarProductoATratamientoExistente',
        async: false,
        type: "POST",
        data: {_idTratamientogeneral:idTratamientogeneralaux,_productoid:productoid,_dosis:dosis,_ncomun:ncomun,_ncientifico:ncientifico,
                _secado:secado,_cosecha:cosecha,_tipoCedula:tipoCedula},
        dataType: 'json',
        success: function(data) {
            CargarProductosDelTratamiento(idTratamientogeneralaux);// Para refrescar la lista de productos del tratamiento
        },
        error: function(data) {
            alert(JSON.stringify(data));
            alert('Error al agregar el producto nuevo al tratamiento');
        }
    });
});



function eliminarProductoTemporal(numerico)
{
    var row = document.getElementById(numerico);
    row.parentNode.removeChild(row);
    for (var i = listaInformacionTratamientos.length - 1; i >= 0; i--) {
        if(listaInformacionTratamientos[i]['numerico'] === numerico) {
            listaInformacionTratamientos.splice(i, 1);
            break;
        }
    };
}


$('#editarProducto').click(function () {
    var idinformaciontratamiento =idinformaciontratamientoGeneralAeditar;
    var producto = document.getElementById("editselectproducts");
    var productoid = producto.options[producto.selectedIndex].value;

    var eddosis = document.getElementById("editiddosis").value;
    var edncomun = document.getElementById("editidnombrecomun").value;
    var edncientifico = document.getElementById("editidnombrecientifico").value;
    var edsecado = document.getElementById("editidsecado").value;
    var edcosecha = document.getElementById("editidcosecha").value;

    if(edsecado!="" && edcosecha !="" && edsecado>0 && edcosecha>0 && !isNaN(edsecado) && !isNaN(edcosecha)){
        var _url = BASE_URL+'Tratamiento/editar_producto_informaciontratamiento/'+idinformaciontratamientoGeneralAeditar;
        $.ajax({
            url: _url,
            async: false,
            type: "POST",
            data: {_productoid:productoid,_eddosis:eddosis,_edncomun:edncomun,_edncientifico:edncientifico,_edsecado:edsecado,_edcosecha:edcosecha},
            dataType: 'json',
            success: function (msg) { // success callback
                CargarProductosDelTratamiento(msg[0]);
            },
            error: function (msg) {
                alert("Error al editar el producto");
            }
        });
    }
    else{
        if(edsecado<0){
            alert("Secado no puede ser negativo");
        }
        else if(edcosecha<0){
            alert("Cosecha no puede ser negativo");
        }
        else if(isNaN(edsecado)){
            alert("Secado no puede ser letras");
        }
        else if(isNaN(edcosecha)){
            alert("Cosecha no puede ser letras");
        }
        else{
            alert("Campos obligatorios estan vacíos");
        }
        
    }
});

$('#modalAgregarProducto').click(function () { // limpiar la tabla de productos al crear el modal
    var TableProductos = document.getElementById("idproductos");
    var filas = TableProductos.rows.length;
    for (var x=filas-1; x>0; x--) {
       TableProductos.deleteRow(x);
    }
});


$('#agregarProyecto').click(function () {
    var nnumero = document.getElementById("nnumero").value;

    document.getElementById("numProyecto").innerHTML="Proyecto Nº: "+nnumero;
    if(nnumero != ''){
        var _url = BASE_URL+'Proyecto/CrearProyecto';
        $.ajax({
            url: _url,
            async: false,
            type: "POST",
            data: {_numero: nnumero,_fecha_creacion:fechaInicial},
            dataType: 'json',
            success: function (msg) { // success callback
                //alert("Proyecto agregado");
                document.getElementById("nnumero").disabled = "true";
                document.getElementById("infoTratamientos").style.display = "initial";
                document.getElementById("agregarProyecto").style.display = "none";
                CargarTratamientos();
            },
            error: function () {
                alert("El proyecto a agregar ya EXISTE!");
            }
        });
    }
    else {
        alert("Indique el número del proyecto");
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
function cargarTratamientosExistentes(){ // funcion que llena la tabla tablaTratamientoExistente. Carga los tratamientos existentes en la interfaz
    //$('#tablaTratamientoExistente').DataTable().fnClearTable();
    var tablaTratamientoExistente = $('#tablaTratamientoExistente').DataTable({  
                        "bRetrieve": true,
                        "aoColumns" : [
                            {  "sClass": "center" },
                            { "sClass": "center"  },
                            { "sClass": "left"  },
                            { "sClass": "center"  },
                            { "sClass": "center"  }
                        ] 
                    });
    tablaTratamientoExistente.fnClearTable();
    $.ajax({
        url: BASE_URL+'Proyecto/cargarTratamientosExistentes',
        async: false,
        type: "POST",
        //data: {_nombre: nproyecto, _numero: nnumero},
        dataType: 'json',
        success: function(data) {
            //alert(JSON.stringify(data));
            for (var i = 0; data.length-1 >= i; i++) {
                var nombreproductos = "";
                var listaP = data[i][2];
                for (var p = 0; listaP.length-1 >= p; p++) {
                    nombreproductos += '<label style="font-size: 12px;color: #26B12B;">'+ (p+1) +') '+listaP[p] +'</label><br>';
                };

                tablaTratamientoExistente.fnAddData( [
                    '<a  href="'+BASE_URL+'Proyecto/index/'+data[i][0]+'" style="font-size: 12px;color:#282892;">'+'Proyecto '+ (data[i][0]) +'</a>',
                    '<label style="font-size: 12px;">'+'Tratamiento '+ (data[i][1]) +'</label>',
                    nombreproductos,
                    '<label style="font-size: 12px;">'+'Cedulas del Tratamiento: '+ (data[i][3]) +'</label>',
                    '<a href="#" onclick="agregarTratamientoExistente('+(data[i][1])+','+0+')" style="font-size:12px;">Agregar a Proyecto Actual</a>'
                ]);
            };
        },
        error: function(data) {
            alert(JSON.stringify(data));
        }
    });

}

function agregarTratamientoExistente(idtratamientoExistente,predeterminado){ // Jala todos los datos del tratamiento existente y los agrega al proyecto actual. Cedulas... tratamientos ... informacion de tratamientos
    var numeroProyecto = document.getElementById("nnumero").value;
    $.ajax({
        url: BASE_URL+'Tratamiento/AgregartratamientoExistente/'+numeroProyecto+'/'+idtratamientoExistente+'/'+predeterminado,
        async: false,
        type: "POST",
        //data: {_nombre: nproyecto, _numero: nnumero},
        dataType: 'json',
        success: function(data) {
            alert("Tratamiento Existente Agregado al proyecto actual");
            CargarTratamientos();
        },
        error: function(data) {
            alert("NO se pudo agregar el Tratamiento Existente Agregado al proyecto actual");
            // alert(JSON.stringify(data));
        }
    });
}


function editarP(idP,n_p){
    document.getElementById("idproy").value = idP;
    document.getElementById("proyecton").value = n_p;
}

function actualizar_Proyecto(){
    var numero_p = document.getElementById("proyecton").value;
    var idProy = document.getElementById("idproy").value;
    if(numero_p != "" && idProy != ""){
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
    else{
        alert("No se pueden dejar campos vacíos");
    }
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


function Close()
{
    dosis_product=[];
    ClearTable();
}

// Realiza todos los calculos para la cedula
function calcular(){
    document.getElementById("idareabuffer").value =  document.getElementById("idareabloque").value-document.getElementById("idareaproyecto").value;
    document.getElementById("idcapacidadtanque").value = 200*3.785;
    var idncames =document.getElementById("idnumerocamas").value;
    var idacamas=document.getElementById("idanchocamas").value;
    var idlparcelas=document.getElementById("idlongitudparcelas").value;
    
    document.getElementById("idareaaplicacion").value = (idncames*idacamas*idlparcelas);

    var idareaap = document.getElementById("idareaaplicacion").value;
    var idnparcelas = document.getElementById("idnumeroparcelas").value;
    document.getElementById("idareacalculada").value = (idareaap*idnparcelas);


    var volaplicacion = document.getElementById("idvolaplicacion").value;
    var areaaplica = document.getElementById("idareaaplicacion").value;
    document.getElementById("idaguaporaplicacion").value = (volaplicacion/100000*areaaplica);

    document.getElementById("idtanquesrequeridos").value = document.getElementById("idaguaporaplicacion").value/document.getElementById("idcapacidadtanque").value;
    
    document.getElementById("idvolumentanque1").value =document.getElementById("idtanquesrequeridos").value;
}

$('#idareabloque').change(function(){
    calcular();
});
$('#idareaproyecto').change(function(){
    calcular();
});

$('#idnumerocamas').change(function(){
    calcular();
});
$('#idanchocamas').change(function(){
    calcular();
});
$('#idlongitudparcelas').change(function(){
    calcular();
});
$('#idnumeroparcelas').change(function(){
    document.getElementById("idnumeroreplica").value = document.getElementById("idnumeroparcelas").value;
    calcular();
});


$('#idvolumenaplicacion').change(function(){
    document.getElementById("idvolaplicacion").value = document.getElementById("idvolumenaplicacion").value;
    calcular();
});

$('#nuevoProducto').click(function () { // agregar solo productos
    var name = document.getElementById("nameproducto").value;
    var active = document.getElementById("activeproducto").value;
    var unit = document.getElementById("unitproducto").value;
    if(name != "" && active != "" && unit != ""){
        $.ajax({
            url: 'http://localhost/Dole/Product/insert_product',
            async: false,
            type: "POST",
            data: {_name: name,_active:active,_unit:unit},
            dataType: 'json',
            success: function (msg) { // success callback
                document.getElementById("nameproducto").value="";
                document.getElementById("activeproducto").value="";
                document.getElementById("unitproducto").value="";
                
            },
            error: function () {
                alert("Error al insertar el producto");
            }
        });
    }
    else{
        if(name == ""){
            alert("Nombre es obligatorio");
        }
        else if(active == ""){
            alert("Activo es obligatorio");
        }
        else if(unit == ""){
            alert("Unidad es obligatorio");
        }
    }
}); 
