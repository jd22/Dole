$(document).ready(function () {
    var numeroProyecto = document.getElementById("nnumero").value;
    if(numeroProyecto!=""){
        document.getElementById("nnumero").disabled = "true";
        document.getElementById("infoTratamientos").style.display = "initial";

        var TableTratamientos = document.getElementById("Trataments");
        var filas = TableTratamientos.rows.length;
        for (var x=filas-1; x>0; x--) {
           TableTratamientos.deleteRow(x);
        }
        var numeroProyecto = document.getElementById("nnumero").value;
        $.ajax({
            url: 'http://localhost/Dole/Proyecto/CargarTratamientos',
            async: true,
            type: "POST",
            data: {_numeroProyecto: numeroProyecto},
            dataType: 'json',
            success: function (msg) { // success callback
                for (var i = 0; msg.length-1 >= i; i++) {
                    $('#Trataments tr:last').after('<tr class="default">'+
                                                        '<th style="font-weight: normal;">'+'<a href="" data-toggle="modal" data-target="#listanuevosProductos" onclick="CargarProductosDelTratamiento('+(msg[i][0])+')" data-toggle="tooltip" data-placement="bottom" title="Click para ver Detalles">'+'Tratamiento '+(i+1)+'</a>'+'</th>'+
                                                        '<th style="font-weight: normal;">'+'<a href="" onclick="CargarCedulasDelTratamiento('+(msg[i][0])+')" data-toggle="modal" data-target="#listaCedulas  "data-toggle="tooltip" data-placement="bottom" title="Click para ver la lista de cedulas">'+(msg[i][1])+' Cedulas de Aplicacion</a>'+
                                                        '<a href="" style="color:green;float: right;" onclick="CargarIdTratamiento('+(msg[i][0])+','+i+')" data-toggle="modal">Agregar Cedula</a>'+
                                                        '<th style="font-weight: normal;text-align: center;">'
                                                        +'<a style="color:red" data-toggle="modal" onclick="eliminarTratamiento(this,'+(msg[i][0])+')">Eliminar</a>'
                                                        +'</th>'+
                                                    '</tr>');
                };
            },
            error: function (msg) {
                alert("Error al Cargar informacion de tratamientos");
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
        async: true,
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
            CargarTratamientos();
            listaInformacionTratamientos = [];
        },
        error: function (msg) {
             alert(JSON.stringify(msg));
        }
    });

});


$('#crearTratamiento').click(function () {
    var TableTratamientos = document.getElementById("Trataments");
    var filas = TableTratamientos.rows.length;
    for (var x=filas-1; x>0; x--) {
       TableTratamientos.deleteRow(x);
    }
    var numeroProyecto = document.getElementById("nnumero").value;
    var _url = 'http://localhost/Dole/Proyecto/CrearTratamiento';
    $.ajax({
        url: _url,
        async: true,
        type: "POST",
        data: {_numeroProyecto: numeroProyecto,_linfoTratamientos:listaInformacionTratamientos},
        dataType: 'json',
        success: function (msg) { // success callback
            CargarTratamientos();
            listaInformacionTratamientos = [];
            var TableTratamientos = document.getElementById("idproductos");
            var filas = TableTratamientos.rows.length;
            for (var x=filas-1; x>0; x--) {
                TableTratamientos.deleteRow(x);
            }
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
    var TableTratamientos = document.getElementById("Trataments");
    var filas = TableTratamientos.rows.length;
    for (var x=filas-1; x>0; x--) {
       TableTratamientos.deleteRow(x);
    }
    var numeroProyecto = document.getElementById("nnumero").value;
    $.ajax({
        url: 'http://localhost/Dole/Proyecto/CargarTratamientos',
        async: true,
        type: "POST",
        data: {_numeroProyecto: numeroProyecto},
        dataType: 'json',
        success: function (msg) { // success callback
            for (var i = 0; msg.length-1 >= i; i++) {
                $('#Trataments tr:last').after('<tr class="default">'+
                                                    '<th style="font-weight: normal;">'+'<a href="" data-toggle="modal" data-target="#listanuevosProductos" onclick="CargarProductosDelTratamiento('+(msg[i][0])+')" data-toggle="tooltip" data-placement="bottom" title="Click para ver Detalles">'+'Tratamiento '+(i+1)+'</a>'+'</th>'+
                                                    '<th style="font-weight: normal;">'+'<a href="" onclick="CargarCedulasDelTratamiento('+(msg[i][0])+')" data-toggle="modal" data-target="#listaCedulas "data-toggle="tooltip" data-placement="bottom" title="Click para ver la lista de cedulas">'+(msg[i][1])+' Cedulas de Aplicacion</a>'+
                                                    '<a href="" style="color:green;float: right;" onclick="CargarIdTratamiento('+(msg[i][0])+','+i+')" data-toggle="modal" data-target="#calculos">Agregar Cedula</a>'+
                                                    '<th style="font-weight: normal;text-align: center;">'
                                                    +'<a style="color:red" href="" data-toggle="modal" onclick="eliminarTratamiento(this,'+(msg[i][0])+')">Eliminar</a>'+'|'

                                                    +'</th>'+
                                                '</tr>');
            };
        },
        error: function (msg) {
            alert("Error al Cargar informacion de tratamientos");
        }
    });
}


function eliminarTratamiento(t,it)
{


    var _url = BASE_URL+'Proyecto/eliminar_tratamiento';
    $.ajax({
        url: _url,
        async: true,
        type: "POST",
        data: {_idTrat: it},
        dataType: 'json',
        success: function (msg) { // success callback
            var row = t.parentNode.parentNode;
            row.parentNode.removeChild(row);
        },
        error: function (msg) {
            alert("Error al eliminar el producto");
        }
    });
    
}

function CargarCedulasDelTratamiento (id_tratamiento) { // cargar cedula del tratamiento existente con el id del tratamiento
    var tablaCedulas = document.getElementById("tablaCedulas");
    var filas = tablaCedulas.rows.length;
    for (var x=filas-1; x>0; x--) {// Limpiar la tabla visual para cargar las cedulas nuevas
       tablaCedulas.deleteRow(x);
    }    
    $.ajax({ // ajax para consultar las cedulas del tratamiento seleccionado
        url: BASE_URL+'Cedula/obtener_cedulas/'+id_tratamiento, // se manda solo con el id no ocupa mas datos
        async: true,
        type: "POST",
        dataType: 'json',
        success: function(data) {
            // alert(JSON.stringify(data));
            for (var i = 0; data.length-1 >= i; i++) {
                var idcedula = data[i][0];
                var descripcion = data[i][1]; 
                var semana_aplicacion = data[i][2];
                $('#tablaCedulas tr:last').after('<tr class="default">'+
                                    '<th style="font-weight: normal;">'+'<a href="">'+'Cedula '+ i+'</a>'+'</th>'+
                                    '<th style="font-weight: normal;">'+'<a href="">'+descripcion+'</a>'+'</th>'+
                                    '<th style="font-weight: normal;">'+'<a href="">'+semana_aplicacion+'</a>'+'</th>'+
                                    '<th style="font-weight: normal;">'
                                    +'<a href="'+BASE_URL+'">Eliminar</a>'+'|'
                                    +'<a href="'+BASE_URL+'">Editar</a>'
                                    +'</th>'+
                                    '<th style="font-weight: normal;text-align:center">'+'<a href="'+BASE_URL+'Cedula/generar_pdf/'+idcedula+'">'+
                                    '<button type="summit" class="btn btn-default btn-circle3"><img src="'+BASE_URL+'images/pdf.png">'+
                                    '</button></a>'+'</th>'+
                                '</tr>');
            };
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error al cargar la cedulas del tratamiento');
        }
    });
}

var idTratamientogeneral="";
//Cuando los productos ya existen en la bd
function CargarProductosDelTratamiento(id_tratamiento) {
    idTratamientogeneral=id_tratamiento;
    var TableProductos = document.getElementById("idtablanuevosproductos");
    var filas = TableProductos.rows.length;
    for (var x=filas-1; x>0; x--) {
       TableProductos.deleteRow(x);
    }
    // Ahora se debe cargar la informacion del tratamiento que involucra todos los productos y sus respectivas medidas
    $.ajax({ // ajax para consultar algunos datos del producto seleccionado
        url: BASE_URL+'Tratamiento/obtener_informaciontratamiento/'+id_tratamiento, // se manda solo con el id no ocupa mas datos
        async: true,
        type: "POST",
        dataType: 'json',
        success: function(data) {
            for (var i = data.length - 1; i >= 0; i--) {
                var producto = data[i][0];
                var activo = data[i][1]; // Este se saca del id del producto
                var unidad = data[i][2]; // Este se saca del id del producto
                var idProduct = data[i][3]
                var dosis = data[i][4];
                var secado = data[i][5];
                var cosecha = data[i][6];
                var pncomun = data[i][7];
                var pncientifico = data[i][8];
                $('#idtablanuevosproductos tr:last').after('<tr class="default">'+
                                    '<th style="font-weight: normal;">'+producto+'</th>'+
                                    '<th style="font-weight: normal;">'+activo+'</th>'+
                                    '<th style="font-weight: normal;">'+dosis+'</th>'+
                                    '<th style="font-weight: normal;">'+unidad+'</th>'+
                                    '<th style="font-weight: normal;">'+secado+'</th>'+
                                    '<th style="font-weight: normal;">'+cosecha+'</th>'+
                                    '<th style="font-weight: normal;">'
                                    +'<a href="" data-toggle="modal" onclick="eliminarProductoGuardado(this,'+id_tratamiento+','+idProduct+','+dosis+','+secado+','+cosecha+','+pncomun+','+pncientifico+')">Eliminar</a>'+'|'
                                    +'<a href="#" data-toggle="modal" data-target="#EditProductNuevo" onclick="editarProductoGuardado('+id_tratamiento+','+idProduct+','+dosis+','+pncomun+','+pncientifico+','+secado+','+cosecha+')">Editar</a>'
                                    +'</th>'+
                                '</tr>');
            };
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });

}

function eliminarProductoGuardado(t,it,p,d,s,c,pnc,pnci)
{

    var _url = BASE_URL+'Tratamiento/eliminar_producto_informaciontratamiento';
    $.ajax({
        url: _url,
        async: true,
        type: "POST",
        data: {_idTrat: it,_idProd:p,_dos:d,_sec:s,_cos:c,_planombcom:pnc,_planombcien:pnci},
        dataType: 'json',
        success: function (msg) { // success callback
            var row = t.parentNode.parentNode;
            row.parentNode.removeChild(row);
        },
        error: function (msg) {
            alert("Error al eliminar el producto");
        }
    });
    
}

var idTA = "";
var idPA = "";
var dosA = "";
var pncA = "";
var pnciA = "";
var secA = "";
var cosA = "";


function editarProductoGuardado(it,p,d,pnc,pnci,s,c)
{

    var _url = BASE_URL+'Tratamiento/cargarNombreProducto/'+p;
    $.ajax({
        url: _url,
        async: true,
        type: "POST",
        dataType: 'json',
        success: function (data) { // success callba
            var nameProdu = data[0];
    
            document.getElementById("editselectproducts").value = nameProdu; 
            document.getElementById("editiddosis").value = d;
            document.getElementById("editidnombrecomun").value = pnc;
            document.getElementById("editidnombrecientifico").value = pnci;
            document.getElementById("editidsecado").value = s;
            document.getElementById("editidcosecha").value = c;
            productoSeleccionado = [];
            idTA = it;
            productoSeleccionado.push(it);
            idPA = p;
            productoSeleccionado.push(p);
            dosA = d;
            productoSeleccionado.push(d);
            pncA = pnc;
            productoSeleccionado.push(pnc);
            pnciA = pnci;
            productoSeleccionado.push(pnci);
            secA = s;
            productoSeleccionado.push(s);
            cosA = c;
            productoSeleccionado.push(c);
        },
        error: function (msg) {
            alert("Error al eliminar el producto");
        }
    });

 
    
}


var fila = 0;
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

    var infotratamiento = {// Contiene la estructura de la tabla de la la base de datos para mejor y mas facil manejo
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
        async: true,
        type: "POST",
        dataType: 'json',
        success: function(data) {
            if (data!=false) 
            {
                activo = data[0][0];
                unidad = data[0][1];
                $('#idproductos tr:last').after('<tr class="default">'+
                                    '<th style="font-weight: normal;">'+productoselect+'</th>'+
                                    '<th style="font-weight: normal;">'+activo+'</th>'+
                                    '<th style="font-weight: normal;">'+dosis+'</th>'+
                                    '<th style="font-weight: normal;">'+unidad+'</th>'+
                                    '<th style="font-weight: normal;">'+secado+'</th>'+
                                    '<th style="font-weight: normal;">'+cosecha+'</th>'+
                                    '<th style="font-weight: normal;">'
                                    +'<a href=""  data-toggle="modal"  onclick="eliminarProducto(this,'+productoid+')">Eliminar</a>'
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
    var producto = document.getElementById("selectproductsnuevo");

    var productoid = producto.options[producto.selectedIndex].value;
    var dosis = document.getElementById("iddosisnuevo").value;
    var ncomun = document.getElementById("idnombrecomunnuevo").value;
    var ncientifico = document.getElementById("idnombrecientificonuevo").value;
    var secado = document.getElementById("idsecadonuevo").value;
    var cosecha = document.getElementById("idcosechanuevo").value;
    $.ajax({ // ajax para consultar algunos datos del producto seleccionado
        url: BASE_URL+'Proyecto/AgregarProductoATratamientoExistente',
        async: true,
        type: "POST",
        data: {_idTratamientogeneral:idTratamientogeneral,_productoid:productoid,_dosis:dosis,_ncomun:ncomun,_ncientifico:ncientifico,
                _secado:secado,_cosecha:cosecha},
        dataType: 'json',
        success: function(data) {
            //alert(data);
            CargarProductosDelTratamiento(idTratamientogeneral);// Para refrescar la lista de productos del tratamiento
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error al agregar el producto nuevo al tratamiento');
        }
    });
});



function eliminarProducto(t,p)
{
    //alert($(t).attr("data-row"));
    //alert(p + a + d + u + s + c);
    var listaInformacionTratamientosTemp = [];
    var filas = listaInformacionTratamientos.length;

    for (var x=filas-1; x>=0; x--) {
        if(listaInformacionTratamientos[x]['id_producto'] != p){
            listaInformacionTratamientosTemp.push(listaInformacionTratamientos[x]);
        }
   }
   listaInformacionTratamientos = listaInformacionTratamientosTemp;
    //alert(listaInformacionTratamientos[0]['id_producto']);
    var row = t.parentNode.parentNode;
    row.parentNode.removeChild(row);
}


$('#editarProducto').click(function () {
   var eddosis = document.getElementById("editiddosis").value;
    var edncomun = document.getElementById("editidnombrecomun").value;
    var edncientifico = document.getElementById("editidnombrecientifico").value;
    var edsecado = document.getElementById("editidsecado").value;
    var edcosecha = document.getElementById("editidcosecha").value;

    var _url = 'http://localhost/Dole/Tratamiento/editar_producto_informaciontratamiento';
    $.ajax({
        url: _url,
        async: true,
        type: "POST",
        data: {_idTrat: productoSeleccionado[0], _idProd: productoSeleccionado[1], _dos: productoSeleccionado[2], _sec: productoSeleccionado[5],
         _cos: productoSeleccionado[6], _planombcom:productoSeleccionado[3], _planombcien: productoSeleccionado[4], 
         _dosn: eddosis, _secn: edsecado, _cosn: edcosecha, _nplanombcom: edncomun, _nplanombcien: edncientifico},
        dataType: 'json',
        success: function (msg) { // success callback
            CargarProductosDelTratamiento(productoSeleccionado[0]);
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

//Agregar un producto a un tratamiento existente
$('#agregarProductoNuevo').click(function () {
    //idTratamientogeneral
    var producto = document.getElementById("selectproductsnuevo");

    var productoid = producto.options[producto.selectedIndex].value;
    var dosis = document.getElementById("iddosisnuevo").value;
    var ncomun = document.getElementById("idnombrecomunnuevo").value;
    var ncientifico = document.getElementById("idnombrecientificonuevo").value;
    var secado = document.getElementById("idsecadonuevo").value;
    var cosecha = document.getElementById("idcosechanuevo").value;
    $.ajax({ // ajax para consultar algunos datos del producto seleccionado
        url: BASE_URL+'Proyecto/AgregarProductoATratamientoExistente',
        async: true,
        type: "POST",
        data: {_idTratamientogeneral:idTratamientogeneral,_productoid:productoid,_dosis:dosis,_ncomun:ncomun,_ncientifico:ncientifico,
                _secado:secado,_cosecha:cosecha},
        dataType: 'json',
        success: function(data) {
            //alert(data);
            CargarProductosDelTratamiento(idTratamientogeneral);// Para refrescar la lista de productos del tratamiento
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error al agregar el producto nuevo al tratamiento');
        }
    });
});


function get_product(id)
{
    iduser=id;
    $.ajax({
        url: 'http://localhost/Dole/Aplication/product/'+id,
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
    
    var _url = 'http://localhost/Dole/Proyecto/CrearProyecto';
    $.ajax({
        url: _url,
        async: true,
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

'name'
'active'
'unit'


$('#nuevoProducto').click(function () { // agregar solo productos
    var name = document.getElementById("nameproducto").value;
    var active = document.getElementById("activeproducto").value;
    var unit = document.getElementById("unitproducto").value;
    $.ajax({
        url: 'http://localhost/Dole/Product/insert_product',
        async: true,
        type: "POST",
        data: {_name: name,_active:active,_unit:unit},
        dataType: 'json',
        success: function (msg) { // success callback
            alert("Producto agregado");
            document.getElementById("nameproducto").value="";
            document.getElementById("activeproducto").value="";
            document.getElementById("unitproducto").value="";
            
        },
        error: function () {
            alert("Error al insertar el producto");
        }
    });
}); 

function AddRowTable() 
{
    var table = document.getElementById("Tratament");
    var row = table.insertRow(idtable);
    var dosis = document.getElementById("dosis");
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var product = document.getElementById("products");
    var name = product.options[product.selectedIndex].text;
    var id = product.options[product.selectedIndex].value;

    $.ajax({
        url: 'http://localhost/Dole/Aplication/product/'+id,
        type: 'POST',
        dataType: 'json',
        cache: false,
        timeout: 5000,
        success: function(data) {
            if (data!=false) 
            {
                cell1.innerHTML = name;
                cell2.innerHTML = data[0][0];
                cell3.innerHTML = dosis.value;
                cell4.innerHTML = data[0][1];
                dosis.value="";
                dosis_product[count]=[];
                dosis_product[count][0]=id;
                dosis_product[count][1]=cell3.innerHTML;
                count++;
                idtable++;
                
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('error ' + textStatus + " " + errorThrown);
        }
    });
    document.getElementById("btnaddTratament").disabled = false;
}


function ClearTable()
{
    var cosecha = document.getElementById('cosecha');
    var secado = document.getElementById('secado'); 
    for (var i = document.getElementById("Tratament").getElementsByTagName("tr").length-1; i > 1; i--) {
        document.getElementById("Tratament").deleteRow(i);
    };
    secado.value="";
    cosecha.value="";
    idtable=2;
}

var idTra = 1;
var idtable2 = 1;

var array_treatament=[];
var arrayencapsulado;
var count2=0;

function AddTratament()
{
    var cosecha = document.getElementById('cosecha');
    var secado = document.getElementById('secado'); 
    var table = document.getElementById("Tratament");
    var table2 = document.getElementById("Trataments");
    var idTra2=idTra;
    for (var i = 2; i < table.getElementsByTagName("tr").length; i++) {
        var row = table2.insertRow(idtable2);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);

        cell1.innerHTML = idTra2;
        cell2.innerHTML = table.rows[i].cells[0].innerText; 
        cell3.innerHTML = table.rows[i].cells[1].innerText;
        cell4.innerHTML = table.rows[i].cells[2].innerText;
        cell5.innerHTML = table.rows[i].cells[3].innerText;
        if(cosecha.value!="" && secado.value!="")
        {
            cell6.innerHTML = secado.value;
            cell7.innerHTML = cosecha.value;
        }
        else
        {
            if(cosecha.value!="" && secado.value=="")
            {
                cell6.innerHTML = 0;
                cell7.innerHTML = cosecha.value;
            }
            if(cosecha.value=="" && secado.value!="")
            {
                cell6.innerHTML = secado.value;
                cell7.innerHTML = 0;                
            }
            else
            {
                cell6.innerHTML = 0;
                cell7.innerHTML = 0;               
            }
        }
        if(cell1.innerHTML!="")
        {
            array_treatament[count2]=[];
            array_treatament[count2][0]=cell6.innerHTML;
            array_treatament[count2][1]=cell7.innerHTML;
            array_treatament[count2][2]=dosis_product;
            count2++;
            $.ajax({
                url: 'http://localhost/Dole/Product/temporal/'+cell6.innerHTML+'/'+cell7.innerHTML,
                type: 'POST',
                dataType: 'json',
                cache: false,
                timeout: 5000,
                success: function(data) {
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('error ' + textStatus + " " + errorThrown);
                }
            });

        }
        secado.value="";
        cosecha.value="";
        idTra2="";
        idtable2++;
    };


    for (var i2 = 0; i2 < dosis_product.length; i2++){
        $.ajax({
            url: 'http://localhost/Dole/Product/temporal2/'+dosis_product[i2][1]+'/'+dosis_product[i2][0],
            type: 'POST',
            dataType: 'json',
            cache: false,
            timeout: 5000,
            success: function(data) {
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('error ' + textStatus + " " + errorThrown);
            }
        });      
    };
    dosis_product = [];
    document.getElementById("num_treataments").value=array_treatament.length;
    var jsonString= JSON.stringify(array_treatament);
    count=0;
    idTra++;
    ClearTable();
}

function desabilidarbtn(btnid)
{
    document.getElementById(btnid).disabled = true;

}

var iduser = 0;

function id_users(id)
{
    var username = document.getElementById('username');
    var name = document.getElementById('name');
    var email = document.getElementById('email');
    var active = document.getElementById('activer');
    var usernamei = document.getElementById('usernamei');
    var namei = document.getElementById('namei');
    var emaili = document.getElementById('emaili');
    var idi = document.getElementById('idi');
    iduser=id;
    $.ajax({
        url: 'http://localhost/Dole/User/get_user/'+id,
        type: 'POST',
        dataType: 'json',
        cache: false,
        timeout: 5000,
        success: function(data) {
            if (data!=false) 
            {
                idi.value=data[0][0];
                username.innerHTML=data[0][1];
                usernamei.value=data[0][1];
                name.innerHTML = data[0][2];
                namei.value = data[0][2];
                email.innerHTML = data[0][3];
                emaili.value = data[0][3];
                if(data[0][4]==1)
                {
                    active.innerHTML="True";
                }
                else
                {
                    active.innerHTML="False";
                }


            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('error ' + textStatus + " " + errorThrown);
        }
    });

}

function delete_user()
{
    $.ajax({
        url: 'http://localhost/Dole/User/delete_user/'+iduser,
        type: 'POST',
        dataType: 'json',
        cache: false,
        timeout: 5000,
        success: function(data) {
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('error ' + textStatus + " " + errorThrown);
        }
    });

}

function acti_dascti_user()
{
    $.ajax({
        url: 'http://localhost/Dole/User/activate_desactivate/'+iduser,
        type: 'POST',
        dataType: 'json',
        cache: false,
        timeout: 5000,
        success: function(data) {
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('error ' + textStatus + " " + errorThrown);
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

