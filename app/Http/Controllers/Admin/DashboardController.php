<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriePropriete;
use App\Models\Propriete;
use App\Models\RendezVousPropriete;
use App\Models\TypePropriete;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'clients' => User::where('role', 'client')->count(),
            'agents' => User::where('role', 'agent')->count(),
            'proprietes' => Propriete::count(),
            'categories' => CategoriePropriete::count(),
            'type_proprietes' => TypePropriete::count(),
            'rendez_vous' => RendezVousPropriete::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
