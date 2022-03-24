$(document).ready(function() {


            $('.select2').select2();       

            $('#datepicker').datepicker({
                autoclose: true
            });

            $('.timepicker').timepicker({
                showInputs: false
            });

            
            
        
            $('#registros').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                'pageLength'  : 10,
                'language': {
                    paginate: {
                      next: 'Siguiente', // or '→'
                      previous: 'Anterior' // or '←' 
                    },
                    info: "Mostrando _START_ a _END_ de _TOTAL_ resultados"
                  }
            });

            

            $('input#password_repetir').on('input', function() {
                    var password_nuevo = $('input#password').val();

                    if( $(this).val() == password_nuevo ) {
                        $('#resultado_password').text('Correcto');
                        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
                        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
                    } else {
                        $('#resultado_password').text('Los Passwords no son iguales');
                        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
                        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
                    }
            });
  

            $('#icono').iconpicker();
        
             // LINE 
             
            $.getJSON('servicio-registrados.php', function( data ){
                console.log(data);
                var line = new Morris.Line({
                    element: 'grafica-registros',
                    resize: true,
                    data: data,
                    xkey: 'fecha',
                    ykeys: ['cantidad'],
                    labels: ['Registrados'],
                    lineColors: ['#3c8dbc'],
                    hideHover: 'auto'
                });
            });
  
});
