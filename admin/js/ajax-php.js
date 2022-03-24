$(document).ready(function() {
    $('#guardar-registro').on('submit', function(e) {
            e.preventDefault();

            var datos = $(this).serialize(); 

            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',             
                success: function(data) {
                    console.log(data);
                    if(data.respuesta == 'correcto') {
                        swal(
                            'Registro Exitoso!',
                            'Se agregó correctamente!',
                            'success'
                        )
                    } else {
                        swal(
                            'Error...',
                            'Hubo un error al enviar su información!',
                            'error'
                        )
                    }
                }
            });
    });

    $('#guardar-registro-archivo').on('submit', function(e) {
        e.preventDefault();
        
        // para enviar el multipart/form-data
        var datos = new FormData(this);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            // tipo de datos jsn
            dataType: 'json',
            /* When Ajax*/
            contentType: false,
            //para enviar imagenes processdata debe ser false
            processData: false, 
            async: true,
            // no cachear la página al request
            cache: false,                
            success: function(data) {
                console.log(data);
                if(data.respuesta == 'correcto') {
                    swal(
                        'Registro Exitoso!',
                        'Se agregó correctamente!',
                        'success'
                    )
                } else {
                    swal(
                        'Error...',
                        'Hubo un error al enviar su información!',
                        'error'
                    )
                }
            }
        });
    });

    $('.borrar_registro').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var tipo = $(this).attr('data-tipo');
            swal({
                title: 'Estas seguro?',
                text: "Esta acción no se puede revertir!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si! Eliminar',
                cancelButtonText: 'Cancelar'
            }).then(function () {

                    $.ajax({
                        type: 'post',
                        data: {
                            'id': id,
                            'registro': 'eliminar'
                        },
                        url: 'modelo-'+tipo+'.php',
                        success: function(data) {
                            console.log(data);
                            var resultado =  JSON.parse(data);
                            if(resultado.respuesta == "correcto") {
                                swal(
                                    'Eliminado!',
                                    'Your file has been deleted.',
                                    'success'
                                );
                                console.log(data);
                                jQuery("[data-id='"+resultado.id_eliminado+"'").parents('tr').remove();
                            } else {
                                swal(
                                    'Error!',
                                    'No se pudo eliminar, intente de nuevo.',
                                    'error'
                                )
                            }
                        }
                    });

            });
    });

    
});