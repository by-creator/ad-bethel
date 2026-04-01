
<div class="auth-card">

    <!-- RUBRIQUE HEADER (remplace l'image) -->
    <div class="rubrique-header">
        <div class="rubrique-number" id="rubriqueNumber"></div>
        <div class="rubrique-title" id="rubriqueTitle">Enquête Obed-Edom</div>
    </div>

    <div class="auth-title">Veuillez remplir le formulaire</div>
    <div class="auth-subtitle">
        Étape <span id="stepNumber"></span> sur 7
    </div>

    <div class="progress">
        <div class="progress-bar" id="progressBar"></div>
    </div>

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Succès',
        text: "{{ session('success') }}",
        confirmButtonColor: '#b91c1c'
    });
</script>
@endif
@if ($errors->any())
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'error',
        title: 'Erreur de validation',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        confirmButtonColor: '#ff5a5f'
    });
});
</script>
@endif

    <form method="POST" action="{{ route('enquete_obed_edom.store') }}" id="wizardForm" novalidate>
        @csrf

        <!-- STEP 1 — Identification -->
        <div class="step active">
            <div class="form-group">
                <label>Nom & Prénom</label>
                <input class="form-control" name="nom_prenom">
            </div>

            <div class="form-group">
                <label>Téléphone</label>
                <input class="form-control" type="tel" name="telephone">
            </div>

            <div class="wizard-actions">
                <button type="button" class="btn-next next">Suivant</button>
            </div>
        </div>

        <!-- STEP 2 — Rubrique 1 : Propositions & Appréciations -->
        <div class="step">
            <div class="form-group">
                <label>Vos propositions</label>
                <textarea class="form-control" name="propositions" placeholder="Partagez vos propositions..."></textarea>
            </div>

            <div class="form-group">
                <label>Vos appréciations</label>
                <textarea class="form-control" name="appreciations" placeholder="Partagez vos appréciations..."></textarea>
            </div>

            <div class="wizard-actions">
                <button type="button" class="btn-prev prev">Précédent</button>
                <button type="button" class="btn-next next">Suivant</button>
            </div>
        </div>

        <!-- STEP 3 — Rubrique 2 : Première rencontre en présentiel -->
        <div class="step">
            <div class="form-group">
                <label>Êtes-vous disponible pour la première rencontre en présentiel ?</label>
                <select class="form-control" name="dispo_presentiel">
                    <option value="">Choisir</option>
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
            </div>

            <div class="form-group">
                <label>Commentaire ou remarque (optionnel)</label>
                <textarea class="form-control" name="commentaire_presentiel" placeholder="Précisez si nécessaire..."></textarea>
            </div>

            <div class="wizard-actions">
                <button type="button" class="btn-prev prev">Précédent</button>
                <button type="button" class="btn-next next">Suivant</button>
            </div>
        </div>

        <!-- STEP 4 — Rubrique 3 : Sujets à aborder -->
        <div class="step">
            <div class="form-group">
                <label>Quels sujets souhaitez-vous voir aborder dans la famille selon vos défis ?</label>
                <textarea class="form-control" name="sujets_defis" placeholder="Listez les sujets qui vous tiennent à cœur..."></textarea>
            </div>

            <div class="wizard-actions">
                <button type="button" class="btn-prev prev">Précédent</button>
                <button type="button" class="btn-next next">Suivant</button>
            </div>
        </div>

        <!-- STEP 5 — Rubrique 4 : Disponibilité 3e culte -->
        <div class="step">
            <div class="form-group">
                <label>Êtes-vous disponible pour le 3e culte ?</label>
                <select class="form-control" name="dispo_3e_culte">
                    <option value="">Choisir</option>
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
            </div>

            <div class="form-group">
                <label>Qu'est-ce qui pourrait vous inciter à venir au 3e culte ?</label>
                <textarea class="form-control" name="incitation_3e_culte" placeholder="Partagez ce qui vous motiverait..."></textarea>
            </div>

            <div class="wizard-actions">
                <button type="button" class="btn-prev prev">Précédent</button>
                <button type="button" class="btn-next next">Suivant</button>
            </div>
        </div>

        <!-- STEP 6 — Rubrique 5 : Entrepreneur -->
        <div class="step">
            <div class="form-group">
                <label>Êtes-vous entrepreneur ?</label>
                <select class="form-control" name="est_entrepreneur">
                    <option value="">Choisir</option>
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
            </div>

            <div class="form-group">
                <label>Quelle activité faites-vous ? (optionnel)</label>
                <textarea class="form-control" name="activite" placeholder="Décrivez votre activité..."></textarea>
            </div>

            <div class="wizard-actions">
                <button type="button" class="btn-prev prev">Précédent</button>
                <button type="button" class="btn-next next">Suivant</button>
            </div>
        </div>

        <!-- STEP 7 — Confirmation -->
        <div class="step">
            <div style="text-align:center; padding:20px 10px">
                <div style="
                    width:70px;height:70px;margin:0 auto 20px;
                    border-radius:50%;background:#fee2e2;
                    display:flex;align-items:center;justify-content:center;
                    font-size:32px;color:#b91c1c;">✓</div>

                <h4>Merci d'avoir répondu à l'enquête</h4>
                <p style="color:#6b7280;font-size:14px">
                    Vous pouvez revenir vérifier vos réponses<br>
                    ou finaliser l'envoi.
                </p>

                <div class="wizard-actions">
                    <button type="button" class="btn-prev prev">Précédent</button>
                    <button type="submit" class="btn-next">Finaliser</button>
                </div>
            </div>
        </div>

    </form>
</div>
