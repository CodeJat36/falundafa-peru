<?php
require "models/modelNoticia.php";
$resultado = getDatos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>FalunDafa || Asociacion de Perú</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->


  <!-- Topbar Start -->
  <div class="container-fluid top-bar bg-dark text-light px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="row gx-0 align-items-center d-none d-lg-flex">
      <div class="col-lg-6 px-5 text-start">

      </div>
      <div class="col-lg-6 px-5 text-end">
        <small>Conoce más en:</small>
        <div class="h-100 d-inline-flex align-items-center">
          <a class="btn-lg-square text-primary border-end rounded-0" href="https://www.facebook.com/falundafaenperu/"><i class="fab fa-facebook-f"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Topbar End -->


  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
      <h1 class="text-primary m-0"><img src="img/fd MAS LETRAS.png" width="350px"></h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav mx-auto p-4 p-lg-0">
        <a href="index.html" class="nav-item nav-link active">Inicio</a>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Falun Dafa</a>
          <div class="dropdown-menu m-0">
            <a href="que-es.html" class="dropdown-item">¿Qué es Falun Dafa?</a>
            <a href="reconocimientos.html" class="dropdown-item">Reconocimientos</a>
            <a href="apoyo-global.html" class="dropdown-item">Apoyo global a Falun Dafa</a>
            <a href="aprender.html" class="dropdown-item">Aprender</a>
            <a href="beneficios-opiniones.html" class="dropdown-item">Beneficios y opiniones</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">La Persecución</a>
          <div class="dropdown-menu m-0">
            <a href="historia-china.html" class="dropdown-item">Historia antes de 1999</a>
            <a href="persecucion-china.html" class="dropdown-item">La persecución a Falun Dafa</a>
            <a href="about.html" class="dropdown-item">Extirpación forzada de organos</a>
            <a href="about.html" class="dropdown-item">Resoluciones en todo el mundo</a>
            <a href="about.html" class="dropdown-item">Petición</a>
            <a href="about.html" class="dropdown-item">Bibliografia</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Noticias</a>
          <div class="dropdown-menu m-0">
            <a href="about.html" class="dropdown-item">Ultimas noticias</a>
            <a href="about.html" class="dropdown-item">Falun Dafa en los medios</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Eventos</a>
          <div class="dropdown-menu m-0">
            <a href="#" class="dropdown-item">Shen Yun</a>
            <a href="evento.php" class="dropdown-item">Ultimos Eventos</a>
          </div>
        </div>
        <a href="contact.html" class="nav-item nav-link">Contactanos</a>
      </div>

    </div>
  </nav>
  <!-- Navbar End -->


  <!-- Page Header Start -->
  <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
      <h1 class="display-4 text-white animated slideInDown mb-3">Noticias</h1>
      <nav aria-label="breadcrumb animated slideInDown">
        <ol class="breadcrumb justify-content-center mb-0">
          <li class="breadcrumb-item"><a class="text-white" href="#">Inicio</a></li>
          <li class="breadcrumb-item text-primary active" aria-current="page">Noticias</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- Page Header End -->
  <?php $contador = 0; ?>
  <div class="container-xxl py-4">
    <div class="container">
      <div class="row mb-5">
        <?php foreach ($resultado as $row) { ?>
          <?php
          if ($contador % 2 == 0) { ?>
            <div class="row mb-5">

            <?php } ?>
            <div class="col-md">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <?php $imagen = "files/noticias/" . $row['img'];
                    if (!file_exists($imagen)) {
                      $imagen = "files/noticias/imagen-no.jpg";
                    }
                    ?>
                    <img class="card-img card-img-left align-center" src="<?php echo $imagen ?>" alt="Card image">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['title']; ?></h5>
                      <p class="card-text"><small class="text-muted"><?php echo $row['encabezado'] ?></small></p>
                      <p class="card-text"><?php echo $row['body'] ?></p>
                      <p class="card-tex"><a target="_blank" href="<?php echo $row['fuente'] ?>">Leer Más</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if ($contador % 2 != 0) {
              echo "</div>";
            }
            $contador++;
            ?>
          <?php } ?>
          <?php
          if ($contador % 2 != 0) {
            echo "</div>";
          }
          ?>
            </div>
      </div>
    </div>
  </div>





  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg-3 col-md-6">
          <h4 class="text-light mb-4">Datos de Contacto</h4>
          <p class="mb-2"><i class="fa-solid fa-envelope me-3"></i>contacto@falundafaperu.org</p>
          <div class="d-flex pt-2">
            <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://www.facebook.com/falundafaenperu/"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://www.youtube.com/channel/UCuRVQeYBpdW0fHIN8_HlvCQ"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-light mb-4">Enlaces</h4>
          <a class="btn btn-link" href="./index.html">Inicio</a>
          <a class="btn btn-link" href="./about.html">Acerca de</a>
          <a class="btn btn-link" href="./nosotros.html">Nosotros</a>
          <a class="btn btn-link" href="./persecucion-china.html">Persecusion</a>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-light mb-4">Enlaces</h4>
          <a class="btn btn-link" href="./reconocimientos.html">Reconocimientos</a>
          <a class="btn btn-link" href="./contact.html">Contactanos</a>
          <a class="btn btn-link" href="view/login.php">Login</a>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-light mb-4">Ubicación</h4>
          <div class="row">
            <div class="col rounded">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.3094690725275!2d-77.0760873!3d-12.090953800000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c9a104417045%3A0x7fa350026b4a19ee!2sJir%C3%B3n%20Yungay%20561%2C%20San%20Miguel%2015086!5e0!3m2!1ses-419!2spe!4v1683754359980!5m2!1ses-419!2spe" width="400" height="250" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->


  <!-- Copyright Start -->
  <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          &copy; <a href="https://www.falundafaperu.com/">falundafaperu</a>, Todos los Derechos reservados.
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>

</body>

</html>