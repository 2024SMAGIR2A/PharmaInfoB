<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Compte</li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Explorer</li>
      </ol>
    </nav>

    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
      <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm mb-0 me-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Déconnexion
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </div>
</nav>
    <!-- End Navbar -->

    <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?auto=format&fit=crop&w=1920&q=80'); background-size: cover;">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-4">
            <form action="{{ route('pharmacies.search') }}" method="GET" class="d-flex justify-content-center">
                <div class="input-group w-70 mx-auto rounded-lg border border-white">
                    <span class="input-group-text bg-white border-right-0 rounded-l-lg">
                    <span class="material-symbols-outlined"></span>
                    </span>
                    <input type="text" name="query" class="form-control border-0 rounded-pill text-white text-bolder" placeholder="Entrez le nom ou la zone de la pharmacie souhaitée..." aria-label="Recherche" />
                </div>
            </form>
        </div>
      </div>

      <!-- User Profile Card -->
      <div class="card card-body mx-2 mx-md-2 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <i class="ni ni-single-02 text-white bg-primary rounded-circle p-3"></i>
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">{{ Auth::user()->name }}</h5>
              <p class="mb-0 font-weight-normal text-sm">Rôle : {{ Auth::user()->role }}</p>
            </div>
          </div>
        </div>

        <!-- Informations -->
        <div class="row">
          <div class="col-xl-6 col-md-12 mb-4">
            <div class="card">
              <div class="card-header pb-0 p-3">
                <h6>Informations du compte</h6>
              </div>
              <div class="card-body p-3">
                <ul class="list-group">
                  <li class="list-group-item d-flex align-items-center px-0 border-0">
                    <i class="ni ni-email-83 text-primary me-3"></i>
                    <span>Email : {{ Auth::user()->email }}</span>
                  </li>
                  <li class="list-group-item d-flex align-items-center px-0 border-0">
                    <i class="ni ni-circle-08 text-primary me-3"></i>
                    <span>Nom complet : {{ Auth::user()->name }}</span>
                  </li>
                  <li class="list-group-item d-flex align-items-center px-0 border-0">
                    <i class="ni ni-calendar-grid-58 text-primary me-3"></i>
                    <span>Date d'inscription : {{ Auth::user()->created_at }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Pharmacies favorites -->
          <div class="col-xl-6 col-md-12">
            <div class="card">
              <div class="card-header pb-0 p-3">
                <h6>Pharmacies favorites</h6>
              </div>
              <div class="card-body p-3">
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core JS -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>
</html>
