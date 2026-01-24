@extends('layouts.admin')

@section('title', 'Rendez-vous')
@section('page-title', 'Rendez-vous')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Rendez-vous</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Propriété</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Statut</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($rendezVous as $rdv)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ $rdv->user->nom_complet }}</h6>
                      <p class="text-xs text-secondary mb-0">{{ $rdv->user->email }}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-sm font-weight-bold mb-0">{{ $rdv->propriete->titre }}</p>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{ $rdv->date_visite->format('d/m/Y H:i') }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm 
                    {{ $rdv->statut === 'confirme' ? 'bg-gradient-success' : ($rdv->statut === 'annule' ? 'bg-gradient-danger' : ($rdv->statut === 'effectue' ? 'bg-gradient-info' : 'bg-gradient-warning')) }}">
                    {{ ucfirst(str_replace('_', ' ', $rdv->statut)) }}
                  </span>
                </td>
                <td class="align-middle">
                  @if($rdv->statut === 'en_attente')
                    <form action="{{ route('admin.rendez-vous.confirm', $rdv) }}" method="POST" class="d-inline">
                      @csrf
                      <button type="submit" class="btn btn-sm btn-success">Confirmer</button>
                    </form>
                    <form action="{{ route('admin.rendez-vous.cancel', $rdv) }}" method="POST" class="d-inline">
                      @csrf
                      <button type="submit" class="btn btn-sm btn-danger">Annuler</button>
                    </form>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="px-3 pt-3">
          {{ $rendezVous->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
