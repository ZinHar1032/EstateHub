@extends('layouts.admin')

@section('title', 'Créer un client')
@section('page-title', 'Créer un client')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Nouveau client</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.clients.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nom complet</label>
            <input type="text" name="nom_complet" class="form-control @error('nom_complet') is-invalid @enderror" value="{{ old('nom_complet') }}" required>
            @error('nom_complet')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="text" name="tel" class="form-control @error('tel') is-invalid @enderror" value="{{ old('tel') }}">
            @error('tel')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Ville</label>
            <input type="text" name="ville" class="form-control @error('ville') is-invalid @enderror" value="{{ old('ville') }}">
            @error('ville')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Créer</button>
          <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
