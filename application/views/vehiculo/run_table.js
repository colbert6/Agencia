function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="2" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Fecha de Compra:</td>'+
            '<td>'+d.veh_fecha_compra+'</td>'+
            '<td width=50></td>'+
            '<td>Capacidad:</td>'+
            '<td>'+d.veh_num_asientos+'</td>'+
        '</tr>'+
    '</table>';
}

$(document).ready(function() {
    var base_url = window.location.origin;
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"/Agencia/vehiculo/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            {
                "className":      'detail-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "veh_id" },
            { "data": "veh_tipo" },
            { "data": "veh_descripcion" },
            { "data": "veh_matricula" },  
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
            'sProcessing':     'vehgando...',
            'sLengthMenu':     'Mostrar _MENU_ registros',
            'sZeroRecords':    'No se encontraron resultados',
            'sEmptyTable':     'Ningún dato disponible en esta tabla',
            'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
            'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
            'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
            'sInfoPostFix':    '',
            'sSearch':         'Busveh:',
            'sUrl':            '',
            'sInfoThousands':  '',
            'sLoadingRecords': 'vehgando...',
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
    
    $('#nuevo_modal').on('click', function () {  //limpiar los datos del modal
        $("#id").val('');
        $("#tipo").val('');
        $("#descripcion").val('');
        $("#fecha_compra").val('');
        $("#capacidad").val('');
        $("#matricula").val('');

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

    $('#tab tbody').on('click', 'td.editar-data', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#id").val(row.data().veh_id);
        $("#descripcion").val(row.data().veh_descripcion);
        $("#tipo").val(row.data().veh_tipo);

        var aux=row.data().veh_fecha_compra.split("-")
        var fecha=aux[2]+"-"+aux[1]+"-"+aux[0];
        $("#fecha_compra").val(fecha);

        $("#capacidad").val(row.data().veh_num_asientos);
        $("#matricula").val(row.data().veh_matricula);
        $("#modal_form").modal({show: true});
    } );

    $('#tab tbody').on('click', 'td.eliminar-data', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#modal_delete").modal({show: true});
        $("#id_dato_eliminar").val(row.data().veh_id);
        $('#desc_dato_eliminar').empty();
        
        var b = document.createElement("b");
        b.innerHTML = row.data().veh_descripcion;
        document.getElementById("desc_dato_eliminar").appendChild(b);

    } );

    $('#submit_form').on('click', function () {        
        var id = $("#id").val();
        var descripcion = $("#descripcion").val();
        var tipo= document.getElementById("tipo").value ;
        var fecha_compra =document.getElementById("fecha_compra").value ;
        var capacidad =document.getElementById("capacidad").value ;
        var matricula =document.getElementById("matricula").value ;
        $.post(base_url+"/Agencia/vehiculo/guardar",{id:id,descripcion:descripcion,tipo:tipo,fecha_compra:fecha_compra,capacidad:capacidad,matricula:matricula},function(valor){
            if(!isNaN(valor)){
                alert('guardar exitoso');
                table.ajax.reload();
                $("#modal_form").modal('hide');
            }else{
                alert('guardar error:'+valor);
            } 
        });

        
    } );

    $('#delete_click').on('click', function () {   
        var id = $("#id").val();
        var descripcion = $("#descripcion").val();
        var tipo =$("#tipo").val('');
        var fecha_compra =$("#fecha_compra").val('');
        var capacidad =$("#capacidad").val('');
        var matricula =$("#matricula").val('');
        $.post(base_url+"/Agencia/vehiculo/eliminar",{id:id,descripcion:descripcion,tipo:tipo,fecha_compra:fecha_compra,capacidad:capacidad,matricula:matricula},function(valor){
            if(!isNaN(valor)){
                table.ajax.reload();
                $("#modal_delete").modal('hide');
            }else{
                alert('eliminar error:'+valor);
            }
            alert('asa');
        });        
    } );

$("[data-mask]").inputmask();


} );
