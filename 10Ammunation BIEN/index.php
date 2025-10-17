<?php
session_start();
require_once 'config.php';
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">


<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <title>Ammunation</title>
  <meta name="theme-color" content="#712cf9" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="<?=BASE_URL;?>css/navbar-fixed.css" rel="stylesheet" />
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: #0000001a;
      border: solid rgba(0, 0, 0, 0.15);
      border-width: 1px 0;
      box-shadow:
        inset 0 0.5em 1.5em #0000001a,
        inset 0 0.125em 0.5em #00000026;
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -0.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .bi {
      width: 1em;
      height: 1em;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Ammunation</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="control/rifles_controller.php">Rifles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="control/armas_controller.php">Arma blanca</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="control/explosivos_controller.php">Explosivos</a>
          </li>
        </ul>
        <ul class="navbar-nav mb-2 mb-md-0">
          <?php
          if (isset($_SESSION['user'])) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="control/logout_controller.php">Logout</a>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?s=registro">Registro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?s=login">Login</a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container">
          
    <?php
    if (isset($_SESSION['flash'])) {
      // echo $_SESSION['flash-type'];
    ?>
      <div class='alert alert-<?php echo $_SESSION['flash-type'] ?>' role="alert">
        <?php echo $_SESSION['flash'] ?>
      </div>
    <?php
      unset($_SESSION['flash']);
      unset($_SESSION['flash-type']);
    }
    ?>
    <?php
    //Cargar sección correspondiente
    
    if (isset($contenido)) {
      include "sections/$contenido.php";
    }else{
      include "sections/home.php";
    }
    

    ?>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
  </script>
</body>

</html>