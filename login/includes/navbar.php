<?php 
session_start();
error_reporting(0);
$varsesion=$_SESSION['usuarios'];
if (isset($varsesion)) {
    ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Dashboard Template · Bootstrap</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="css/estilos.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ActiveBox</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="../login/includes/cerrar_session.php">Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="usuarios.php">
                <span data-feather="home"></span>
                Usuarios <span></span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="../login/main.php">
                <span data-feather="file"></span>
                Main
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login/features.php">
                <span data-feather="file"></span>
                Features
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login/works.php">
                <span data-feather="shopping-cart"></span>
                Works
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login/ourteam.php">
                <span data-feather="users"></span>
                OurTeam
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login/testimonials.php">
                <span data-feather="bar-chart-2"></span>
                Testimonials
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login/downloads.php">
                <span data-feather="layers"></span>
                Downloads
              </a>
            </li>
        </div>
      </nav>
</body>
</html>
<?php 
}else{
header("location:../login/index.php");
}

 ?>