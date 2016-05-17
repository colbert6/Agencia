$(document).ready(function(){            
    $('#valor tbody tr').on('click', 'td.iu-asiento ', function () {
        if ($(this).hasClass('iu-asiento')){
            $(this).removeClass( "iu-asiento" );
            $(this).addClass ( "asiento-seleccionado" );
        }   
        cant_asiento('aumentar',$(this).text());

    } );

    $('#valor tbody tr').on('click', 'td.asiento-seleccionado ', function () {
       if ($(this).hasClass('asiento-seleccionado')){
            $(this).removeClass( "asiento-seleccionado" );
            $(this).addClass ( "iu-asiento" );
        }  
        cant_asiento('disminuir',$(this).text());
    } );

});
function cant_asiento (operacion,numero){
    asientos  = $('.asiento-seleccionado');
    alert(asientos.length);
    for ( var i in asientos) {
        alert(asientos[i].text());
    }
    

   


   /* var cant=parseInt(document.getElementById('cant_asiento').innerText); 
    $('#num_asientos').text($('#num_asientos').text()+" "+numero); 
    $('#cant_asiento').empty();
    if (operacion=='aumentar') {
        $('#cant_asiento').text(cant+1); 
    }else{
        $('#cant_asiento').text(cant-1); 
    }*/
    

}
    