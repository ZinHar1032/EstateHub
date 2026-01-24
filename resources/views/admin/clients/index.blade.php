@extends('layouts.admin')

@section('title', 'Clients')
@section('page-title', 'Clients')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6>Clients</h6>
        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary btn-sm">Ajouter un client</a>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Statut</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($clients as $client)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ $client->nom_complet }}</h6>
                      <p class="text-xs text-secondary mb-0">{{ $client->email }}</p>
                      @if($client->tel)
                        <p class="text-xs text-secondary mb-0">{{ $client->tel }}</p>
                      @endif
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-success">Actif</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{ $client->created_at->format('d/m/Y') }}</span>
                </td>
                <td class="align-middle">
                  <a href="{{ route('admin.clients.edit', $client) }}" class="text-secondary font-weight-bold text-xs ms-2">Modifier</a>
                  <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="d-inline ms-2">
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
          {{ $clients->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
