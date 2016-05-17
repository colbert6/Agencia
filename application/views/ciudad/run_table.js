$(document).ready(function() {
    var base_url = window.location.origin;
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"/Agencia/ciudad/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "ciu_id" },
            { "data": "ciu_nombre" },
            { "data": "ciu_codigo_postal" }, 
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
        $("#nombre").val('');
        $("#codigo_postal").val('');
    } );

    $('#tab tbody').on('click', 'td.editar-data', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#id").val(row.data().ciu_id);
        $("#nombre").val(row.data().ciu_nombre);
        $("#codigo_postal").val(row.data().ciu_codigo_postal);
        $("#modal_form").modal({show: true});
    } );

    $('#tab tbody').on('click', 'td.eliminar-data', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#modal_delete").modal({show: true});
        $("#id_dato_eliminar").val(row.data().ciu_id);
        $('#desc_dato_eliminar').empty();
        
        var b = document.createElement("b");
        b.innerHTML = row.data().ciu_nombre;
        document.getElementById("desc_dato_eliminar").appendChild(b);

    } );

    $('#submit_form').on('click', function () {        
        var id = $("#id").val();
        var nombre = $("#nombre").val();
        var codigo_postal = $("#codigo_postal").val();
        $.post(base_url+"/Agencia/ciudad/guardar",{id:id,nombre:nombre,codigo_postal:codigo_postal},function(valor){
            if(!isNaN(valor)){
                table.ajax.reload();
                $("#modal_form").modal('hide');
            }else{
                alert('guardar error:'+valor);
            }
        });
    } );

    $('#delete_click').on('click', function () {   
        var id = $("#id_dato_eliminar").val();
        $.post(base_url+"/Agencia/ciudad/eliminar",{id:id},function(valor){
            if(!isNaN(valor)){
                table.ajax.reload();
                $("#modal_delete").modal('hide');
            }else{
                alert('eliminar error:'+valor);
            }
        });
    } );

} );
