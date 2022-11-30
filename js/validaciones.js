function soloLetras(){
    $(function () {
        //Para escribir solo letras
        $('#nombre').validCampoFranz('abcdefghijklmnñopqrstuvwxyzáéiou');
        $('#apellidos').validCampoFranz('abcdefghijklmnñopqrstuvwxyzáéiou');
        $('#detalles').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou.,()');
        
    });
}

function soloNumeros(){
    $(function(){
        $('#telefono').validCampoFranz('0123456789');
        $('#subtotal').validCampoFranz('0123456789');
    });
}