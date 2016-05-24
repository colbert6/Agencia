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
       
        $(this).removeClass( "asiento-seleccionado" );
        $(this).addClass ( "iu-asiento" );
        evaluar_asientos();
                
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


$('#sgt_datos').on('click', function() {
    var num_asientos=$('.asiento-seleccionado').length;
    if(num_asientos>0){
        $('#li_tab_1,#li_tab_2,#tab_1,#tab_2').toggleClass('active');
    }else{
        alert('Seleccione un asiento');
    }
    $('#form_1,#form_2,#form_3,#form_4').hide();
    for(var i=1; i<=num_asientos; i++){
       $('#form_'+i).show();  
    }

});
    