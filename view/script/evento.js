var tabla;

function inic() {
    listarEvento();

    $("#frmEvento").on("submit",function(e){
        guardar(e);
    })
    $("#imagenmuestra").hide();
}

function listarEvento(){
    tabla = $('#tblevento').dataTable(
        {
            language: {
                url: '../plugins/datatables/es_es.json'
            },
            "aProcessing": true,
			"aServerSide": true,
			dom: 'Bfrtip',
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdf'
			],
            columnDefs:[
                {className: "dt-head-center", targets:[0,1,2]}
            ],
            "ajax": {
                url: '../controllers/eventoController.php?op=listar',
                type: "get",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                }
            },
            "bDestroy": true,
			"idDisplay": 10,
			"order": [],
			"scrollX": true
        }).DataTable();
}
function limpiar(){
    $("#idevento").val("");
    $("#titulo").val("");
    $("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
    $("#descripcion").val("");
    tabla.ajax.reload();
}
function guardar(event){
    event.preventDefault();
    
    var formData = new FormData($("#frmEvento")[0]);

    $.ajax({
        url: "../controllers/eventoController.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos){
            bootbox.alert(datos);	
	        tabla.ajax.reload();
        }
    });
    limpiar();
    
}
function mostrar(idevento){
    
    $.post("../controllers/eventoController.php?op=mostrarEventoEditar", { idevento: idevento }, function(data,status)
    {
        data = JSON.parse(data);        
        $("#titulo").val(data.titulo);
        $("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/evento/"+data.imagen);
		$("#imagenactual").val(data.imagen);
        $("#descripcion").val(data.descripcion);
        $("#idevento").val(data.idevento);

    });
}
function eliminar(idevento){
    $.post("../controllers/eventoController.php?op=eliminar", { idevento: idevento }, function(e)
    {
        alert(e);
        tabla.ajax.reload();
    });
}

inic();