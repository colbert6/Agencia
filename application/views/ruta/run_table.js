$(document).ready(function() {
    var base_url = window.location.origin;
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"/Agencia/ruta/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "rut_id" },
            { "data": "rut_origen" },
            { "data": "rut_destino" },
            { "data": "rut_precio_base" }, 
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
        $("#origen").val('');
        $("#destino").val('');
        $("#precio").val('');
    } );

    $('#tab tbody').on('click', 'td.editar-data', function () { //Agregar los datos correspondientes al modal-form
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        
        $("#origen").val(row.data().rut_origen);
        $("#destino").val(row.data().rut_destino);
        $("#precio").val(row.data().rut_precio_base);
        $("#modal_form").modal({show: true});
    } );

    $('#tab tbody').on('click', 'td.eliminar-data', function () { //Agregar los datos correspondientes al modal-delete
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#modal_delete").modal({show: true});
        $("#id_dato_eliminar").val(row.data().rut_id);
        $('#desc_dato_eliminar').empty();
        
        var b = document.createElement("b");
        b.innerHTML = row.data().car_descripcion;
        document.getElementById("desc_dato_eliminar").appendChild(b);

    } );

    $('#submit_form').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var d = new Object();
        id = $("#id").val();
        d.dni = $("#dni").val();
        d.nombre = $("#nombre").val();
        d.apellidos = $("#apellidos").val();
        d.nacimiento = $("#nacimiento").val();
        d.registro = $("#registro").val();
        d.cargo = $("#cargo").val();

        if(validar_campo(d)){
            $.post(base_url+"/Agencia/personal/guardar",{id:id,dni:d.dni,nombre:d.nombre,apellidos:d.apellidos,nacimiento:d.nacimiento,registro:d.registro,cargo:d.cargo},function(valor){
                if(!isNaN(valor)){
                    alert('guardar exitoso');
                    table.ajax.reload(null, false);
                    $("#modal_form").modal('hide');
                }else{
                    alert('guardar error:'+valor);
                }
            });
        } 
    } );

    $('#delete_click').on('click', function () {   //Enviar los datos del modal-form a eliminar en el controlador
        var id = $("#id_dato_eliminar").val();
        $.post(base_url+"/Agencia/personal/eliminar",{id:id},function(valor){
            if(!isNaN(valor)){
                table.ajax.reload(null, false);
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