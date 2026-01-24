<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>EstateHUB - Ajouter un Type</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
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

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
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
        }

        /* Style pour la case à cocher */
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-weight: normal;
            margin: 0;
        }

        .custom-checkbox {
            position: relative;
            width: 50px;
            height: 26px;
            margin-right: 10px;
        }

        .custom-checkbox input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .checkbox-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 34px;
            transition: .4s;
        }

        .checkbox-slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            border-radius: 50%;
            transition: .4s;
        }

        .custom-checkbox input:checked + .checkbox-slider {
            background-color: #28a745;
        }

        .custom-checkbox input:checked + .checkbox-slider:before {
            transform: translateX(24px);
        }

        .checkbox-text {
            font-size: 14px;
            color: #495057;
        }

        .checkbox-text.active {
            color: #28a745;
            font-weight: 500;
        }

        .checkbox-text.inactive {
            color: #dc3545;
        }

        .form-hint {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
            font-style: italic;
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
                                <li><a href="{{ route('categories.index') }}">Gestion des Catégories</a></li>
                                                                <li><a href="{{ route('types.index') }}" class="active">Gestion des Types</a></li>

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
        <a href="{{ route('types.index') }}">Administration</a> /
        Ajouter un Type
      </span>
      <h3>Ajouter un Nouveau Type</h3>
    </div>
  </div>

  <!-- Formulaire de création -->
  <div class="container">
    <div class="form-container">
      <h2 class="form-title">
        <i class="fa fa-plus-circle"></i> Ajouter un nouveau type
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

      <form method="POST" action="{{ route('types.store') }}">
        @csrf

        <div class="form-group">
          <label for="nom_type" class="required">Nom du type</label>
          <input type="text" class="form-control" id="nom_type" name="nom_type"
                 value="{{ old('nom_type') }}" required placeholder="Ex: Appartement, Maison, Villa...">
          <div class="form-hint">Nom unique pour identifier ce type de propriété</div>
          @error('nom_type')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description"
                    rows="4" placeholder="Description détaillée du type de propriété...">{{ old('description') }}</textarea>
          <div class="form-hint">Décrivez les caractéristiques de ce type de propriété (optionnel)</div>
          @error('description')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label>Statut</label>
          <div class="checkbox-container">
            <label class="checkbox-label">
              <div class="custom-checkbox">
                <input type="checkbox" id="actif" name="actif" value="1" {{ old('actif', true) ? 'checked' : '' }}>
                <span class="checkbox-slider"></span>
              </div>
              <span class="checkbox-text active" id="status-text">Actif</span>
            </label>
          </div>
          <div class="form-hint">Les types inactifs ne seront pas disponibles pour les nouvelles propriétés</div>
          @error('actif')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-actions">
          <a href="{{ route('types.index') }}" class="btn-cancel">
            <i class="fa fa-times"></i> Annuler
          </a>
          <button type="submit" class="btn-submit">
            <i class="fa fa-save"></i> Enregistrer
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="col-lg-8">
        <p>Copyright © 2026 EstateHUB.ma Tous droits réservés.
        <br>Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/counter.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <script>
    $(document).ready(function() {
      // Gestion de la case à cocher actif
      $('#actif').on('change', function() {
        if ($(this).is(':checked')) {
          $('#status-text').text('Actif').removeClass('inactive').addClass('active');
        } else {
          $('#status-text').text('Inactif').removeClass('active').addClass('inactive');
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
