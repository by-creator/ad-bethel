<?php

namespace App\Http\Controllers;

use App\Models\EnqueteObedEdom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnqueteObedEdomController extends Controller
{
    public function create()
    {
        return view('enquete_obed_edom.wizard');
    }

    public function dashboard()
    {
        $total = EnqueteObedEdom::count();

        $dispoPresentiel = EnqueteObedEdom::select('dispo_presentiel', DB::raw('count(*) as total'))
            ->groupBy('dispo_presentiel')
            ->pluck('total', 'dispo_presentiel');

        $dispo3eCulte = EnqueteObedEdom::select('dispo_3e_culte', DB::raw('count(*) as total'))
            ->groupBy('dispo_3e_culte')
            ->pluck('total', 'dispo_3e_culte');

        $estEntrepreneur = EnqueteObedEdom::select('est_entrepreneur', DB::raw('count(*) as total'))
            ->groupBy('est_entrepreneur')
            ->pluck('total', 'est_entrepreneur');

        $reponses = EnqueteObedEdom::latest()->get();

        return view('enquete_obed_edom.dashboard', compact(
            'total',
            'dispoPresentiel',
            'dispo3eCulte',
            'estEntrepreneur',
            'reponses'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_prenom'           => 'required|string',
            'telephone'            => 'required|string',
            'propositions'         => 'required|string',
            'appreciations'        => 'required|string',
            'dispo_presentiel'     => 'required|in:oui,non',
            'commentaire_presentiel' => 'nullable|string',
            'sujets_defis'         => 'required|string',
            'dispo_3e_culte'       => 'required|in:oui,non',
            'incitation_3e_culte'  => 'nullable|string',
            'est_entrepreneur'     => 'required|in:oui,non',
            'activite'             => 'nullable|string',
            'lieu_sortie'          => 'nullable|string',
        ]);

        EnqueteObedEdom::create($request->all());

        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('enquete_obed_edom.create')
            ->with('success', 'Merci ! Vos réponses ont bien été enregistrées.');
    }
}
