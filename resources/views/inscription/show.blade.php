@extends('layouts.app')

@section('content')
<div class="container py-4">

    <a href="{{ route('inscriptions.index') }}"
       class="btn btn-light mb-3">
        ← Retour à la liste
    </a>

    <div class="card shadow-sm">
        <div class="card-body">

            <b><h4 class="mb-3">{{ $inscription->nom_prenom }}</h4></b>

            <div class="row mb-2">
                <div class="col-md-6"><strong>Email :</strong> {{ $inscription->email }}</div>
                <div class="col-md-6"><strong>Téléphone :</strong> {{ $inscription->telephone }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6"><strong>Nationalité :</strong> {{ $inscription->nationalite }}</div>
                <div class="col-md-6"><strong>État civil :</strong> {{ ucfirst(str_replace('_', ' ', $inscription->etat_civil)) }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6"><strong>Église :</strong> {{ $inscription->eglise }}</div>
                <div class="col-md-6"><strong>Date conversion :</strong> {{ $inscription->date_conversion->format('d/m/Y') }}</div>
            </div>

            <div class="mb-3">
                <strong>Motivation :</strong>
                <p class="mt-1">{{ $inscription->motivation }}</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <strong>Engagement :</strong> {{ ucfirst($inscription->engagement) }}
                </div>
                <div class="col-md-6">
                    <strong>Paiement du manuel :</strong> {{ ucfirst($inscription->engagement_paiement) }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
