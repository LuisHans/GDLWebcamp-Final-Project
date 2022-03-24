$(document).ready(function() {
        // Login Form
    $('#login').on('submit', function(e) {
            e.preventDefault();
            var datos = $(this).serializeArray();
            // console.log(datos);
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: "login-admin.php",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var resultado = data;
                    if(resultado.resultado == 'exito') {
                        swal(
                            'Login Exitoso' ,
                            'El usuario ' + resultado.usuario  + ' se logueo correctamente',
                            'success'
                        )
                        setTimeout(function(){
                            window.location.href = 'admin-area.php';
                        }, 3000);
                    } else {
                        swal(
                            'Error',
                            'Password Incorrecto o Usuario No existente',
                            'error'
                        )
                    }
                }
            });
    });
});