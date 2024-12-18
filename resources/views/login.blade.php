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

<body>
    <!-- Conteneur pour Particle.js -->
    <div id="particles-js" style="position: absolute; width: 100%; height: 100%; z-index: -1;"></div>

    <!-- Section de connexion -->
    <section class="d-flex justify-content-center align-items-center" style="height: 100vh; position: relative; z-index: 1;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-white pb-5">
                            <h4 class="text-center">Login</h4>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">

                            <!-- Affichage des erreurs -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Formulaire -->
                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="ni ni-email-83 text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="ni ni-lock-circle-open text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rememberMe" name="remember">
                                    <label class="custom-control-label" for="rememberMe">Remember me</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark my-4">Connexion</button>
                                </div>
                                <div class="col-12 text-center">
                                    <a href="{{ route('search') }}" class="text-dark">
                                        <small>Anonyme?</small>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="#" class="text-light">
                                <small>Forgot password?</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Particle.js Initialization -->
    <script>
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 160,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    }
                },
                "opacity": {
                    "value": 1,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 0,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 4,
                        "size_min": 0.3,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": false
                },
                "move": {
                    "enable": true,
                    "speed": 1,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 600
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "bubble"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "resize": true
                },
                "modes": {
                    "bubble": {
                        "distance": 250,
                        "size": 0,
                        "duration": 2,
                        "opacity": 0,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 400,
                        "duration": 0.4
                    }
                }
            },
            "retina_detect": true
        });
    </script>
</body>
