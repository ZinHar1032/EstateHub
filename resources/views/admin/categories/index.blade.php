<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>EstateHUB - Gestion des Catégories</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <style>
        .admin-content {
            padding: 40px 0;
            background-color: #f8f9fa;
            min-height: 70vh;
        }
        
        .admin-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-top: 20px;
        }
        
        .card-header {
            padding: 20px 30px;
            border-bottom: 1px solid #eaeaea;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
        }
        
        .card-header h5 {
            margin: 0;
            color: #2a2a2a;
            font-size: 20px;
            font-weight: 600;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background-color: #f5f6fa;
        }
        
        th {
            padding: 15px;
            text-align: left;
            color: #2a2a2a;
            font-weight: 600;
            border-bottom: 2px solid #eaeaea;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #eaeaea;
            vertical-align: middle;
        }
        
        tr:hover {
            background-color: #f9f9f9;
        }
        
        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }
        
        .badge-success {
            background-color: #28a745;
            color: white;
        }
        
        .badge-danger {
            background-color: #dc3545;
            color: white;
        }
        
        .badge-warning {
            background-color: #ffc107;
            color: #212529;
        }
        
        .badge-info {
            background-color: #17a2b8;
            color: white;
        }
        
        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary i {
            margin-right: 5px;
        }
        
        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            border: none;
            padding: 6px 15px;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            margin-right: 8px;
            transition: all 0.3s;
        }
        
        .btn-warning:hover {
            background-color: #e0a800;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 20px 0 0 0;
            margin: 0;
        }
        
        .pagination li {
            margin: 0 5px;
        }
        
        .pagination a, .pagination span {
            display: block;
            padding: 8px 15px;
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            color: #007bff;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .pagination a:hover {
            background-color: #e9ecef;
        }
        
        .pagination .active span {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
        
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .text-center {
            text-align: center;
        }
        
        .text-secondary {
            color: #6c757d !important;
        }
        
        .font-weight-bold {
            font-weight: 600 !important;
        }
        
        .mb-0 {
            margin-bottom: 0 !important;
        }
        
        .mt-4 {
            margin-top: 30px !important;
        }
        
        .mb-4 {
            margin-bottom: 30px !important;
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
        
        .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .stat-card {
            padding: 20px;
            border-radius: 10px;
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .stat-card.total { background: linear-gradient(45deg, #3498db, #2c3e50); }
        .stat-card.actif { background: linear-gradient(45deg, #27ae60, #16a085); }
        .stat-card.inactif { background: linear-gradient(45deg, #e74c3c, #c0392b); }
        .stat-card.dispo { background: linear-gradient(45deg, #f39c12, #d35400); }
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
                              <li><a href="{{ route('agents.index') }}">Gestion des Agents</a></li>
                                                            <li><a href="{{ route('types.index') }}">Gestion des Types</a></li>

                              <li><a href="{{ route('categories.index') }}" class="active">Gestion des Catégories</a></li>
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
        Catégories
      </span>
      <h3>Gestion des Catégories de Propriétés</h3>
    </div>
  </div>

  <!-- Contenu principal -->
  <div class="admin-content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="admin-card">
            <div class="card-header">
              <h5>Liste des Catégories</h5>
              <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Ajouter une catégorie
              </a>
            </div>
            
            <div class="card-body">
              <!-- Messages de succès/erreur -->
              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif
              
              @if(session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
              @endif
              
              <!-- Statistiques -->
              <div class="row mb-4">
                <div class="col-xl-3 col-md-6">
                  <div class="stat-card total">
                    <i class="fa fa-list-alt fa-3x"></i>
                    <h3>{{ $categories->total() }}</h3>
                    <p>Total Catégories</p>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6">
                  <div class="stat-card actif">
                    <i class="fa fa-check-circle fa-3x"></i>
                    <h3>{{ $categories->where('actif', true)->count() }}</h3>
                    <p>Catégories Actives</p>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6">
                  <div class="stat-card inactif">
                    <i class="fa fa-times-circle fa-3x"></i>
                    <h3>{{ $categories->where('actif', false)->count() }}</h3>
                    <p>Catégories Inactives</p>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6">
                  <div class="stat-card dispo">
                    <i class="fa fa-eye fa-3x"></i>
                    <h3>{{ $categories->where('dispo', true)->count() }}</h3>
                    <p>Disponibles</p>
                  </div>
                </div>
              </div>
              
              <!-- Tableau des catégories -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom de la Catégorie</th>
                      <th class="text-center">Statut</th>
                      <th class="text-center">Disponibilité</th>
                      <th class="text-center">Propriétés</th>
                      <th class="text-center">Date Création</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $categorie)
                    <tr>
                      <td>{{ $categorie->id }}</td>
                      <td>
                        <strong>{{ $categorie->nom_categorie }}</strong>
                      </td>
                      <td class="text-center">
                        @if($categorie->actif)
                          <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-danger">Inactive</span>
                        @endif
                      </td>
                      <td class="text-center">
                        @if($categorie->dispo)
                          <span class="badge badge-info">Disponible</span>
                        @else
                          <span class="badge badge-warning">Indisponible</span>
                        @endif
                      </td>
                      <td class="text-center">
                        <span class="font-weight-bold">{{ $categorie->proprietes_count ?? 0 }}</span>
                      </td>
                      <td class="text-center">
                        {{ $categorie->created_at->format('d/m/Y') }}
                      </td>
                      <td class="text-center">
                        <div class="action-buttons">
                          <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-warning">
                            <i class="fa fa-edit"></i> Modifier
                          </a>
                          
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    
                    @if($categories->isEmpty())
                    <tr>
                      <td colspan="7" class="text-center">
                        <div class="py-4">
                          <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                          <p class="text-muted">Aucune catégorie trouvée.</p>
                          <a href="{{ route('categories.create') }}" class="btn btn-primary mt-2">
                            <i class="fa fa-plus"></i> Créer votre première catégorie
                          </a>
                        </div>
                      </td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              
              <!-- Pagination -->
              @if($categories->hasPages())
              <div class="mt-4">
                {{ $categories->links() }}
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
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
      // Confirmation de suppression
      $('.btn-danger').on('click', function(e) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ? Cette action est irréversible.')) {
          e.preventDefault();
          return false;
        }
      });
      
      // Auto-dismiss des alertes après 5 secondes
      setTimeout(function() {
        $('.alert').fadeOut('slow');
      }, 5000);
      
      // Animation du bouton Ajouter
      $('.btn-primary').hover(
        function() {
          $(this).css('transform', 'translateY(-2px)');
          $(this).css('box-shadow', '0 4px 8px rgba(0, 0, 0, 0.1)');
        },
        function() {
          $(this).css('transform', 'translateY(0)');
          $(this).css('box-shadow', 'none');
        }
      );
    });
  </script>

</body>
</html>