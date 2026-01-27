<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function create()
    {
        return view('inscription.wizard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_prenom' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|email|unique:inscriptions,email',
            'nationalite' => 'required|string',
            'etat_civil' => 'required',

            'eglise' => 'required|string',
            'date_conversion' => 'required|date',
            'motivation' => 'required|string',

            'engagement' => 'required',
            'engagement_paiement' => 'required',
        ]);

        Inscription::create($request->all());

        return redirect()->route('login')->with('success', 'Inscription enregistrée avec succès');
    }
}
