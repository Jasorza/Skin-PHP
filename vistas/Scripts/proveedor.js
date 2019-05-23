var tabla;

function init(){
    mostrarform(false);
    listar();

    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);
    })
}

function limpiar(){
    $("#NIT").val("");
    $("#Direccion").val("");
    $("#Correo").val("");
    $("#Telefono").val("");
    $("#IdProveedor").val("");
}

function mostrarform(bandera){
    limpiar();
    if (bandera) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    }
    else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

function cancelarform(){
    mostrarform(false);
}

function listar(){
    tabla=$('#tbllistado').dataTable(
    {
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "ajax":{
            url:'../ajax/proveedor.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 5,
        "order": [[0, "desc"]]
    }).DataTable();
}



function guardaryeditar(e)
{
    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/proveedor.php?op=guardaryeditar",
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

function mostrar(IdProveedor)
{
    $.post("../ajax/proveedor.php?op=mostrar",{IdProveedor : IdProveedor}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#NIT").val(data.NIT);
        $("#Direccion").val(data.Direccion);
        $("#Correo").val(data.Correo);
        $("#Telefono").val(data.Telefono);
        $("#IdProveedor").val(data.IdProveedor);
    })
}

function eliminar(IdProveedor)
{
    bootbox.confirm("Está seguro que desea eliminar este proveedor?"), function(result){
        if (result) {
            $.post("../ajax/proveedor.php?op=eliminar", {IdProveedor : IdProveedor}, function(e)
            {
                bootbox.alert(e);
                tabla.ajax.reload();
            } );
        }
    }
}

init();