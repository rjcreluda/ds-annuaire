<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ config('app.name')}}</title>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/fontawesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-default fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <img class="navbar-logo" src="images/logo-annuaire-diegp-suarez.png" alt="DS Annuaire">
                </a>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-reorder border-light"></span>
            </button>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto ml-4">

                    <li class="nav-item">
                        <a class="nav-link" href="index.html" role="button">Accueil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="categories.html" role="button">Catégories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="services.html" role="button">Services</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link ropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Tourisme <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"><a href="categorie-tourisme.html">Toutes les Visites</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="categorie-faune.html">Faune aquatique</a></li>
                            <li><a href="categorie-park.html">Parc</a></li>
                            <li><a href="categorie-evenement.html">Événements</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="promotions.html" role="button">Promotions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html" role="button">Contact</a>
                    </li>
                </ul>
                @if( Route::has('login') )
                    <div id="login-btn">
                    @auth
                        <a class="btn btn-success btn-sm" href="{{ route('front.profile')}}">Mon Profil</a>
                        <a class="btn btn-danger btn-sm text-light" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Deconnexion
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a class="btn btn-info btn-sm" href="{{ route('connexion') }}">Connexion / Inscription</a>
                    @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>
    <div class="fw-slider-hero">
        <div class="fw-slider">
            <div class="fw-slider-item fw-slide-1" style="background: url(/images/hero-image.jpg);background-size: cover;background-position: 50%;">
                <div class="bg-overlay">
                    <div class="hero-content-wrapper">
                        <div class="hero-content">
                            <div class="container">
                                <div class="search-bar mt-5 p-3 p-lg-1 pl-lg-4">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-9 d-flex align-items-center">
                                                <input type="text" name="search" placeholder="Que cherchez vous?" class="form-control border-0 shadow-0">
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-block rounded-xl h-100">Rechercher </button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- search bar-->
                            </div>
                        </div><!-- hero content -->
                    </div>

                </div>
            </div>
        </div>
    </div><!-- slider-hero -->

    <!--=====================================
        BEGIN CONTENT
    =======================================-->

    <section class="py-5">
        @yield('content')
    </section>


    <!--=====================================
    END CONTENT
    =======================================-->

    <section class="footer">
        <div class="container-md">
            <div class="row mt-5">
                <div class="col-lg-3 col-sm-6 col-12 mb-3">
                    <img class="img-fluid" src="images/logo-annuaire-diegp-suarez.png" alt="footer-logo">
                    <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                    <div class="footer-contact">
                        <ul>
                            <li><i class="icon-map-marker"></i> 33 Rue Colbert Antsiranana</li>
                            <li><i class="icon-phone"></i> (+261) 032 51 519 89</li>
                            <li><i class="icon-envelope"></i>  Infos@diego-suarez.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-6 mb-3">
                    <div class="footer-title"><h4>Menu</h4></div>
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">Accueil</a></li>
                            <li><a href="#">Categories</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-6 mb-3">
                    <div class="footer-title"><h4>Top Categories</h4></div>
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">Hotel</a></li>
                            <li><a href="#">Restaurant</a></li>
                            <li><a href="#">Excursion</a></li>
                            <li><a href="#">Association</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 mb-3">
                    <div class="footer-title"><h4>Inscrire mon Activité</h4></div>
                    <div class="footer-menu">
                        <a href="3" class="btn btn-block blue-bg">Je veux inscrire mon activité Maintenant</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- .footer -->

    <section class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">Copyright &copy; 2020 - Annuaire des professionnels de Diego Suarez</div>
            </div>
        </div>
    </section>


    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ds-annuaire.js') }}"></script>

    @yield('script')
</body>
</html>