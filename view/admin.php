<?php
//activamos el almacenamiento buffer
ob_start();
session_start();

if(!isset($_SESSION["username"]))
{
    header("Location: login.php");
}
else{
    require 'header.php';
?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Vista /</span> Dashboard</h4>
                
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Bienvenido al sistema</h5>
                    <div class="card-body">
                      <p class="card-text">
                        Aqui podras dar mantenimiento a los modulos NOTICIAS y EVENTOS.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <hr class="my-5" />

            </div>
            <!-- / Content -->
<?php
    require 'footer.php';
} 
ob_end_flush();

?>

