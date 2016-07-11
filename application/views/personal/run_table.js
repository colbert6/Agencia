function formatear_fecha( fecha ) {
    var aux=fecha.split("-")
    return aux[2]+"-"+aux[1]+"-"+aux[0];
}

function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="2" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Fecha Nacimiento:</td>'+
            '<td>'+formatear_fecha(d.per_fecha_nac)+'</td>'+
            '<td width=50></td>'+
            '<td>Fecha Registro:</td>'+
            '<td>'+formatear_fecha(d.per_fecha_reg)+'</td>'+
        '</tr>'+
    '</table>';
}
$(document).ready(function() {
    var base_url = $("#base_url").val();
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"personal/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            {
                "className":      'detail-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "per_id" },
            { "data": "per_dni" },
            { "data": "per_nombres" }, 
            { "data": "car_descripcion" },
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
        'aaSorting': [[ 1, 'asc' ]],//ordenar
        'iDisplayLength': 10,
        'aLengthMenu': [[5, 10, 20], [5, 10, 20]]
    } );
    
    $('#nuevo_modal').on('click', function () {      //Limpiar los datos del modal-form
        $("#id").val('');
        $("#dni").val('');
        $("#nombre").val('');
        $("#apellidos").val('');
        $("#nacimiento").val('');
        $("#registro").val('');
        $("#cargo").val('');
    } );

    $('#tab tbody').on('click', 'td.detail-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

    $('#tab tbody').on('click', 'td.editar-data', function () { //Agregar los datos correspondientes al modal-form
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        
        $("#id").val(row.data().per_id);
        $("#dni").val(row.data().per_dni);
        $("#nombre").val(row.data().per_nombres);
        $("#nacimiento").val(row.data().per_fecha_nac);
        $("#cargo").val(row.data().per_cargo);
        $("#modal_form").modal({show: true});
    } );

    $('#tab tbody').on('click', 'td.eliminar-data', function () { //Agregar los datos correspondientes al modal-delete
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#modal_delete").modal({show: true});
        $("#id_dato_eliminar").val(row.data().per_id);
        $('#desc_dato_eliminar').html(row.data().per_nombres);

    } );

    $('#submit_form').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var campos_form = ["cargo","registro","nacimiento","nombre","dni"];//campos que queremos que se validen
        if(!validar_form(campos_form)){
            return false;            
        }


        id = $("#id").val();
        dni = $("#dni").val();
        nombre = $("#nombre").val();
        nacimiento = $("#nacimiento").val();
        registro = $("#registro").val();
        cargo = $("#cargo").val();

    //alert(d.cargo);return false;

        $.post(base_url+"personal/guardar",{id:id,dni:dni,nombre:nombre,nacimiento:nacimiento,registro:registro,cargo:cargo},function(valor){
            if(!isNaN(valor)){
                alert('Guardado exitoso');
                table.ajax.reload(null, false);
                $("#modal_form").modal('hide');
            }else{
                alert('guardar error:'+valor);
            }
        });
    } );

    $('#delete_click').on('click', function () {   //Enviar los datos del modal-form a eliminar en el controlador
        var id = $("#id_dato_eliminar").val();
        $.post(base_url+"personal/eliminar",{id:id},function(valor){
            if(!isNaN(valor)){
                alert('Dato eliminado');
                table.ajax.reload(null, false);
                $("#modal_delete").modal('hide');
            }else{
                alert('eliminar error:'+valor);
            }
        });
    } );

} );

