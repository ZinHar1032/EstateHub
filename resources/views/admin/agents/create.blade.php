<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>EstateHUB - Ajouter un Agent</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <style>
        .form-container {
            max-width: 700px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .form-title {
            color: #2a2a2a;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #007bff;
            font-weight: 600;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            font-weight: 500;
            color: #2a2a2a;
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px 15px;
            width: 100%;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
            outline: none;
        }
        
        .btn-submit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            margin-right: 10px;
        }
        
        .btn-submit:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .btn-cancel {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-cancel:hover {
            background-color: #545b62;
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }
        
        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .required:after {
            content: " *";
            color: #dc3545;
        }
        
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .text-danger {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        
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
                                                            <li><a href="{{ route('agents.index') }}" class="active">Gestion des Agents</a></li>

                          @elseif (auth()->user()->role === 'agent')
                              <!-- Menu pour l'agent -->
                              <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
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
        <a href="{{ route('agents.index') }}">Administration</a> / 
        Ajouter un Agent
      </span>
      <h3>Ajouter un Nouvel Agent</h3>
    </div>
  </div>

  <!-- Formulaire d'ajout -->
  <div class="container">
    <div class="form-container">
      <h2 class="form-title">
        <i class="fa fa-user-plus"></i> Informations de l'agent
      </h2>
      
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      
      <form method="POST" action="{{ route('agents.store') }}">
        @csrf
        
        <div class="form-group">
          <label for="nom_complet" class="required">Nom complet</label>
          <input type="text" class="form-control" id="nom_complet" name="nom_complet" 
                 value="{{ old('nom_complet') }}" required placeholder="Ex: Ahmed Benali">
          @error('nom_complet')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="email" class="required">Adresse email</label>
              <input type="email" class="form-control" id="email" name="email" 
                     value="{{ old('email') }}" required placeholder="exemple@email.com">
              @error('email')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="tel">Téléphone</label>
              <input type="text" class="form-control" id="tel" name="tel" 
                     value="{{ old('tel') }}" placeholder="Ex: 06 12 34 56 78">
              @error('tel')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="ville">Ville</label>
              <input type="text" class="form-control" id="ville" name="ville" 
                     value="{{ old('ville') }}" placeholder="Ex: Casablanca">
              @error('ville')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="role" class="required">Rôle</label>
              <select class="form-control" id="role" name="role" required>
                <option value="">Sélectionner un rôle</option>
                <option value="agent" {{ old('role') == 'agent' ? 'selected' : '' }}>Agent</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
              </select>
              @error('role')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="password" class="required">Mot de passe</label>
              <input type="password" class="form-control" id="password" name="password" required>
              @error('password')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="password_confirmation" class="required">Confirmer le mot de passe</label>
              <input type="password" class="form-control" id="password_confirmation" 
                     name="password_confirmation" required>
            </div>
          </div>
        </div>
        
        <div class="form-actions">
          <a href="{{ route('agents.index') }}" class="btn-cancel">
            <i class="fa fa-times"></i> Annuler
          </a>
          <button type="submit" class="btn-submit">
            <i class="fa fa-save"></i> Enregistrer l'agent
          </button>
        </div>
      </form>
    </div>
  </div>

  <footer>
    <div class="container">
      <p>© 2026 EstateHUB.ma Tous droits réservés.</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    $(document).ready(function() {
      // Validation des mots de passe
      $('#password_confirmation').on('keyup', function() {
        if ($('#password').val() != $('#password_confirmation').val()) {
          $(this).css('border-color', '#dc3545');
        } else {
          $(this).css('border-color', '#28a745');
        }
      });
      
      // Auto-dismiss des alertes
      setTimeout(function() {
        $('.alert').fadeOut('slow');
      }, 5000);
    });
  </script>

</body>
</html>