$(document).ready(function() {
    var base_url = window.location.origin;
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"/Agencia/cargo/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "car_id" },
            { "data": "car_descripcion" },
            { "data": "car_estado" }, 
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
    
    $('#nuevo_modal').on('click', function () {        
        $("#id").val('');
        $("#descripcion").val('');
    } );

    $('#tab tbody').on('click', 'td.editar-data', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#id").val(row.data().car_id);
        $("#descripcion").val(row.data().car_descripcion);
        $("#modal_form").modal({show: true});
    } );

    $('#tab tbody').on('click', 'td.eliminar-data', function () {
        alert('elminar?');
    } );

    $('#submit_form').on('click', function (data) {        
        var id = $("#id").val();
        var descripcion = $("#descripcion").val();

        $.post(base_url+"/Agencia/cargo/guardar",{id:id,descripcion:descripcion},function(valor){
            if(!isNaN(valor)){
                alert('exitoso');
                table.ajax.reload();
                $("#modal_form").modal('hide');
            }else{
                alert('error:'+valor);
            }
            
            
        });
        
        
    } );

} );
