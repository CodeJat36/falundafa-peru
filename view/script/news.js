var tabla;

function inic() {
    listarNews();

    $("#frmNews").on("submit",function(e){
        guardar(e);
    })
    $("#imagenmuestra").hide();
}

function listarNews(){
    tabla = $('#tblnews').dataTable(
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
                url: '../controllers/noticiasController.php?op=listar',
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
    $("#id").val("");
    $("#title").val("");
    $("#encabezado").val("");
    $("#body").val("");
    $("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
    $("#fuente").val("");
    $("#user_id").val("");
    tabla.ajax.reload();
}
function guardar(event){
    event.preventDefault();
    
    var formData = new FormData($("#frmNews")[0]);

    $.ajax({
        url: "../controllers/noticiasController.php?op=guardaryeditar",
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
function mostrar(id){
    
    $.post("../controllers/noticiasController.php?op=mostrarNoticiaEditar", { id: id }, function(data,status) 
    {
        data = JSON.parse(data);
        
        $("#title").val(data.title);
        $("#encabezado").val(data.encabezado);
        $("#body").val(data.body);
        $("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/noticias/"+data.img);
		$("#imagenactual").val(data.img);
        $("#fuente").val(data.fuente);
        $("#user_id").val(data.user_id);
        $("#id").val(data.id);

    });
}
function eliminar(id){
    $.post("../controllers/noticiasController.php?op=eliminar", { id: id }, function(e)
    {
        alert(e);
        tabla.ajax.reload();
    });
}
function ver(){
    
}

inic();