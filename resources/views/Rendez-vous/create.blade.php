<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Réserver un RDV</title>
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <h3 class="mb-4">Réserver un rendez-vous</h3>

      @if($errors->any())
        <div class="alert alert-danger">
          Merci de vérifier les champs.
        </div>
      @endif

      <form method="POST" action="{{ route('rendez-vous.store', $propriete->id) }}">
        @csrf

        {{-- ID propriété --}}
        <input type="hidden" name="propriete_id" value="{{ $propriete->id }}">

        <div class="mb-3">
          <label class="form-label">ID Propriété</label>
          <input type="text" class="form-control" value="{{ $propriete->id }}" disabled>
        </div>

        <div class="mb-3">
          <label class="form-label">Ville</label>
          <input type="text" class="form-control" value="{{ $propriete->ville }}" disabled>
        </div>

        <div class="mb-3">
          <label class="form-label">Date</label>
          <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Heure</label>
          <input type="time" name="heure" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100" type="submit">
          Sauvegarder
        </button>
      </form>

    </div>
  </div>
</div>

</body>
</html>
