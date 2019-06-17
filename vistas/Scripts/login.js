$("#frmAcceso").on('submit',function(e)
{
   e.preventDefault();
   Email=$("#Email").val();
   Contrasena=$("#Contrasena").val();
   $.post('../ajax/usuario.php?op=validaracceso',
                {"Email":Email, "Contrasena":Contrasena},
                function (data)
                {
                    if(data==="\r\nnull")
                    {
                        bootbox.alert("Email y/o Contraseña Incorrectos");
                    }
                    else{
                        $(location).attr("href","proveedor.php");
                    }

                }
                );

})