<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Enquête Obed-Edom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f3f4f6; }

        .stat-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }
        .stat-card .stat-value {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
        }
        .stat-card .stat-label {
            font-size: .8rem;
            color: #6c757d;
            margin-top: 4px;
        }

        .chart-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }
        .chart-card .card-header {
            background: #fff;
            border-bottom: 1px solid #f0f0f0;
            border-radius: 12px 12px 0 0 !important;
            font-weight: 600;
            font-size: .9rem;
            padding: .75rem 1rem;
        }

        .reponse-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
            overflow: hidden;
            transition: box-shadow .2s;
        }
        .reponse-card:hover {
            box-shadow: 0 4px 16px rgba(0,0,0,.12);
        }
        .reponse-card .card-header {
            background: #fff;
            border-bottom: none;
            padding: .9rem 1rem;
            cursor: pointer;
        }
        .reponse-card .card-header:active { background: #fafafa; }

        .badge-oui  { background: #198754 !important; }
        .badge-non  { background: #6c757d !important; }

        .detail-block {
            border-left: 3px solid #b91c1c;
            padding-left: .75rem;
            margin-bottom: .75rem;
        }
        .detail-block .detail-label {
            font-size: .75rem;
            font-weight: 600;
            color: #b91c1c;
            text-transform: uppercase;
            letter-spacing: .04em;
            margin-bottom: 2px;
        }
        .detail-block .detail-value {
            font-size: .875rem;
            color: #374151;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: .75rem;
            margin-top: 1.5rem;
        }
        .page-header { padding: 1rem 0 .5rem; }
        .page-header h1 { font-size: 1.25rem; font-weight: 700; color: #111827; }
        .page-header p  { font-size: .875rem; color: #6c757d; margin: 0; }

        /* mobile: canvas moins haut */
        @media (max-width: 575px) {
            .chart-canvas { max-height: 180px !important; }
            .stat-card .stat-value { font-size: 1.6rem; }
        }
    </style>
</head>
<body>

<div class="container-fluid px-3 px-md-4 py-3" style="max-width:960px">

    {{-- En-tête --}}
    <div class="page-header">
        <h1>Dashboard — Enquête Obed-Edom</h1>
        <p>{{ $total }} réponse{{ $total > 1 ? 's' : '' }} enregistrée{{ $total > 1 ? 's' : '' }}</p>
    </div>

    {{-- Cartes statistiques : 2 colonnes sur mobile, 4 sur desktop --}}
    <div class="row g-2 g-md-3 mt-1">
        <div class="col-6 col-md-3">
            <div class="card stat-card text-center py-3">
                <div class="stat-value text-danger">{{ $total }}</div>
                <div class="stat-label">Réponses totales</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card stat-card text-center py-3">
                <div class="stat-value text-success">{{ $dispoPresentiel->get('oui', 0) }}</div>
                <div class="stat-label">Dispo. présentiel</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card stat-card text-center py-3">
                <div class="stat-value text-primary">{{ $dispo3eCulte->get('oui', 0) }}</div>
                <div class="stat-label">Dispo. 3e culte</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card stat-card text-center py-3">
                <div class="stat-value text-warning">{{ $estEntrepreneur->get('oui', 0) }}</div>
                <div class="stat-label">Entrepreneurs</div>
            </div>
        </div>
    </div>

    {{-- Graphiques : 1 colonne sur mobile, 3 sur desktop --}}
    <div class="section-title mt-3">Répartitions</div>
    <div class="row g-2 g-md-3">
        <div class="col-12 col-md-4">
            <div class="card chart-card">
                <div class="card-header">Disponibilité présentiel</div>
                <div class="card-body d-flex justify-content-center py-3">
                    <canvas id="chartPresentiel" class="chart-canvas" style="max-height:200px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card chart-card">
                <div class="card-header">Disponibilité 3e culte</div>
                <div class="card-body d-flex justify-content-center py-3">
                    <canvas id="chart3eCulte" class="chart-canvas" style="max-height:200px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card chart-card">
                <div class="card-header">Entrepreneurs</div>
                <div class="card-body d-flex justify-content-center py-3">
                    <canvas id="chartEntrepreneur" class="chart-canvas" style="max-height:200px"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Liste des réponses en cartes accordéon --}}
    <div class="section-title">Réponses détaillées</div>

    @forelse($reponses as $r)
    <div class="card reponse-card mb-2">
        <div class="card-header d-flex align-items-center justify-content-between gap-2"
             data-bs-toggle="collapse"
             data-bs-target="#detail-{{ $r->id }}"
             aria-expanded="false">

            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-1 gap-sm-3 flex-grow-1 min-w-0">
                <span class="fw-semibold text-truncate" style="max-width:200px">{{ $r->nom_prenom }}</span>
                <span class="text-muted small">{{ $r->telephone }}</span>
            </div>

            <div class="d-flex align-items-center gap-1 flex-shrink-0">
                <span class="badge badge-{{ $r->dispo_presentiel }} rounded-pill d-none d-sm-inline">P</span>
                <span class="badge badge-{{ $r->dispo_3e_culte }} rounded-pill d-none d-sm-inline">C</span>
                <span class="badge {{ $r->est_entrepreneur === 'oui' ? 'bg-warning text-dark' : 'badge-non' }} rounded-pill d-none d-sm-inline">E</span>
                <span class="text-muted small d-none d-md-inline ms-1">{{ $r->created_at->format('d/m/Y') }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-chevron-down text-muted ms-1 chevron-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </div>
        </div>

        <div class="collapse" id="detail-{{ $r->id }}">
            <div class="card-body bg-light pt-3 pb-2">

                {{-- Badges en mobile --}}
                <div class="d-flex gap-2 mb-3 d-sm-none">
                    <span class="badge badge-{{ $r->dispo_presentiel }}">Présentiel : {{ $r->dispo_presentiel }}</span>
                    <span class="badge badge-{{ $r->dispo_3e_culte }}">3e culte : {{ $r->dispo_3e_culte }}</span>
                    <span class="badge {{ $r->est_entrepreneur === 'oui' ? 'bg-warning text-dark' : 'badge-non' }}">Entrepreneur : {{ $r->est_entrepreneur }}</span>
                </div>

                {{-- Badges en desktop --}}
                <div class="d-none d-sm-flex gap-2 mb-3">
                    <span class="badge badge-{{ $r->dispo_presentiel }}">Présentiel : {{ $r->dispo_presentiel }}</span>
                    <span class="badge badge-{{ $r->dispo_3e_culte }}">3e culte : {{ $r->dispo_3e_culte }}</span>
                    <span class="badge {{ $r->est_entrepreneur === 'oui' ? 'bg-warning text-dark' : 'badge-non' }}">Entrepreneur : {{ $r->est_entrepreneur }}</span>
                    <span class="badge bg-light text-muted border">{{ $r->created_at->format('d/m/Y') }}</span>
                </div>

                <div class="row g-2">
                    <div class="col-12 col-md-6">
                        <div class="detail-block">
                            <div class="detail-label">Propositions</div>
                            <div class="detail-value">{{ $r->propositions ?: '—' }}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="detail-block">
                            <div class="detail-label">Appréciations</div>
                            <div class="detail-value">{{ $r->appreciations ?: '—' }}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="detail-block">
                            <div class="detail-label">Sujets / Défis</div>
                            <div class="detail-value">{{ $r->sujets_defis ?: '—' }}</div>
                        </div>
                    </div>
                    @if($r->commentaire_presentiel)
                    <div class="col-12 col-md-6">
                        <div class="detail-block">
                            <div class="detail-label">Commentaire présentiel</div>
                            <div class="detail-value">{{ $r->commentaire_presentiel }}</div>
                        </div>
                    </div>
                    @endif
                    @if($r->incitation_3e_culte)
                    <div class="col-12 col-md-6">
                        <div class="detail-block">
                            <div class="detail-label">Incitation 3e culte</div>
                            <div class="detail-value">{{ $r->incitation_3e_culte }}</div>
                        </div>
                    </div>
                    @endif
                    @if($r->activite)
                    <div class="col-12 col-md-6">
                        <div class="detail-block">
                            <div class="detail-label">Activité</div>
                            <div class="detail-value">{{ $r->activite }}</div>
                        </div>
                    </div>
                    @endif
                    @if($r->lieu_sortie)
                    <div class="col-12 col-md-6">
                        <div class="detail-block">
                            <div class="detail-label">Lieu de sortie proposé</div>
                            <div class="detail-value">{{ $r->lieu_sortie }}</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="text-center text-muted py-5">Aucune réponse enregistrée.</div>
    @endforelse

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4/dist/chart.umd.min.js"></script>
<script>
    // Rotation du chevron à l'ouverture
    document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(function(el) {
        var targetId = el.getAttribute('data-bs-target');
        var target   = document.querySelector(targetId);
        var icon     = el.querySelector('.chevron-icon');
        if (!target || !icon) return;
        target.addEventListener('show.bs.collapse',  function() { icon.style.transform = 'rotate(180deg)'; });
        target.addEventListener('hide.bs.collapse',  function() { icon.style.transform = 'rotate(0deg)'; });
    });

    function makeDonut(id, ouiCount, nonCount) {
        new Chart(document.getElementById(id), {
            type: 'doughnut',
            data: {
                labels: ['Oui', 'Non'],
                datasets: [{
                    data: [ouiCount, nonCount],
                    backgroundColor: ['#198754', '#6c757d'],
                    borderWidth: 2,
                }]
            },
            options: {
                plugins: { legend: { position: 'bottom' } },
                cutout: '65%',
            }
        });
    }

    makeDonut('chartPresentiel',
        {{ $dispoPresentiel->get('oui', 0) }},
        {{ $dispoPresentiel->get('non', 0) }}
    );
    makeDonut('chart3eCulte',
        {{ $dispo3eCulte->get('oui', 0) }},
        {{ $dispo3eCulte->get('non', 0) }}
    );
    makeDonut('chartEntrepreneur',
        {{ $estEntrepreneur->get('oui', 0) }},
        {{ $estEntrepreneur->get('non', 0) }}
    );
</script>
</body>
</html>
