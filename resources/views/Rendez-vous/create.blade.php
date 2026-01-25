<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>EstateHUB - Planifier une visite</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Additional CSS Files (même style que la page des biens) -->
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
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

  <!-- (Optionnel) Sub-header si tu l'utilises dans toutes tes pages -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> contact@estatehub.ma</li>
            <li><i class="fa fa-map"></i> Maroc</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
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
            <!-- ***** Logo ***** -->
            <a href="{{ route('home') }}" class="logo">
              <h1>EstateHUB</h1>
            </a>

            <!-- ***** Menu ***** -->
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

          </nav>
        </div>
      </div>
    </div>
  </header>

  <!-- ***** Page Heading ***** -->
  <div class="page-heading header-text">
    <div class="container">
      <span class="breadcrumb">
        <a href="{{ route('home') }}">Accueil</a> /
        <a href="{{ route('biens') }}">Annonces</a> /
        Planifier une visite
      </span>
      <h3>Planifier une visite</h3>
    </div>
  </div>

  <div class="section properties">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-lg-7">

          <div class="section-heading text-center mb-4">
            <h6>| Rendez-vous</h6>
            <h2>Réserver un rendez-vous</h2>
          </div>

          @if($errors->any())
            <div class="alert alert-danger">
              <strong>Merci de vérifier les champs :</strong>
              <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="item p-4" style="border-radius: 12px;">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="mb-2">
                  <small class="text-muted">Bien</small>
                  <div class="fw-semibold">
                    #{{ $propriete->id }} — {{ $propriete->ville }}
                  </div>
                </div>
              </div>
              <div class="col-md-6 text-md-end">
                <a href="{{ route('biens') }}" class="btn btn-outline-primary btn-sm">
                  <i class="fa fa-arrow-left"></i> Retour aux annonces
                </a>
              </div>
            </div>

            <hr class="my-3">

            <form method="POST" action="{{ route('rendez-vous.store', $propriete->id) }}">
              @csrf

              <input type="hidden" name="propriete_id" value="{{ $propriete->id }}">

              <div class="row">
                <div class="col-md-6">
                  <fieldset class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset class="mb-3">
                    <label class="form-label">Heure</label>
                    <input type="time" name="heure" class="form-control" value="{{ old('heure') }}" required>
                  </fieldset>
                </div>
              </div>

              <button class="btn btn-primary w-100" type="submit">
                Confirmer le rendez-vous
              </button>

              <p class="text-muted mt-3 mb-0" style="font-size: 13px;">
                Après confirmation, vous pourrez retrouver votre demande dans votre espace (si la fonctionnalité est activée).
              </p>
            </form>

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

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/counter.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>
