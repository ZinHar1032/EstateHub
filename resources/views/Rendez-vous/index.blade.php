<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>EstateHUB - Mes rendez-vous</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

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
                        @if(auth()->user()->role === 'agent')
                          <li><a href="{{ route('propriete.create') }}">Ajouter un bien</a></li>
                          <li><a href="{{ route('biens') }}">Modifier mes biens</a></li>
                          <li><a href="{{ route('rdv.index') }}">Mes RDV</a></li>
                        @endif
                        <li>
                          <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                              Se déconnecter
                            </a>
                          </form>
                        </li>
                        @else
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

  {{-- ✅ Page Heading --}}
  <div class="page-heading header-text">
    <div class="container">
      <span class="breadcrumb">
        <a href="{{ route('home') }}">Accueil</a> / Mes RDV
      </span>
      <h3>Mes rendez-vous</h3>
    </div>
  </div>

  {{-- ✅ CONTENU : tableau des RDV --}}
  <div class="section properties">
    <div class="container">

      {{-- Alerts --}}
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <div class="row">
        <div class="col-lg-12">

          <div class="card shadow-sm">
            <div class="card-body">

              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Tableau des rendez-vous</h5>
                {{-- <a href="{{ route('rdv.create',$rdv->id) }}" class="btn btn-primary btn-sm">
                  <i class="fa fa-plus"></i> Créer un RDV
                </a> --}}
              </div>

              @if(isset($rdvs) && $rdvs->count())
                <div class="table-responsive">
                  <table class="table table-hover align-middle">
                    <thead class="table-light">
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Bien</th>
                        <th>Client</th>
                        <th>Téléphone</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($rdvs as $rdv)
                        <tr>
                          <td>{{ $rdv->id }}</td>

                          <td>
                            {{ \Carbon\Carbon::parse($rdv->date_rdv)->format('d/m/Y H:i') }}
                          </td>

                          <td>
                            <strong>{{ $rdv->propriete->titre ?? 'Bien introuvable' }}</strong>
                            <div class="text-muted" style="font-size: 12px;">
                              {{ $rdv->propriete->ville ?? '' }}
                            </div>
                          </td>

                          <td>{{ $rdv->user->nom_complet ?? '-' }}</td>
                          <td>{{ $rdv->user->tel ?? '-' }}</td>

                          <td>
                            @php
                              $statut = $rdv->statut ?? 'en_attente';
                              $badge = match($statut) {
                                'confirmé' => 'success',
                                'annulé' => 'danger',
                                'terminé' => 'secondary',
                                default => 'warning',
                              };
                            @endphp
                            <span class="badge bg-{{ $badge }}">
                              {{ str_replace('_',' ', ucfirst($statut)) }}
                            </span>
                          </td>

                          <td class="text-end">
                            {{-- Si tu n'as pas encore la route show, laisse désactivé --}}
                            {{-- <a href="{{ route('rendez-vous.show', $rdv->id) }}" class="btn btn-outline-dark btn-sm">Voir</a> --}}
                            @if ($rdv->statut === 'en_attente')
                              <form action="{{ route('rdv.confirm') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="rdv_id" value="{{ $rdv->id }}">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                              </form>
                              <form action="{{ route('rdv.cancel') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="rdv_id" value="{{ $rdv->id }}">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                              </form>
                            @endif
                            
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="mt-3">
                  {{ $rdvs->links() }}
                </div>
              @else
                <div class="text-center py-5">
                  <h6 class="mb-2">Aucun rendez-vous</h6>
                  <p class="text-muted mb-0">
                    Vous n’avez pas encore de RDV. Cliquez sur “Créer un RDV”.
                  </p>
                </div>
              @endif

            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

  {{-- Footer --}}
  <footer>
    <div class="container">
      <p>© 2026 EstateHUB.ma Tous droits réservés.</p>
    </div>
  </footer>

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/counter.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>
