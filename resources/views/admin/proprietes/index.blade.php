@extends('layouts.admin')

@section('title', 'Propriétés')
@section('page-title', 'Propriétés')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6>Propriétés</h6>
        <a href="{{ route('admin.proprietes.create') }}" class="btn btn-primary btn-sm">Ajouter une propriété</a>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Propriété</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prix</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Statut</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($proprietes as $propriete)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ $propriete->titre }}</h6>
                      <p class="text-xs text-secondary mb-0">{{ $propriete->adresse }}, {{ $propriete->ville }}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-sm font-weight-bold mb-0">{{ number_format($propriete->prix, 0, ',', ' ') }} €</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm {{ $propriete->valide ? 'bg-gradient-success' : 'bg-gradient-warning' }}">
                    {{ $propriete->valide ? 'Validé' : 'En attente' }}
                  </span>
                  <span class="badge badge-sm 
                    {{ $propriete->statut === 'disponible' ? 'bg-gradient-info' : ($propriete->statut === 'reserve' ? 'bg-gradient-warning' : 'bg-gradient-secondary') }}">
                    {{ ucfirst($propriete->statut) }}
                  </span>
                </td>
                <td class="align-middle">
                  <form action="{{ route('admin.proprietes.toggle-validation', $propriete) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm {{ $propriete->valide ? 'btn-warning' : 'btn-success' }}">
                      {{ $propriete->valide ? 'Invalider' : 'Valider' }}
                    </button>
                  </form>
                  <a href="{{ route('admin.proprietes.edit', $propriete) }}" class="text-secondary font-weight-bold text-xs ms-2">Modifier</a>
                  <form action="{{ route('admin.proprietes.destroy', $propriete) }}" method="POST" class="d-inline ms-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-danger font-weight-bold text-xs border-0 bg-transparent" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="px-3 pt-3">
          {{ $proprietes->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
