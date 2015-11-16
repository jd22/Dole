$(document).ready(function () {

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
