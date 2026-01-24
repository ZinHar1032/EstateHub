<!DOCTYPE html>
<html lang="fr">
@php use Illuminate\Support\Facades\Storage; @endphp

<style>
    .form-card {
        background: #fff;
        padding: 35px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    fieldset { margin-bottom: 20px; }

    fieldset label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #1e1e1e;
    }

    fieldset input,
    fieldset select,
    fieldset textarea {
        width: 100%;
        height: 45px;
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 0 15px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    fieldset textarea {
        height: 120px;
        padding-top: 10px;
        resize: none;
    }

    fieldset input:focus,
    fieldset select:focus,
    fieldset textarea:focus {
        border-color: #f35525;
        outline: none;
        box-shadow: 0 0 0 2px rgba(243,85,37,0.15);
    }

    .orange-button {
        width: 100%;
        height: 50px;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
        background: #f35525;
        color: #fff;
        border: none;
        transition: all 0.3s ease;
    }

    .orange-button:hover {
        background: #d94a20;
        transform: translateY(-2px);
    }

    .images-grid{
        display:flex;
        flex-wrap:wrap;
        gap:12px;
        margin-top:10px;
    }

    .img-card{
        width:120px;
        height:90px;
        border:1px solid #eee;
        border-radius:10px;
        overflow:hidden;
        background:#fafafa;
        display:flex;
        align-items:center;
        justify-content:center;
    }

    .img-card img{
        width:100%;
        height:100%;
        object-fit:cover;
        display:block;
    }

    .small-hint{
        font-size:12px;
        color:#666;
        margin-top:6px;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>EstateHUB - Modifier une propriété</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
</head>

<body>

<!-- ***** Préchargeur ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span><span></span><span></span>
        </div>
    </div>
</div>

<!-- ***** Top Header ***** -->
<div class="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <ul class="info">
                    <li><i class="fa fa-envelope"></i> info@estatehub.ma</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- ***** Header ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <nav class="main-nav">
            <a href="{{ route('home') }}" class="logo">
                <h1>EstateHUB</h1>
            </a>

            <ul class="nav">
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('biens') }}">Annonces</a></li>

                @auth
                    @if(auth()->user()->role === 'agent')
                        <li><a href="{{ route('propriete.create') }}">Ajouter un bien</a></li>
                        <li><a href="{{ route('biens') }}" class="active">Modifier mes biens</a></li>
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
        </nav>
    </div>
</header>

<!-- ***** Page Heading ***** -->
<div class="page-heading header-text">
    <div class="container">
        <span class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a> / Modifier une propriété
        </span>
        <h3>Modifier la propriété</h3>
    </div>
</div>

<!-- ***** Form Section ***** -->
<div class="contact-page section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-8">
               <form action="{{ route('propriete.update', $propriete->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Messages d'erreurs --}}
                        @if ($errors->any())
                            <div class="col-lg-12">
                                <div class="alert alert-danger">
                                    <ul style="margin:0;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <div class="col-lg-12">
                            <fieldset>
                                <label>Titre du bien</label>
                                <input type="text" name="titre" value="{{ old('titre', $propriete->titre) }}" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset>
                                <label>Prix (MAD)</label>
                                <input type="number" name="prix" value="{{ old('prix', $propriete->prix) }}" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset>
                                <label>Surface (m²)</label>
                                <input type="number" name="surface" value="{{ old('surface', $propriete->surface) }}" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset>
                                <label>Ville</label>
                                <input type="text" name="ville" value="{{ old('ville', $propriete->ville) }}" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <fieldset>
                                <label>Adresse</label>
                                <input type="text" name="adresse" value="{{ old('adresse', $propriete->adresse) }}" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset>
                                <label>Type de propriété</label>
                                <select name="type_propriete_id" required>
                                    <option value="">-- Sélectionner --</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ (string)old('type_propriete_id', $propriete->type_propriete_id) === (string)$type->id ? 'selected' : '' }}>
                                            {{ $type->nom_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset>
                                <label>Catégorie</label>
                                <select name="categorie_propriete_id" required>
                                    <option value="">-- Sélectionner --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ (string)old('categorie_propriete_id', $propriete->categorie_propriete_id) === (string)$cat->id ? 'selected' : '' }}>
                                            {{ $cat->nom_categorie }}
                                        </option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset>
                                <label>Nombre de chambres</label>
                                <input type="number" name="nb_chambres" value="{{ old('nb_chambres', $propriete->nb_chambres) }}">
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset>
                                <label>Salles de bain</label>
                                <input type="number" name="nb_salle_bain" value="{{ old('nb_salle_bain', $propriete->nb_salle_bain) }}">
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset>
                                <label>Parking</label>
                                <select name="parking" required>
                                    <option value="1" {{ (string)old('parking', (int)$propriete->parking) === '1' ? 'selected' : '' }}>Oui</option>
                                    <option value="0" {{ (string)old('parking', (int)$propriete->parking) === '0' ? 'selected' : '' }}>Non</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset>
                                <label>Statut</label>
                                <select name="statut" required>
                                    @foreach(['disponible' => 'Disponible', 'vendu' => 'Vendu', 'reserve' => 'Réservé'] as $value => $label)
                                        <option value="{{ $value }}" {{ old('statut', $propriete->statut) === $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <fieldset>
                                <label>Description</label>
                                <textarea name="description">{{ old('description', $propriete->description) }}</textarea>
                            </fieldset>
                        </div>

                        {{-- Images existantes --}}
                        <div class="col-lg-12">
                            <fieldset>
                                <label>Images existantes</label>

                                @if($propriete->images && $propriete->images->count() > 0)
                                    <div class="images-grid">
                                        @foreach($propriete->images as $img)
                                            <div class="img-card" title="{{ $img->chemin_image }}">
                                                <img src="{{ Storage::url($img->chemin_image) }}" alt="image">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="small-hint">Astuce : tu peux ajouter de nouvelles images ci-dessous (elles s’ajoutent aux existantes).</div>
                                @else
                                    <div class="small-hint">Aucune image pour cette propriété.</div>
                                @endif
                            </fieldset>
                        </div>

                        {{-- Nouvelles images --}}
                        <div class="col-lg-12">
                            <fieldset>
                                <label>Ajouter de nouvelles images</label>
                                <input type="file" name="images[]" multiple>
                                <div class="small-hint">Formats acceptés : jpg, jpeg, png, webp — max 4 Mo / image.</div>
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" class="orange-button">
                                    Mettre à jour la propriété
                                </button>
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
        <p>© 2026 EstateHUB.ma - Tous droits réservés.</p>
    </div>
</footer>

<!-- JS -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>
