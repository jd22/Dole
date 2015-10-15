$(document).ready(function () {

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
