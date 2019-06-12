$("#frmAcceso").on('submit',function(e)
{
   e.preventDefault();
   usuario=$("#usuario").val();
   clave=$("#clave").val();
   $.post('../ajax/usuario.php?op=validaracceso',
                {"usuario":usuario, "clave":clave},
                function (data)
                {
                    if(data==="\r\nnull")
                    {
                        bootbox.alert("Usuario y/o Contraseña Incorrectos");
                    }
                    else{
                        $(location).attr("href","categoria.php");
                    }

                }
                );

})