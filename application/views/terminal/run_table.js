

$(document).ready(function() {
    var base_url = window.location.origin;
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"/Agencia/terminal/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "ter_id" },
            { "data": "ter_descripcion" },
            { "data": "ter_direccion" }, 
            { "data": "ter_ciudad" },
            {
                "className":      'editar-data',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            {
                "className":      'eliminar-data',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            }
        ],
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "oLanguage" :{
            'sProcessing':     'Cargando...',
            'sLengthMenu':     'Mostrar _MENU_ registros',
            'sZeroRecords':    'No se encontraron resultados',
            'sEmptyTable':     'Ningún dato disponible en esta tabla',
            'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
            'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
            'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
            'sInfoPostFix':    '',
            'sSearch':         'Buscar:',
            'sUrl':            '',
            'sInfoThousands':  '',
            'sLoadingRecords': 'Cargando...',
            'oPaginate': {
                'sFirst':    'Primero',
                'sLast':     'Último',
                'sNext':     'Siguiente',
                'sPrevious': 'Anterior'
            },
            'oAria': {
                'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                'sSortDescending': ': Activar para ordenar la columna de manera descendente'
            }
        },
        'aaSorting': [[ 0, 'asc' ]],//ordenar
        'iDisplayLength': 10,
        'aLengthMenu': [[5, 10, 20], [5, 10, 20]]
    } );
 
    $('#nuevo_modal').on('click', function () {      //Limpiar los datos del modal-form
        $("#id").val('');
        $("#descripcion").val('');
        $("#direccion").val('');
        $("#ciudad").val('');
        var base_url = window.location.origin;
        
        $.post(base_url+"/Agencia/ciudad/cargar_datos/",function(ciudades){ 

            var ciudad = JSON.parse(ciudades);
            formulario     ="";
            formulario    += "<label>Ciudad:</label>";
            formulario    += "<select class='form-control' id='id_ciudad'>";
            
            for (var i = 0; i < ciudad.length; i++) {
                alert(ciudad[i].ciu_id);
                var seleccion = "";
                
                if(ciudad[i].ciu_id == 1){
                    seleccion = "selected";    
                }
                
                formulario    += "<option "+seleccion+" value='"+ciudad[i].ciu_id+"'>"+ciudad[i].ciu_nombre+"</option>";
            }
            formulario    += "</select>";
            alert(formulario);
            $("#ciudades_form").html(formulario); 
        });

    } );

    $('#tab tbody').on('click', 'td.editar-data', function () { //Agregar los datos correspondientes al modal-form
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#id").val(row.data().ter_id);
        $("#descripcion").val(row.data().ter_descripcion);
        $("#direccion").val(row.data().ter_direccion);
        $("#ciudad").val(row.data().ter_ciudad);
        $("#modal_form").modal({show: true});
    } );

    $('#tab tbody').on('click', 'td.eliminar-data', function () { //Agregar los datos correspondientes al modal-delete
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#modal_delete").modal({show: true});
        $("#id_dato_eliminar").val(row.data().ter_id);
        $('#desc_dato_eliminar').empty();
        
        var b = document.createElement("b");
        b.innerHTML = row.data().car_descripcion;
        document.getElementById("desc_dato_eliminar").appendChild(b);

    } );


    $('#submit_form').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var d = new Object();
        id = $("#id").val();
        d.descripcion = $("#descripcion").val();
        d.direccion = $("#direccion").val();
        d.ciudad = $("#ciudad").val();
        
        if(validar_campo(d)){
            $.post(base_url+"/Agencia/terminal/guardar",{id:id,descripcion:d.descripcion,direccion:d.direccion,ciudad:d.ciudad},function(valor){
                if(!isNaN(valor)){
                    alert('guardar exitoso');
                    table.ajax.reload();
                    $("#modal_form").modal('hide');
                }else{
                    alert('guardar error:'+valor);
                }
            });
        } 
    } );

    $('#delete_click').on('click', function () {   //Enviar los datos del modal-form a eliminar en el controlador
        var id = $("#id_dato_eliminar").val();
        $.post(base_url+"/Agencia/terminal/eliminar",{id:id},function(valor){
            if(!isNaN(valor)){
                table.ajax.reload();
                $("#modal_delete").modal('hide');
            }else{
                alert('eliminar error:'+valor);
            }

        });
    } );

} );

function validar_campo ( datos ) {
  var resultado=true;
  for ( var i in datos) {
    if(datos[i]==null ||  datos[i].length == 0){
            return false;
    }
  }
  return true;
}
