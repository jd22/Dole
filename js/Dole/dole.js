$(document).ready(function () {
    var intputElements = document.getElementsByTagName("input");
    for (var i = 0; i < intputElements.length; i++) {
        intputElements[i].oninvalid = function (e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {

                if (e.target.name == "username") {
                    e.target.setCustomValidity("The field 'Username' cannot be left blank");
                }
                else if(e.target.name == "password") {
                    e.target.setCustomValidity("The field 'Password' cannot be left blank");
                }
                else{
                     e.target.setCustomValidity("The field cannot be left blank");
                }
            }
        }
    }
});
var BASE_URL = location.protocol + "//" + location.hostname + '/Dole/';

var listaGeneralTratamientos=[];
var tratamiento = {
          'name': 'name',
          'activecomponent': 'active',
          'unit': 'unit'
          };

var idtable=2;
var dosis_product=[];
var count=0;

var listaProductos=[];

var listaCedulas=[];
var listaTratamientos=[];

var n = 0;
var m = 0;
$('#agregarTratamiento').click(function () {
    listaCedulas.push("Cedula");
});
$('#cerrarTratamiento').click(function () {
    listaTratamientos.push("Tratemiento");
    $('#Trataments tr:last').after('<tr class="default">'+
                                    '<th style="font-weight: normal;">'+'<a href="'+BASE_URL+'">'+'Tratamiento '+listaTratamientos.length+'</a>'+'</th>'+
                                    // '<th style="font-weight: normal;">'+'<a href="'+BASE_URL+'">Cedula 1</a>'+'</th>'+
                                    '<th style="font-weight: normal;">'+'<a href="" onclick="CargarCedulas()" data-toggle="modal" data-target="#listaCedulas">'+listaCedulas.length+' Cedulas de Aplicacion</a>'+'</th>'+
                                    '<th style="font-weight: normal;">'
                                    +'<a href="'+BASE_URL+'">Eliminar</a>'+'|'
                                    +'<a href="'+BASE_URL+'">Editar</a>'
                                    +'</th>'+
                                '</tr>');
});

$('#mostrasCedulas').click(function () {
    alert();
});
function CargarCedulas () {
    for (var i = listaCedulas.length - 1; i >= 0; i--) {
        $('#tablaCedulas tr:last').after('<tr class="default">'+
                                    '<th style="font-weight: normal;">'+'<a href="">'+'Cedula '+ i+'</a>'+'</th>'+
                                    // '<th style="font-weight: normal;">'+'<a href="'+BASE_URL+'">Cedula 1</a>'+'</th>'+
                                    '<th style="font-weight: normal;">'+'<a href="">Ver Información</a>'+'</th>'+
                                    '<th style="font-weight: normal;">'
                                    +'<a href="'+BASE_URL+'">Eliminar</a>'+'|'
                                    +'<a href="'+BASE_URL+'">Editar</a>'
                                    +'</th>'+
                                '</tr>');
    };
}

$('#crearTratamiento').click(function () {
    listaGeneralTratamientos.push(tratamiento);
    alert();
});

$('#agregarProducto').click(function () {
     // + location.pathname;
    // BASE_URL = '<?=base_url()?>';
    var producto = document.getElementById("selectproducts");
    var productoid = producto.options[producto.selectedIndex].value;
    var productoselect = producto.options[producto.selectedIndex].text;
    var dosis = document.getElementById("iddosis").value;
    var ncomun = document.getElementById("idnombrecomun").value;
    var ncientifico = document.getElementById("idnombrecientifico").value;
    var secado = document.getElementById("idsecado").value;
    var cosecha = document.getElementById("idcosecha").value;
    var activo = "";
    var unidad = "";
    $.ajax({
        url: BASE_URL+'Aplication/product/'+productoid,
        async: true,
        type: "POST",
        //data: {_nombre: nproyecto, _numero: nnumero},
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
                                    +'<a href="'+BASE_URL+'">Eliminar</a>'+'|'
                                    +'<a href="'+BASE_URL+'">Editar</a>'
                                    +'</th>'+
                                '</tr>');
                //alert(JSON.stringify(data[0][0]););
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error');
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
        
        // var infoProyecto = {
        //     _nombre: nproyecto, _numero: nnumero
        // };
        // var _data = JSON.stringify(infoProyecto);
        var _url = 'http://localhost/Dole/Proyecto/Crear';
        var error = "";
        var succes = "";

        $.ajax({
            url: _url,
            async: true,
            type: "POST",
            data: {_numero: nnumero},
            dataType: 'json',
            success: function (msg) { // success callback
                alert("Nuevo Proyecto Creado");
                document.getElementById("nnumero").disabled = "true";
                document.getElementById("infoTratamientos").style.display = "initial";
                document.getElementById("agregarProyecto").style.display = "none";
            },
            error: function () {
                alert("El proyecto a agregar ya EXISTE!");
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





