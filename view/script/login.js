$("#frmAcceso").on('submit',function(e)
{
	e.preventDefault();
    username=$("#correo").val();
    password=$("#pass").val();

    $.post("../controllers/loginController.php?op=verificar",
        {"username":username,"password":password},
        function(data)
    {
        if (data!="null")
        {
            $(location).attr("href","admin.php");            
        }
        else
        {
            bootbox.alert("Usuario y/o Password incorrectos");
        }
    });
})