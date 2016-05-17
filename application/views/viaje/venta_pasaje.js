$(document).ready(function(){            
    $('#valor tbody tr').on('click', 'td.iu-asiento ', function () {
        if ($(this).hasClass('iu-asiento') && $('.asiento-seleccionado').length<4){
            $(this).removeClass( "iu-asiento" );
            $(this).addClass ( "asiento-seleccionado" );
            evaluar_asientos();
        } else{
            alert('Maximo de asientos : 4');
        }
        
    } );

    $('#valor tbody tr').on('click', 'td.asiento-seleccionado ', function () {
       if ($(this).hasClass('asiento-seleccionado') && $('.asiento-seleccionado').length<4){
            $(this).removeClass( "asiento-seleccionado" );
            $(this).addClass ( "iu-asiento" );
            evaluar_asientos();
        }  else{
            alert('Maximo de asientos : 4');
        }
        
    } );

});
function evaluar_asientos (){    
    asientos  = $('.asiento-seleccionado');
    var num_asientos='';    
        for(var i=0; i<asientos.length; i++){
            num_asientos=num_asientos+' '+asientos.eq(i).text();        
        }
    $('#num_asientos').text(num_asientos); 
    $('#cant_asiento').text(asientos.length);     

}
    