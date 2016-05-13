$(document).ready(function() {

    $('#tab').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "../server_processing.php"
    });

});//fin de documento listo