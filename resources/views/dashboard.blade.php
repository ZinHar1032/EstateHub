<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>EstateHUB - Tableau de bord</title>

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
            color: #ff0d00 !important;
            font-weight: 600;
        }

        /* Styles pour le dashboard */
        .dashboard-container {
            padding: 60px 0;
            min-height: 60vh;
        }

        .dashboard-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            padding: 30px;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        .dashboard-card h3 {
            color: #2a2a2a;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .stat-box {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 8px;
            color: white;
            margin-bottom: 20px;
        }

        .stat-box h4 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-box p {
            font-size: 16px;
            margin: 0;
        }

        .welcome-message {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            border-radius: 10px;
            margin-bottom: 40px;
            text-align: center;
        }

        .welcome-message h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .quick-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .action-btn {
            flex: 1;
            min-width: 200px;
            padding: 15px 25px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .action-btn:hover {
            background: #0056b3;
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,123,255,0.3);
        }

        .action-btn i {
            font-size: 20px;
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

  <!-- ***** Sub Header ***** -->
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
                              <li><a href="{{ route('categories.index') }}">Gestion des Catégories</a></li>
                              <li><a href="{{ route('types.index') }}">Gestion des Types</a></li>
                              <li><a href="{{ route('agents.index') }}">Gestion des Agents</a></li>
                              <li><a href="{{ route('dashboard') }}" class="active">Tableau de bord</a></li>
                          @elseif (auth()->user()->role === 'agent')
                              <!-- Menu pour l'agent -->
                              <li><a href="{{ route('dashboard') }}" class="active">Tableau de bord</a></li>
                          @elseif (auth()->user()->role === 'client')
                              <!-- Menu pour le client -->
                              <li><a href="{{ route('contact') }}">Contactez-nous</a></li>
                              <li><a href="{{ route('dashboard') }}" class="active">Tableau de bord</a></li>
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
        Tableau de bord
      </span>
      <h3>Tableau de bord</h3>
    </div>
  </div>

  <!-- Contenu du Dashboard -->
  <div class="dashboard-container">
    <div class="container">
      
      <!-- Message de bienvenue -->
      <div class="welcome-message">
        <h2>Bienvenue, {{ Auth::user()->name ?? Auth::user()->nom_complet }}!</h2>
        <p>Vous êtes connecté en tant que <strong>{{ ucfirst(Auth::user()->role) }}</strong></p>
      </div>

      <div class="row">
        @if (auth()->user()->role === 'admin')
          <!-- Dashboard Admin -->
          <div class="col-lg-12">
            <div class="dashboard-card">
              <h3><i class="fa fa-tachometer-alt"></i> Tableau de bord Administrateur</h3>
              
              <div class="row">
                <div class="col-md-4">
                  <div class="stat-box">
                    <h4>{{ \App\Models\User::where('role', 'agent')->count() }}</h4>
                    <p>Agents</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="stat-box" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <h4>{{ \App\Models\Propriete::count() }}</h4>
                    <p>Propriétés</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="stat-box" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <h4>{{ \App\Models\User::where('role', 'client')->count() }}</h4>
                    <p>Clients</p>
                  </div>
                </div>
              </div>

              <div class="quick-actions">
                <a href="{{ route('agents.index') }}" class="action-btn">
                  <i class="fa fa-users"></i> Gérer les Agents
                </a>
                <a href="{{ route('categories.index') }}" class="action-btn">
                  <i class="fa fa-tags"></i> Gérer les Catégories
                </a>
                <a href="{{ route('types.index') }}" class="action-btn">
                  <i class="fa fa-th-large"></i> Gérer les Types
                </a>
                <a href="{{ route('biens') }}" class="action-btn">
                  <i class="fa fa-building"></i> Voir les Biens
                </a>
              </div>
            </div>
          </div>

        @elseif (auth()->user()->role === 'agent')
          <!-- Dashboard Agent -->
          <div class="col-lg-12">
            <div class="dashboard-card">
              <h3><i class="fa fa-briefcase"></i> Tableau de bord Agent</h3>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="stat-box">
                    <h4>{{ \App\Models\Propriete::where('user_id', Auth::id())->count() }}</h4>
                    <p>Mes Propriétés</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="stat-box" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <h4>{{ \App\Models\RendezVousPropriete::whereHas('propriete', function($q) {
                        $q->where('user_id', Auth::id());
                    })->count() }}</h4>
                    <p>Rendez-vous</p>
                  </div>
                </div>
              </div>

              <div class="quick-actions">
                <a href="{{ route('propriete.create') }}" class="action-btn">
                  <i class="fa fa-plus-circle"></i> Ajouter un Bien
                </a>
                <a href="{{ route('biens') }}" class="action-btn">
                  <i class="fa fa-building"></i> Mes Biens
                </a>
                <a href="{{ route('rdv.index') }}" class="action-btn">
                  <i class="fa fa-calendar"></i> Mes Rendez-vous
                </a>
              </div>
            </div>
          </div>

        @elseif (auth()->user()->role === 'client')
          <!-- Dashboard Client -->
          <div class="col-lg-12">
            <div class="dashboard-card">
              <h3><i class="fa fa-user"></i> Tableau de bord Client</h3>
              
              <div class="row">
                <div class="col-md-12">
                  <div class="stat-box">
                    <h4>{{ \App\Models\RendezVousPropriete::where('user_id', Auth::id())->count() }}</h4>
                    <p>Mes Rendez-vous</p>
                  </div>
                </div>
              </div>

              <div class="quick-actions">
                <a href="{{ route('biens') }}" class="action-btn">
                  <i class="fa fa-search"></i> Rechercher un Bien
                </a>
                <a href="{{ route('rdv.index') }}" class="action-btn">
                  <i class="fa fa-calendar"></i> Mes Rendez-vous
                </a>
                <a href="{{ route('contact') }}" class="action-btn">
                  <i class="fa fa-envelope"></i> Contactez-nous
                </a>
              </div>
            </div>
          </div>
        @endif
      </div>

    </div>
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