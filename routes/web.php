<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProprieteController;
use App\Http\Controllers\RendezVousProprieteController;
use App\Http\Controllers\TypeController;
use App\Models\Propriete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// 🟢 HOME PUBLIC (pas besoin d'auth)
Route::get('/', [ProprieteController::class, 'home'])->name('home');

// Annonces / Biens
Route::get('/biens', [ProprieteController::class, 'index'])->name('biens');

// 🔒 PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('dashboard.admin');
        }
        if ($user->role === 'agent') {
            return view('dashboard.agent');
        }
        if ($user->role === 'client') {
            return view('dashboard.client');
        }

        return view('home'); // ou welcome
    })->name('dashboard');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
});

// Détails propriété (agent)
Route::get('/proprietes/{propriete}', [ProprieteController::class, 'show'])->name('proprietes.show');

// Admin : toggle validation
Route::post('/admin/proprietes/{propriete}/validation', [ProprieteController::class, 'toggleValidation'])
    ->middleware(['auth'])
    ->name('proprietes.toggleValidation');

// Ajout propriété réservé aux agents connectés
Route::middleware(['auth'])->group(function () {

    // =========================
    // 🔹 MODIFIER (AFFICHER FORM)
    // =========================
    Route::get('/modifier-propriete/{propriete}', function (Propriete $propriete) {

        if (Auth::user()->role !== 'agent') {
            abort(403, 'Accès réservé aux agents');
        }

        if ($propriete->user_id !== Auth::id()) {
            abort(403, 'Vous ne pouvez pas modifier ce bien');
        }

        return app(ProprieteController::class)->edit($propriete);

    })->name('propriete.edit');

    // =========================
    // 🔹 MODIFIER (ENREGISTRER)
    // =========================
    Route::put('/modifier-propriete/{propriete}', function (Propriete $propriete) {

        if (Auth::user()->role !== 'agent') {
            abort(403, 'Accès réservé aux agents');
        }

        if ($propriete->user_id !== Auth::id()) {
            abort(403, 'Vous ne pouvez pas modifier ce bien');
        }

        return app(ProprieteController::class)->update(request(), $propriete);

    })->name('propriete.update');

    // =========================
    // 🔹 AJOUT
    // =========================
    Route::get('/ajout-propriete', function () {

        if (Auth::user()->role !== 'agent') {
            abort(403, 'Accès réservé aux agents');
        }

        return app(ProprieteController::class)->create();

    })->name('propriete.create');

    Route::post('/ajout-propriete', function () {

        if (Auth::user()->role !== 'agent') {
            abort(403, 'Accès réservé aux agents');
        }

        return app(ProprieteController::class)->store(request());

    })->name('propriete.store');

    // =========================
    // 🔹 GESTION DES AGENTS (ADMIN)
    // =========================
    Route::get('/agents', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(AgentController::class)->index();
    })->name('agents.index');

    Route::get('/nouveau-agent', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(AgentController::class)->create();
    })->name('agents.create');

    Route::post('/nouveau-agent', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(AgentController::class)->store(request());
    })->name('agents.store');

    Route::get('/agents/{agent}/edit', function ($agent) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(AgentController::class)->edit($agent);
    })->name('agents.edit');

    Route::put('/agents/{agent}', function ($agent) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(AgentController::class)->update(request(), $agent);
    })->name('agents.update');

    // =========================
    // 🔹 GESTION DES TYPES (ADMIN)
    // =========================
    Route::get('/types', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(TypeController::class)->index();
    })->name('types.index');

    Route::get('/nouveau-type', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(TypeController::class)->create();
    })->name('types.create');

    Route::post('/nouveau-type', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(TypeController::class)->store(request());
    })->name('types.store');

    Route::get('/types/{type}/edit', function (App\Models\TypePropriete $type) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(TypeController::class)->edit($type);
    })->name('types.edit');

    Route::put('/types/{type}', function (App\Models\TypePropriete $type) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(TypeController::class)->update(request(), $type);
    })->name('types.update');

    Route::delete('/types/{type}', function (App\Models\TypePropriete $type) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(TypeController::class)->destroy($type);
    })->name('types.destroy');

    // =========================
    // 🔹 GESTION DES CATEGORIES (ADMIN)
    // =========================
    Route::get('/categories', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(CategorieController::class)->index();
    })->name('categories.index');

    Route::get('/nouvelle-categorie', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(CategorieController::class)->create();
    })->name('categories.create');

    Route::post('/nouvelle-categorie', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(CategorieController::class)->store(request());
    })->name('categories.store');

    Route::get('/categories/{categorie}/edit', function ($categorie) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(CategorieController::class)->edit($categorie);
    })->name('categories.edit');

    Route::put('/categories/{categorie}', function ($categorie) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(CategorieController::class)->update(request(), $categorie);
    })->name('categories.update');

    Route::delete('/categories/{categorie}', function ($categorie) {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs');
        }

        return app(CategorieController::class)->destroy($categorie);
    })->name('categories.destroy');
});

// 🔒 RENDEZ-VOUS (CLIENTS)
Route::get('/rendez-vous/create/{propriete}', [RendezVousProprieteController::class, 'create'])
    ->name('rdv.create');
Route::post('/rendez-vous/confirm', [RendezVousProprieteController::class, 'confirm'])
    ->name('rdv.confirm');
Route::post('/rendez-vous/cancel', [RendezVousProprieteController::class, 'cancel'])
    ->name('rdv.cancel');

Route::middleware(['auth'])->group(function () {
    Route::get('/rendez-vous', [RendezVousProprieteController::class, 'index'])->name('rdv.index');
});

Route::post('/rendez-vous/store/{propriete}', [RendezVousProprieteController::class, 'store'])
    ->name('rendez-vous.store');

// 🔐 AUTH (Breeze)
require __DIR__.'/auth.php';
