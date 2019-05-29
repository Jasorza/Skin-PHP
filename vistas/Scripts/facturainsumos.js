var tabla;

function init(){
    mostrarform(false);
    listar()

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    })
}

function limpiar(){
    $("#NIT").val("");
    $("Material").val("");
    $("Cantidad").val("");
    $("Costo").val("");
}

function mostrarform(bandera){
    limpiar();
    if (bandera) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    }
    else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

function cancelarform(){
    mostrarform();
}

function listar() {
    tabla = $("#tbllistado").dataTable({

        "aProcessing":      true,
        "aServerSide":      true,
        dom:                'Bfrtip',
        "ajax": {
            url:            '../ajax/facturainsumos.php?op=listar',
            type:           "get",
            dataType:       "json",
            error:          function (e) {
                console.log(e.responseText);
            }
        },
        "bDestroy":         true,
        "iDisplayLength":   5,
        "order":            [[0, "desc"]]
    }).DataTable();
}

function guardaryeditar(e){
    e.prevenDefault();
    $("#btnGuardar").prop("disabled", true);
    var formData = FormData($("#formulario")[0]);

    $.ajax({
        url:            "../ajax/facturainsumos.php?op=gardaryeditar",
        type:           "POST",
        data:           formData,
        contentType:    false,
        processData:    false,

        success:        function (datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}

function mostrar(IdFacturaInsumos){
    $.post("../ajax/facturainsumos.php?op=mostrar", {IdFacturaInsumos : IdFacturaInsumos}, function(data, status){
        data = JSON.parse(data);
        mostrarform(true);
        $("#NIT").val(data.NIT)
        $("#Material").val(data.Material)
        $("#Cantidad").val(data.Cantidad)
        $("#Costo").val(data.Costo)
    })
}

function eliminar(IdFacturaInsumos){
    bootbox.confirm("Esta seguro que desea eliminar esta Factura?", function(result){
        if (result) {
            $.post("../ajax/facturainsumos.php?op=eliminar", {IdFacturaInsumos : IdFacturaInsumos}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();