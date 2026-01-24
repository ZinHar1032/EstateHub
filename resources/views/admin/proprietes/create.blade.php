@extends('layouts.admin')

@section('title', 'Créer une propriété')
@section('page-title', 'Créer une propriété')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Nouvelle propriété</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.proprietes.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Titre</label>
              <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" required>
              @error('titre')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Prix (€)</label>
              <input type="number" name="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix') }}" step="0.01" required>
              @error('prix')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
            @error('description')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Adresse</label>
              <input type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse') }}" required>
              @error('adresse')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Ville</label>
              <input type="text" name="ville" class="form-control @error('ville') is-invalid @enderror" value="{{ old('ville') }}" required>
              @error('ville')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label class="form-label">Surface (m²)</label>
              <input type="number" name="surface" class="form-control @error('surface') is-invalid @enderror" value="{{ old('surface') }}" required>
              @error('surface')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-3 mb-3">
              <label class="form-label">Nombre de chambres</label>
              <input type="number" name="nb_chambres" class="form-control @error('nb_chambres') is-invalid @enderror" value="{{ old('nb_chambres') }}">
              @error('nb_chambres')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-3 mb-3">
              <label class="form-label">Nombre de salles de bain</label>
              <input type="number" name="nb_salle_bain" class="form-control @error('nb_salle_bain') is-invalid @enderror" value="{{ old('nb_salle_bain') }}">
              @error('nb_salle_bain')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-3 mb-3">
              <label class="form-label">Parking</label>
              <select name="parking" class="form-control @error('parking') is-invalid @enderror">
                <option value="0" {{ old('parking', 0) == 0 ? 'selected' : '' }}>Non</option>
                <option value="1" {{ old('parking') == 1 ? 'selected' : '' }}>Oui</option>
              </select>
              @error('parking')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="statut" class="form-control @error('statut') is-invalid @enderror" required>
              <option value="disponible" {{ old('statut') == 'disponible' ? 'selected' : '' }}>Disponible</option>
              <option value="reserve" {{ old('statut') == 'reserve' ? 'selected' : '' }}>Réservé</option>
              <option value="vendu" {{ old('statut') == 'vendu' ? 'selected' : '' }}>Vendu</option>
            </select>
            @error('statut')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label class="form-label">Agent</label>
              <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                <option value="">Sélectionner un agent</option>
                @foreach($agents as $agent)
                  <option value="{{ $agent->id }}" {{ old('user_id') == $agent->id ? 'selected' : '' }}>{{ $agent->nom_complet }}</option>
                @endforeach
              </select>
              @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label">Catégorie</label>
              <select name="categorie_propriete_id" class="form-control @error('categorie_propriete_id') is-invalid @enderror" required>
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $categorie)
                  <option value="{{ $categorie->id }}" {{ old('categorie_propriete_id') == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom_categorie }}</option>
                @endforeach
              </select>
              @error('categorie_propriete_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label">Type</label>
              <select name="type_propriete_id" class="form-control @error('type_propriete_id') is-invalid @enderror" required>
                <option value="">Sélectionner un type</option>
                @foreach($typeProprietes as $type)
                  <option value="{{ $type->id }}" {{ old('type_propriete_id') == $type->id ? 'selected' : '' }}>{{ $type->nom_type }}</option>
                @endforeach
              </select>
              @error('type_propriete_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Images (max 5)</label>
            <input type="file" name="images[]" class="form-control @error('images.*') is-invalid @enderror" multiple accept="image/*">
            @error('images.*')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Créer</button>
          <a href="{{ route('admin.proprietes.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
