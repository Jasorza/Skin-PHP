var tabla;

function init(){

 $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);
    })
}

function limpiar(){
    $("#Nombres").val("");
    $("#Apellidos").val("");
    $("#Email").val("");
    $("#Contraseña").val("");
}

function guardaryeditar(e)
{
    e.preventDefault();
    $("#Enviar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/registrarse.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos)
        {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}


function revisar(elemento){
    if(elemento.value==''){
        elemento.className='error';
        alert("Complete todos los campos")
    }else{
        elemento.className='input';
        
    }
}

// function revisaLongitud(elemento, min){
//     if(elemento.value!==''){ 
//         var data = elemento.value;
//         if(data.length<min){
//             elemento.className='error';
//             alert("Complete todos los campos")
//         }else{
//             elemento.className='input';
            
//         }
//     }
// }

// function revisarEmail(elemento){
//     if(elemento.value!==''){
//         var data = elemento.value;
//         var exp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//         if(!exp.test(data)){
//             elemento.className='error';
//             alert("Ingrese un correo válido")
//         }else{
//             elemento.className='form-control';

//         }	
//     }
// }

// function revisaPass(elemento) {
//     if (elemento.value !== '') {
//         var data = elemento.value;
//         regexp_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/;
//         if (!regexp_password.test(data)) {
//             elemento.className = 'error';
//             alert("La contraseña debe tener entre 8 y 15 carácteres, debe contener al menos una letra mayúscula y un carácter")
//         } else {
//             elemento.className = 'form-control';
//         }
//     }
// }


// function validar(){
//     var datosCorrectos=true;
//     var error="";
     
//     var exp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     if(!exp.test(document.getElementById("inputEmail").value)){
//         datosCorrectos=false;
//         error="Email Invalido";
//         return false;
//     }

//     var regexp_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/;
//     if (!regexp_password.test(document.getElementById('password').value)) {
//         datosCorrectos = false;
//         error = "La contraseña no debe ser inferior a 8 caracteres debe tener: letras, números, caracteres especiales, mayúscula y mínuscula";
//         return false;
//     }
    
//     if(!datosCorrectos){
//         alert('Hay Errores En El formulario'+error);
//     }

//     return datosCorrectos;



    
// }

init();