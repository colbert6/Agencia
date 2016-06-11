$(document).ready(function() {

    var base_url = $("#base_url").val();
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"terminal/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "ter_id" },
            { "data": "ter_descripcion" },
            { "data": "ter_direccion" }, 
            { "data": "ter_ciudad" },
            { "data": "ciu_nombre" },
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
        "columnDefs": [
                    {
                        "targets": [ 3 ],
                        "visible": false
                    }],
        'aaSorting': [[ 0, 'asc' ]],//ordenar
        'iDisplayLength': 10,
        'aLengthMenu': [[5, 10, 20], [5, 10, 20]]
    } );
 
    $('#nuevo_modal').on('click', function () {      //Limpiar los datos del modal-form
        $("#id").val('');
        $("#descripcion").val('');
        $("#direccion").val('');
        $("#ciudad").val('');
        
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
        $('#desc_dato_eliminar').html(row.data().ter_descripcion);

    } );


    $('#submit_form').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var campos_form = ["ciudad", "direccion","descripcion"];//campos que queremos que se validen
        if(!validar_form(campos_form)){
            return false;            
        }          

        id = $("#id").val();
        descripcion = $("#descripcion").val();
        direccion = $("#direccion").val();
        ciudad = $("#ciudad").val();

        $.post(base_url+"terminal/guardar",{id:id,descripcion:descripcion,direccion:direccion,ciudad:ciudad},function(valor){
            if(!isNaN(valor)){
                alert('Guardado exitoso');
                table.ajax.reload();
                $("#modal_form").modal('hide');
            }else{
                alert('guardar error:'+valor);
            }
        });
    } );

    $('#delete_click').on('click', function () {   //Enviar los datos del modal-form a eliminar en el controlador
        var id = $("#id_dato_eliminar").val();
        $.post(base_url+"terminal/eliminar",{id:id},function(valor){
            if(!isNaN(valor)){
                alert('Dato eliminado');
                table.ajax.reload();
                $("#modal_delete").modal('hide');
            }else{
                alert('eliminar error:'+valor);
            }

        });
    } );

} );

