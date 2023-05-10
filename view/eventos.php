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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Vista /</span> Eventos</h4>
              <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"
                      data-bs-toggle="modal"
                      data-bs-target="#eventoModal"><i class="bx bx-user me-1"></i> Agregar</a>
                    </li>
                  </ul>
                  <div class="modal fade" id="eventoModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalScrollableTitle">Eventos</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <form method="POST" id="frmEvento" enctype="multipart/form-data">
                                  <div class="col-12 mb-3">
                                    <small class="text-light fw-semibold d-block">Titulo</small>
                                    <input type="hidden" id="idevento" class="form-control" name="idevento">
                                    <input id="titulo" class="form-control" type="text" name="titulo" placeholder="Agrega un titulo" required>
                                  </div>
                                  <div class="col-12 mb-3">
                                    <small class="text-light fw-semibold d-block">Imagen</small>
                                    <input class="form-control" type="file" id="imagen" name="imagen">
                                    <input type="hidden" name="imagenactual" id="imagenactual">
                                    <div class="text-center p-2">
                                      <img src="" width="150px" height="120px" id="imagenmuestra">
                                    </div>
                                  </div>
                                  <div class="col-12 mb-3">
                                    <small class="text-light fw-semibold d-block">Descripcion</small>
                                    <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Agrega el numero de usuario que subió la noticia" required>
                                  </div>
                                  <div class="col-12 mb-3 text-end">
                                    <button type="button" onclick="limpiar()" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                      Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary" name="btnguardar">Guardar</button>
                                  </div>
                                  
                                </form>                                
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  
              <div class="card">
                <h5 class="card-header">Noticias</h5>
                <div class="table-responsive text-nowrap m-3">
                  <table class="table" id="tblevento">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    </tbody>
                  </table>
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
<script type="text/javascript" src="script/evento.js"></script>

