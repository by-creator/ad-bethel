@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Liste des inscriptions
        </h2>

        <hr>
        <br>

        <form method="GET" action="{{ route('inscriptions.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Rechercher par nom, email ou téléphone"
                    value="{{ $search ?? '' }}">
                <button class="btn btn-danger" type="submit">
                    Rechercher
                </button>
            </div>
        </form>

        <div class="row g-3">

            @foreach ($inscriptions as $inscription)
                <div class="col-md-4">
                    <a href="{{ route('inscriptions.show', $inscription) }}" style="text-decoration:none; color:inherit">

                        <div class="card shadow-sm h-100">
                            <div class="card-body">

                                <h5 class="card-title mb-1">
                                    {{ $inscription->nom_prenom }}
                                </h5>

                                <p class="text-muted mb-2">
                                    {{ $inscription->email }}
                                </p>

                                <span class="badge bg-danger">
                                    {{ ucfirst(str_replace('_', ' ', $inscription->etat_civil)) }}
                                </span>

                            </div>

                            <div class="card-footer text-muted small">
                                Inscrit le {{ $inscription->created_at->format('d/m/Y') }}
                            </div>
                        </div>

                    </a>
                </div>
            @endforeach
            <div class="mt-4 d-flex justify-content-center">
                {{ $inscriptions->links() }}
            </div>

        </div>
    </div>
@endsection
