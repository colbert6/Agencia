    var asientoSeleccionados = new Array();
$(document).ready(function(){  
    $("#datos_pasajeros").submit(function(){
     // var str = $("#datos_pasajeros").serialize();
       // $.each(asientoSeleccionados,function(i,value){
         //   str +='&asiento[]='+value;
           // console.log(str);
         //});
       // $.post('pagina.php',str,function(data){ },'json');
       var data ;
       data = $(this).serializeObject();
       htmlBodyTable = '';
       if(asientoSeleccionados.length >1){
            for(i=0;i<asientoSeleccionados.length;i++){
            htmlBodyTable += '<tr><td>'+(i+1)+'</td><td>'+data['dni[]'][i]+'</td><td>'+data['nombre[]'][i]+'</td><td>'+data['apellidos[]'][i]+'</td><td>'+data['sexo[]'][i]+'</td></tr>';
           }
       }else{
         htmlBodyTable += '<tr><td>1</td><td>'+data['dni[]']+'</td><td>'+data['nombre[]']+'</td><td>'+data['apellidos[]']+'</td><td>'+data['sexo[]']+'</td></tr>';       
       }

       
       $("#tablaDatos tbody").html(htmlBodyTable);
       console.log(data);
       console.log(data['dni[]'][0]);

        $('#li_tab_3,#li_tab_2,#tab_3,#tab_2').toggleClass('active');
        return false;
    });

     function remover(arr,item) {
     for(var i = arr.length; i--;) {
          if(arr[i] === item) {
              arr.splice(i, 1);
          }
      }
      
  }

    $('#valor tbody tr').on('click', 'td.iu-asiento ', function () { // activa color
        var NroAsiento = $(this).find('h5').text();
        //alert(eval(NroAsiento));
        if(asientoSeleccionados.indexOf(NroAsiento) == -1){
        asientoSeleccionados.push(NroAsiento);

        }
        console.log(asientoSeleccionados);
        if ($(this).hasClass('iu-asiento') && $('.asiento-seleccionado').length<4){
            $(this).removeClass( "iu-asiento" );
            $(this).addClass ( "asiento-seleccionado" );
            evaluar_asientos();
        } else{
            alert('Maximo de asientos : 4');
        }
        
    } );

    $('#valor tbody tr').on('click', 'td.asiento-seleccionado ', function () { // remueve color
        var NroAsiento = $(this).find('h5').text();
        if(asientoSeleccionados.indexOf(NroAsiento) !=-1){
            //asientoSeleccionados.push(NroAsiento);
            remover(asientoSeleccionados,NroAsiento);
        }
        console.log(asientoSeleccionados);
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

    console.log(asientoSeleccionados);
    var num_asientos=$('.asiento-seleccionado').length;
    var html = "" ;    
    var cueroFormulario = $("#cueroFormulario");
    cueroFormulario.empty();
    for(i=0;i<num_asientos;i++){
        html += '<div class="col-xs-5 " id="form_1"> <div class="form-group"><label for="descripcion">DNI</label>';
        html += '<input type="text" class="form-control" id="dni" name="dni[]" placeholder="Ingrese dni" maxlength="8" required onkeypress="return soloNumeros(event)">';
        html += '</div>';
        html += '<div class="form-group">';
        html += '<label for="abreviacion">Nombre</label>';
        html += '<input type="text" class="form-control" id="nombre" name="nombre[]" placeholder="Ingrese nombre" required onkeypress="return soloLetras(event)">';
        html += '</div>';
        html += '<div class="form-group">';
        html += '<label for="abreviacion">Apellidos</label>';
        html += '<input type="text" class="form-control" id="apellidos" name="apellidos[]" placeholder="Ingrese apellidos" required onkeypress="return soloLetras(event)">';
        html += '</div>';
        html += '<div class="form-group">';
        html += '<label for="abreviacion">Telefono</label>';
        html += '<input type="text" class="form-control" id="telefono" name="telefono[]" placeholder="Ingrese telefono" required onkeypress="return soloNumeros(event)>';
        html += '</div>';
        html += '<div class="form-group">';
        html += '<label for="sexo">Sexo</label>';
        html += '<select class="form-control" id="sexo" name="sexo[]">';
        html += '<option value="m">Masculino</option>';
        html += '<option value="f">Femenino</option>';
        html += '</select>'
        html += '</div>';
        html += '</div>';

    }

    cueroFormulario.append(html);
    if(num_asientos>0){
        $('#li_tab_1,#li_tab_2,#tab_1,#tab_2').toggleClass('active');

        
    }else{
        alert('Por favor seleccione un asiento');
    }
        /* 
        $('#form_1,#form_2,#form_3,#form_4').hide();
        for(var i=1; i<=num_asientos; i++){
           $('#form_'+i).show();  
        } */

});

//$('#sgt_recibo').on('click', function() {
  
    
//});
    

$('#submit').on('click',function(){
   // document.getElementById("datos_pasajeros").submit();
    var str = $("#datos_pasajeros").serialize();
        $.each(asientoSeleccionados,function(i,value){
            str +='&asiento[]='+value;
            console.log(str);
         });
        $.post('../index.php/viaje/guardar',str,function(data){
            if(data.resp==1){
                window.location.href ='../index.php/viaje';
            }else{
                alert('nose ha guardado error: '+data.msg);
            }
        },'json');
    
});
