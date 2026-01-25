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
        .logout-form { display: inline-block; margin: 0; }

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

        .logout-btn i { margin-right: 5px; }

        .social-links li.logout-item { margin-left: 10px; }

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
                    <a href="{{ route('home') }}" class="logo">
                        <h1>EstateHUB</h1>
                    </a>

                   <ul class="nav">
    <li><a href="{{ route('home') }}" class="active">Accueil</a></li>
    <li><a href="{{ route('biens') }}">Annonces</a></li>

    @auth
        @if(auth()->user()->role === 'agent')

            <li><a href="{{ route('propriete.create') }}">Ajouter un bien</a></li>
            <li><a href="{{ route('biens') }}">Mes biens</a></li>
            <li><a href="{{ route('rdv.index') }}">Mes RDV</a></li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                   
                </form>
            </li>

        @elseif(auth()->user()->role === 'client')

            <li><a href="{{ route('contact') }}">Contact</a></li>

        @elseif(auth()->user()->role === 'admin')

            <li><a href="{{ route('agents.index') }}">Agents</a></li>
            <li><a href="{{ route('types.index') }}">Types</a></li>
            <li><a href="{{ route('categories.index') }}">Catégories</a></li>

        @endif
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
                </nav>
            </div>
        </div>
    </div>
  </header>

  <!-- ***** Main Banner ***** -->
  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category">Rabat, <em>Maroc</em></span>
          <h2>Dépêchez-vous !<br>Réservez la villa idéale pour vous</h2>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text">
          <span class="category">Casablanca, <em>Maroc</em></span>
          <h2>Faites vite !<br>Obtenez la meilleure villa de la ville</h2>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text">
          <span class="category">Oujda, <em>Maroc</em></span>
          <h2>Agissez maintenant !<br>Obtenez le penthouse le plus luxueux !</h2>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Featured ***** -->
  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="assets/images/featured.jpg" alt="">
            <a href="property-details.html">
              <img src="assets/images/featured-icon.png" alt="" style="max-width: 60px; padding: 0px;">
            </a>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Offre spéciale</h6>
            <h2>Meilleur appartement</h2>
          </div>

          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Quels sont les avantages de ce bien ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show"
                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Cet appartement offre un excellent rapport qualité-prix, avec des finitions modernes,
                  une grande luminosité et un emplacement stratégique proche de toutes les commodités.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Comment se déroule l’achat ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse"
                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Le processus est simple et sécurisé : visite du bien, réservation, signature du contrat
                  et accompagnement complet jusqu’à la remise des clés.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Pourquoi choisir EstateHUB ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse"
                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  EstateHUB vous garantit transparence, sécurité et accompagnement professionnel pour
                  concrétiser votre projet immobilier en toute confiance.
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4>250 m²<br><span>Surface totale</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Contrat<br><span>Prêt à signer</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Paiement<br><span>Processus sécurisé</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Sécurité<br><span>Surveillance 24h/24</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Best Deal ***** -->
  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Meilleure offre</h6>
            <h2>Trouvez la meilleure offre dès maintenant !</h2>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment"
                            type="button" role="tab" aria-controls="appartment" aria-selected="true">
                      Appartement
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa"
                            type="button" role="tab" aria-controls="villa" aria-selected="false">
                      Villa
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse"
                            type="button" role="tab" aria-controls="penthouse" aria-selected="false">
                      Penthouse
                    </button>
                  </li>
                </ul>
              </div>

              <div class="tab-content" id="myTabContent">
                <!-- Appartement -->
                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Surface totale <span>185 m²</span></li>
                          <li>Numéro d’étage <span>26ᵉ</span></li>
                          <li>Nombre de pièces <span>4</span></li>
                          <li>Parking disponible <span>Oui</span></li>
                          <li>Paiement <span>Banque</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-01.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Informations supplémentaires sur le bien</h4>
                      <p>
                        Cet appartement moderne offre des espaces lumineux et bien agencés, idéals pour une vie confortable au quotidien.
                        Il bénéficie d’un emplacement stratégique, proche des commerces, des écoles et des transports.
                        <br><br>
                        Construit avec des matériaux de qualité, ce bien représente une excellente opportunité d’investissement ou de résidence principale.
                      </p>
                    </div>
                  </div>
                </div>

                <!-- Villa -->
                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Surface totale <span>250 m²</span></li>
                          <li>Numéro d’étage <span>26ᵉ</span></li>
                          <li>Nombre de pièces <span>5</span></li>
                          <li>Parking disponible <span>Oui</span></li>
                          <li>Paiement <span>Banque</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-02.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Détails sur la villa</h4>
                      <p>
                        Appartement spacieux et bien situé, offrant confort, sécurité et prestations modernes.
                        Une opportunité idéale pour habiter ou investir.
                      </p>

                      <div class="icon-button">
                        @auth
                          <a href="{{ route('biens') }}"><i class="fa fa-calendar"></i> Voir les annonces</a>
                        @else
                          <a href="#" data-toggle="modal" data-target="#loginRequiredModal" data-bs-toggle="modal" data-bs-target="#loginRequiredModal">
                            <i class="fa fa-calendar"></i> Planifier une visite
                          </a>
                        @endauth
                      </div>

                    </div>
                  </div>
                </div>

                <!-- Penthouse -->
                <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Surface totale <span>320 m²</span></li>
                          <li>Numéro d’étage <span>34ᵉ</span></li>
                          <li>Nombre de pièces <span>6</span></li>
                          <li>Parking disponible <span>Oui</span></li>
                          <li>Paiement <span>Banque</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-03.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Informations supplémentaires sur le penthouse</h4>
                      <p>
                        Ce bien d’exception combine élégance, confort et finitions premium.
                        Une adresse prestigieuse pour un cadre de vie unique et raffiné.
                      </p>
                    </div>
                  </div>
                </div>

              </div><!-- tab-content -->
            </div><!-- row -->
          </div><!-- tabs-content -->
        </div><!-- col -->
      </div><!-- row -->
    </div><!-- container -->
  </div>

  <!-- ***** Properties ***** -->
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
              <a href="#"><img src="{{ $imgUrl }}" alt="propriete"></a>

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
                    <a href="{{ route('rdv.create', $propriete->id) }}">Planifier une visite</a>
                  @elseif(auth()->user()->role === 'admin')
                    <form method="POST" action="{{ route('proprietes.toggleValidation', $propriete->id) }}">
                      @csrf
                      <button type="submit" class="btn btn-sm {{ $propriete->valide ? 'btn-danger' : 'btn-success' }}">
                        {{ $propriete->valide ? 'Invalider' : 'Valider' }}
                      </button>
                    </form>
                  @endif
                @else
                  <a href="#" data-toggle="modal" data-target="#loginRequiredModal" data-bs-toggle="modal" data-bs-target="#loginRequiredModal">
                    Planifier une visite
                  </a>
                @endauth
              </div>

            </div>
          </div>
        @endforeach
      </div>

      <ul class="pagination">
        <li><a class="is_active" href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">>></a></li>
      </ul>
    </div>
  </div>

  <!-- ✅ MODAL : Connexion requise -->
  <div class="modal fade" id="loginRequiredModal" tabindex="-1" role="dialog" aria-labelledby="loginRequiredModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="loginRequiredModalLabel">Connexion requise</h5>
          <button type="button" class="close btn-close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Fermer">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          Pour planifier une visite, veuillez vous connecter ou créer un compte.
        </div>

        <div class="modal-footer">
          <a href="{{ route('register') }}" class="btn btn-outline-primary">Créer un compte</a>
          <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
        </div>

      </div>
    </div>
  </div>

  <!-- ***** Contact ***** -->
  <div class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Contactez-nous</h6>
            <h2>Contactez nos agents</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth"
                    width="100%" height="500px" frameborder="0"
                    style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>010-020-0340<br><span>Numéro de téléphone</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
                <h6>info@estatehub.ma<br><span>Email professionnel</span></h6>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <form id="contact-form" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Nom complet</label>
                  <input type="name" name="name" id="name" placeholder="Votre nom..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Adresse email</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Votre email..." required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Sujet</label>
                  <input type="subject" name="subject" id="subject" placeholder="Sujet..." autocomplete="on">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Votre message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Envoyer le message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Footer ***** -->
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

</body>
</html>
