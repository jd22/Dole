$(document).ready(function () {
    var numeroProyecto = document.getElementById("nnumero").value;
    
    if(numeroProyecto!=""){
        document.getElementById("nnumero").disabled = "true";
        document.getElementById("infoTratamientos").style.display = "initial";
        var numeroProyecto = document.getElementById("nnumero").value;
        var tablaTratamientos = $('#Trataments').DataTable({  
                        "aoColumns" : [
                            {  },
                            {  },
                            { "sClass": "center" },
                        ]  
                    });

        $.ajax({
            url: BASE_URL+'Proyecto/CargarTratamientos/'+numeroProyecto,
            async: false,
            type: "POST",
            // data: {_numeroProyecto: numeroProyecto},
            dataType: 'json',
            success: function (msg) { // success callback
                for (var i = 0; msg.length-1 >= i; i++) {
                    tablaTratamientos.fnAddData([
                        '<a style="font-size:12px;color:#282892;" href="#"" onclick="CargarProductosDelTratamiento('+(msg[i][0])+')" data-toggle="modal" data-target="#listanuevosProductos"  data-toggle="tooltip" data-placement="bottom" title="Click para ver Detalles">'+'Tratamiento '+(i+1)+'</a>',
                        '<a style="font-size:12px;" href="#" onclick="CargarCedulasDelTratamiento('+(msg[i][0])+')" data-toggle="modal" data-target="#listaCedulas  "data-toggle="tooltip" data-placement="bottom" title="Click para ver la lista de cedulas">'+(msg[i][1])+' Cedulas de Aplicacion</a>'+
                        '<a style="font-size:12px; float:right; color:#1A8C1A" href="#" onclick="CargarIdTratamiento('+(msg[i][0])+','+i+')" data-toggle="modal">Agregar Cedula</a>',
                        '<a style="color:red;font-size:12px;" href="#" onclick="eliminarTodoTratamiento('+(msg[i][0])+')">Eliminar</a>',
                    ]);
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
    var fecha_programada = document.getElementById("idfechaprogramada").value;
    var litros = document.getElementById("idlitros").value;
    var presion = document.getElementById("idpresion").value;
    var velocidad = document.getElementById("idvelocidad").value;
    var rpm = document.getElementById("idr_p_m").value;
    var marcha = document.getElementById("idmarcha").value;
    var tipo_boquilla = document.getElementById("idboquilla").value;
    var cultivo = document.getElementById("idcultivonombrecientifico").value;
    var variedad = document.getElementById("idvariedadcultivo").value;
    var lote = document.getElementById("idlote").value;
    var bloque = document.getElementById("idbloque").value;
    var estadio = document.getElementById("idestadio").value;
    var semana_siembra = document.getElementById("idsemanasiembra").value;
    var area_bloque = document.getElementById("idareabloque").value;
    var area_proyecto = document.getElementById("idareaproyecto").value;
    var cantidad_camas = document.getElementById("idnumerocamas").value;
    var ancho_camas = document.getElementById("idanchocamas").value;
    var longitud_parcelas = document.getElementById("idlongitudparcelas").value;
    var cantidad_parcelas = document.getElementById("idnumeroparcelas").value;
    var cantidad_replicas = document.getElementById("idnumeroreplicas").value;
    var volumen_aplicacion = document.getElementById("idvolumenaplicacion").value;
    var modo_aplicacion = idmodoaplicacionindex.options[idmodoaplicacionindex.selectedIndex].text;
    var metodo_aplicacion = idmetodoaplicacionindex.options[idmetodoaplicacionindex.selectedIndex].text;
    // Usar ajax para mandar datos a la base de datos
    $.ajax({
        url: 'http://localhost/Dole/Cedula/Agregar_cedula',
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
    $('#calculos').modal('show');
    $('#NuevaCedula').modal('show');
    idGenerakTratamiento=id;
}

function CargarTratamientos() { // Esto es para la parte visual de la tabla principal tratamientos
    $('#Trataments').DataTable().fnDestroy();
    var tablaTratamientos = $('#Trataments').DataTable({  
                        "aoColumns" : [
                            {  },
                            {  },
                            { "sClass": "center" },
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
            for (var i = 0; msg.length-1 >= i; i++) {
                tablaTratamientos.fnAddData([
                        '<a style="font-size:12px;color:#282892;" href="#" onclick="CargarProductosDelTratamiento('+(msg[i][0])+')" data-toggle="modal" data-target="#listanuevosProductos"  data-toggle="tooltip" data-placement="bottom" title="Click para ver Detalles">'+'Tratamiento '+(i+1)+'</a>',
                        '<a style="font-size:12px;" href="#" onclick="CargarCedulasDelTratamiento('+(msg[i][0])+')" data-toggle="modal" data-target="#listaCedulas  "data-toggle="tooltip" data-placement="bottom" title="Click para ver la lista de cedulas">'+(msg[i][1])+' Cedulas de Aplicacion</a>'+
                        '<a style="font-size:12px; float:right; color:#1A8C1A" href="#" onclick="CargarIdTratamiento('+(msg[i][0])+','+i+')" data-toggle="modal">Agregar Cedula</a>',
                        '<a style="color:red;font-size:12px;" href="#" onclick="eliminarTodoTratamiento('+(msg[i][0])+')">Eliminar</a>',
                    ]);
            //     $('#Trataments tr:last').after('<tr class="default">'+
            //                                         '<th style="font-weight: normal;">'+'<a href="#" data-toggle="modal" data-target="#listanuevosProductos" onclick="CargarProductosDelTratamiento('+(msg[i][0])+')" data-toggle="tooltip" data-placement="bottom" title="Click para ver Detalles">'+'Tratamiento '+(i+1)+'</a>'+'</th>'+
            //                                         '<th style="font-weight: normal;">'+'<a href="#" onclick="CargarCedulasDelTratamiento('+(msg[i][0])+')" data-toggle="modal" data-target="#listaCedulas  "data-toggle="tooltip" data-placement="bottom" title="Click para ver la lista de cedulas">'+(msg[i][1])+' Cedulas de Aplicacion</a>'+
            //                                         '<a href="#" style="color:green;float: right;" onclick="CargarIdTratamiento('+(msg[i][0])+','+i+')" data-toggle="modal">Agregar Cedula</a>'+
            //                                         '<th style="font-weight: normal;text-align: center;">'
            //                                         +'<a style="color:red" href="#" onclick="eliminarTodoTratamiento('+(msg[i][0])+')">Eliminar</a>'
            //                                         +'</th>'+
            //                                     '</tr>');
            };
        },
        error: function (msg) {
            alert(JSON.stringify(msg));
            alert("Error al Cargar informacion de tratamientos desde la funcion");
        }
    });
}


function CargarCedulasDelTratamiento (id_tratamiento) { // cargar cedula del tratamiento existente con el id del tratamiento
    
    $('#tablaCedulas').DataTable().fnClearTable();
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
                $('#tablaCedulas').dataTable().fnAddData( [
                    '<a href="#">'+'Cedula '+ (i+1) +'</a>',
                    '<a href="#">'+descripcion+'</a>',
                    '<a href="#">'+semana_aplicacion+'</a>',
                    '<a href="'+BASE_URL+'">Eliminar</a>|<a href="'+BASE_URL+'">Editar</a>',
                    '<a href="'+BASE_URL+'Cedula/generar_pdf/'+idcedula+'">'+
                    '<button type="summit" class="btn btn-default btn-circle3"><img src="'+BASE_URL+'images/pdf.png">'+
                    '</button></a>'
                ]);
                // $('#tablaCedulas tr:last').after('<tr class="default">'+
                //                     '<th style="font-weight: normal;">'+'<a href="#">'+'Cedula '+ i+'</a>'+'</th>'+
                //                     '<th style="font-weight: normal;">'+'<a href="#">'+descripcion+'</a>'+'</th>'+
                //                     '<th style="font-weight: normal;">'+'<a href="#">'+semana_aplicacion+'</a>'+'</th>'+
                //                     '<th style="font-weight: normal;text-align: center;">'
                //                     +'<a href="'+BASE_URL+'">Eliminar</a>'+'|'
                //                     +'<a href="'+BASE_URL+'">Editar</a>'
                //                     +'</th>'+
                //                     '<th style="font-weight: normal;text-align:center">'+'<a href="'+BASE_URL+'Cedula/generar_pdf/'+idcedula+'">'+
                //                     '<button type="summit" class="btn btn-default btn-circle3"><img src="'+BASE_URL+'images/pdf.png">'+
                //                     '</button></a>'+'</th>'+
                //                 '</tr>');
            };
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error al cargar la cedulas del tratamiento');
        }
    });
}

var idTratamientogeneral="";
//Cuando los productos ya existen en la bd

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
                $('#idtablanuevosproductos tr:last').after('<tr class="default" id="'+idinformaciontratamiento+'">'+
                                    '<th style="font-weight: normal;">'+producto+'</th>'+
                                    '<th style="font-weight: normal;">'+activo+'</th>'+
                                    '<th style="font-weight: normal;">'+dosis+'</th>'+
                                    '<th style="font-weight: normal;">'+unidad+'</th>'+
                                    '<th style="font-weight: normal;">'+secado+'</th>'+
                                    '<th style="font-weight: normal;">'+cosecha+'</th>'+
                                    '<th style="font-weight: normal;text-align: center;">'
                                    +'<a href="#" data-toggle="modal" onclick="eliminarProductoGuardado('+idinformaciontratamiento+','+id_tratamiento+')">Eliminar</a>'+'|'
                                    +'<a href="#" data-toggle="modal" data-target="#EditProductNuevo" onclick="editarProductoGuardado('+idinformaciontratamiento+','+id_tratamiento+','+idProduct+')">Editar</a>'
                                    +'</th>'+
                                '</tr>');
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
                var idProduct = data[i][3]
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

    numerico = numerico+1;
    var infotratamiento = {// Contiene la estructura de la tabla de la la base de datos para mejor y mas facil manejo
          'numerico':numerico,
          // 'productoselect':productoselect,
          'id_tratamiento': '',
          'id_producto': productoid,
          'dosis': dosis,
          'plaga_nombre_comun':ncomun,
          'plaga_nombre_cientifico':ncientifico,
          'secado':secado,
          'cosecha':cosecha,
          };
    listaInformacionTratamientos.push(infotratamiento);
    
    $.ajax({ // ajax para consultar algunos datos del producto seleccionado
        url: BASE_URL+'Aplication/product/'+productoid, // se manda solo con el id no ocupa mas datos
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
                                    '<th style="font-weight: normal;">'+dosis+'</th>'+
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
    $.ajax({ // ajax para consultar algunos datos del producto seleccionado
        url: BASE_URL+'Proyecto/AgregarProductoATratamientoExistente',
        async: false,
        type: "POST",
        data: {_idTratamientogeneral:idTratamientogeneralaux,_productoid:productoid,_dosis:dosis,_ncomun:ncomun,_ncientifico:ncientifico,
                _secado:secado,_cosecha:cosecha},
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

});

$('#modalAgregarProducto').click(function () { // limpiar la tabla de productos al crear el modal
    var TableProductos = document.getElementById("idproductos");
    var filas = TableProductos.rows.length;
    for (var x=filas-1; x>0; x--) {
       TableProductos.deleteRow(x);
    }
});




function get_product(id)
{
    iduser=id;
    $.ajax({
        url: BASE_URL+'Aplication/product/'+id,
        async: true,
        type: "POST",
        //data: {_nombre: nproyecto, _numero: nnumero},
        dataType: 'json',
        success: function(data) {
            if (data!=false) 
            {
                alert(JSON.stringify(data));
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
}


$('#agregarProyecto').click(function () {
    var nnumero = document.getElementById("nnumero").value;

    document.getElementById("numProyecto").innerHTML="Proyecto Nº: "+nnumero;
    
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
        },
        error: function () {
            alert("El proyecto a agregar ya EXISTE!");
        }
    });
});


$('#nuevoProducto').click(function () { // agregar solo productos
    var name = document.getElementById("nameproducto").value;
    var active = document.getElementById("activeproducto").value;
    var unit = document.getElementById("unitproducto").value;
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
}); 



function cargarTratamientosExistentes(){ // funcion que llena la tabla tablaTratamientoExistente. Carga los tratamientos existentes en la interfaz
    $('#tablaTratamientoExistente').DataTable().fnClearTable();
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
                    nombreproductos += '<a style="font-size: 12px;color: #26B12B;" href="#">'+ (p+1) +') '+listaP[p] +'</a><br>';
                };

                $('#tablaTratamientoExistente').dataTable().fnAddData( [
                    '<a  href="#" style="font-size: 12px;color:#282892;">'+'Proyecto '+ (data[i][0]) +'</a>',
                    '<a href="#" style="font-size: 12px;">'+'Tratamiento '+ (data[i][1]) +'</a>',
                    nombreproductos,
                    '<a href="#" style="font-size: 12px;">'+'Cedulas '+ (data[i][3]) +'</a>',
                    '<a href="#" onclick="agregarTratamientoExistente('+(data[i][1])+','+0+')" style="font-size:12px;">Agregar</a>'
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
