
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url(); ?>js/jquery-1.12.3.min.js" type="text/javascript"></script>
        
        <!-- Bootstrap -->
        <script src="<?= base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/validaciones.js" type="text/javascript"></script>     

        <script src="<?= base_url(); ?>js/plugins/daterangepicker/moment.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script type="text/javascript">
            
            

            $(function() {
                var cant_personal=0;

                //Remover Personal al viaje 
                
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true, 
                    timePickerIncrement: 10, 
                    timePicker24Hour:true,
                    locale: {
                        format: 'YYYY-MM-DD HH:mm'
                    }
                });
                
                //-------------seleccion de Ciudades
                $( "#ciu_origen" ).change(function() {
                    var ciu_origen= $('#ciu_origen').val();                   
                    $('#ciu_destino').children('option[class="option_oculta"]').removeClass('option_oculta');
                    $('#ciu_destino').children('option[value="'+ciu_origen+'"]').addClass('option_oculta');

                });

                $( "#ciu_destino" ).change(function() {
                    var ciu_origen= $('#ciu_destino').val();                   
                    $('#ciu_origen').children('option[class="option_oculta"]').removeClass('option_oculta');
                    $('#ciu_origen').children('option[value="'+ciu_origen+'"]').addClass('option_oculta');

                });

                //--------------seleccion de Vehiculos
                $( "#tipo_vehiculo" ).change(function() {
                    var tipo_vehiculo= $('#tipo_vehiculo').val();                   
                    $('#vehiculo').children('option[class="option_mostrada"]').addClass('option_oculta');
                    $('#vehiculo').children('option[class="option_mostrada"]').removeClass('option_mostrada');

                    $('#vehiculo').children('option[tipo="'+tipo_vehiculo+'"]').removeClass('option_oculta');
                    $('#vehiculo').children('option[tipo="'+tipo_vehiculo+'"]').addClass('option_mostrada');

                });

                //--------------seleccion de Personal en el Viaje
                $( "#cargo" ).change(function() {
                    var cargo= $('#cargo').val();                   
                    $('#personal').children('option[class="option_mostrada"]').addClass('option_oculta');
                    $('#personal').children('option[class="option_mostrada"]').removeClass('option_mostrada');

                    $('#personal').children('option[cargo="'+cargo+'"]').removeClass('option_oculta');
                    $('#personal').children('option[cargo="'+cargo+'"]').addClass('option_mostrada');
                });


                //Añadir Personal al viaje 
                $('#add_personal').on('click', function() {
                    var campos_form = ["cargo","personal" ];//campos que queremos que se validen
                    if(!validar_form(campos_form)){
                        return false;            
                    }

                    var id_per= $('#personal').val();

                    var per= $('#personal option:selected' ).text();
                    var car= $('#cargo option:selected' ).text();
                    var li =" <li id='li_"+(++cant_personal)+"'> " +
                                "<input id='input_"+(cant_personal)+"' type='hidden' name='personales[]' value='"+id_per+"' >" + 
                                " <span class='handle'><i class='fa fa-user'></i></span>  " +                               
                                "<span class='text'>"+ per +" </span>" +
                                "<small class='label label-info'>"+ car+"</small>"+
                                "<div onclick='RemoverPersonalViaje("+(cant_personal)+","+id_per+")' class='tools' style='display:block' >"+
                                  "  <i class='fa fa-trash-o'></i>"+
                                "</div>"+
                            "</li> ";

                    var htmlString = $('#lista_personal').html();

                    $('#lista_personal').html(htmlString+li);
                    
                    //ya no permitir selecccionar la opcion
                    $('#personal').children('option[value="'+id_per+'"]').attr('class','option_utilizada');

                    //limpiar los selects
                    $('#personal').val('');$('#cargo').val('');
                });

                
            });
            
            function RemoverPersonalViaje(num,id){
                $('#li_'+num).html('');
                $('#li_'+num).addClass('option_oculta');

                
                $('#personal').children('option[value="'+id+'"]').removeClass('option_utilizada');
                $('#personal').children('option[value="'+id+'"]').addClass('option_oculta');

                alert('Personal Eliminado: '+id );
            }

        </script>
    </body>
</html>