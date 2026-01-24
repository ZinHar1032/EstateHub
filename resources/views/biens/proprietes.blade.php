<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>EstateHUB - Votre Partenaire immobilier</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

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
                    <a href="index.html" class="logo">
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
                   
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>

<div class="page-heading header-text">
  <div class="container">
    <span class="breadcrumb"><a href="#">Accueil</a> / Biens</span>
    <h3>Nos biens immobiliers</h3>
  </div>
</div>

<div class="section properties">
  <div class="container">

    <ul class="properties-filter">
      <li><a class="is_active" href="#!" data-filter="*">Tout afficher</a></li>
      
    </ul>


    <div class="row properties-box">
  @php use Illuminate\Support\Facades\Storage; @endphp

  @foreach($proprietes as $propriete)
    @php
      if ($propriete->imagePrincipale && $propriete->imagePrincipale->chemin_image) {
        $imgUrl = Storage::url($propriete->imagePrincipale->chemin_image);
      } elseif ($propriete->images->count() > 0) {
        $imgUrl = Storage::url($propriete->images->first()->chemin_image);
      } else {
        $imgUrl = asset('assets/images/default.jpg');
      }
    @endphp

    <div class="col-lg-4 col-md-6 mb-30 properties-items">
      <div class="item">
        <a href="#">
          <img src="{{ $imgUrl }}" alt="propriete">
        </a>

        <span class="category">{{ $propriete->typePropriete->nom_type ?? 'Type' }}</span>
        <h6>{{ number_format($propriete->prix, 0, ',', ' ') }} MAD</h6>
        <h4><a href="#">{{ $propriete->titre }}</a></h4>

        <ul>
          <li>Ville : <span>{{ $propriete->ville }}</span></li>
          <li>Chambres : <span>{{ $propriete->nb_chambres ?? '-' }}</span></li>
          <li>Salles de bain : <span>{{ $propriete->nb_salle_bain ?? '-' }}</span></li>
          <li>Surface : <span>{{ $propriete->surface }} m²</span></li>
          <li>Parking : <span>{{ $propriete->parking ? 'Oui' : 'Non' }}</span></li>
          <li>Statut : <span>{{ ucfirst($propriete->statut) }}</span></li>
          <li>Agent : <span>{{ $propriete->user->tel ?? '-' }}</span></li>
          <li>Validé : <span>{{ $propriete->valide ? 'Oui' : 'Non' }}</span></li>
        </ul>

        <div class="main-button">
          @auth
            @if(auth()->user()->role === 'agent')
              @if($propriete->user_id === auth()->id())
                <a href="{{ route('propriete.edit', $propriete->id) }}">Modifier</a>
              @endif
            @elseif(auth()->user()->role === 'client')
             <a href="{{ route('rdv.create', ['propriete' => $propriete->id]) }}">Planifier une visite</a>
            @elseif(auth()->user()->role === 'admin')
              <form method="POST" action="{{ route('proprietes.toggleValidation', $propriete->id) }}">
                @csrf
                <button type="submit" class="btn btn-sm {{ $propriete->valide ? 'btn-danger' : 'btn-success' }}">
                  {{ $propriete->valide ? 'Invalider' : 'Valider' }}
                </button>
              </form>
            @endif
          @else
            {{-- visiteur --}}
            <a href="{{ route('rdv.create', $propriete->id) }}">Planifier une visite</a>
          @endauth
        </div>

      </div>
    </div>
  @endforeach
</div>


@if(session('success'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'Succès',
    text: "{{ session('success') }}",
    timer: 2500,
    showConfirmButton: false
  });
</script>
@endif
    <ul class="pagination">
      <li><a  class="is_active" href="#">1</a></li>
      <li><a  href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">>></a></li>
    </ul>

  </div>
</div>

<footer>
  <div class="container">
    <p>© 2026 EstateHUB.ma Tous droits réservés.
    </p>
  </div>
</footer>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/counter.js"></script>
<script src="assets/js/custom.js"></script>



</body>
</html>
