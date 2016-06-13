
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
                
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true, 
                    timePickerIncrement: 10, 
                    timePicker24Hour:true,
                    locale: {
                        format: 'YYYY-MM-DD HH:mm'
                    }
                });
                
                $('#add_personal').on('click', function() {
                    var campos_form = ["cargo","personal" ];//campos que queremos que se validen
                    if(!validar_form(campos_form)){
                        return false;            
                    }

                    var id_per= $('#personal').val();

                    var per= $('#personal option:selected' ).text();
                    var car= $('#cargo option:selected' ).text();
                    var li =" <li> " +
                                "<input type='hidden' name='personales[]' value='"+id_per+"' >" + 
                                " <span class='handle'><i class='fa fa-user'></i></span>  " +                               
                                "<span class='text'>"+ per +" </span>" +
                                "<small class='label label-info'>"+ car+"</small>"+
                                "<div class='tools'>"+
                                  "  <i class='fa fa-trash-o'></i>"+
                                "</div>"+
                            "</li> ";

                    var htmlString = $('#lista_personal').html();

                    $('#lista_personal').html(htmlString+li);

                    $('#personal').val('');$('#cargo').val('');
                });



            });
        </script>
    </body>
</html>