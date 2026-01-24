<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>EstateHUB - Votre Partenaire immobilier</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <style>
        /* Bouton déconnexion dans le sub-header */
        .logout-form {
            display: inline-block;
            margin: 0;
        }

        .logout-btn {
            background-color: #dc3545;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 13px;
            padding: 5px 15px;
            font-family: 'Poppins', sans-serif;
            border-radius: 4px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .logout-btn:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        .logout-btn i {
            margin-right: 5px;
        }

        .social-links li.logout-item {
            margin-left: 10px;
        }

        /* Supprimer le cercle noir du lien actif */
        .nav li a.active {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
    </style>
</head>

<body>

  <!-- ***** Préchargeur ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>

  <!-- Sub-header avec bouton de déconnexion -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> info@estatehub.ma</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>

            @auth
            <!-- Bouton déconnexion dans le sub-header -->
            <li class="logout-item">
              <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">
                  <i class="fa fa-sign-out-alt"></i> Déconnexion
                </button>
              </form>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('home') }}" class="logo">
                        <h1>EstateHUB</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li><a href="{{ route('biens') }}">Annonces</a></li>

                        @auth
                            @if (auth()->user()->role === 'admin')
                                <!-- Menu pour l'administrateur -->
                                <li><a href="{{ route('agents.index') }}">Gestion des Agents</a></li>
                                <li><a href="{{ route('types.index') }}">Gestion des Types</a></li>
                                <li><a href="{{ route('categories.index') }}" >Gestion des Catégories</a></li>
                            <li></li>
                                @elseif (auth()->user()->role === 'agent')
                                <!-- Menu pour l'agent -->
                                <li><a href="{{ route('propriete.create') }}">Ajouter un bien</a></li>
                                <li><a href="{{ route('biens') }}">Modifier mes biens</a></li>
                                <li><a href="{{ route('rdv.index') }}">Mes RDV</a></li>
                            @elseif (auth()->user()->role === 'client')
                                <!-- Menu pour le client -->
                                <li><a href="{{ route('contact') }}">Contactez-nous</a></li>
                            @endif
                        @else
                            <!-- Menu pour les utilisateurs non connectés -->
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="fa fa-user"></i> Se connecter
                                </a>
                            </li>
                        @endauth
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>

  <!-- En-tête de page -->
  <div class="page-heading header-text">
    <div class="container">
      <span class="breadcrumb">
        <a href="{{ route('home') }}">Accueil</a> /
        Biens
      </span>
      <h3>Bienvenue : c'est votre espace 'Admin'</h3>
    </div>
  </div>

  <!-- Contenu principal -->
  <div class="admin-content">
    <div class="container">
      <!-- Votre contenu ici -->
    </div>
  </div>

  <!-- Pagination -->
  <div class="container">
    <ul class="pagination">
      <li><a href="#">1</a></li>
      <li><a class="is_active" href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">>></a></li>
    </ul>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p>© 2026 EstateHUB.ma Tous droits réservés.</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/counter.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>
